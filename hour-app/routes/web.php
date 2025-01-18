<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Eğer session'da mesaj varsa, onu al
    $message = session()->get('message', 'Hoşgeldiniz!');
    
    // Sayfayı yenileyen kullanıcıya mesajı sil ve 'Hoşgeldiniz!' yaz
    if (session()->has('message')) {
        session()->forget('message');
    }

    return view('welcome', compact('message'));
})->middleware('hourMiddleware');
