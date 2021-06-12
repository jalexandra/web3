<?php

namespace Database\Seeders;

use App\Models\Book;
use DirectoryIterator;
use Illuminate\Database\Seeder;
use SplFileInfo;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        /** @var SplFileInfo $file */
        foreach (new DirectoryIterator(__DIR__ . '/../../public/img/thumbnails/') as $file) {
            if($file->isDot() && $file->getFilename() !== 'unknown_product.png') continue;

            Book::factory()->create(['image' => $file->getFilename()]);
        }
    }
}
