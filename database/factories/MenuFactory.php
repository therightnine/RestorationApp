<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    protected $model = \App\Models\Menu::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'restaurant_id' => \App\Models\Restaurant::factory(), // Correct the class name here
        ];
    }
}