<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();
        $role_dev = Role::where('name', 'dev')->first();

        $admin = new User();
        $admin->name = 'Matthew Dent';
        $admin->email = 'mattdent3@laravel.com';
        $admin->password = Hash::make('password');
        $admin->save();

        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Susan Sue';
        $user->email = 'susan@laravel.com';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);

        $dev = new User();
        $dev->name = 'Jack Jackie';
        $dev->email = 'jack@laravel.com';
        $dev->password = Hash::make('password');
        $dev->save();

        $dev->roles()->attach($role_dev);
    }
}
