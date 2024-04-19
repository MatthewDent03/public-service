<?php

namespace Database\Factories;
//creating a factory to create the reports and setting the blueprint that each reports will follow for fields and data types
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'nearest_stop' => fake()->word,
            'city' => fake()->word,
            'incident_date' => fake()->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
