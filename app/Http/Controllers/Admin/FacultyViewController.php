<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FacultyResultExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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

    public function export_excel(string $id)
    {
        $evaluationResults = EvaluationResult::with('category')->where('user_id', $id)->get();

        if ($evaluationResults->isEmpty()) {
            return redirect()->back()->with('error', 'No evaluation results found for the specified faculty member.');
        }

        return Excel::download(new FacultyResultExport($evaluationResults), 'faculty-result.xlsx');
    }



}
