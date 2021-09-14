<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Country::create(['name' => 'Pakistan', 'visarequired' => 0, 'visaduration' => 0, 'livingcost' => 0]);
        Country::create(['name' => 'USA', 'visarequired' => 1, 'visaduration' => 4, 'livingcost' => 50000, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'UK', 'visarequired' => 1, 'visaduration' => 5, 'livingcost' => 40000, 'lifethere' => 'Outstanding environment', 'step1' => '1']);
        Country::create(['name' => 'Britain', 'visarequired' => 1, 'visaduration' => 3, 'livingcost' => 40000, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'Canada', 'visarequired' => 1, 'visaduration' => 4, 'livingcost' => 50000, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'Germany', 'visarequired' => 0, 'visaduration' => 4, 'livingcost' => 50000, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
    }
}