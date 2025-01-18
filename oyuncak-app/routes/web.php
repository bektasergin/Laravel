<?php

use App\Http\Controllers\OyuncaklarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("anasayfa");

Route::post('/oyuncakEkle', [OyuncaklarController::class, 'oyuncakEkle']);
Route::delete("/oyuncakSil",[OyuncaklarController::class,"oyuncakSil"]);
Route::put("/oyuncakGuncelle",[OyuncaklarController::class,"oyuncakGuncelle"]);

Route::get('/', [OyuncaklarController::class, 'tumOyuncaklar'])->name("anasayfa");
Route::get('/oyuncakGuncelle', [OyuncaklarController::class, 'tumOyuncaklar2'])->name('oyuncakGuncelle');


Route::get('/oyuncakEkle', [OyuncaklarController::class, 'oyuncakEkleYonlendir'])->name('oyuncakEkle');
Route::get("/oyuncakSil",[OyuncaklarController::class,"oyuncakSilYonlendir"])->name('oyuncakSil');

