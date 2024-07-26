<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ClassList;
use App\Models\EvaluationSchedule;
use App\Models\Hero;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function homeview():View{
        $heroes = Hero::all();
        $users = User::where('user_type', 'faculty')->get();
        // dd($heroes->all());
        return view('frontend.home.home',compact(['heroes','users']));
    }

    public function index():View{
        $user = Auth::user();
        $schedules = EvaluationSchedule::where('evaluation_status', '2')->get();

        $valid = false;
        if($schedules === null){
            $valid = false;
            $schedule = null;
        }else if($schedules->count() === 1){
            $valid = true;
            $schedule = $schedules->first();
        }else{
            $valid = false;
             $schedule = null;
        }




        $facultys = User::where('user_type', 'faculty')->get();
        $student = Auth::user();
        $facultyIds = ClassList::where('student_id', $student->student_id)->pluck('user_id')->toArray();

        $faculties = User::whereIn('id', $facultyIds)->where('user_type', 'faculty')->get();

        return view('frontend.home.profile',compact(['facultys','student','faculties','facultyIds','valid','schedule','user']));

    }
}
