<?php

namespace Database\Seeders;

use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Scholarship::create(['name' => 'Presidential']);
        Scholarship::create(['name' => 'Madam Curi']);
        Scholarship::create(['name' => 'Govt Funded']);
        Scholarship::create(['name' => 'Fully Funded University']);
    }
}