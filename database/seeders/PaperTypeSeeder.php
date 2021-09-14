<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaperType;

class PaperTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PaperType::create(['name' => 'SAT']);
        PaperType::create(['name' => 'MDCAT']);
    }
}