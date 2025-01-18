<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hakkimizda', function () {
    return view('Hakkimizda');
});

Route::get('/iletisim', function () {
    return view('Iletisim');
});