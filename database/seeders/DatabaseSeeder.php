<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CartSeeder::class,
            DishSeeder::class,
        //    DishApplicationSeeder::class,
            MenuSeeder::class,
         //   MenuApplicationSeeder::class,
            RatingSeeder::class,
            UserSeeder::class,
            RestaurantApplicationSeeder::class,
        ]);
    }
}
