<?php

namespace Database\Seeders;

use App\Models\TypeTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTicketSeeder extends Seeder
{
    public function run(): void
    {
        TypeTicket::create([
            'name' => 'Экстрим тройка',
            'description' => 'При покупке билета у вас есть безлимитный прокат на аттракционах в течении 3часа',
            'price' => 500.00,
        ]);
        TypeTicket::create([
            'name' => 'Экстрим шестерка',
            'description' => 'При покупке билета у вас есть безлимитный прокат на аттракционах в течении 6часа',
            'price' => 1000.00,
        ]);
        TypeTicket::create([
            'name' => 'Экстрим девятка',
            'description' => 'При покупке билета у вас есть безлимитный прокат на аттракционах в течении 9часа',
            'price' => 1500.00,
        ]);
        TypeTicket::create([
            'name' => 'Экстрим двенашка',
            'description' => 'При покупке билета у вас есть безлимитный прокат на аттракционах в течении 12часа',
            'price' => 2000.00,
        ]);
    }
}
