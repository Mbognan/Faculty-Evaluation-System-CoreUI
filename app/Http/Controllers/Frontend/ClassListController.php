<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ClassListDataTable;
use App\Http\Controllers\Controller;
use App\Imports\ClassListImport;
use App\Models\ClassList;
use App\Models\EvaluationSchedule;
use App\Models\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ClassListController extends Controller
{
    public function index(ClassListDataTable $datatable):View | JsonResponse{
        return $datatable->render('frontend.home.facultyverify');
    }

    public function import():View{
        return view('frontend.home.import');
    }
    public function uploadData(Request $request){
        $facultyId = auth()->id();
        $schedule = EvaluationSchedule::where('evaluation_status', 2)->first('id');

        $request->validate([
            'users' => 'required|file|mimes:xls,xlsx',
        ]);

        if (!$request->hasFile('users')) {
            toastr()->error('File not found in request');
            return back();
        }

        $file = $request->file('users');
        if (!$file->isValid()) {
            toastr()->error('Invalid file upload');
            return back();
        }




        Excel::import((new ClassListImport)->withFacultyId($facultyId)->withSchedule($schedule->id), $request->file('users'));
        toastr()->success('Successfully imported!');
        return to_route('faculty.class-list.index');
    }

    public function addStudent():View{
        $facultyId = auth()->id();
        $subjects = ClassList::where('user_id',$facultyId)->distinct()->pluck('subject');
        $schedule = EvaluationSchedule::where('evaluation_status', 2)->first();
        return view('frontend.home.facultyadd',compact(['schedule','subjects']));
    }

    public function store(Request $request){
        $faculty =  Auth::user();

        if (ClassList::where('subject', $request->subject)
                 ->where('student_id', $request->StudentId)->where('user_id', $faculty->faculty_id)
                 ->exists()) {

        return redirect()->back()->with('warning',  'Student is already enrolled in this subject!');
    }

    try {



        $request->validate([
            'StudentId'  => 'required',
            'semester' => 'required',
            'academic_year' => 'required',
        ]);

        $subject = ClassList::where('subject', $request->subject)->firstOrFail();

        $user = User::where('student_id', $request->StudentId)->get();

         $classList = new ClassList();
         $classList->user_id = $faculty->id;
         $classList->first_name = $user->first_name;
         $classList->last_name = $user->last_name;
        $classList->subject = $request->subject;
        $classList->student_id = $request->StudentId;
        $classList->semester = $request->semester;
        $classList->year = $request->academic_year;
        $classList->save();


        return to_route('faculty.class-list.index')->with('success',  'Student added successfully!');
    } catch (ModelNotFoundException $e) {

        return redirect()->back()->with('warning','All field is required!');
    }

    }

}
