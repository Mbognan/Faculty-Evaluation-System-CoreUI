<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacultyProfileRequest;
use App\Models\Category;
use App\Models\ClassList;
use App\Models\Comments;
use App\Models\Department;
use App\Models\EvaluationResult;
use App\Models\EvaluationSchedule;
use App\Models\ResultByCategory;
use App\Models\Tokenform;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FacultyController extends Controller
{
    use FileUploadTrait;
    public function index(): View {
        $userId = Auth::user()->id;
        $users = User::findOrFail($userId);

    $evaluationResults = EvaluationResult::where('user_id', $userId)->get();
    $allCategories = Category::all();
    $evaluationSchedules = EvaluationSchedule::where('evaluation_status', 2)->firstOrNew();
    $category = Category::pluck('title')->toArray();
    $results = EvaluationResult::where('user_id', $userId)->pluck('results_by_category')->toArray();
    $distinctSubject = ResultByCategory::where('faculty_id', $userId)
    ->distinct()
    ->pluck('by_subject');
    $maxPointsPerEvaluation = 25;
    $resultsByCategory = [];
    $overallPercentageBySubject = [];

    $totalResultsByCategory = [];
    $totalPossibleSumForAllSubjects = 0;
    $totalScoreForAllSubjects = 0;
    foreach ($distinctSubject as $subjectSchedule) {

        $resultsByCategory = ResultByCategory::where('faculty_id', $userId)
            ->where('by_subject', $subjectSchedule)
            ->select('category_id', DB::raw('SUM(results_by_category) as total'))
            ->groupBy('category_id')
            ->get();

        $resultsByCategoryArray = $resultsByCategory->pluck('total', 'category_id')->toArray();

        $totalScore = array_sum($resultsByCategoryArray);
        $totalScoreForAllSubjects += $totalScore;


        $numEvaluationsForSubject = ResultByCategory::where('faculty_id', $userId)
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

    foreach ($results as $key => $result) {
        if (isset($category[$key])) {
            $resultsByCategory[$category[$key]] = $result;
        }
    }

    foreach ($category as $cat) {
        if (!isset($resultsByCategory[$cat])) {
            $resultsByCategory[$cat] = 0;
        }
    }




// Initialize arrays to store sums and counts
$totalSumByCategory = [];
$OveralltotalMeanByCategory = [];
$countsByCategory = [];

// Fetch results by category
$resultsByCategoryAllSubjects = ResultByCategory::where('faculty_id', $userId)
    ->select('category_id', DB::raw('SUM(results_by_category) as total'))
    ->groupBy('category_id')
    ->get();

$categoryTitles = $allCategories->pluck('title', 'id')->toArray();
$totalResultsByCategoryAllSubjects = $resultsByCategoryAllSubjects->pluck('total', 'category_id')->toArray();

// Calculate total sums and initialize counts
foreach ($totalResultsByCategoryAllSubjects as $categoryId => $total) {
    $categoryTitle = $categoryTitles[$categoryId] ?? 'Unknown Category';
    $totalSumByCategory[$categoryTitle] = $total;
    $countsByCategory[$categoryTitle] = ResultByCategory::where('faculty_id', $userId)
        ->where('category_id', $categoryId)
        ->count();
}

// Calculate means for each category
foreach ($totalSumByCategory as $categoryTitle => $total) {
    $count = $countsByCategory[$categoryTitle];
    $OveralltotalMeanByCategory[$categoryTitle] = $total / $count;
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
    $OveralltotalMeanByCategory = [];
}





    // Assuming $overallPercentageBySubject is calculated somewhere else
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
    $distinctSubject = ResultByCategory::where('faculty_id', $userId)
    ->distinct()
    ->pluck('by_subject');

    // New logic: Calculate the total mean of each category by subject
$totalMeanByCategory = [];

foreach ($distinctSubject as $subjectSchedule) {
    $resultsByCategory = ResultByCategory::where('faculty_id', $userId)
        ->where('by_subject', $subjectSchedule)
        ->select('category_id', DB::raw('SUM(results_by_category) as total'), DB::raw('COUNT(DISTINCT id) as count'))
        ->groupBy('category_id')
        ->get();

    foreach ($resultsByCategory as $result) {
        $categoryTitle = $categoryTitles[$result->category_id] ?? 'Unknown Category';
        $mean = $result->total / $result->count;

        if (!isset($totalMeanByCategory[$subjectSchedule])) {
            $totalMeanByCategory[$subjectSchedule] = [];
        }
        $totalMeanByCategory[$subjectSchedule][$categoryTitle] = $mean;
    }
}




$percentagesBySubjectAndCategory = [];
$totalScoresBySubject = [];
$overallPercentageBySubject = [];

$totalResultsByCategory = [];
$totalPossibleSumForAllSubjects = 0;
$totalScoreForAllSubjects = 0;
$maxPointsPerEvaluation = 25;
foreach ($distinctSubject as $subjectSchedule) {
    // Get the total results for each category
    $resultsByCategory = ResultByCategory::where('faculty_id', $userId)
        ->where('by_subject', $subjectSchedule)
        ->select('category_id', DB::raw('SUM(results_by_category) as total'))
        ->groupBy('category_id')
        ->get();

    $resultsByCategoryArray = $resultsByCategory->pluck('total', 'category_id')->toArray();

    // Calculate the total score for this subject schedule
    $totalScore = array_sum($resultsByCategoryArray);
    $totalScoreForAllSubjects += $totalScore;

    // Calculate the maximum possible sum for this subject schedule
    $numEvaluationsForSubject = ResultByCategory::where('faculty_id', $userId)
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


$specificCategoryData = [];
foreach ($categoryTitles as $categoryId => $categoryTitle) {
    $categoryResults = ResultByCategory::where('faculty_id', $userId)
        ->where('category_id', $categoryId)
        ->pluck('results_by_category')
        ->toArray();
    $specificCategoryData[$categoryTitle] = $categoryResults;
}




    $histogramData = ResultByCategory::where('faculty_id', $userId)
    ->pluck('results_by_category')
    ->toArray();


    $totalFeedback =  Comments::where('faculty_id', $userId)->count();
    $totalStudent = ClassList::where('user_id', $userId)->where('evaluation_schedule_id', $evaluationSchedules->id)->count();
    $totalStudent = $totalStudent ?? 0;
    $studentId = User::where('user_type','user')->pluck('id');


    $token = Tokenform::where('evaluation_schedules_id', $evaluationSchedules->id)
                        ->where('faculty_id', $userId)
                        ->count();
    $pendingstudenteval = $totalStudent + $token;

    $department = Department::where('id', $users->department_id)->firstOrNew();

        return view('frontend.home.dashboard', compact(['users','department','pendingstudenteval','token','category','totalStudent','totalFeedback', 'allCategories', 'resultsByCategory', 'userId', 'evaluationResults','totalSumByCategory','totalMeanByCategory','histogramData','specificCategoryData','OveralltotalMeanByCategory','overallPercentageBySubject']));
    }

    public function profile():View{
        $users = User::where('user_type', 'faculty')->get();
        return view('frontend.home.facultyprofile',compact('$users'));
    }

    public function updateFaculty(FacultyProfileRequest $facultyRequest):RedirectResponse{
        $avatarPath = $this->uploadImage($facultyRequest, 'avatar',$facultyRequest->oldAvatar);
        $user = Auth::user();

        $user->avatar = !empty($avatarPath) ? $avatarPath :$facultyRequest->oldAvatar;
        $user->first_name = $facultyRequest->first_name;
        $user->last_name  = $facultyRequest->last_name;
        $user->email = $facultyRequest->email;
        $user->save();
        toastr()->success('Acount Updated Successfully!');
        return redirect()->back();
    }


}
