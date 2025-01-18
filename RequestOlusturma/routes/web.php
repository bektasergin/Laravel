<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [ProductController::class,"index"]);
Route::post('/product/create',[ProductController::class,'create']);
Route::get('/product/list',[ProductController::class,'list']);
