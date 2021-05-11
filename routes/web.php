<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('home', 'home')->middleware('auth')->name('home');
Route::resource('products', BookController::class);
