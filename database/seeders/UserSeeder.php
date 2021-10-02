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
        User::create(['phone' => '03000373004', 'password' => Hash::make('password')]);
        User::create(['phone' => '03424930066', 'password' => Hash::make('password')]);
    }
}