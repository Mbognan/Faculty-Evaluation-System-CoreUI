<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ClassListDataTable;
use App\Http\Controllers\Controller;
use App\Imports\ClassListImport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
}
