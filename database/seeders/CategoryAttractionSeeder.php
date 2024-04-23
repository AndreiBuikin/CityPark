<?php

namespace Database\Seeders;

use App\Models\CategoryAttraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryAttractionSeeder extends Seeder
{
    public function run(): void
    {
        CategoryAttraction::create([
            'name' => 'Экстрим',
            'code' => 'Экстрим',
        ]);
        CategoryAttraction::create([
            'name' => 'Детские',
            'code' => 'Детские',
        ]);
        CategoryAttraction::create([
            'name' => 'Семейные',
            'code' => 'Семейные',
        ]);
    }
}
