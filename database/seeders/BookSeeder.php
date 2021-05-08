<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Image;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        /** @var Image $image */
        foreach (Image::all() as $image){
            Book::factory()->create(['image_id' => $image->id]);
        }
    }
}
