<?php


namespace App\Utils;

use App\Models\Book;

class Cart
{
    public const CART_COOKIE_NAME = 'cart';

    protected static function getCookie(){
        return session()->get(self::CART_COOKIE_NAME);
    }

    public static function add(Book $book)
    {
        $cart = self::getCookie();
        //If the cart DOES exists and it HAS the book
        if(isset($cart[$book->id])) {
            $cart[$book->id]++;
            session()->put(self::CART_COOKIE_NAME, $cart);
            return;
        }

        //If the cart doesn't exists
        if(!$cart){
            $cart = [];
        }

        $cart[$book->id] = 1;
        session()->put(self::CART_COOKIE_NAME, $cart);
    }

    public static function getContent(): array
    {
        $cart = self::getCookie();
        if(!$cart){
            return [];
        }

        $result = [];

        foreach ($cart as $book_id => $amount) {
            $result[$book_id] = [
                'book' => Book::find($book_id),
                'amount' => $amount
            ];
        }

        return $result;
    }

    public static function remove(Book $book, bool $removeAll = false){
        $cart = self::getCookie();
        if(isset($cart[$book->id])){
            if($removeAll){
                unset($cart[$book->id]);
            }else{
                $cart[$book->id]--;
                if($cart[$book->id] < 1){
                    unset($cart[$book->id]);
                }
            }

            session()->put(self::CART_COOKIE_NAME, $cart);
        }
    }

    public static function clear()
    {
        session()->put(self::CART_COOKIE_NAME, []);
    }

    public static function has(Book $book): bool
    {
        return in_array(
            $book->id,
            array_keys(self::getCookie() ?? [])
        );
    }
}
