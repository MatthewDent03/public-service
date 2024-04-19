<?php

namespace Database\Seeders;
//Creating a seeder for the factories to run and fill the tables with fake data a specified amount of times
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PrivateCompany;

class PrivateCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrivateCompany::factory()
        ->times(3)
        ->hasRoutes(4)
        ->create();

    }
}
