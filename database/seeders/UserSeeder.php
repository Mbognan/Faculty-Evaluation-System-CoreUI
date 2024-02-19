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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => static::$password ??= Hash::make('password'),
                'user_type' => 'admin',

            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => static::$password ??= Hash::make('password'),
                'user_type' => 'user',
            ]
        ]);
    }
}
