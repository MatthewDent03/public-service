<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RouteSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(StopSeeder::class);
        $this->call(TransportTypeSeeder::class);
    }
}
