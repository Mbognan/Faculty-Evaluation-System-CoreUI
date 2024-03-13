<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacultyViewController extends Controller
{
    public function index():View{
        $users = User::where('user_type', 'faculty')->get();
        $facultyCount = User::where('user_type', 'faculty')->count();
        return view('admin.faculty.view',compact(['users','facultyCount']));
    }

    function view(string $id):View{
        $user = User::findOrFail($id);
        $evaluationResults = EvaluationResult::where('user_id', $user->id)->get();
        $allCategories = Category::all();
        $category = Category::pluck('title')->toArray();
        $results = EvaluationResult::where('user_id', $user->id)->pluck('results_by_category')->toArray();
        $resultsByCategory = [];
        foreach ($results as $key => $result) {
            $resultsByCategory[$category[$key]] = $result;
        }
        foreach ($category as $cat) {
            if (!isset($resultsByCategory[$cat])) {
                $resultsByCategory[$cat] = 0;
            }
        }
        return view('admin.faculty.result',compact(['category','allCategories','resultsByCategory','user','evaluationResults']));
    }
}
