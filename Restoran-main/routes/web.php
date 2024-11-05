<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return view('page.about');
});

Route::get('/favorit',function(){
    return view('page.favorit');
});

Route::get('/search',function(){
    return view('page.search');
})->name('search');

Route::get('/profil',function(){
    return view('page.profil');
})->name('profil');

Route::get('/detail',function(){
    return view('page.detail');
})->name('detail');
