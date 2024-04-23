<?php

namespace Database\Seeders;

use App\Models\CategorySouvenir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySouvenirSeeder extends Seeder
{
    public function run(): void
    {
        CategorySouvenir::create([
            'name' => 'Игрушки',
            'code' => 'Игрушки',
        ]);
        CategorySouvenir::create([
            'name' => 'Магниты',
            'code' => 'Магниты',
        ]);
    }
}
