<?php
// database/factories/OrderFactory.php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'restaurant_id' => $this->faker->numberBetween(1, 5),
            'order_number' => $this->faker->unique()->uuid,
            'items' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed']),
        ];
    }
}
