<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity' => fake()->numberBetween(1, 5),
            'food_id' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(10000, 100000),
            'transaction_id' => fake()->numberBetween(1, 10)
        ];
    }
}
