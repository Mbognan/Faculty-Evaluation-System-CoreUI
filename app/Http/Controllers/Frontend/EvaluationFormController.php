<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\AnalyzeSentimentJob;
use App\Jobs\StoreEvaluationJob;
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

        StoreEvaluationJob::dispatch($request->all());
        toastr()->success('Form Submitted Successfully!');
        return response()->json(['status' => 'success', 'message' => 'Evaluation submitted successfully']);

    }

        public function success():View{
        return view('frontend.home.evaluation.success');
    }

}
