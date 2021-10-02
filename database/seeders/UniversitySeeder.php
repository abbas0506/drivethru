<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        University::create(['name' => 'Quaid e Azam University, Islamabad', 'city_id' => 11, 'type' => 'public', 'rank' => 1, 'step1' => 1]);
        University::create(['name' => 'NUST, Islamabad', 'city_id' => 11, 'type' => 'public', 'rank' => 2, 'step1' => 1]);
        University::create(['name' => 'LUMS, Lahore', 'city_id' => 2, 'type' => 'private', 'rank' => 3, 'step1' => 1]);
        University::create(['name' => 'Punjab University, Lahore', 'city_id' => 2, 'type' => 'public', 'rank' => 4, 'step1' => 1]);
        University::create(['name' => 'FAST', 'city_id' => 2, 'type' => 'private', 'rank' => 5, 'step1' => 1]);
        University::create(['name' => 'Superior University, Lahore', 'city_id' => 2, 'type' => 'private', 'rank' => 6, 'step1' => 1]);
        University::create(['name' => 'Fatima Jinnah Medical University, Lahore', 'city_id' => 2, 'type' => 'public', 'rank' => 7, 'step1' => 1]);
        University::create(['name' => 'University of Okara', 'city_id' => 15, 'type' => 'public', 'rank' => 8, 'step1' => 1]);
    }
}