<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Utils\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function add(Book $book): Redirector|Application|RedirectResponse
    {
        Cart::add($book);
        $continue = Str::of(\request('continue'))->remove(config('app.url'))->ltrim('/');
        return redirect($continue);
    }

    public function remove(Book $book): Redirector|Application|RedirectResponse
    {
        Cart::remove($book);
        $continue = Str::of(\request('continue'))->remove(config('app.url'))->ltrim('/');
        return redirect($continue);
    }

    public function removeAll(Book $book): Redirector|Application|RedirectResponse
    {
        Cart::remove($book, true);
        $continue = Str::of(\request('continue'))->remove(config('app.url'))->ltrim('/');
        return redirect($continue);
    }

    public function clear(): Redirector|Application|RedirectResponse
    {
        Cart::clear();
        $continue = Str::of(\request('continue'))->remove(config('app.url'))->ltrim('/');
        return redirect($continue);
    }
}
