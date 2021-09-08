<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Level::create(['name' => 'ADP']);
        Level::create(['name' => 'BSc - 2 years']);
        Level::create(['name' => 'BSc Hons- 4 years']);
        Level::create(['name' => 'MA/MSc']);
        Level::create(['name' => 'BS']);
        Level::create(['name' => 'MS / MPhil']);
        Level::create(['name' => 'Ph.D']);
    }
}