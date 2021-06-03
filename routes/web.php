<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('home', 'home')->middleware('auth')->name('home');
Route::resource('products', BookController::class);

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function (){
    Route::get('add/{book}', [CartController::class, 'add'])->name('add');
    Route::get('remove/{book}', [CartController::class, 'remove'])->name('remove');
    Route::get('remove_all/{book}', [CartController::class, 'removeAll'])->name('remove_all');
    Route::get('clear/{book}', [CartController::class, 'clear'])->name('clear');
});
