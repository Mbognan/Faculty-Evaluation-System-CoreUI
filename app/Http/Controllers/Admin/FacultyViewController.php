<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FacultyResultExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class FacultyViewController extends Controller
{
    public function index():View{
        $users = User::where('user_type', 'faculty')->get();
        $facultyCount = User::where('user_type', 'faculty')->count();
        return view('admin.faculty.view',compact(['users','facultyCount']));
    }

    public function view(string $id): View {
        $user = User::findOrFail($id);


        $allCategories = Category::all();
        $categoryTitles = $allCategories->pluck('title', 'id')->toArray();


        $resultsByCategory = EvaluationResult::where('user_id', $user->id)
            ->select('category_id', DB::raw('SUM(results_by_category) as total'))
            ->groupBy('category_id')
            ->pluck('total', 'category_id')->toArray();


        foreach ($categoryTitles as $categoryId => $categoryTitle) {
            if (!isset($resultsByCategory[$categoryId])) {
                $resultsByCategory[$categoryId] = 0;
            }
        }


        $resultsWithTitles = [];
        foreach ($resultsByCategory as $categoryId => $total) {
            $resultsWithTitles[$categoryTitles[$categoryId]] = $total;
        }

        return view('admin.faculty.result', compact('categoryTitles', 'allCategories', 'resultsWithTitles', 'user'));
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
