<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExpensesUser>
 */
class ExpenseUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'expense_id' => random_int(1,4),
        'user_id' => random_int(1,4),
        'amount_due' => $this->faker->numberBetween(50, 300),
        'is_paid' => false,
        ];
    }
}
