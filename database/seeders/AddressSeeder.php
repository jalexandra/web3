<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::sample(User::count() - 10);
        /** @var User $user */
        foreach ($users as $user){
            $user->shipping_id = Address::factory()->create()->id;
            /** @noinspection PhpUnhandledExceptionInspection */
            if(random_int(0, 1)){
                $user->billing_id = Address::factory()->create()->id;
            }

            $user->save();
        }
    }
}
