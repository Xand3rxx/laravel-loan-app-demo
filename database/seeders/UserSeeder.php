<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

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
            'image'             => URL::to('/') . ':' . env('APP_PORT') . '/assets/media/avatars/blank.png',
        ]);

        // Create global user for easy test
        User::create([
            'role_id'           => 2,
            'email'             => 'john.doe@gmail.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'username'          => 'J. Doe',
            'first_name'        => 'Johnathan',
            'last_name'         => 'Okoye',
            'phone_number'      => '08031900672',
            'image'             => URL::to('/') . ':' . env('APP_PORT') . '/assets/media/avatars/blank.png',
        ]);

        // Generate 18 other client users
        User::factory(18)->create();
    }
}
