<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JasaController;

Route::get('/', [JasaController::class, 'index']);
Route::get('/jasa/add', [JasaController::class, 'add']);
Route::post('/jasa/store', [JasaController::class, 'store']);
Route::get('/jasa/edit/{id}', [JasaController::class, 'edit']);  
Route::post('/jasa/update/{id}', [JasaController::class, 'update']); 
Route::get('/jasa/delete/{id}', [JasaController::class, 'destroy']); 