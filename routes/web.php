<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriController;
use App\Models\Jasa;
use App\Models\Kategori;

// =========================
// HOME
// =========================
Route::get('/', function () {

    $jasa = Jasa::with('kategori')->latest()->get();

    return view('home.index', compact('jasa'));

});

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