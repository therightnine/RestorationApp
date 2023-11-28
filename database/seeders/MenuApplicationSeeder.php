<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuApplicationSeeder extends Seeder
{
    public function run()
    {
        \App\Models\MenuApplication::factory(20)->create();
    }
}
