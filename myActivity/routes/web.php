<?php

use App\Http\Controllers\EtkinlikEkleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KonumBilgisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ForgotPasswordController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImgController;

Route::get('/', [IndexController::class, 'index']); #index page
Route::get('pages/login', [LoginController::class, 'login']); #login page
Route::get('pages/page-table-listing', [KonumBilgisiController::class, 'index']); #konum bilgisi page
Route::get('pages/dashboard', [EtkinlikEkleController::class, 'index']); #etkinlik ekle page
Route::post('pages/dashboard', [EtkinlikEkleController::class, 'etkinlikEkle']); #etkinlik ekleme islemi
Route::get('pages/dashboard/{id}', [EtkinlikEkleController::class, 'etkinlikSil']); #etkinlik silme islemi
Route::get('/etkinlik/image/{id}', [ImgController::class, 'show'])->name('etkinlik.image');
;

//*************************************BEKO KODLARI************************************************************************************* */

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/send-reset-code', [ForgotPasswordController::class, 'sendResetCode'])->name('send-reset-code');
Route::get('/reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password.submit');

Route::post('/addUsers', [UsersController::class,'addUsers'])->name('addUsers');
Route::post('/login', [UsersController::class,'login'])->name('login');
//*********************************************************************** */

