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
        // for ($i = 1; $i <= 20; $i++) {
             User::create([
                'first_name' => 'Ruby',
                'last_name' => 'Encenzio',
                'email' => "admin@gmail.com",
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'gender' => 'female',
                'department_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
