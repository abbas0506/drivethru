<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Document::create(['name' => 'CNIC']);
        Document::create(['name' => 'Passport']);
        Document::create(['name' => 'Pictures']);
        Document::create(['name' => 'Health Insurance']);
        Document::create(['name' => 'Academics']);
    }
}