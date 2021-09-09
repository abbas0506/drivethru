<?php

namespace Database\Seeders;

use App\Http\Controllers\CouncelTypeController;
use App\Models\Level;
use App\Models\TestType;
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
            CountrySeeder::class,
            DocumentSeeder::class,
            ScholarshipSeeder::class,
            LevelSeeder::class,
            FacultySeeder::class,
            CouncelTypeSeeder::class,
            CitySeeder::class,
            TestTypeSeeder::class,
        ]);
    }
}