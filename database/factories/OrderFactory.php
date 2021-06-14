<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        /** @var User|null $user */
        $user = $this->faker->boolean ? User::random() : null;
        $parameters = $user ? [ 'name' => $user->name, 'email' => $user->email ] : [];
        $address = $user?->shipping ?? Address::factory($parameters)->create();
        return [
            'user_id' => $user?->id,
            'shipping_id' => $address->id,
            'status_num' => $this->faker->numberBetween(0, 5),
        ];
    }
}
