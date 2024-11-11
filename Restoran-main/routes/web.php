<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [DataController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('page.about');
});

Route::get('/search', [DataController::class, 'search'])->name('produk.search');
Route::get('/searching', [DataController::class, 'searching'])->name('search');

Route::get('/toko/{id}', [DataController::class, 'tokoDetail'])->name('toko.detail');

Route::get('/kategori/{id}', [DataController::class, 'kategori'])->name('kategori');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/profil', [DataController::class, 'profil'])->name('profil');

    Route::get('/favorit', function () {
        return view('page.favorit');
    });



    Route::get('/detail/{id:nama}', [DataController::class, 'detail'])->name('detail');




    Route::post('/produk/{produkId}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('produk.favorite');




    Route::get('/toko', [TokoController::class, 'tampil'])->name('toko.tampil');
    Route::get('/toko/data', [TokoController::class, 'data'])->name('toko.data');
    Route::get('/toko/tambah', [TokoController::class, 'tambah'])->name('toko.tambah');
    Route::post('/toko', [TokoController::class, 'simpan'])->name('toko.simpan');
    Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
    Route::put('/toko/{id}', [TokoController::class, 'update'])->name('toko.update');
    Route::delete('/toko/{id}', [TokoController::class, 'hapus'])->name('toko.hapus');




    //kategori

    // Route::get('/kategori', [KategoriController::class, 'tampil'])->name('kategori.tampil');
    // Route::get('/kategori/datas/all', [KategoriController::class, 'data'])->name('kategori.data');
    // Route::get('/kategori/tambah', [KategoriController::class, 'tambah'])->name('kategori.tambah');
    // Route::post('/kategori', [KategoriController::class, 'simpan'])->name('kategori.simpan');
    // Route::get('/kategori/{id}', [KategoriController::class, 'lihat'])->name('kategori.lihat');
    // Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    // Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    // Route::delete('/kategori/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');



    //produk
    Route::get('produk', [ProdukController::class, 'tampil'])->name('produk.tampil');
    Route::post('Produk', [ProdukController::class, 'simpan'])->name('produk.simpan');
    Route::get('produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::get('produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('produk/{id}', [ProdukController::class, 'hapus'])->name('produk.destroy');

    // Routes untuk Favorite
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/tambah/{produkId}', [FavoriteController::class, 'tambah'])->name('favorites.tambah');
    Route::delete('/favorites/hapus/{produkId}', [FavoriteController::class, 'hapus'])->name('favorites.hapus');

    // Routes untuk Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/tambah/{produkId}', [CartController::class, 'tambah'])->name('cart.tambah');
    Route::delete('/cart/hapus/{produkId}', [CartController::class, 'hapus'])->name('cart.hapus');
    Route::put('/cart/update/{produkId}', [CartController::class, 'update'])->name('cart.update');
});





Route::middleware('auth')->group(function () {
    Route::get('user', [ProdukController::class, 'tampil'])->name('user.tampil');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [UserController::class, 'update'])->name('profile.update');
});
