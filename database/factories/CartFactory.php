<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    protected $model = \App\Models\Cart::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'dish_id' => \App\Models\Dish::factory(),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}