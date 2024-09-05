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
        $facultyId = 11;
        $categories = [32, 33, 34, 35];
        $subject1 = [ 'Wl_101','AR_201',  'QL_102L','IAS 201', 'IT elec4'];

        $users = DB::table('users')->where('user_type', 'user')->pluck('id');

            foreach ($users as $user) {
                foreach ($subject1 as $subject) {
                    foreach ($categories as $category) {
                        DB::table('result_by_categories')->insert([
                            'by_subject' => $subject,
                            'results_by_category' => rand(5, 17),
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
