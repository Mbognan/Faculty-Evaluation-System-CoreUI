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
        $facultyId = $request->input('faculty_id');




        // Loop through the form data and store each rating along with the faculty_id
        foreach ($request->except('_token', 'user_id', 'faculty_id') as $key => $rating) {
            if (preg_match('/^q(\d+)_(\d+)$/', $key, $matches)) {
                $categoryId = $matches[1];
                $questionId = $matches[2];

                RawEvaluationResult::create([
                    'question_id' => $questionId,
                    'user_id' => $userId,
                    'faculty_id' => $facultyId, // Store the faculty_id along with the rating
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
