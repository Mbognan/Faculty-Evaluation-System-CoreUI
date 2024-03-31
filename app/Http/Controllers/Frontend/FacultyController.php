<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FacultyController extends Controller
{
    public function index():View{

        $userId = Auth::user()->id;
        $evaluationResults = EvaluationResult::where('user_id', $userId)->get();
        $allCategories = Category::all();
        $category = Category::pluck('title')->toArray();
        $results = EvaluationResult::where('user_id', $userId)->pluck('results_by_category')->toArray();
        $resultsByCategory = [];
        foreach ($results as $key => $result) {
            $resultsByCategory[$category[$key]] = $result;
        }
        foreach ($category as $cat) {
            if (!isset($resultsByCategory[$cat])) {
                $resultsByCategory[$cat] = 0;
            }
        }
        return view('frontend.home.dashboard',compact(['category','allCategories','resultsByCategory','userId','evaluationResults']));
    }
    public function profile():View{
        $users = User::where('user_type', 'faculty')->get();
        return view('frontend.home.facultyprofile',compact('$users'));
    }
}
