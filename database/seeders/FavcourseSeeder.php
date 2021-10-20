<?php

namespace Database\Seeders;

use App\Models\Favcourse;
use Illuminate\Database\Seeder;

class FavcourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Favcourse::factory()
            ->count(20)
            ->create();
    }
}