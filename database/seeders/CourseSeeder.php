<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Course::create(['name' => 'BS Physics', 'faculty_id' => '1', 'level_id' => '5']);
        Course::create(['name' => 'BS Chemistry', 'faculty_id' => '1', 'level_id' => '5']);
        Course::create(['name' => 'BSc Radiology', 'faculty_id' => '2', 'level_id' => '3']);
        Course::create(['name' => 'BSc Physiotherapy', 'faculty_id' => '2', 'level_id' => '3']);
    }
}