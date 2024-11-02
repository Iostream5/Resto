<?php

use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Toko-Tambah',[TokoController::class, 'tambah'])->name('tambah');