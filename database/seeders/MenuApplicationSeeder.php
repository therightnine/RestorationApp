<?php

namespace Database\Seeders;

// MenuApplicationSeeder.php

use Illuminate\Database\Seeder;
use App\Models\MenuApplication;

class MenuApplicationSeeder extends Seeder
{
    public function run()
    {
        MenuApplication::factory(50)->create();
    }
}