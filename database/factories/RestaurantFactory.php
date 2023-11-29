<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    protected $model = \App\Models\Restaurant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'location' => $this->faker->address,
            'shippingfee' => $this->faker->randomFloat(2, 1, 10),
            'shippingtime' => $this->faker->randomElement(['30 mins', '1 hour', '1.5 hours']),
         ];
    }
}