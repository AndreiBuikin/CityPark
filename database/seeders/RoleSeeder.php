<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'code' => 'admin',
        ]);
        Role::create([
            'name' => 'user',
            'code' => 'user',
        ]);
        Role::create([
            'name' => 'manager',
            'code' => 'manager',
        ]);
        Role::create([
            'name' => 'editor',
            'code' => 'editor',
        ]);
    }
}
