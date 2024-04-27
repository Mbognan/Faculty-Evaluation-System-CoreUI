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
        for ($i = 1; $i <= 20; $i++) {
             User::create([
                'first_name' => 'User' . $i,
                'last_name' => 'SuperUser',
                'email' => "user$i@example.com",
                'password' => Hash::make('password'),
                'user_type' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
