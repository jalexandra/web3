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
            $user->shipping_id = Address::factory(['email' => $user->email, 'name' => $user->name])->create()->id;
            $user->save();
        }
    }
}
