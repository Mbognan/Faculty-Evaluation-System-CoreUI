<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ResultByCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\EvaluationSchedule;
use App\Models\Question;
use App\Models\RawEvaluationResult;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryEvaluationController extends Controller
{
    public function index(ResultByCategoryDataTable $datatable):View | JsonResponse{
        return $datatable->render('frontend.home.history-evaluation');
    }

    public function viewPdf(string $subject, int $faculty_id, int $semester_id){

        $rawdata = RawEvaluationResult::where('faculty_id',$faculty_id)
        ->where('subject',$subject)
        ->where('evaluation_schedules_id',$semester_id)
        ->get();

        $faculty = User::findOrFail($faculty_id);
        $year = EvaluationSchedule::findOrFail($semester_id);
        $academicpart = explode('-', $year->academic_year);

        $sy = $academicpart[0];
        $to = $academicpart[1];




        $questions = Question::orderBy('position', 'asc')->get();
        $categories = Category::all();
        $pdf = Pdf::loadView('frontend.home.generate_history', ['questions' => $questions, 'categories' => $categories,'rawdata' => $rawdata, 'faculty' => $faculty, 'sy' => $sy, 'to' => $to, 'year' => $year])
        ->setPaper([0, 0,  8.5 * 72, 14.25 * 72], 'portrait');
        return $pdf->stream();
    }
}
