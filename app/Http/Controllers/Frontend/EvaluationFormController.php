<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comments;
use App\Models\EvaluationResult;
use App\Models\Question;
use App\Models\Tokenform;
use Google\Cloud\Translate\V2\TranslateClient;
use App\Models\RawEvaluationResult;
use App\Models\ResultByCategory;
use App\Models\Sentiment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use Illuminate\View\ViewException;
use Sentiment\Analyzer;
use Stichoza\GoogleTranslate\GoogleTranslate;

class EvaluationFormController extends Controller
{
    public function evaluateFaculty(string $id,string $subject_id,string $schedule_id){


       $schedule = $schedule_id;
        $facultyId = $id;
        $subject = $subject_id;
        $questions = Question::orderBy('position', 'asc')->get();
        $categories = Category::all();

        return view('frontend.home.evaluation.form',compact(['questions','categories','facultyId','subject','schedule']));
    }





    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $facultyId = $request->input('faculty_id');
        $subject = $request->input('subject');
        $schedule = $request->input('schedule');
        $comment = $request->input('comment');

        $userDepartment = User::findOrFail($userId);
        $department_id = $userDepartment->department_id;

        // Tokenform
        Tokenform::create([
            'user_id' => $userId,
            'faculty_id' => $facultyId,
            'subject' => $subject,
            'evaluation_schedules_id' => $schedule,
        ]);

        // Comment store raw
        $commentStore = Comments::create([
            'user_id' => $userId,
            'faculty_id' => $facultyId,
            'post_comment' => $comment,
            'evaluation_schedules_id' => $schedule,
            'department_id' => $department_id,
        ]);

        // Sentiment analysis
        $pythonPath = 'C:\laragon\bin\python\python-3.10\python.exe';
        $pythonScriptPath = base_path('app/Http/PythonScripts/sentiment_analyze.py');
        $text = escapeshellarg($comment);
        $command = "$pythonPath $pythonScriptPath $text";
        $output = shell_exec($command);
        $mood = 'neutral';
        if ($output !== null) {
            $result = json_decode($output, true);
            $mood = ucfirst(strtolower($result['sentiment']['label']));
        }

        Sentiment::create([
            'faculty_id' => $facultyId,
            'comments_id' => $commentStore->id,
            'sentiment' => $mood,
            'user_id' => $userId,
            'evaluation_schedules_id' => $schedule,
        ]);

        // Evaluation result
        $categoryTotal = [];
        $rawEvaluationResults = [];
        foreach ($request->except('_token', 'user_id', 'faculty_id', 'schedule', 'comment') as $key => $rating) {
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



        toastr()->success('Form Submitted Successfully!');
        return response()->json(['status' => 'success', 'message' => 'Evaluation submitted successfully']);
    }

        public function success():View{
        return view('frontend.home.evaluation.success');
    }

}
