<?php

namespace Database\Factories;
//creating a factory to create the transport type and setting the blueprint that each transport type will follow for fields adn data types
use App\Models\TransportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportType>
 */
class TransportTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->word,
        ];
    }
}
