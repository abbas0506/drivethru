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
        Course::create(['name' => 'BS Physics', 'faculty_id' => '1']);
        Course::create(['name' => 'BS Chemistry', 'faculty_id' => '1']);
        Course::create(['name' => 'BS Bio', 'faculty_id' => '1']);
        Course::create(['name' => 'BS Math', 'faculty_id' => '1']);


        Course::create(['name' => 'BSc Radiology', 'faculty_id' => '2']);
        Course::create(['name' => 'BSc Physiotherapy', 'faculty_id' => '2']);

        Course::create(['name' => 'BS Mechanical Egg.', 'faculty_id' => '3']);
        Course::create(['name' => 'BS Chemical Engg.', 'faculty_id' => '3']);
        Course::create(['name' => 'BS Aviation', 'faculty_id' => '3']);

        Course::create(['name' => 'BS Computer Science', 'faculty_id' => '4']);
        Course::create(['name' => 'BS Softwaare Engg.', 'faculty_id' => '4']);
        Course::create(['name' => 'BS Databases', 'faculty_id' => '4']);
        Course::create(['name' => 'BS Networking', 'faculty_id' => '4']);

        Course::create(['name' => 'MS Computer Science', 'faculty_id' => '4']);
        Course::create(['name' => 'MS Softwaare Engg.', 'faculty_id' => '4']);
        Course::create(['name' => 'MS Databases', 'faculty_id' => '4']);
        Course::create(['name' => 'MS Networking', 'faculty_id' => '4']);
    }
}