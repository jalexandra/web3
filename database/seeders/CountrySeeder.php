<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * @noinspection PhpMultipleClassDeclarationsInspection
     * @throws \JsonException
     */
    public function run(): void
    {
        $countries = json_decode(file_get_contents(__DIR__ . '/countries.json'), true, 512, JSON_THROW_ON_ERROR);

        foreach ($countries as $country){
            Country::create([
                'id' => $country['Code'],
                'name' => $country['Name']
            ]);
        }
    }
}
