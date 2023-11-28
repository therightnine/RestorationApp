<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantApplicationSeeder extends Seeder
{
    public function run()
    {
        \App\Models\RestaurantApplication::factory(10)->create();
    }
}
