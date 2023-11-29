<?php

namespace Database\Seeders;

// DishApplicationSeeder.php

use Illuminate\Database\Seeder;
use App\Models\DishApplication;

class DishApplicationSeeder extends Seeder
{
    public function run()
    {
        DishApplication::factory(50)->create();
    }
}
