<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use App\Utils\Bouncer;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Bouncer::allow('admin')->everything();
        Bouncer::allow('storage-manager')->toManage(Book::class);
        Bouncer::allow('order-manager')->toManage(Order::class);
    }
}
