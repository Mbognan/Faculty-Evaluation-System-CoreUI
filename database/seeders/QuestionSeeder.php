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
        for($i =1; $i<=20; $i++){
            Question::create([
                'category_id' => 19,
            'question' =>  'Test question '.$i,
            'status' =>  rand(0, 1),
            'position' =>  $i,

            ]);
        }

    }
}
