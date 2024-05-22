<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FacultyResultExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationResult;
use App\Models\ResultByCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

$maxPointsPerEvaluation = 25;

// Get the distinct subject schedules for the faculty
$distinctSubjectSchedules = ResultByCategory::where('faculty_id', $user->id)
    ->distinct('by_subject')
    ->pluck('by_subject');

// Initialize arrays to store results
$percentagesBySubjectAndCategory = [];
$totalScoresBySubject = [];
$overallPercentageBySubject = [];

// Loop through each subject schedule
foreach ($distinctSubjectSchedules as $subjectSchedule) {
    // Get the total results for each category for this subject schedule
    $resultsByCategory = ResultByCategory::where('faculty_id', $user->id)
        ->where('by_subject', $subjectSchedule)
        ->select('category_id', DB::raw('SUM(results_by_category) as total'))
        ->groupBy('category_id')
        ->get();

    // Organize the results in an array [category_id] => total
    $resultsByCategoryArray = $resultsByCategory->pluck('total', 'category_id')->toArray();

    // Calculate the total score for this subject schedule
    $totalScore = array_sum($resultsByCategoryArray);

    // Calculate the maximum possible sum for this subject schedule
    $numEvaluationsForSubject = ResultByCategory::where('faculty_id', $user->id)
        ->where('by_subject', $subjectSchedule)
        ->select(DB::raw('COUNT(DISTINCT id) as num_students'))
        ->first();

    $maxPossibleSumForSubject = $numEvaluationsForSubject->num_students * $maxPointsPerEvaluation;

    // Calculate the percentages for each category within this subject schedule
    $percentagesByCategory = [];
    foreach ($resultsByCategoryArray as $categoryId => $total) {
        // Calculate percentage relative to the maximum possible sum
        $percentage = ($total / $maxPossibleSumForSubject) * 100;
        $categoryTitle = $categoryTitles[$categoryId] ?? 'Unknown Category';

        $percentagesByCategory[$categoryTitle] = $percentage;
    }

    // Calculate overall percentage for this subject schedule
    $overallPercentage = ($totalScore / $maxPossibleSumForSubject) * 100;

    // Store the results for this subject schedule
    $percentagesBySubjectAndCategory[$subjectSchedule] = $percentagesByCategory;
    $totalScoresBySubject[$subjectSchedule] = $totalScore;
    $overallPercentageBySubject[$subjectSchedule] = $overallPercentage;
}

        dd($percentagesBySubjectAndCategory);

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
