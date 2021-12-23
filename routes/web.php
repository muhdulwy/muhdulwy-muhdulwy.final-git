<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;


Route::resource('berita', BeritaController::class);
Route::resource('kategori', KategoriController::class);
Route::get('/', function(){
    return redirect()->route('home');
});
Auth::routes();

Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
