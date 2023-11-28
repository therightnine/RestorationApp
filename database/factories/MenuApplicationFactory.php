<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuApplication>
 */
class MenuApplicationFactory extends Factory
{
    protected $model = \App\Models\MenuApplication::class;

    public function definition()
    {
        return [
            'restaurant_id' => \App\Models\RestaurantApplication::factory(),
            'description' => $this->faker->paragraph,
        ];
    }
}