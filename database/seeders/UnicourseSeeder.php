<?php

namespace Database\Seeders;

use App\Models\Unicourse;
use Illuminate\Database\Seeder;

class UnicourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Unicourse::factory()
            ->count(200)
            ->create();
    }
}