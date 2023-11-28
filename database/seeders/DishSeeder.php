<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    public function run()
    {
        // Assuming you have multiple menus with different IDs
        $menuIds = \App\Models\Menu::pluck('id');

        foreach ($menuIds as $menuId) {
            // Create 5 dishes for each menu, adjust the number as needed
            \App\Models\Dish::factory(5)
                ->create(['menu_id' => $menuId]);
        }
    }
}