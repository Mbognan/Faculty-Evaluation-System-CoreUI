<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ResultByCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index():View{

    $departmentHead = Auth::user();

          // Fetch faculty members
    $facultyMembers = User::where('user_type', 'faculty')->where('department_id', $departmentHead->department_id)->get();
    $facultyName = User::where('user_type', 'faculty')->pluck('first_name');



    $facultyAverages = [];
    $categoryAverages = [];
    $facultytable = [];

    foreach ($facultyMembers as $faculty) {
        $results = ResultByCategory::where('faculty_id', $faculty->id)->pluck('results_by_category');

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


foreach ($facultyMembers as $faculty) {
    $facultyResults = [
        'avatar' => $faculty->avatar ?? 'default.jpg',
        'firstName' => $faculty->first_name,
        'lastName' => $faculty->last_name,

    ];

    $categoryAverages = [];
    $totalSum = 0;
    $totalCount = 0;

    foreach ($categories as $category) {
        $results = ResultByCategory::where('faculty_id', $faculty->id)
            ->where('category_id', $category->id)
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
    $facultyResults ['totalPercentage'] = number_format($totalPercentage, 2);

    $facultyData[] = $facultyResults;
}




       $facultyCategoryAverages = [];
       foreach ($facultyMembers as $faculty) {
           $categoryAverages = [];
           foreach ($categories as $category) {

               $results = ResultByCategory::where('faculty_id', $faculty->id)
                                           ->where('category_id', $category->id)
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




       $categorySumCounts=[];

       foreach($facultyCategoryAverages as $facultyName =>$categories){
        foreach($categories as $categoryId => $formattedAverage){
            $average = (float)$formattedAverage;
            if(!isset($categorySumCounts[$categoryId])){
                $categorySumCounts[$categoryId] = ['sum' =>0 ,'count'=>0];
            }

            $categorySumCounts[$categoryId]['sum'] += $average;
            $categorySumCounts[$categoryId]['count'] += 1;
        }
       }


       $overallCategoryaverages = [];

       foreach($categorySumCounts as $categoryId =>$sumCount){
        $overallSum = $sumCount['sum'];
        $overallCount = $sumCount['count'];
        $overallAverage = $overallCount > 0 ? $overallSum / $overallCount : 0;
        $categoriestitle = Category::findOrFail($categoryId);
        $overallCategoryAverages[$categoriestitle->title] = number_format($overallAverage, 2);

       }








       $facultyCount = $facultyMembers->count();
       $totalStudents = User::where('user_type', 'user')->count();



        $facultyResult = User::where('user_type', 'faculty')->pluck('id');
        $facultyCount = User::where('user_type', 'faculty')->count();
        $totalSudent = User::where('user_type', 'user')->where('department_id', $departmentHead->department_id)->count();



        $facultybyDepartment = User::with('department')->where('user_type', 'faculty')->where('department_id',$departmentHead->department_id)->get();
       $Department = User::with('department')->where('department_id', $departmentHead->department_id)->first();

        return view('admin.index',compact(['facultyData','Department','facultybyDepartment','facultyResult', 'totalSudent','facultyCount','facultyAverages','categoryAverages','categories','facultyCategoryAverages','facultyAveragesBarChart','overallCategoryAverages']));

    }
}
