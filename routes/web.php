<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KategoriController;
use App\Models\Jasa;

// ✅ HOME
Route::get('/', function () {
    $jasa = Jasa::with('kategori')->latest()->get();
    return view('home.index', compact('jasa'));
});

// ✅ ADMIN
Route::prefix('admin')->group(function () {

    // Dashboard utama
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // CRUD
    Route::resource('jasa', JasaController::class);
    Route::resource('kategori', KategoriController::class);
});