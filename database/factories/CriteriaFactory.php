<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Criteria>
 */
class CriteriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->unique()->word(),
            'bobot' => fake()->randomFloat(2, 0, 1), // 2 desimal, antara 0.00 s.d. 1.00
            'atribut' => fake()->randomElement(['benefit', 'cost']),
        ];
    }
}
