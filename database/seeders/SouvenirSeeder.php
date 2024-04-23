<?php

namespace Database\Seeders;

use App\Models\Souvenir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SouvenirSeeder extends Seeder
{
    public function run(): void
    {
        Souvenir::create([
            'name' => 'Гусь',
            'description' => 'Мягкая игрушка гигантский Гусь',
            'price' => 885.00,
            'category_souvenir_id' => 1,
        ]);
    }
}
