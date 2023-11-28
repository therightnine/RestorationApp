<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantApplication>
 */
class RestaurantApplicationFactory extends Factory
{
    protected $model = \App\Models\RestaurantApplication::class;

    public function definition()
    {
        return [
            'restaurant_id' => $this->faker->unique()->numberBetween(1000, 9999),
            'restaurant_name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'logo' => $this->faker->imageUrl(),
            'location' => $this->faker->address,
            'user_id' => \App\Models\User::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}