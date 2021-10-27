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
        Country::create(['name' => 'USA', 'intro' => 'introduction will be added later',   'edufree' => 0, 'lifethere' => 'Suitable for higher study', 'jobdesc' => 'Job description not provided']);
        Country::create(['name' => 'UK', 'intro' => 'introduction will be added later',  'edufree' => 0, 'lifethere' => 'Outstanding environment', 'jobdesc' => 'Job description not provided']);
        Country::create(['name' => 'Britain', 'intro' => 'introduction will be added later',  'edufree' => 0, 'lifethere' => 'Suitable for higher study', 'jobdesc' => 'Job description not provided']);
        Country::create(['name' => 'Canada', 'intro' => 'introduction will be added later',  'edufree' => 0, 'lifethere' => 'Suitable for higher study', 'jobdesc' => 'Job description not provided']);
    }
}