<?php

namespace Database\Seeders;

use App\Models\Studycost;
use Illuminate\Database\Seeder;

class StudycostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Studycost::factory()
            ->count(20)
            ->create();
    }
}