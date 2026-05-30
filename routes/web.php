<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriController;
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

Route::get('/services', function () {
    $kategori = Kategori::with('jasa')->get();

    return view('home.services', compact('kategori'));
})->name('services.index');

Route::get('/vendors', function (Request $request) {
    $kategori = Kategori::all();
    $search = $request->query('search');
    $topRated = $request->boolean('top_rated');
    $rating = $request->query('rating');
    $price = $request->query('price');
    $categoryId = $request->query('category');

    $query = Jasa::with('kategori')->latest();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_usaha', 'like', "%{$search}%")
              ->orWhere('deskripsi', 'like', "%{$search}%")
              ->orWhere('kota', 'like', "%{$search}%");
        });
    }

    if ($categoryId) {
        $query->where('id_kategori', $categoryId);
    }

    $vendors = $query->get()->filter(function ($item) use ($topRated, $rating, $price) {
        if ($topRated && ((float) $item->rating) < 4.7) {
            return false;
        }

        if ($rating) {
            if ((float) $item->rating < (float) $rating) {
                return false;
            }
        }

        if ($price && is_numeric($item->estimasi_harga)) {
            $harga = (int) $item->estimasi_harga;
            if ($price === 'budget' && $harga > 150000) {
                return false;
            }
            if ($price === 'moderate' && ($harga < 150001 || $harga > 300000)) {
                return false;
            }
            if ($price === 'premium' && $harga <= 300000) {
                return false;
            }
        }

        return true;
    });

    return view('home.vendors', compact('vendors', 'kategori', 'search', 'topRated', 'rating', 'price'));
})->name('vendors.index');

Route::get('/vendors/{jasa}', function (Jasa $jasa) {
    $jasa->load('kategori');

    return view('home.vendor-detail', compact('jasa'));
})->middleware('auth')->name('vendors.show');

// Booking form (public)
Route::get('/book/{jasa}', function (Jasa $jasa) {
    $jasa->load('kategori');
    return view('home.book', compact('jasa'));
})->middleware('auth')->name('book.create');

// Handle booking submission (simple placeholder - adjust to store in DB)
Route::post('/book', function (Request $request) {
    $request->validate([
        'jasa_id' => 'required|integer',
        'full_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
    ]);

    // Placeholder: in a real app save to bookings table
    return redirect()->route('home')->with('success', 'Booking request berhasil dikirim.');
})->name('book.store');

// =========================
// DASHBOARD USER
// =========================
Route::get('/dashboard', function () {

    return view('user.dashboard');

})->middleware(['auth'])->name('dashboard');

// =========================
// DASHBOARD ADMIN
// =========================
Route::prefix('admin')->middleware(['auth'])->group(function () {

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
// REDIRECT ROLE LOGIN
// =========================

Route::get('/redirect', function () {

    if(auth()->user()->role == 'admin'){

        return redirect('/admin');

    }else{

        return redirect('/dashboard');

    }

})->middleware('auth');

// =========================
// AUTH BREEZE
// =========================
require __DIR__.'/auth.php';