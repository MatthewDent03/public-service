<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the number of users you want to create
        $numberOfUsers = 10;

        // Create users using the UserFactory
        User::factory($numberOfUsers)->create();
    }
}
