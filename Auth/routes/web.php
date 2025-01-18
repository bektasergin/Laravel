<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\Login;
use App\Http\Middleware\LogOut;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/login', [HomeController::class, 'index'])->middleware(Auth::class);
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'register']);
Route::get('/list', [HomeController::class, 'list'])->middleware(Login::class);
Route::get('/add-expense', [HomeController::class, 'save_expense'])->middleware(Login::class);
Route::post('/add-expense', [HomeController::class, 'save_expense'])->middleware(Login::class);
Route::get('/add-income', [HomeController::class, 'save_income'])->middleware(Login::class);
Route::post('/save-income', [HomeController::class, 'save_income'])->middleware(Login::class);
Route::get('/logout', [HomeController::class, 'index'])->middleware(LogOut::class);
