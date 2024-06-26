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

        // dd($request->all());
        // $anlyszer = new Analyzer;
        // $tr = new GoogleTranslate();

        $userId = $request->input('user_id');
        $facultyId = $request->input('faculty_id');
        $subject = $request->input('subject');
        $schedule = $request->input('schedule');

        //Tokenform
        $token = new Tokenform();
        $token->user_id = $userId;
        $token->faculty_id = $facultyId;
        $token->subject = $subject;
        $token->evaluation_schedules_id = $schedule;
        $token->save();

        //comment store raw
        $commentStore = new Comments();
        $commentStore->user_id = $userId;
        $commentStore->faculty_id = $facultyId;
        $commentStore->post_comment = $request->comment;
        $commentStore->evaluation_schedules_id = $schedule;
        $commentStore->save();

        $commentsId = $commentStore->id;

       //comment analysis
       $sentiment = new Sentiment();
        // $tr->setSource('tl');
        // $tr->setTarget('en');

        // $translatedText = $tr->translate($request->comment);
        // $output = $anlyszer->getSentiment($translatedText);
        // $mood = '';
        // if ($output['compound'] < -0.05) {
        //     $mood = 'Negative';
        // } elseif ($output['compound'] > 0.05) {
        //     $mood = 'Positive';
        // } else {
        //     $mood = 'Neutral';
        // }


        $pythonPath = 'C:\laragon\bin\python\python-3.10\python.exe';
        $pythonScriptPath = base_path('app/Http/PythonScripts/sentiment_analyze.py');

            $text = escapeshellarg($request->comment);
            $command = "$pythonPath $pythonScriptPath $text";
            $output = shell_exec($command);
            if ($output !== null) {
                $result = json_decode($output, true);

                // Process sentiment and keywords
                if ($result['sentiment']['label'] === 'NEGATIVE') {
                    $mood = 'Negative';

                } elseif ($result['sentiment']['label'] === 'POSITIVE') {
                    $mood = 'Positive';
                } else {
                    $mood = 'neutral';
                }
            }



        $sentiment->faculty_id = $facultyId;
        $sentiment->comments_id = $commentsId;
        $sentiment->sentiment = $mood;
        $sentiment->user_id = $userId;
        $sentiment->evaluation_schedules_id = $schedule;
        $sentiment->save();



        // evaluationresult
        $categoryTotal = [];
        foreach ($request->except('_token', 'user_id', 'faculty_id','schedule') as $key => $rating) {
            if (preg_match('/^q(\d+)_(\d+)$/', $key, $matches)) {
                $categoryId = $matches[1];
                $questionId = $matches[2];

                if (!isset($categoryTotal[$categoryId])) {
                    $categoryTotal[$categoryId] = 0;
                }
                $categoryTotal[$categoryId] += $rating;

                RawEvaluationResult::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'faculty_id' => $facultyId,
                    'category_id' => $categoryId,
                    'rating' => $rating,
                    'evaluation_schedules_id' => $schedule,
                ]);
            }
        }

        //result by category ,by faculty , by student

        foreach ($categoryTotal as $categoryId => $totalRating) {
            ResultByCategory::create([
                'by_subject' =>  $subject, // Replace with actual subject data if available
                'results_by_category' => $totalRating,
                'category_id' => $categoryId,
                'user_id' => $userId,
                'faculty_id' => $facultyId,
                'semester_id' => $schedule,
            ]);
        }

        // Update existing results with new ratings
        foreach ($categoryTotal as $categoryId => $totalRating) {
            $existingResult = EvaluationResult::where('user_id', $facultyId)
                ->where('category_id', $categoryId)
                ->where('by_subject', $subject)
                ->where('evaluation_schedules_id', $schedule)
                ->first();

            if ($existingResult) {
                $existingResult->results_by_category += $totalRating;
                $existingResult->save();
            } else {
                EvaluationResult::create([
                    'user_id' => $facultyId,
                    'category_id' => $categoryId,
                    'results_by_category' => $totalRating,
                    'by_subject' => $subject,
                    'evaluation_schedules_id' => $schedule,
                ]);
            }
        }

        //


        toastr()->success('Form Submitted Successfully!');
        return response()->json(['status' => 'success', 'message' => 'Evaluation submitted successfully']);
    }

        public function success():View{
        return view('frontend.home.evaluation.success');
    }

}
