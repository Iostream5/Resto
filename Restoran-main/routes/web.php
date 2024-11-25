<?php

use App\Http\Controllers\AnalisaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Cart;

Route::get('/', [DataController::class, 'home'])->name('home');
Route::get('/about', function () {
    return view('page.about');
});
Route::get('/search', [DataController::class, 'search'])->name('produk.search');
Route::get('/searching', [DataController::class, 'searching'])->name('search');
Route::get('/kategori/{id}', [DataController::class, 'kategori'])->name('kategori');

//detail Produk
Route::get('/detail/{id:nama}', [DataController::class, 'detail'])->name('detail');
//detail Toko
Route::get('/toko/{id}', [DataController::class, 'tokoDetail'])->name('toko.detail');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/profil', [DataController::class, 'profil'])->name('profil');

    //toko
    Route::get('/toko', [TokoController::class, 'tampil'])->name('toko.tampil');
    Route::get('/toko/data', [TokoController::class, 'data'])->name('toko.data');
    Route::get('/toko/tambah/user', [TokoController::class, 'tambah'])->name('toko.tambah');
    Route::post('/toko', [TokoController::class, 'simpan'])->name('toko.simpan');
    Route::get('/toko/{id}/edit', [TokoController::class, 'edit'])->name('toko.edit');
    Route::put('/toko/{id}', [TokoController::class, 'update'])->name('toko.update');
    Route::delete('/toko/{id}', [TokoController::class, 'hapus'])->name('toko.hapus');

    //produk
    Route::get('produk', [ProdukController::class, 'tampil'])->name('produk.tampil');
    Route::post('Produk', [ProdukController::class, 'simpan'])->name('produk.simpan');
    Route::get('produk/data', [ProdukController::class, 'data'])->name('produk.data');
    Route::get('produk/tambah', [ProdukController::class, 'tambah'])->name('produk.tambah');
    Route::get('produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('produk/{id}', [ProdukController::class, 'hapus'])->name('produk.destroy');

    // Favorit
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/tambah/{produkId}', [FavoriteController::class, 'tambah'])->name('favorites.tambah');
    Route::delete('/favorites/hapus/{produkId}', [FavoriteController::class, 'hapus'])->name('favorites.hapus');
    Route::post('/produk/{produkId}/favorite', [FavoriteController::class, 'toggleFavorite'])->name('produk.favorite');

    // keranjang
    Route::get('/keranjang', [CartController::class, 'keranjang'])->name('keranjang');
    Route::post('/keranjang/tambah/{produkId}', [CartController::class, 'tambah'])->name('cart.tambah');
    Route::delete('/keranjang/hapus/{produkId}', [CartController::class, 'hapus'])->name('cart.hapus');

    //chekout
    Route::post('/keranjang/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/transaksi', [CartController::class, 'transaksi'])->name('transaksi');
    Route::get('/struk/{id}', [CartController::class, 'struk'])->name('struk');
    Route::delete('/struk/Del/{id}', [CartController::class, 'hapusRiwayat'])->name('hapus.riwayat');
    Route::get('/Transaksi/Pembelian', [CartController::class, 'Riwayat'])->name('Riwayat');
});
Route::middleware('auth')->group(function () {
    Route::get('user', [ProdukController::class, 'tampil'])->name('user.tampil');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [UserController::class, 'update'])->name('profile.update');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('home');
    });
});
