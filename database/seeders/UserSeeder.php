<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrative user account
        User::create([
            'role_id'           => 1,
            'email'             => 'admin@mail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'username'          => 'Administrator',
            'first_name'        => 'Anthony',
            'last_name'         => 'Joboy',
            'phone_number'      => '09089023283',
        ]);

        // Create global user for easy test
        User::create([
            'role_id'           => 2,
            'email'             => 'johnathan.doe@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'username'          => 'Client',
            'first_name'        => 'Johnathan',
            'last_name'         => 'Okoye',
            'phone_number'      => '08031900672',
        ]);

        // Generate 18 other client users
        User::factory(18)->create();
    }
}
