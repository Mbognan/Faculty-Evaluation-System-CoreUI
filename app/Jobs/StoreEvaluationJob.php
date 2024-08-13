<?php

namespace App\Jobs;

use App\Models\Comments;
use App\Models\RawEvaluationResult;
use App\Models\ResultByCategory;
use App\Models\Tokenform;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreEvaluationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $requestData;
    /**
     * Create a new job instance.
     */
    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $userId = $this->requestData['user_id'];
        $facultyId = $this->requestData['faculty_id'];
        $subject = $this->requestData['subject'];
        $schedule = $this->requestData['schedule'];


        $userDepartment = User::findOrFail($userId);
        $department_id = $userDepartment->department_id;


        // Tokenform
        Tokenform::create([
            'user_id' => $userId,
            'faculty_id' => $facultyId,
            'subject' => $subject,
            'evaluation_schedules_id' => $schedule,
        ]);


        // Evaluation result
        $categoryTotal = [];
        $rawEvaluationResults = [];
        foreach ($this->requestData as $key => $rating) {
            if (preg_match('/^q(\d+)_(\d+)$/', $key, $matches)) {
                $categoryId = $matches[1];
                $questionId = $matches[2];

                if (!isset($categoryTotal[$categoryId])) {
                    $categoryTotal[$categoryId] = 0;
                }
                $categoryTotal[$categoryId] += $rating;

                $rawEvaluationResults[] = [
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'faculty_id' => $facultyId,
                    'category_id' => $categoryId,
                    'rating' => $rating,
                    'subject' => $subject,
                    'evaluation_schedules_id' => $schedule,
                ];
            }
        }
        RawEvaluationResult::insert($rawEvaluationResults);

        // Result by category
        $resultByCategory = [];
        foreach ($categoryTotal as $categoryId => $totalRating) {
            $resultByCategory[] = [
                'by_subject' => $subject,
                'results_by_category' => $totalRating,
                'category_id' => $categoryId,
                'user_id' => $userId,
                'faculty_id' => $facultyId,
                'semester_id' => $schedule,
            ];
        }
        ResultByCategory::insert($resultByCategory);

           // Comment store raw



    }
}
