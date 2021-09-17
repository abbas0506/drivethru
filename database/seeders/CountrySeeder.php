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
        Country::create(['name' => 'Pakistan', 'intro' => 'introduction will be added later', 'visarequired' => 0, 'visaduration' => 0]);
        Country::create(['name' => 'USA', 'intro' => 'introduction will be added later', 'visarequired' => 1, 'visaduration' => 4, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'UK', 'intro' => 'introduction will be added later', 'visarequired' => 1, 'visaduration' => 5, 'lifethere' => 'Outstanding environment', 'step1' => '1']);
        Country::create(['name' => 'Britain', 'intro' => 'introduction will be added later', 'visarequired' => 1, 'visaduration' => 3, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'Canada', 'intro' => 'introduction will be added later', 'visarequired' => 1, 'visaduration' => 4, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
        Country::create(['name' => 'Germany', 'intro' => 'introduction will be added later', 'visarequired' => 0, 'visaduration' => 4, 'lifethere' => 'Suitable for higher study', 'step1' => '1']);
    }
}