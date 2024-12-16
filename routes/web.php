<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('books', BookController::class);
Route::get('/books', [BookController::class, 'index'])->name('books.index');
