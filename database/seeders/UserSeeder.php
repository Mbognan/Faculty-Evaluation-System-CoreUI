<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public static $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'first_name' => 'Admin',
                'last_name' => 'SuperAdmin',
                'email' => 'admin@gmail.com',
                'password' => static::$password ??= Hash::make('password'),
                'user_type' => 'admin',

            ],
            [
                'first_name' => 'User',
                'last_name' => 'SuperUser',
                'email' => 'user@gmail.com',
                'password' => static::$password ??= Hash::make('password'),
                'user_type' => 'user',
            ]
        ]);
    }
}
