<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
})->middleware('check-time-message');


Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('create', 'create');
    Route::post('create', 'create');
    Route::put('update/{uuid}', 'update');
    Route::delete('delete/{uuid}', 'delete');
    Route::get('{slug}', 'detail');
});

Route::prefix('book')->controller(\App\Http\Controllers\BookController::class)->group(function () {
    Route::get('create', 'create');
    Route::post('create', 'create');
});

Route::put('book/update/{id}', [\App\Http\Controllers\BookController::class, 'update'])->name('book.update');
Route::delete('book/delete/{id}', [\App\Http\Controllers\BookController::class, 'delete'])->name('book.delete');

Route::get('/category/{category_id}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('category.detail');

Route::get('/book/detail/{id}', [App\Http\Controllers\BookController::class,'detail'])->name('detail');

Route::post('book/comment/{id}', [CommentController::class, 'addComment'])->name('addComment');
Route::get('book/detail/{id}', [CommentController::class, 'detail'])->name('detail');
Route::put('book/detail/{id}', [CommentController::class, 'update'])->name('update');
Route::delete('book/detail/{id}', [CommentController::class, 'delete'])->name('delete');



