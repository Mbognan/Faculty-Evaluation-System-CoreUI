<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comments;
use App\Models\EvaluationSchedule;
use App\Models\ResultByCategory;
use App\Models\Sentiment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{

    public function index(): View
    {

        $departmentHead = Auth::user();
        $schedule =  EvaluationSchedule::where('evaluation_status', 2)->firstOrNew();

        // Fetch faculty members
        $facultyMembers = User::where('user_type', 'faculty')
            ->where('department_id', $departmentHead->department_id)
            ->get();

        $facultyAverages = [];
        $facultyAveragesBarChart = [];
        $facultyData = [];
        $categoryAverages = []; // Initialize categoryAverages
        $overallSentimentAnalysisByFaculty = []; // Initialize overall sentiment analysis

        foreach ($facultyMembers as $faculty) {
            $results = ResultByCategory::where('faculty_id', $faculty->id)->where('semester_id', $schedule->id)->pluck('results_by_category');

            $sum = $results->map(function ($result) {
                return $result ?? 0;
            })->sum();
            $count = $results->count();
            $average = $count > 0 ? $sum / $count : 0;

            $formattedAverage = number_format($average, 1);

            // Calculate the percentage
            $percentage = ($average / 25) * 100;
            $formattedPercentage = number_format($percentage, 2);

            $facultyAverages[$faculty->first_name] = $formattedAverage;
            $facultyAveragesBarChart[$faculty->first_name] = $formattedPercentage;
        }

        $categories = Category::all();
        $categorz = Category::pluck('title','id');



        foreach ($facultyMembers as $faculty) {
            $facultyResults = [
                'avatar' => $faculty->avatar ?? 'default.jpg',
                'firstName' => $faculty->first_name,
                'lastName' => $faculty->last_name,
            ];

            $totalSum = 0;
            $totalCount = 0;

            foreach ($categories as $category) {
                $results = ResultByCategory::where('faculty_id', $faculty->id)
                    ->where('category_id', $category->id)
                    ->where('semester_id', $schedule->id)
                    ->pluck('results_by_category');

                $sum = $results->map(function ($result) {
                    return $result ?? 0;
                })->sum();
                $count = $results->count();
                $average = $count > 0 ? $sum / $count : 0;
                $formattedAverage = number_format($average, 1);

                $percentage = ($average / 25) * 100;
                $formattedPercentage = number_format($percentage, 2);

                $firstWord = strtok($category->title, ' ');

                $facultyResults[strtolower($firstWord) . '_avg'] = $formattedAverage;
                $facultyResults[strtolower($firstWord) . '_percent'] = $formattedPercentage;

                $totalSum += $sum;
                $totalCount += $count;
            }

            $totalAverage = $totalCount > 0 ? $totalSum / $totalCount : 0;
            $facultyResults['total'] = number_format($totalAverage, 1);

            $totalPercentage = ($totalAverage / 25) * 100;
            $facultyResults['totalPercentage'] = number_format($totalPercentage, 2);

            // Overall Sentiment Analysis by Faculty
            $sentimentCounts = $this->getSentimentCountsByFaculty($faculty->id);
            $overallSentimentAnalysisByFaculty[$faculty->first_name] = [
                'positive' => $sentimentCounts['positive'],
                'negative' => $sentimentCounts['negative']
            ];

            $facultyData[] = $facultyResults;
        }


        $totalDepartmentSum = 0;
        $totalDepartmentCount = 0;

            foreach ($facultyMembers as $faculty) {
                $totalSum = 0;
                $totalCount = 0;

                foreach ($categories as $category) {
                    $results = ResultByCategory::where('faculty_id', $faculty->id)
                        ->where('semester_id', $schedule->id)
                        ->where('category_id', $category->id)
                        ->pluck('results_by_category');

                    $sum = $results->map(function ($result) {
                        return $result ?? 0;
                    })->sum();
                    $count = $results->count();

                    $totalSum += $sum;
                    $totalCount += $count;
                }

                $totalDepartmentSum += $totalSum;
                $totalDepartmentCount += $totalCount;

                $totalAverage = $totalCount > 0 ? $totalSum / $totalCount : 0;
                $totalPercentage = ($totalAverage / 25) * 100;


            }


            $overallDepartmentAverage = $totalDepartmentCount > 0 ? $totalDepartmentSum / $totalDepartmentCount : 0;
            $OverallDepartmentPercentage = ($overallDepartmentAverage / 25) * 100;
            $OverallDepartmentPercentageFormatted = number_format($OverallDepartmentPercentage, 2);


        $facultyCategoryAverages = [];
        foreach ($facultyMembers as $faculty) {
            $categoryAverages = [];
            foreach ($categories as $category) {
                $results = ResultByCategory::where('faculty_id', $faculty->id)
                    ->where('category_id', $category->id)
                    ->where('semester_id', $schedule->id)
                    ->pluck('results_by_category');

                $sum = $results->map(function ($result) {
                    return $result ?? 0;
                })->sum();
                $count = $results->count();
                $average = $count > 0 ? $sum / $count : 0;
                $formattedAverage = number_format($average, 1);
                $categoryAverages[$category->id] = $formattedAverage;
            }
            $facultyCategoryAverages[$faculty->first_name] = $categoryAverages;
        }
        arsort($facultyAveragesBarChart);

        $categorySumCounts = [];

        foreach ($facultyCategoryAverages as $facultyName => $categories) {
            foreach ($categories as $categoryId => $formattedAverage) {
                $average = (float)$formattedAverage;
                if (!isset($categorySumCounts[$categoryId])) {
                    $categorySumCounts[$categoryId] = ['sum' => 0, 'count' => 0];
                }

                $categorySumCounts[$categoryId]['sum'] += $average;
                $categorySumCounts[$categoryId]['count'] += 1;
            }
        }

        $overallCategoryAverages = [];

        foreach ($categorySumCounts as $categoryId => $sumCount) {
            $overallSum = $sumCount['sum'];
            $overallCount = $sumCount['count'];
            $overallAverage = $overallCount > 0 ? $overallSum / $overallCount : 0;
            $categoryTitle = Category::findOrFail($categoryId);
            $overallCategoryAverages[$categoryTitle->title] = number_format($overallAverage, 2);
        }

        $facultyCount = $facultyMembers->count();
        // $totalStudents = User::where('user_type', 'user')->where('department_id', $departmentHead->department_id)->count();

        $facultyResult = User::where('user_type', 'faculty')->pluck('id');
        $totalSudent = User::where('user_type', 'user')
            ->where('department_id', $departmentHead->department_id)
            ->count();



        $facultybyDepartment = User::with('department')
            ->where('user_type', 'faculty')
            ->where('department_id', $departmentHead->department_id)
            ->get();

        $Department = User::with('department')
            ->where('department_id', $departmentHead->department_id)
            ->first();




        $departmentResults = ResultByCategory::where('semester_id',$schedule->id)->whereIn('faculty_id', $facultyMembers->pluck('id'))->pluck('results_by_category');
        $departmentSum = $departmentResults->map(function ($result) {
            return $result ?? 0;
        })->sum();

        $comments = [];
        if ($schedule && $departmentHead) {
            $comments = Comments::where('evaluation_schedules_id', $schedule->id)
                ->where('status', 1)
                ->where('department_id', $departmentHead->department_id)
                ->pluck('post_comment')
                ->toArray();
        }


            $status = [

                'verified' => 1,
                'rejected' => 2,
                'pending' => 0,
            ];
            $result = [];

            foreach( $status as $key => $stat){
                $result[$key] = User::where('user_type', 'user')
                ->where('department_id', $departmentHead->department_id)
                ->where('status', $stat)
                ->count();
            }


            $verified = $result['verified'];
            $pending = $result['pending'];
            $rejected = $result['rejected'];

            if($totalSudent > 0){
                $verifiedper = ($result['verified'] / $totalSudent) * 100;
                $pendingper = ($result['pending'] / $totalSudent) * 100;
                $rejectedper = ($result['rejected'] / $totalSudent) * 100;

            }else{
                $verifiedper = 0;
                $pendingper = 0;
                $rejectedper = 0;
            }


            $allDataEmpty = !empty($facultyData) &&
            !empty($facultybyDepartment) &&
            !empty($totalSudent) &&
            !empty($facultyCount) &&
            !empty($facultyAverages) &&
            !empty($categoryAverages) &&
            !empty($facultyCategoryAverages) &&
            !empty($facultyAveragesBarChart) &&
            !empty($overallCategoryAverages);


        return view('admin.index', compact([
            'verifiedper',
            'pendingper',
            'rejectedper',
            'verified',
            'pending',
            'rejected',
            'facultyData',
            'OverallDepartmentPercentageFormatted',
            'Department',
            'facultybyDepartment',
            'facultyResult',
            'totalSudent',
            'facultyCount',
            'facultyAverages',
            'categoryAverages',
            'categories',
            'facultyCategoryAverages',
            'facultyAveragesBarChart',
            'overallCategoryAverages',
            'overallSentimentAnalysisByFaculty',
            'allDataEmpty',
             'comments',
             'categorz'
        ]));


    }

    private function getSentimentCountsByFaculty($facultyId)
    {
        $schedule =  EvaluationSchedule::where('evaluation_status', 2)->firstOrNew();

        $positiveSentiments = Sentiment::where('faculty_id', $facultyId)->where('sentiment', 'positive')->where('evaluation_schedules_id',$schedule->id)->count();
        $negativeSentiments = Sentiment::where('faculty_id', $facultyId)->where('sentiment', 'negative')->where('evaluation_schedules_id',$schedule->id)->count();




        $total = $positiveSentiments + $negativeSentiments;
        $postiveSentimentPercent = $positiveSentiments > 0 ? ($positiveSentiments / $total) * 100 : 0;
        $negativeSentimentPercent = $negativeSentiments > 0 ? ($negativeSentiments / $total) * 100 : 0;



        return [
            'positive' => $postiveSentimentPercent,
            'negative' => $negativeSentimentPercent,
        ];
    }
}

















