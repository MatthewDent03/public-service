<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stop>
 */
class StopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_name' => fake()->word,
            'number' => fake()->number,
            'estimated_arrival_time' => fake()->time(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
