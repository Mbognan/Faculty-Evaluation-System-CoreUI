<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ClassListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassListRequest;
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
    public function uploadData(Request $request)
    {
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

        try {

            $import = new ClassListImport();
            $import->withFacultyId($facultyId)->withSchedule($schedule->id);


            Excel::import($import, $file);

            $duplicateStudentIds = $import->duplicateStudentIds();
            if(!empty($duplicateStudentIds)){
                return to_route('faculty.class-list.index')->with('warning','Some of the students have already been added to the class list');
            }
            $invalidStudentIds = $import->getInvalidStudentIds();
            if (!empty($invalidStudentIds)) {
                return to_route('faculty.class-list.index')->with( 'warning','The following student IDs do not exist and were not added: ' . implode(', ', $invalidStudentIds));

            }

            return to_route('faculty.class-list.index')
            ->with('success', 'Students added successfully!');
        } catch (\Exception $e) {
            toastr()->error('An error occurred during file import: ' . $e->getMessage());
            return back();
        }
    }


    public function addStudent():View{
        $facultyId = auth()->id();
        $subjects = ClassList::where('user_id',$facultyId)->distinct()->pluck('subject');
        $schedule = EvaluationSchedule::where('evaluation_status', 2)->first();
        return view('frontend.home.facultyadd',compact(['schedule','subjects']));
    }

    public function store(ClassListRequest $request){
       $faculty =  Auth::user();

        try {


            $studentIds = is_array($request->StudentId) ? $request->StudentId : [$request->StudentId];

            $invalidStudentIds = array_diff($studentIds, User::pluck('student_id')->toArray());

            if (!empty($invalidStudentIds)) {
                return redirect()->back()->with('warning', 'The following student IDs do not exist: ' . implode(', ', $invalidStudentIds));
            }

            $existingEnrollments = ClassList::where('subject', $request->subject)
                                            ->whereIn('student_id', $studentIds)
                                            ->where('user_id', $faculty->faculty_id)
                                            ->pluck('student_id')
                                            ->toArray();

            if (!empty($existingEnrollments)) {
                return redirect()->back()->with('warning', 'the  students are already enrolled in this subject: ' . implode(', ', $existingEnrollments));
            }


            $classListData = [];
            foreach ($studentIds as $studentId) {
                $classListData[] = [
                    'user_id' => $faculty->id,
                    'subject' => $request->subject,
                    'student_id' => $studentId,
                    'evaluation_schedule_id' => $request->semester,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            ClassList::insert($classListData);

            return to_route('faculty.class-list.index')->with('success', 'Students added successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('warning', 'All fields are required!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }

    }

}
