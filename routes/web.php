<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;
use App\Models\Jasa;

Route::get('/', function () {
    $jasa = Jasa::with('kategori')->latest()->get();
    return view('home.index', compact('jasa'));
});
Route::resource('jasa', JasaController::class);
Route::resource('jasa', JasaController::class)->except(['show']);