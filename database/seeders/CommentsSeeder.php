<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $words  = [
            "This class was very informative and helpful.",
            "I struggled to understand some of the concepts taught.",
            "The instructor was engaging and knowledgeable.",
            "The course material was well-organized.",
            "I found the assignments challenging but rewarding.",
            "The lectures were clear and easy to follow.",
            "I didn't feel supported enough during the group project.",
            "The textbook used was outdated and hard to understand.",
            "The class discussions were stimulating and thought-provoking.",
            "The quizzes were fair and helped me assess my understanding.",
            "The workload was manageable and balanced.",
            "I felt overwhelmed by the amount of reading required.",
            "The professor was always available for office hours.",
            "The grading criteria were unclear at times.",
            "I enjoyed collaborating with my classmates.",
            "The facilities used for the labs were inadequate.",
            "The course improved my critical thinking skills.",
            "I wish there were more practical exercises in the course.",
            "The guest lectures added value to the course.",
            "The online resources provided were very helpful.",
            "I felt the exams did not accurately reflect what was taught.",
            "The class atmosphere was inclusive and welcoming.",
            "The software used in the labs was outdated and buggy.",
            "The course encouraged me to explore new ideas.",
            "I struggled to keep up with the pace of the lectures.",
            "The final project allowed me to apply what I learned.",
            "The course content was relevant and up-to-date.",
            "I appreciated the real-world examples used in class.",
            "I found the presentations by other students inspiring.",
            "The assignments were well-designed and challenging.",
        ];

        foreach($words as $word){
           Comments::create([
            'post_comment' => $word,
            'faculty_id'  => 6,
            'department_id '=> 1,
           'user_id' => 36,
            'status' => 1,
            'evaluation_schedules_id' => 9,
           ]);

        }
    }
}
