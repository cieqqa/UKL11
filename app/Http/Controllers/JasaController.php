<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\User;

class JasaController extends Controller
{
    public function index()
    {
        $jasa = Jasa::with('kategori')->get();
        return view('jasa.index', compact('jasa'));
    }


    public function create()
    {
        $kategori = Kategori::all();
        $vendors = User::where('role', 'vendor')->get();
        return view('jasa.create', compact('kategori', 'vendors'));
    }

    public function show($id)
    {
        $jasa = Jasa::with('kategori')->findOrFail($id);
        return view('jasa.show', compact('jasa'));
    }

    public function store(Request $request)
    {
        // base validation
        $rules = [
            'nama_usaha'      => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'id_kategori'     => 'required',
            'deskripsi'       => 'required',
            'estimasi_harga'  => 'required',
            'kontak'          => 'required',
            'owner_id'        => 'nullable|exists:users,id',
            'vendor_name'     => 'required_without:owner_id|string|max:255',
            'vendor_email'    => 'required_without:owner_id|email|max:255',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $request->validate($rules);

        $ownerId = $request->owner_id;

        // If no existing owner provided, check whether vendor email already exists
        if (!$ownerId) {
            $existing = User::where('email', $request->vendor_email)->first();
            if ($existing) {
                // if existing user is not a vendor, convert role to vendor
                if ($existing->role !== 'vendor') {
                    $existing->role = 'vendor';
                    $existing->save();
                }
                $ownerId = $existing->id;
            } else {
                // new vendor must provide password
                $request->validate([
                    'vendor_password' => 'required|string|min:8|confirmed',
                    'vendor_password_confirmation' => 'required_with:vendor_password|string|min:8',
                ]);

                $vendor = User::create([
                    'name' => $request->vendor_name,
                    'email' => $request->vendor_email,
                    'password' => Hash::make($request->vendor_password),
                    'role' => 'vendor',
                ]);
                $ownerId = $vendor->id;
            }
        }

        $data = [
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
            'status_verif'   => 'pending',
            'rating'         => 0,
            'owner_id'       => $ownerId,
        ];

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

        Jasa::create($data);

        return redirect('/admin')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jasa = Jasa::findOrFail($id);
        $kategori = Kategori::all();
        $vendors = User::where('role', 'vendor')->get();
        return view('jasa.edit', compact('jasa', 'kategori', 'vendors'));
    }

    public function update(Request $request, $id)
    {
        $jasa = Jasa::findOrFail($id);

        $request->validate([
            'nama_usaha'      => 'required',
            'alamat'          => 'required',
            'kota'            => 'required',
            'id_kategori'     => 'required',
            'deskripsi'       => 'required',
            'estimasi_harga'  => 'required',
            'kontak'          => 'required',
            'owner_id'        => 'required|exists:users,id',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
            'owner_id'       => $request->owner_id,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $folder = public_path('uploads/jasa');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($folder, $filename);
            // hapus file lama jika ada
            if ($jasa->foto && file_exists(public_path($jasa->foto))) {
                @unlink(public_path($jasa->foto));
            }
            $data['foto'] = 'uploads/jasa/' . $filename;
        }

        $jasa->update($data);

        return redirect('/admin')
            ->with('success', 'Jasa berhasil diupdate!');
    }

    public function destroy($id)
    {
        Jasa::findOrFail($id)->delete();

        return redirect('/admin')
            ->with('success', 'Jasa berhasil dihapus!');
    }
}