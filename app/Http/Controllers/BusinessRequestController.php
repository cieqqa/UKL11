<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessRequest;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Mail\BusinessRequestStatusChanged;
use App\Mail\BusinessRequestApplicantNotified;
use Illuminate\Support\Str;

class BusinessRequestController extends Controller
{
    public function create()
    {
        $kategori = \App\Models\Kategori::all();
        return view('home.business-request', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'company_type' => 'nullable|string',
            'company_email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'estimasi_harga' => 'nullable|numeric',
            'kota' => 'nullable|string|max:255',
            'id_kategori' => 'nullable|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['nama_usaha','company_type','company_email','estimasi_harga','kota','id_kategori','deskripsi','kontak','alamat','notes']);
        $data['user_id'] = auth()->id();

        if ($request->filled('password')) {
            // store the hashed initial password so it can be applied when admin approves
            $data['initial_password'] = Hash::make($request->input('password'));
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $folder = public_path('uploads/jasa');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($folder, $filename);
            $data['foto'] = 'uploads/jasa/' . $filename;
        }

        BusinessRequest::create($data);

        return redirect()->route('vendors.index')->with('success', 'Request pendaftaran PT/CV dikirim. Tunggu konfirmasi admin.');
    }

    // Admin: list requests
    public function index()
    {
        $requests = BusinessRequest::with('user','kategori')->orderBy('created_at','desc')->get();
        $stats = [
            'totalJasa' => Jasa::count(),
            'totalKategori' => \App\Models\Kategori::count(),
            'pendingRequests' => BusinessRequest::where('status', 'pending')->count(),
        ];
        return view('admin.business-requests', compact('requests', 'stats'));
    }

    public function show($id)
    {
        $req = BusinessRequest::with('user','kategori')->findOrFail($id);
        $stats = [
            'totalJasa' => Jasa::count(),
            'totalKategori' => \App\Models\Kategori::count(),
            'pendingRequests' => BusinessRequest::where('status', 'pending')->count(),
        ];
        return view('admin.business-requests-show', compact('req', 'stats'));
    }

    public function approve($id)
    {
        $req = BusinessRequest::findOrFail($id);

        if ($req->status !== 'pending') {
            return back()->with('error', 'Request sudah diproses.');
        }

        // create/find vendor account using the PT/CV email instead of requestor email
        $vendorEmail = $req->company_email ?: $req->user->email;
        $vendorUser = User::where('email', $vendorEmail)->first();
        $isExistingAccount = false;
        $rawPassword = null;

        if ($vendorUser) {
            $isExistingAccount = true;
            $vendorUser->role = 'vendor';
            $vendorUser->save();
        } else {
            $vendorUser = new User();
            $vendorUser->name = $req->nama_usaha;
            $vendorUser->email = $vendorEmail;
            $vendorUser->role = 'vendor';

            // If applicant provided a password during request, use it (it's already hashed)
            if (!empty($req->initial_password)) {
                $vendorUser->password = $req->initial_password;
                $rawPassword = null;
            } else {
                $rawPassword = Str::random(10);
                $vendorUser->password = Hash::make($rawPassword);
            }

            $vendorUser->save();
        }

        // create jasa entry
        $jasaData = [
            'nama_usaha' => $req->nama_usaha,
            'alamat' => $req->alamat,
            'kota' => $req->kota,
            'id_kategori' => $req->id_kategori,
            'deskripsi' => $req->deskripsi,
            'estimasi_harga' => $req->estimasi_harga,
            'kontak' => $req->kontak,
            'status_verif' => 1,
            'owner_id' => $vendorUser->id,
        ];

        if ($req->foto) {
            $jasaData['foto'] = $req->foto;
        }

        $jasa = Jasa::create($jasaData);

        $req->status = 'approved';
        $req->admin_id = auth()->id();
        $req->save();

        // send email notification with credentials or reset instructions
        try {
            if ($isExistingAccount) {
                Password::sendResetLink(['email' => $vendorUser->email]);
            }
            Mail::to($vendorUser->email)->send(new BusinessRequestStatusChanged($req, 'approved', $rawPassword, $isExistingAccount));

            // notify the original applicant that their request was approved and explain login steps
            Mail::to($req->user->email)->send(new BusinessRequestApplicantNotified($req, $isExistingAccount, 'approved'));
        } catch (\Exception $e) {
            // swallow; email misconfig should not break flow
        }

        $successMessage = $isExistingAccount
            ? 'Request disetujui. Akun PT/CV sudah ada, reset password dikirim ke email perusahaan.'
            : 'Request disetujui dan akun vendor dibuat. Kredensial telah dikirim via email.';

        return redirect()->route('admin.dashboard')->with('success', $successMessage);
    }

    public function reject($id)
    {
        $req = BusinessRequest::findOrFail($id);
        if ($req->status !== 'pending') {
            return back()->with('error', 'Request sudah diproses.');
        }
        $req->status = 'rejected';
        $req->admin_id = auth()->id();
        $req->save();

        try {
            // notify applicant that their request was rejected using applicant-specific template
            Mail::to($req->user->email)->send(new BusinessRequestApplicantNotified($req, false, 'rejected'));
        } catch (\Exception $e) {
        }

        return redirect()->route('admin.dashboard')->with('success', 'Request ditolak dan pemohon diberitahu via email.');
    }
}
