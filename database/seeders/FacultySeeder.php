<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Faculty::create(['name' => 'Faculty of Pure Sciences']);
        Faculty::create(['name' => 'Faculty of Medicine']);
        Faculty::create(['name' => 'Faculty of Engineering & Technology']);
        Faculty::create(['name' => 'Faculty of Computer Science & IT']);
        Faculty::create(['name' => 'Faculty of Business & Management']);
        Faculty::create(['name' => 'Faculty of Social Sciences']);
        Faculty::create(['name' => 'Faculty of Liguistics']);
    }
}