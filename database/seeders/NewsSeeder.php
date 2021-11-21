<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        News::create([
            'text' => 'A career counselling workshop is being conducted by DrvieThru team. Registration will be entirely free. The time and venue will be conveyed soon',
        ]);
    }
}