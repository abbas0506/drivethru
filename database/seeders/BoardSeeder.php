<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Board::create(['name' => "BISE Lahore"]);
        Board::create(['name' => "BISE Sahiwal"]);
        Board::create(['name' => "BISE Multan"]);
        Board::create(['name' => "BISE Faisalabad"]);
        Board::create(['name' => "BISE Gujranwala"]);
        Board::create(['name' => "BISE Rawalpindi"]);
        Board::create(['name' => "BISE Bahawalpur"]);
    }
}