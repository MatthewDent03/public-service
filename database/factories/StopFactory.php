<?php

namespace Database\Factories;

use App\Models\Stop;
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
            'location_name' => $this->faker->word,
            'number' => $this->faker->numberBetween(15, 75),
            'estimated_arrival_time' => $this->faker->time(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
