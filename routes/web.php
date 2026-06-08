<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\VendorController;
use App\Models\Booking;
use App\Models\Jasa;
use App\Models\Kategori;

// =========================
// HOME
// =========================
Route::get('/', function () {

    $jasa = Jasa::with('kategori')->latest()->get();
    $kategori = Kategori::all();

    return view('home.index', compact('jasa', 'kategori'));
})->name('home');

Route::get('/vendors', function (Request $request) {
    $kategori = Kategori::all();
    $search = $request->query('search');
    $topRated = $request->boolean('top_rated');
    $rating = $request->query('rating');
    $price = $request->query('price');
    $categoryIds = $request->query('category', []);

    // Normalize category input to array
    if (!is_array($categoryIds) && !empty($categoryIds)) {
        $categoryIds = explode(',', $categoryIds);
    }

    $query = Jasa::with('kategori')->latest();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_usaha', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%")
              ->orWhere('kota', 'like', "%{$search}%");
        });
    }

    // Category multi-select
    if (!empty($categoryIds)) {
        $query->whereIn('id_kategori', $categoryIds);
    }

    // Price range mapping
    if ($price) {
        if ($price === 'budget') {
            // <= 150.000
            $query->where('estimasi_harga', '<=', 150000);
        } elseif ($price === 'moderate') {
            // 150.001 .. 1.500.000
            $query->whereBetween('estimasi_harga', [150001, 1500000]);
        } elseif ($price === 'premium') {
            // >= 1.500.001
            $query->where('estimasi_harga', '>=', 1500001);
        }
    }

    // Optional top rated filter
    if ($topRated) {
        $query->where('rating', '>=', 4.7);
    }

    $vendors = $query->get();

    return view('home.vendors', compact('vendors', 'kategori', 'search', 'topRated', 'rating', 'price', 'categoryIds'));
})->name('vendors.index');

Route::get('/vendors/{jasa}', function (Jasa $jasa) {
    $jasa->load('kategori');

    return view('home.vendor-detail', compact('jasa'));
})->name('vendors.show');

// Booking form (public)
Route::get('/book/{jasa}', function (Jasa $jasa) {
    $jasa->load('kategori');
    return view('home.book', compact('jasa'));
})->middleware('auth')->name('book.create');

// Handle booking submission (simple placeholder - adjust to store in DB)
Route::post('/book', function (Request $request) {
    $request->validate([
        'jasa_id' => 'required|integer|exists:jasa,id',
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:50',
        'city' => 'required|string|max:100',
        'address' => 'required|string|max:1000',
        'service_name' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|string|max:20',
        'payment_method' => 'required|string|max:50',
        'notes' => 'nullable|string|max:1000',
    ]);

    $jasa = Jasa::findOrFail($request->input('jasa_id'));

    $booking = Booking::create([
        'user_id' => auth()->id(),
        'jasa_id' => $jasa->id,
        'full_name' => $request->input('full_name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'city' => $request->input('city'),
        'address' => $request->input('address'),
        'service_name' => $request->input('service_name'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
        'notes' => $request->input('notes'),
        'payment_method' => $request->input('payment_method'),
        'price' => $jasa->estimasi_harga,
        'status' => 'pending',
    ]);

    // Build WhatsApp link to vendor contact for payment confirmation
    $phone = preg_replace('/[^0-9+]/', '', $jasa->kontak ?? '');
    if (strpos($phone, '+') === 0) {
        $phone = ltrim($phone, '+');
    } elseif (strpos($phone, '0') === 0) {
        // assume Indonesian numbers, convert leading 0 to 62
        $phone = '62'.substr($phone, 1);
    }

    $message = "Halo {$jasa->nama_usaha},%0ASaya sudah melakukan booking dan ingin mengkonfirmasi pembayaran.%0A";
    $message .= "Nama: {$booking->full_name}%0A";
    $message .= "Jasa: {$jasa->nama_usaha}%0A";
    $message .= "Tanggal: {$booking->date} {$booking->time}%0A";
    $message .= "Total: Rp " . number_format($jasa->estimasi_harga,0,',','.') . "%0A";
    $message .= "Email: {$booking->email}%0A";
    $message .= "Catatan: " . ($booking->notes ?? '-') . "%0A";
    $message .= "%0ASilakan konfirmasi di sini jika sudah menerima pembayaran.";

    if (empty($phone)) {
        return redirect()->route('dashboard')->with('success', 'Booking berhasil dibuat. Silahkan check dashboard Anda.');
    }

    $waUrl = 'https://wa.me/' . $phone . '?text=' . $message;

    $booking->load('jasa');
    return view('home.booking-confirmation', compact('booking', 'waUrl'));
})->middleware('auth')->name('book.store');

// =========================
// DASHBOARD USER
// =========================
Route::get('/dashboard', function () {

    return view('user.dashboard');

})->middleware(['auth'])->name('dashboard');

// =========================
// DASHBOARD ADMIN
// =========================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    // HALAMAN ADMIN
    Route::get('/', function () {

        $jasa = Jasa::with('kategori')->get();
        $kategori = Kategori::all();

        $stats = [
            'totalJasa' => Jasa::count(),
            'totalKategori' => Kategori::count(),
        ];

        return view('admin.dashboard', compact(
            'jasa',
            'kategori',
            'stats'
        ));

    });

    // CRUD JASA
    Route::resource('jasa', JasaController::class);

    // CRUD KATEGORI
    Route::resource('kategori', KategoriController::class);

});

// =========================
// DASHBOARD VENDOR
// =========================
Route::prefix('vendor')->middleware(['auth', 'vendor'])->group(function () {

    // DASHBOARD
    Route::get('/', [VendorController::class, 'dashboard'])->name('vendor.dashboard');

    // BOOKINGS
    Route::get('/bookings', [VendorController::class, 'bookings'])->name('vendor.bookings');
    Route::get('/bookings/{jasa}', [VendorController::class, 'jasaBookings'])->name('vendor.jasa-bookings');
    Route::get('/booking/{booking}', [VendorController::class, 'bookingDetail'])->name('vendor.booking-detail');
    Route::post('/booking/{booking}/status', [VendorController::class, 'updateBookingStatus'])->name('vendor.booking-update-status');

    // MY JASA
    Route::get('/my-jasa', [VendorController::class, 'myJasa'])->name('vendor.my-jasa');
    Route::get('/jasa/create', [VendorController::class, 'createJasa'])->name('vendor.jasa.create');
    Route::post('/jasa', [VendorController::class, 'storeJasa'])->name('vendor.jasa.store');
    Route::get('/jasa/{id}/edit', [VendorController::class, 'editJasa'])->name('vendor.jasa.edit');
    Route::put('/jasa/{id}', [VendorController::class, 'updateJasa'])->name('vendor.jasa.update');
    Route::delete('/jasa/{id}', [VendorController::class, 'destroyJasa'])->name('vendor.jasa.destroy');

    // PROFILE
    Route::get('/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::post('/profile', [VendorController::class, 'updateProfile'])->name('vendor.profile-update');

});

// =========================
// REDIRECT ROLE LOGIN
// =========================

Route::get('/redirect', function () {

    if(auth()->user()->role == 'admin'){

        return redirect('/admin');

    }else if(auth()->user()->role == 'vendor'){

        return redirect('/vendor');

    }else{

        return redirect('/dashboard');

    }

})->middleware('auth');

// =========================
// AUTH BREEZE
// =========================
require __DIR__.'/auth.php';