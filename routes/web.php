<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriController;
use App\Models\Jasa;
use App\Models\Kategori;

// ✅ HOME
Route::get('/', function () {
    $jasa = Jasa::with('kategori')->latest()->get();
    return view('home.index', compact('jasa'));
});

// ✅ ADMIN
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        $jasa = Jasa::with('kategori')->get();
        $kategori = Kategori::all();

        $stats = [
            'totalJasa' => Jasa::count(),
            'totalKategori' => Kategori::count(),
        ];

        return view('admin.dashboard', compact('jasa', 'kategori', 'stats'));
    });

    // ✅ CRUD
    Route::resource('jasa', JasaController::class);
    Route::resource('kategori', KategoriController::class);
});