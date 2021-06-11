<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        /** @var User $u */
        $u = User::factory([
            'name' => 'Site Admin',
            'email' => 'admin@example.test'
         ])->create();
        $u->refresh();
        $u->assign('admin');

        User::factory(50)->create();
    }
}
