<?php

use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RiwayatController;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $kategori = Kategori::all();
    $toko = Toko::all();
    $produk = Produk::all();
    return view('welcome', compact('kategori', 'toko', 'produk'));
});

//toko
Route::get('/toko', [TokoController::class, 'tampil'])->name('toko.tampil');
Route::get('/toko/data', [TokoController::class, 'data'])->name('toko.data');
Route::get('/toko/tambah', [TokoController::class, 'tambah'])->name('toko.tambah');
Route::post('/toko', [TokoController::class, 'simpan'])->name('toko.simpan');
Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
Route::put('/toko/{id}', [TokoController::class, 'update'])->name('toko.update');
Route::delete('/toko/{id}', [TokoController::class, 'hapus'])->name('toko.hapus');

//kategori
Route::get('/kategori', [KategoriController::class, 'tampil'])->name('kategori.tampil');
Route::get('/kategori/datas/all', [KategoriController::class, 'data'])->name('kategori.data');
Route::get('/kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
Route::post('/kategori', [KategoriController::class, 'simpan'])->name('kategori.simpan');
Route::get('/kategori/{id}', [KategoriController::class, 'lihat'])->name('kategori.lihat');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');

//produk
Route::get('produk', [ProdukController::class, 'tampil'])->name('produk.tampil');
Route::post('produk', [ProdukController::class, 'simpan'])->name('produk.simpan');
Route::get('produk/data', [ProdukController::class, 'data'])->name('produk.data');
Route::get('produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('produk/{id}', [ProdukController::class, 'hapus'])->name('produk.destroy');

//Riwayat Pembelian
Route::get('Riwayat', [RiwayatController::class, 'tampil'])->name('riwayat.tampil');
Route::get('Riwayat/data', [RiwayatController::class, 'data'])->name('riwayat.data');
Route::delete('Riwayat/{id}', [RiwayatController::class, 'hapus'])->name('riwayat.destroy');
