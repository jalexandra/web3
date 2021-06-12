<?php

use App\Http\Controllers\{AddressController, BookController, CartController, CheckoutController, UserController};
use Illuminate\Support\Facades\Route;

Route::resource('book', BookController::class);

Route::redirect('/', route('book.index'));
Route::redirect('/home', route('book.index'))->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::resource('user', UserController::class)->except('create', 'store');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::resource('address', AddressController::class);
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function (){
    Route::get('add/{book}', [CartController::class, 'add'])->name('add');
    Route::get('remove/{book}', [CartController::class, 'remove'])->name('remove');
    Route::get('remove_all/{book}', [CartController::class, 'removeAll'])->name('remove_all');
    Route::get('clear/{book}', [CartController::class, 'clear'])->name('clear');
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.'], function (){
    Route::get('items', [CheckoutController::class, 'stepOne'])->name('1');
    Route::post('user', [CheckoutController::class, 'stepTwo'])->name('2');
    Route::get('details', [CheckoutController::class, 'stepThree'])->name('3');
    Route::post('review', [CheckoutController::class, 'stepFour'])->name('4');
    Route::post('done', [CheckoutController::class, 'stepFive'])->name('5');
});
