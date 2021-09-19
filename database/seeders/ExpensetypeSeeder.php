<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Expensetype;

class ExpensetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Expensetype::create(['name' => 'Residence']);
        Expensetype::create(['name' => 'Utility bills']);
        Expensetype::create(['name' => 'Internet']);
        Expensetype::create(['name' => 'Travelling']);
    }
}