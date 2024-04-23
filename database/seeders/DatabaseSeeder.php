<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoryAttractionSeeder::class,
            RoleSeeder::class,
            AttractionSeeder::class,
            CategorySouvenirSeeder::class,
            SouvenirSeeder::class,
        ]);
    }
}
