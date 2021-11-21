<?php

namespace Database\Seeders;

use App\Models\Favcourse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //seed basic data
        $this->call([
            UserSeeder::class,
            DocumentSeeder::class,
            ScholarshipSeeder::class,
            LevelSeeder::class,
            FacultySeeder::class,
            CitySeeder::class,
            PaperTypeSeeder::class,
            CourseSeeder::class,
            ExpensetypeSeeder::class,
            NewsSeeder::class,
        ]);
    }
}