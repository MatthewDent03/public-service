<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    public function definition()
    {
        return [
            'start_location' => $this->faker->address,
            'end_location' => $this->faker->address,
            'estimated_departure' => $this->faker->time(),
            'estimated_arrival' => $this->faker->time(),
            'journey_route' => $this->faker->text,
            'private_company_id' => $this->faker->numberBetween(1, 3),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}


