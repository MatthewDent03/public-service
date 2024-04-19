<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Creating the main database seeder which holds all the other seeders to call them when seeding the database, this adds a quick manner to seeding a database through one seeder
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RouteSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(StopSeeder::class);
        $this->call(TransportTypeSeeder::class);
        $this->call(PrivateCompanySeeder::class);
    }
}
