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
        Level::create(['name' => 'Matric']);
        Level::create(['name' => 'Intermediate']);
        Level::create(['name' => 'Graduation']);
        Level::create(['name' => 'Post-graduation']);
        Level::create(['name' => 'Doctorate']);
        Level::create(['name' => 'Post-docotorate']);
    }
}