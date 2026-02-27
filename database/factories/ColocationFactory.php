<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Colocation; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colocation>
 */
class ColocationFactory extends Factory
{
    protected $model = Colocation::class; 

    public function definition(): array
    {
        return [
            'name' => 'Coloc ' . $this->faker->word(),
            'status' => 'active', 
            'token' => \Str::random(10),
        ];
    }
}