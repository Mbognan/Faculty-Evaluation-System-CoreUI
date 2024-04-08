<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationFormController extends Controller
{
    public function evaluateFaculty():View{
        $questions = Question::orderBy('position', 'asc')->get();

        $categories = Category::all();
        return view('frontend.home.evaluation.form',compact(['questions','categories']));
    }
}
