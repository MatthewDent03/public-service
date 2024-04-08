<?php

namespace Database\Factories;

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
            'company_number' => fake()->word,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
