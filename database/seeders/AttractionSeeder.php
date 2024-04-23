<?php

namespace Database\Seeders;

use App\Models\Attraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttractionSeeder extends Seeder
{
    public function run(): void
    {
        Attraction::create([
            'name' => 'Камикадзе',
            'description' => 'Свободное падение',
            'category_attraction_id' => 1,
        ]);
    }
}
