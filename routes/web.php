<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;

use Illuminate\Support\Facades\Route;


Route::resource('berit', BeritaController::class);
Route::resource('kategor', KategoriController::class);