<?php

namespace Database\Seeders;

use App\Models\Jobdeptt;
use Illuminate\Database\Seeder;

class JobdepttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jobdeptt::create(['name' => 'Education']);
        Jobdeptt::create(['name' => 'Health']);
        Jobdeptt::create(['name' => 'Security']);
        Jobdeptt::create(['name' => 'Foods']);
    }
}