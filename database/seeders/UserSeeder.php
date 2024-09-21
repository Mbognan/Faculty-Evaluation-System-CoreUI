<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    public static $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'user_type' => 'admin',
                'gender' => $faker->randomElement(['male', 'female']),
                'department_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
