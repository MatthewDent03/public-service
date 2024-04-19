<?php

namespace Database\Seeders;
//Creating a seeder for the factories to run and fill the tables with fake data a specified amount of times
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { //Seeding roles with specified field values that can be seen using tinker
        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'An Administrator user';
        $role_admin->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'An ordinary user';
        $role_user->save();

        $role_dev = new Role();
        $role_dev->name = 'dev';
        $role_dev->description = 'A company developer';
        $role_dev->save();
    }
}
