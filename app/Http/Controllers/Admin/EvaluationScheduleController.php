<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EvaluationScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\EvaluationSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvaluationScheduleController extends Controller
{
    public function index(EvaluationScheduleDataTable $datatable):JsonResponse | View{
        return $datatable->render('admin.schedule.evaluationSchedule');
    }

    public function store(Request $request){
        $request->validate([
            'description' => ['required','string','max:255'],
            'selected_year' => ['required','max:255'],
            'semester' => ['required','string','max:255'],
            'status' => ['required','string','max:255'],
        ]);
        $schedule = new EvaluationSchedule();

        $schedule->description = $request->description;
        $schedule->academic_year = $request->selected_year;
        $schedule->semester = $request->semester;
        $schedule->evaluation_status = $request->status;
        $schedule->save();
        toastr()->success('Schedule Created Successfully!');
        return to_route('admin.evaluation_schedule.index');
    }

}
