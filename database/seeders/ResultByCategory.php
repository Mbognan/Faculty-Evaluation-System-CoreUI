<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultByCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semesterId = 9;
        $facultyId = 7;
        $categories = [32, 33, 34, 35];
        $subject1 = [ 'Wl 101','AR 201',  'QL 102L'];
        $subject2 = [  'Cap 101','KL 201', 'LOL 101','IT 101L'];
        $users = DB::table('users')->where('user_type', 'user')->pluck('id');

        foreach ($users as $user) {
            foreach ($subject1 as $subject) {

                $randomSubject = $subject1[array_rand($subject1)];

                foreach ($categories as $category) {
                    DB::table('result_by_categories')->insert([
                        'by_subject' => $randomSubject,
                        'results_by_category' => rand(5, 25),
                        'category_id' => $category,
                        'user_id' => $user,
                        'faculty_id' => $facultyId,
                        'semester_id' => $semesterId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        foreach ($users as $user) {
            foreach ($subject2 as $subject) {

                $randomSubject = $subject2[array_rand($subject2)];

                foreach ($categories as $category) {
                    DB::table('result_by_categories')->insert([
                        'by_subject' => $randomSubject,
                        'results_by_category' => rand(5, 25),
                        'category_id' => $category,
                        'user_id' => $user,
                        'faculty_id' => $facultyId,
                        'semester_id' => $semesterId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }



    }
}
