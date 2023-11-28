<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DishApplication>
 */
class DishApplicationFactory extends Factory
{
    protected $model = \App\Models\DishApplication::class;

    public function definition()
    {
        return [
            'menu_id' => \App\Models\MenuApplication::factory(),
            'name' => $this->faker->word,
            'photo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 5, 50),
        ];
    }
}