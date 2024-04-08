<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    public function definition()
    {
        return [
            'start_location' => $this->faker->word,
            'end_location' => $this->faker->word,
            'estimated_departure' => $this->faker->time(),
            'estimated_arrival' => $this->faker->time(),
            'journey_route' => $this->faker->word,
            'csv_file' => $this->faker->file, // Generate dummy CSV file name
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


