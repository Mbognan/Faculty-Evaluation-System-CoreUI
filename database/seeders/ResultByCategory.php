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
        $semesterId = 1;
        $facultyId = 42;
        $categories = [3, 4, 5, 6];
        $subject1 = [ 'It elec 4',  'Cap 102','IAS 201', 'Ac 101', "Net 102"];

        $users = DB::table('users')->where('user_type', 'user')->pluck('id');

            foreach ($users as $user) {
                foreach ($subject1 as $subject) {
                    foreach ($categories as $category) {
                        DB::table('result_by_categories')->insert([
                            'by_subject' => $subject,
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
