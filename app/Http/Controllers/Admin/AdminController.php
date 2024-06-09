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


          // Fetch faculty members
    $facultyMembers = User::where('user_type', 'faculty')->get();
    $facultyName = User::where('user_type', 'faculty')->pluck('first_name');




    // Initialize an array to store average results for each faculty
    $facultyAverages = [];
    $categoryAverages = [];

    // Iterate through each faculty member
    foreach ($facultyMembers as $faculty) {
        // Fetch the results for the faculty
        $results = ResultByCategory::where('faculty_id', $faculty->id)->pluck('results_by_category');


        $sum = $results->map(function ($result) {
            return $result ?? 0;
        })->sum();

        // Calculate the average, taking care of division by zero
        $count = $results->count();
        $average = $count > 0 ? $sum / $count : 0;


     // Format the average to one decimal place
     $formattedAverage = number_format($average, 1);

     // Store the formatted average in the array
     $facultyAverages[$faculty->first_name] = $formattedAverage;
     $facultyAveragesBarChart[$faculty->first_name] = $formattedAverage;
    }

       // Fetch all categories
       $categories = Category::all();

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
        $totalSudent = User::where('user_type', 'user')->count();
        return view('admin.index',compact(['facultyResult', 'totalSudent','facultyCount','facultyAverages','categoryAverages','categories','facultyCategoryAverages','facultyAveragesBarChart','overallCategoryAverages']));

    }
}
