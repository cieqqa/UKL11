<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriAPIController;
use App\Http\Controllers\JasaAPIController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes for Kategori
Route::apiResource('kategoriAPI', KategoriAPIController::class);
// API routes for Jasa (separate from web routes)
Route::apiResource('jasaAPI', JasaAPIController::class);