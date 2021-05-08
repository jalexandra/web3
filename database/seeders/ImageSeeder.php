<?php

namespace Database\Seeders;

use App\Models\Image;
use DirectoryIterator;
use SplFileInfo;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var SplFileInfo $file */
        foreach (new DirectoryIterator(__DIR__ . '/../../public/img/thumbnails/') as $file) {
            if($file->isDot() && $file->getFilename() !== 'unknown_product.png') {
                continue;
            }
            Image::create(['src' => $file->getFilename()]);
        }
    }
}
