<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    protected $model = \App\Models\Rating::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'restaurant_id' => \App\Models\Restaurant::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->paragraph,
        ];
    }
}