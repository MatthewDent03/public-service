<?php

namespace Database\Seeders;
//Creating a seeder for the factories to run and fill the tables with fake data a specified amount of times
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    public function run()
    {
        Route::factory(3)->create();
    }
}

