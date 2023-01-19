<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'food_name' => "Froozen food",
            'weight' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(10000, 100000), // password
            "stock" => fake()->numberBetween(1, 100),
            "expiration_date" => fake()->date('Y-m-d','+100 months'),
            "description" => "Super yummy frozen food"
        ];
    }
}
