<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'amount' => $this->faker->numberBetween(50, 500),
        'from_user_id' => random_int(1,4),
        'to_user_id' => random_int(1,4),
        'colocation_id' => random_int(1,4),
        ];
    }
}
