<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_location' => fake()->word,
            'end_location' => fake()->word,
            'estimated_departure' => fake()->time(),
            'estimated_arrival' => fake()->time(),
            'journey_route' => fake()->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
