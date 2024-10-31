<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return view('page.about');
});

Route::get('/search',function(){
    return view('page.search');
});