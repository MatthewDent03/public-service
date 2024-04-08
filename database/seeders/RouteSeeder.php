<?php

namespace Database\Seeders;

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

