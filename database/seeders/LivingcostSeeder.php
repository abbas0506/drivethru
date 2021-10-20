<?php

namespace Database\Seeders;

use App\Models\Livingcost;
use Illuminate\Database\Seeder;

class LivingcostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Livingcost::factory()
            ->count(20)
            ->create();
    }
}