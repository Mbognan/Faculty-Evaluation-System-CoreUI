<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i =1; $i<=6; $i++){
            Question::create([
                'category_id' => 19,
            'question' =>  'Test question '.$i,
            'status' =>  rand(0, 1),
            'position' =>  $i,

            ]);
        }

        for($i =1; $i<=6; $i++){
            Question::create([
                'category_id' => 22,
            'question' =>  'Test Category '.$i,
            'status' =>  rand(0, 1),
            'position' =>  $i,

            ]);
        }

        for($i =1; $i<=6; $i++){
            Question::create([
                'category_id' => 20,
            'question' =>  'Test Name '.$i,
            'status' =>  rand(0, 1),
            'position' =>  $i,

            ]);
        }

        for($i =1; $i<=6; $i++){
            Question::create([
                'category_id' => 21,
            'question' =>  'Test Plane '.$i,
            'status' =>  rand(0, 1),
            'position' =>  $i,

            ]);
        }

    }
}
