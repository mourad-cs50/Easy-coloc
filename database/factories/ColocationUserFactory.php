<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Colocation;

class ColocationUserFactory extends Factory
{
    protected $model = \App\Models\ColocationUser::class;

    public function definition()
    {
        return [
            'user_id' => random_int(1,4),
            'colocation_id' => random_int(1,4), 
            'role' => $this->faker->randomElement(['owner', 'member']),
            'status' => $this->faker->randomElement(['active', 'left']),
            'left_at' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}