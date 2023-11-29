<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MenuApplication;

class MenuApplicationFactory extends Factory
{
    protected $model = MenuApplication::class;

    public function definition()
    {
        return [
            'restaurant_id' => \App\Models\RestaurantApplication::factory(),
            'description' => $this->faker->paragraph,
        ];
    }
}