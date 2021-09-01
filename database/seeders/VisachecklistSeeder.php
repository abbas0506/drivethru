<?php

namespace Database\Seeders;

use App\Models\Visachecklist;
use Illuminate\Database\Seeder;

class VisachecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Visachecklist::create(['name' => 'CNIC']);
        Visachecklist::create(['name' => 'Passport']);
        Visachecklist::create(['name' => 'Pictures']);
        Visachecklist::create(['name' => 'Health Insurance']);
    }
}