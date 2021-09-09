<?php

namespace Database\Seeders;

use App\Models\CouncelType;
use Illuminate\Database\Seeder;

class CouncelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CouncelType::create(['name' => 'International admission enquiry']);
        CouncelType::create(['name' => 'National admission enquiry']);
        CouncelType::create(['name' => 'Websie usage issues']);
        CouncelType::create(['name' => 'Fee payment issue']);
        CouncelType::create(['name' => 'General information required']);
    }
}