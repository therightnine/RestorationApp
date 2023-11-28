<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishApplicationSeeder extends Seeder
{
    public function run()
    {
        \App\Models\DishApplication::factory(50)->create();
    }
}