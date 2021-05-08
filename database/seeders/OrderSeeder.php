<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * @throws \Exception
     */
    public function run()
    {
        /** @var Order $order */
        Order::factory(400)->create();
        $orders = Order::all();
        foreach ($orders as $order) {
            $books = Book::sample(random_int(1, 10));
            foreach ($books as $book) {
                $order->books()->attach($book->id, ['amount' => random_int(1, 10)]);
            }
        }
    }
}
