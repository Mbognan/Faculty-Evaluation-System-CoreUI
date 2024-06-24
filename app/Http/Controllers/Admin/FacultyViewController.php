<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FacultyResultExport;
use App\Exports\ResultRawExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ClassList;
use App\Models\EvaluationResult;
use App\Models\ResultByCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class FacultyViewController extends Controller
{
    public function index():View{
        $admin  = Auth::user();
        $users = User::where('user_type', 'faculty')->where('department_id', $admin->department_id)->get();
        $facultyCount = User::where('user_type', 'faculty')->where('department_id',$admin->department_id )->count();
        return view('admin.faculty.view',compact(['users','facultyCount']));
    }

    public function view(string $id): View {
        $user = User::findOrFail($id);

        $subjects = ResultByCategory::where('faculty_id', $user->id)->distinct()->pluck('by_subject');

        $allCategories = Category::all();
        $categoryTitles = $allCategories->pluck('title', 'id')->toArray();
        $maxPointsPerEvaluation = 25;

        $distinctSubject = ResultByCategory::where('faculty_id', $user->id)
            ->distinct()
            ->pluck('by_subject');

        $percentagesBySubjectAndCategory = [];
        $totalScoresBySubject = [];
        $overallPercentageBySubject = [];

        $totalResultsByCategory = [];
        $totalPossibleSumForAllSubjects = 0;
        $totalScoreForAllSubjects = 0;

        foreach ($distinctSubject as $subjectSchedule) {
            // Get the total results for each category
            $resultsByCategory = ResultByCategory::where('faculty_id', $user->id)
                ->where('by_subject', $subjectSchedule)
                ->select('category_id', DB::raw('SUM(results_by_category) as total'))
                ->groupBy('category_id')
                ->get();

            $resultsByCategoryArray = $resultsByCategory->pluck('total', 'category_id')->toArray();

            // Calculate the total score for this subject schedule
            $totalScore = array_sum($resultsByCategoryArray);
            $totalScoreForAllSubjects += $totalScore;

            // Calculate the maximum possible sum for this subject schedule
            $numEvaluationsForSubject = ResultByCategory::where('faculty_id', $user->id)
                ->where('by_subject', $subjectSchedule)
                ->select(DB::raw('COUNT(DISTINCT id) as num_students'))
                ->first();

            if ($numEvaluationsForSubject && $numEvaluationsForSubject->num_students > 0) {
                $maxPossibleSumForSubject = $numEvaluationsForSubject->num_students * $maxPointsPerEvaluation;
                $totalPossibleSumForAllSubjects += $maxPossibleSumForSubject;

                $percentagesByCategory = [];
                foreach ($resultsByCategoryArray as $categoryId => $total) {
                    $percentage = ($total / $maxPossibleSumForSubject) * 100;
                    $categoryTitle = $categoryTitles[$categoryId] ?? 'Unknown Category';
                    $percentagesByCategory[$categoryTitle] = $percentage;

                    if (!isset($totalResultsByCategory[$categoryId])) {
                        $totalResultsByCategory[$categoryId] = 0;
                    }
                    $totalResultsByCategory[$categoryId] += $total;
                }
                $overallPercentage = ($totalScore / $maxPossibleSumForSubject) * 100;
                $percentagesBySubjectAndCategory[$subjectSchedule] = $percentagesByCategory;
                $totalScoresBySubject[$subjectSchedule] = $totalScore;
                $overallPercentageBySubject[$subjectSchedule] = $overallPercentage;
            } else {
                $percentagesBySubjectAndCategory[$subjectSchedule] = [];
                $totalScoresBySubject[$subjectSchedule] = 0;
                $overallPercentageBySubject[$subjectSchedule] = 0;
            }
        }

        // Calculate total percentage by category across all subjects
        $totalPercentageByCategory = [];
        if ($totalPossibleSumForAllSubjects > 0) {
            foreach ($totalResultsByCategory as $categoryId => $total) {
                $percentage = ($total / $totalPossibleSumForAllSubjects) * 100;
                $categoryTitle = $categoryTitles[$categoryId] ?? 'Unknown Category';
                $totalPercentageByCategory[$categoryTitle] = $percentage;
            }
            $overallPercentageForFaculty = ($totalScoreForAllSubjects / $totalPossibleSumForAllSubjects) * 100;
        } else {
            $overallPercentageForFaculty = 0;
        }

        // New logic: Calculate the overall sum of each category for the faculty
        $totalSumByCategory = [];
        $resultsByCategoryAllSubjects = ResultByCategory::where('faculty_id', $user->id)
            ->select('category_id', DB::raw('SUM(results_by_category) as total'))
            ->groupBy('category_id')
            ->get();

        $totalResultsByCategoryAllSubjects = $resultsByCategoryAllSubjects->pluck('total', 'category_id')->toArray();

        foreach ($totalResultsByCategoryAllSubjects as $categoryId => $total) {
            $categoryTitle = $categoryTitles[$categoryId] ?? 'Unknown Category';
            $totalSumByCategory[$categoryTitle] = $total;
        }

        // Check if the total sum is empty or not
        if (!empty($totalSumByCategory)) {
            $totalSumOfAllCategories = array_sum($totalSumByCategory);

            if ($totalSumOfAllCategories > 0) {
                foreach ($totalSumByCategory as $categoryTitle => $total) {
                    $percentage = ($total / $totalSumOfAllCategories) * 100;
                    $totalPercentageByCategoryUsingSum[$categoryTitle] = $percentage;
                }
            } else {
                $totalPercentageByCategoryUsingSum = [];
            }
        } else {
            $totalSumByCategory = [];
            $totalPercentageByCategoryUsingSum = [];
        }

        if (!empty($overallPercentageBySubject)) {
            $values = array_values($overallPercentageBySubject);
            $keys = array_keys($overallPercentageBySubject);

            $highest = max($values);
            $lowest = min($values);

            $highestIndex = array_search($highest, $values);
            $lowestIndex = array_search($lowest, $values);

            if ($highestIndex !== false && $lowestIndex !== false) {
                $lowestKey = $keys[$lowestIndex];
                $highestKey = $keys[$highestIndex];
            } else {
                $lowestKey = 'Unknown';
                $highestKey = 'Unknown';
            }

            $formatedHighest = number_format($highest, 2);
            $formatedLowest = number_format($lowest, 2);
        } else {
            $formatedHighest = 'N/A';
            $formatedLowest = 'N/A';
            $lowestKey = 'N/A';
            $highestKey = 'N/A';
        }

        $histogramData = ResultByCategory::where('faculty_id', $user->id)
        ->pluck('results_by_category')
        ->toArray();

        // dd($histogramData);



        return view('admin.faculty.result', compact(
            'categoryTitles',
            'allCategories',
            'user',
            'percentagesBySubjectAndCategory',
            'overallPercentageForFaculty',
            'totalPercentageByCategory',
            'overallPercentageBySubject',
            'totalScoresBySubject',
            'distinctSubject',
            'formatedHighest',
            'formatedLowest',
            'highestKey',
            'lowestKey',
            'subjects',
            'totalSumByCategory',
            'totalPercentageByCategoryUsingSum',
            'histogramData'
        ));


    }


    public function export_excel(string $id)
    {



        $evaluationResults = EvaluationResult::with('category')->where('user_id', $id)->get();

        if ($evaluationResults->isEmpty()) {
            return redirect()->back()->with('error', 'No evaluation results found for the specified faculty member.');
        }
        return Excel::download(new FacultyResultExport($evaluationResults), 'faculty-result.xlsx');
    }

    public function export(string $id, Request $request){


        $subject = $request->subject;
        $evaluationResultsBySubject = ResultByCategory::where('faculty_id', $id)
        ->where('by_subject', $subject)
        ->with('category')
        ->get();




        if ($evaluationResultsBySubject->isEmpty()) {
            return redirect()->back()->with('warning', 'No evaluation results found for the specified faculty member.');
        }

        return Excel::download(new ResultRawExport($evaluationResultsBySubject,$subject), 'faculty-resultby-Subject.xlsx');
    }





}
