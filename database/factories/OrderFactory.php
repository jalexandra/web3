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
        return [
            'user_id' => $user?->id,
            'shipping_id' => $user?->shipping ?? Address::factory()->create()->id,
            'billing_id'
            => $user?->billing
                ?? ($user?->shipping
                    ?? Address::factory()->create()->id),
            'status_num' => $this->faker->numberBetween(0, 5),
        ];
    }
}
