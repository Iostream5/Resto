<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use App\Models\Toko;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//toko
Route::resource('toko', TokoController::class);
Route::get('/toko-data', [TokoController::class, 'tampil'])->name('toko.data');
Route::get('/toko/tampil', [TokoController::class, 'tampil'])->name('toko.tampil');
Route::post('/toko-data', [TokoController::class, 'store'])->name('toko.store');
Route::get('/toko', [TokoController::class, 'index'])->name('toko.index');
Route::get('/toko/data', [TokoController::class, 'getData'])->name('toko.data');



//kategori
Route::get('/kategori-data', [kategoriController::class, 'tampil'])->name('kategori.data');


//produk
Route::get('/produk-data', [ProdukController::class, 'tampil'])->name('produk.data');
