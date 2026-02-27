<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => $this->faker->sentence(2),
        'amount' => $this->faker->numberBetween(100, 1000),
        'payer_id' => random_int(1,4),
        'colocation_id' => random_int(1,4),
        'categorie_id' => random_int(1,4),
        ];
    }
}
