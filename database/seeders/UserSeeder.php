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
                'first_name' => 'adminElectrical',
                'last_name' => 'superadmin',
                'email' => "admin2@gmail.com",
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'gender' => 'male',
                'department_id' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
