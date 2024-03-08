<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class FacultySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'avatar'     => '/default/avatar.png',
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->unique()->safeEmail,
                'password'   => Hash::make('password'),
                'user_type'  => 'faculty',
            ]);
        }

    }
}
