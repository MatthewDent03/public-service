<?php

namespace Database\Seeders;
//Creating a seeder for the factories to run and fill the tables with fake data a specified amount of times
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::factory(3)->create();
    }
}
