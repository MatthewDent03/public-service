<?php

namespace Database\Seeders;

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

        foreach(Route::all() as $route){
            $stops = Stop::inRandomOrder()->take(rand(1,3))->pluck('id');
            $route->stops()->attach($stops);
        }
    }
}
