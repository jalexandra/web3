<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'author_id' => Author::random()->id,
            'stock' => $this->faker->numberBetween(0, 200),
            'price' => (int)($this->faker->numerify('##99'))
        ];
    }
}
