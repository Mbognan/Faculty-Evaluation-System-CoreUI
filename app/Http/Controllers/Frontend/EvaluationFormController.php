<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;

use App\Models\RawEvaluationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;
use Illuminate\View\ViewException;

class EvaluationFormController extends Controller
{
    public function evaluateFaculty(string $id):View{

        $questions = Question::orderBy('position', 'asc')->get();
        $categories = Category::all();
        return view('frontend.home.evaluation.form',compact(['questions','categories']));
    }



    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        foreach ($request->except('_token', 'user_id') as $key => $rating) {
            if (preg_match('/^q(\d+)_(\d+)$/', $key, $matches)) {
                $categoryId = $matches[1];
                $questionId = $matches[2];
                RawEvaluationResult::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'category_id' => $categoryId,
                    'rating' => $rating,
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
