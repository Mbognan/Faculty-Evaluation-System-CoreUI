<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClassList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EvaluationController extends Controller
{
    public function index(){
        $facultys = User::where('user_type', 'faculty')->get();
        $student = Auth::user();
        $facultyIds = ClassList::where('student_id', $student->student_id)->pluck('user_id')->toArray();

        $faculties = User::whereIn('id', $facultyIds)->where('user_type', 'faculty')->get();
        return view('frontend.home.evaluation.eval',compact(['facultys','student','faculties','facultyIds']));
    }

}
