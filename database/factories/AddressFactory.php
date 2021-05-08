<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'postcode' => $this->faker->postcode,
            'country_id' => Country::random(),
            'name' => $this->faker->name,
            'city' => $this->faker->city,
            'street' => $this->faker->streetName,
            'house' => $this->faker->numberBetween(0,1000),
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->safeEmail,
            'note' => $this->faker->boolean ? $this->faker->paragraph : ''
        ];
    }
}
