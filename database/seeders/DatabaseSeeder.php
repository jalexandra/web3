<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BookSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(AddressSeeder::class);

        $this->call(OrderSeeder::class);
    }
}
