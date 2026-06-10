<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Booking;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('vendor');
    }

    /**
     * Vendor Dashboard - Show all bookings for vendor's jasa
     */
    public function dashboard()
    {
        $vendor = Auth::user();
        
        // Get all jasa owned by this vendor
        $jasa_list = $vendor->jasa()->get();
        $jasa_ids = $jasa_list->pluck('id')->toArray();

        // Get bookings for all vendor's jasa
        $bookings = Booking::whereIn('jasa_id', $jasa_ids)
            ->with(['user', 'jasa'])
            ->orderByDesc('created_at')
            ->paginate(10);

        // Statistics
        $stats = [
            'total_bookings' => Booking::whereIn('jasa_id', $jasa_ids)->count(),
            'pending' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'pending')->count(),
            'confirmed' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'confirmed')->count(),
            'completed' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'completed')->count(),
            'cancelled' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'cancelled')->count(),
            'total_jasa' => count($jasa_ids),
        ];

        return view('vendor.dashboard', compact('bookings', 'stats', 'jasa_list'));
    }

    /**
     * Vendor bookings page separate from dashboard
     */
    public function bookings()
    {
        $vendor = Auth::user();
        $jasa_list = $vendor->jasa()->get();
        $jasa_ids = $jasa_list->pluck('id')->toArray();

        $bookings = Booking::whereIn('jasa_id', $jasa_ids)
            ->with(['user', 'jasa'])
            ->orderByDesc('created_at')
            ->paginate(15);

        $stats = [
            'total_bookings' => Booking::whereIn('jasa_id', $jasa_ids)->count(),
            'pending' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'pending')->count(),
            'confirmed' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'confirmed')->count(),
            'completed' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'completed')->count(),
            'cancelled' => Booking::whereIn('jasa_id', $jasa_ids)->where('status', 'cancelled')->count(),
        ];

        return view('vendor.bookings', compact('bookings', 'stats'));
    }

    /**
     * Show bookings for a specific jasa
     */
    public function jasaBookings($jasaId)
    {
        $vendor = Auth::user();
        $jasa = Jasa::find($jasaId);

        // Check if this jasa belongs to the vendor
        if (!$jasa || $jasa->owner_id !== $vendor->id) {
            abort(403, 'Unauthorized');
        }

        $bookings = $jasa->bookings()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate(10);

        $stats = [
            'total' => $jasa->bookings()->count(),
            'pending' => $jasa->bookings()->where('status', 'pending')->count(),
            'confirmed' => $jasa->bookings()->where('status', 'confirmed')->count(),
            'completed' => $jasa->bookings()->where('status', 'completed')->count(),
        ];

        return view('vendor.jasa-bookings', compact('jasa', 'bookings', 'stats'));
    }

    /**
     * Show single booking detail
     */
    public function bookingDetail($bookingId)
    {
        $vendor = Auth::user();
        $booking = Booking::find($bookingId);

        if (!$booking) {
            abort(404, 'Booking not found');
        }

        // Check if booking belongs to vendor's jasa
        if ($booking->jasa->owner_id !== $vendor->id) {
            abort(403, 'Unauthorized');
        }

        return view('vendor.booking-detail', compact('booking'));
    }

    /**
     * Update booking status
     */
    public function updateBookingStatus(Request $request, $bookingId)
    {
        $vendor = Auth::user();
        $booking = Booking::find($bookingId);

        if (!$booking) {
            abort(404, 'Booking not found');
        }

        // Check if booking belongs to vendor's jasa
        if ($booking->jasa->owner_id !== $vendor->id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan telah diperbarui');
    }

    /**
     * Show vendor profile
     */
    public function profile()
    {
        $vendor = Auth::user();
        $jasa_list = $vendor->jasa()->get();

        return view('vendor.profile', compact('vendor', 'jasa_list'));
    }

    /**
     * Update vendor profile
     */
    public function updateProfile(Request $request)
    {
        $vendor = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $vendor->id,
        ]);

        $vendor->update($request->only(['name', 'email']));

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Show create jasa form for vendor
     */
    public function createJasa()
    {
        $kategori = Kategori::all();
        return view('vendor.jasa-create', compact('kategori'));
    }

    /**
     * Store new jasa from vendor
     */
    public function storeJasa(Request $request)
    {
        $vendor = Auth::user();

        $request->validate([
            'nama_usaha'      => 'required|string|max:255',
            'alamat'          => 'required|string|max:255',
            'kota'            => 'required|string|max:255',
            'id_kategori'     => 'required|exists:kategori,id',
            'deskripsi'       => 'required|string|max:2000',
            'estimasi_harga'  => 'required|numeric|min:0',
            'kontak'          => 'required|string|max:255',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
            'owner_id'       => $vendor->id,
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

        return redirect()->route('vendor.my-jasa')->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Show edit jasa form for vendor
     */
    public function editJasa($id)
    {
        $vendor = Auth::user();
        $jasa = Jasa::where('id', $id)->where('owner_id', $vendor->id)->firstOrFail();
        $kategori = Kategori::all();

        return view('vendor.jasa-edit', compact('jasa', 'kategori'));
    }

    /**
     * Update existing jasa for vendor
     */
    public function updateJasa(Request $request, $id)
    {
        $vendor = Auth::user();
        $jasa = Jasa::where('id', $id)->where('owner_id', $vendor->id)->firstOrFail();

        $request->validate([
            'nama_usaha'      => 'required|string|max:255',
            'alamat'          => 'required|string|max:255',
            'kota'            => 'required|string|max:255',
            'id_kategori'     => 'required|exists:kategori,id',
            'deskripsi'       => 'required|string|max:2000',
            'estimasi_harga'  => 'required|numeric|min:0',
            'kontak'          => 'required|string|max:255',
            'foto'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_usaha'     => $request->nama_usaha,
            'alamat'         => $request->alamat,
            'kota'           => $request->kota,
            'id_kategori'    => $request->id_kategori,
            'deskripsi'      => $request->deskripsi,
            'estimasi_harga' => $request->estimasi_harga,
            'kontak'         => $request->kontak,
        ];

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $folder = public_path('uploads/jasa');
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            $file->move($folder, $filename);
            if ($jasa->foto && file_exists(public_path($jasa->foto))) {
                @unlink(public_path($jasa->foto));
            }
            $data['foto'] = 'uploads/jasa/' . $filename;
        }

        $jasa->update($data);

        return redirect()->route('vendor.my-jasa')->with('success', 'Layanan berhasil diperbarui');
    }

    /**
     * Delete jasa owned by vendor
     */
    public function destroyJasa($id)
    {
        $vendor = Auth::user();
        $jasa = Jasa::where('id', $id)->where('owner_id', $vendor->id)->firstOrFail();

        if ($jasa->foto && file_exists(public_path($jasa->foto))) {
            @unlink(public_path($jasa->foto));
        }

        $jasa->delete();

        return redirect()->route('vendor.my-jasa')->with('success', 'Layanan berhasil dihapus');
    }

    /**
     * List all vendor's jasa
     */
    public function myJasa()
    {
        $vendor = Auth::user();
        $jasa_list = $vendor->jasa()
            ->with('kategori')
            ->paginate(10);

        return view('vendor.my-jasa', compact('jasa_list'));
    }
}
