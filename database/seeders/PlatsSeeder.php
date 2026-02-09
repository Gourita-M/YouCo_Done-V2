<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plats;

class PlatSeeder extends Seeder
{
    public function run(): void
    {
        Plats::insert([
            ['content' => 'Margherita Pizza',        'Prix' => 45.00],
            ['content' => 'Pepperoni Pizza',         'Prix' => 50.00],
            ['content' => 'Four Cheese Pizza',       'Prix' => 55.00],
            ['content' => 'Chicken Tajine',          'Prix' => 60.00],
            ['content' => 'Beef Tajine',             'Prix' => 65.00],
            ['content' => 'Seafood Pastilla',        'Prix' => 70.00],
            ['content' => 'Grilled Chicken',         'Prix' => 55.00],
            ['content' => 'Cheeseburger',            'Prix' => 50.00],
            ['content' => 'Double Cheeseburger',     'Prix' => 65.00],
            ['content' => 'Spaghetti Bolognese',     'Prix' => 52.00],
            ['content' => 'Chicken Alfredo',         'Prix' => 58.00],
            ['content' => 'Vegetable Couscous',      'Prix' => 48.00],
            ['content' => 'Seafood Couscous',        'Prix' => 75.00],
            ['content' => 'Caesar Salad',             'Prix' => 35.00],
            ['content' => 'Grilled Salmon',           'Prix' => 80.00],
        ]);
    }
}