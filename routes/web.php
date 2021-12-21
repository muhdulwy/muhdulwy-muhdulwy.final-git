<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::resource('berita', BeritaController::class);
Route::resource('kategori', KategoriController::class);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');