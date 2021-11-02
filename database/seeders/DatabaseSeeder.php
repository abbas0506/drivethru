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
        // \App\Models\User::factory(10)->create();
        $this->call([
            //CountrySeeder::class,
            UserSeeder::class,
            DocumentSeeder::class,
            ScholarshipSeeder::class,
            LevelSeeder::class,
            FacultySeeder::class,
            CitySeeder::class,
            PaperTypeSeeder::class,
            CourseSeeder::class,
            ExpensetypeSeeder::class,
            UniversitySeeder::class,
            BoardSeeder::class,
            CountrySeeder::class,
            FavcourseSeeder::class,
            LivingcostSeeder::class,
            StudycostSeeder::class,
            UnicourseSeeder::class,
        ]);
    }
}