<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $datetime = fake()->dateTime();

        return [
            'user_id' => fake()->numberBetween(1, 10),
            'total_price' => fake()->numberBetween(10000, 100000),
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];
    }
}
