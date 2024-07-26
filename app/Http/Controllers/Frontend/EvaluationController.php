<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\EvaluationScheduleController;
use App\Http\Controllers\Controller;
use App\Models\ClassList;
use App\Models\EvaluationSchedule;
use App\Models\Tokenform;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EvaluationController extends Controller
{
    public function index(){
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

        $facultiesSubjects  = [];


        foreach ($faculties as $faculty) {
            $user = Auth::user();


            $subjects = ClassList::where('student_id', $user->student_id)
                                ->where('user_id', $faculty->id)
                                ->pluck('subject');


            $schedules = EvaluationSchedule::where('evaluation_status', '2')->get();
            $schedule = ($schedules->count() === 1) ? $schedules->first() : null;

            if ($schedule) {

                $evaluatedSubjects = Tokenform::where('faculty_id', $faculty->id)
                                            ->where('user_id', $user->id)
                                            ->where('evaluation_schedules_id', $schedule->id)
                                            ->pluck('subject');
            } else {
                $evaluatedSubjects = collect();
            }

            $remainingSubjects = $subjects->diff($evaluatedSubjects);

            // Store the subjects and remaining subjects in the array
            $facultiesSubjects[$faculty->id] = [
                'subjects' => $subjects,
                'remaining_subjects' => $remainingSubjects,
            ];
        }



        return view('frontend.home.evaluation.eval',compact(['facultiesSubjects','facultys','student','faculties','facultyIds','valid','schedule']));
    }

    public function subject_choose(string $id){



        $faculty  = User::findOrFail($id);
        $user = Auth::user();
        $subjects = ClassList::where('student_id', $user->student_id)->where('user_id', $faculty->id)
                         ->get()
                         ->pluck('subject');


        $schedules = EvaluationSchedule::where('evaluation_status', '2')->get();
        $schedule = ($schedules->count() === 1) ? $schedules->first() : null;


        if ($schedule) {
            $evaluatedSubjects = Tokenform::where('faculty_id', $id)
                                          ->where('user_id', $user->id)
                                          ->where('evaluation_schedules_id', $schedule->id)
                                          ->pluck('subject');
        } else {
            $evaluatedSubjects = collect();
        }



        $remainingSubjects = $subjects->diff($evaluatedSubjects);
        return view('frontend.home.evaluation.subject', compact(['faculty', 'user', 'remainingSubjects', 'schedule']));






    }

}
