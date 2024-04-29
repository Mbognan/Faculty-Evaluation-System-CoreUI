<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comments;
use App\Models\EvaluationResult;
use App\Models\Question;
use Google\Cloud\Translate\V2\TranslateClient;
use App\Models\RawEvaluationResult;
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
    public function evaluateFaculty(string $id):View{

        $questions = Question::orderBy('position', 'asc')->get();
        $categories = Category::all();

        return view('frontend.home.evaluation.form',compact(['questions','categories']));
    }



    public function store(Request $request)
    {
        $anlyszer = new Analyzer;
        $tr = new GoogleTranslate();

        $userId = $request->input('user_id');
        $facultyId = $request->input('faculty_id');

        //comment store raw
        $commentStore = new Comments();
        $commentStore->user_id = $userId;
        $commentStore->faculty_id = $facultyId;
        $commentStore->post_comment = $request->comment;
        $commentStore->save();

        $commentsId = $commentStore->id;

       //comment analysis
       $sentiment = new Sentiment();
        $tr->setSource('tl');
        $tr->setTarget('en');

        $translatedText = $tr->translate($request->comment);
        $output = $anlyszer->getSentiment($translatedText);
        $mood = '';
        if ($output['compound'] < -0.05) {
            $mood = 'Negative';
        } elseif ($output['compound'] > 0.05) {
            $mood = 'Positive';
        } else {
            $mood = 'Neutral';
        }

        $sentiment->faculty_id = $facultyId;
        $sentiment->comments_id = $commentsId;
        $sentiment->sentiment = $mood;
        $sentiment->user_id = $userId;
        $sentiment->save();



        // evaluationresult
        $categoryTotal = [];
        foreach ($request->except('_token', 'user_id', 'faculty_id') as $key => $rating) {
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
                ]);
            }
        }

        // Update existing results with new ratings
        foreach ($categoryTotal as $categoryId => $totalRating) {
            $existingResult = EvaluationResult::where('user_id', $facultyId)
                ->where('category_id', $categoryId)
                ->first();

            if ($existingResult) {
                $existingResult->results_by_category += $totalRating;
                $existingResult->save();
            } else {
                EvaluationResult::create([
                    'user_id' => $facultyId,
                    'category_id' => $categoryId,
                    'results_by_category' => $totalRating,
                ]);
            }
        }

        toastr()->success('Form Submitted Successfully!');
        return response()->json(['status' => 'success', 'message' => 'Evaluation submitted successfully']);
    }

        public function success():View{
        return view('frontend.home.evaluation.success');
    }

}
