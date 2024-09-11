<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EvaluationScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\EvaluationSchedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EvaluationScheduleController extends Controller
{
    public function index(EvaluationScheduleDataTable $datatable):JsonResponse | View{
        return $datatable->render('admin.schedule.evaluationSchedule');
    }

    public function store(Request $request){
        if(EvaluationSchedule::where('evaluation_status', 2)->exists()){
            return redirect()->back()->with('warning', 'Schedule creation is not possible due to an ongoing schedule!');
        }else{
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
            return redirect()->back()->with('success', 'Schedule created Succefully, Evaluation now is on going!');
        }
    }

    public function edit(string $id){
        $schedules = EvaluationSchedule::findOrFail($id);
        if($schedules){
            return response()->json([
                'status' => '200',
                'schedules' => $schedules,
            ]);
         }else{
            return response()->json([
                'status' => '404',
                'message' => 'Question Not Found'
            ]);
         }
    }


    public function update(Request $request, string $id) {
        $schedule = EvaluationSchedule::findOrFail($id);

        if (EvaluationSchedule::where('evaluation_status', 2)->exists() ) {

            return redirect()->back()->with('warning', 'Schedule Update is not possible due to an ongoing schedule!');
        } else {

                $schedule->description = $request->description;
                $schedule->academic_year = $request->academic_year;
                $schedule->semester = $request->semester;
                $schedule->evaluation_status = $request->status;
                $schedule->save();
                return redirect()->back()->with('success', 'Schedule Successfully Updated.');

        }
    }


}
