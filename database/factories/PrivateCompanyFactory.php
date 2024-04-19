<?php

namespace Database\Factories;
//creating a factory to create the private companies and setting the blueprint that each company will follow for fields adn data types
use App\Models\PrivateCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class PrivateCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->sentence,
            'company_email' => fake()->paragraph,
            'company_number' => fake()->randomNumber(9, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
