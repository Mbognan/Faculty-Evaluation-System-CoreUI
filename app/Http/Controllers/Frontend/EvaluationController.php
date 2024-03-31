<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationController extends Controller
{
    public function index():View{
        $facultys = User::where('user_type', 'faculty')->get();
        return view('frontend.home.evaluation.eval',compact('facultys'));
    }
}
