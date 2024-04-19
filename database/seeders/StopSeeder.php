<?php

namespace Database\Seeders;
//Creating a seeder for the factories to run and fill the tables with fake data a specified amount of times
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stop;
use App\Models\Route;
use App\Models\PrivateCompany;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stop::factory(75)->create();
        //creating a foreach statement that will inherit ids from the stops and add them into the routes fields
        foreach(Route::all() as $route){
            $stops = Stop::inRandomOrder()->take(rand(1,3))->pluck('id');
            $route->stops()->attach($stops);
        }
    }
}
