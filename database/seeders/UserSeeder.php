<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'phone' => '0001112220',
            'password' => Hash::make('password'),
            'usertype' => 'admin',
        ]);

        User::create([
            'name' => 'Haris',
            'phone' => '0001112221',
            'password' => Hash::make('password'),
            'usertype' => 'representative',
        ]);

        User::create([
            'id' => 15330,
            'name' => 'Test User',
            'phone' => '0001112222',
            'password' => Hash::make('password'),
            'usertype' => 'student',
        ]);
    }
}