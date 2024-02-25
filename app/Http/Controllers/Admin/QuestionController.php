<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index():View{
        $questions = Question::orderBy('position', 'asc')->get();

        $categories = Category::all();

        return view('admin.question.index',compact(['categories','questions']));
    }

    public function store(Request $request){

    }

}
