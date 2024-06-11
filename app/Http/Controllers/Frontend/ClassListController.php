<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ClassListDataTable;
use App\Http\Controllers\Controller;
use App\Imports\ClassListImport;
use App\Models\ClassList;
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
        Excel::import((new ClassListImport)->withFacultyId($facultyId), $request->file('users'));
        toastr()->success('Successfully imported!');
        return to_route('faculty.class-list.index');
    }

    public function addStudent():View{
        return view('frontend.home.facultyadd');
    }

    public function store(Request $request){
        $faculty =  Auth::user();

        if (ClassList::where('subject', $request->subject)
                 ->where('student_id', $request->StudentId)
                 ->exists()) {

        return redirect()->back()->with('warning',  'Student is already enrolled in this subject!');
    }

    try {
        $subject = ClassList::where('subject', $request->subject)->firstOrFail();

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_initials' => 'required',
            'StudentId'  => 'required',
            'semester' => 'required',
            'academic_year' => 'required',
        ]);

         $classList = new ClassList();
         $classList->user_id = $faculty->id;
         $classList->first_name = $request->first_name;
         $classList->last_name = $request->last_name;
         $classList->middle_initials = $request->middle_initials;
        $classList->subject = $request->subject;
        $classList->student_id = $request->StudentId;
        $classList->semester = $request->semester;
        $classList->year = $request->academic_year;
        $classList->save();


        return to_route('faculty.class-list.index')->with('success',  'Student added successfully!');
    } catch (ModelNotFoundException $e) {

        return redirect()->back()->with('warning','Subject does not exist!');
    }

    }

}
