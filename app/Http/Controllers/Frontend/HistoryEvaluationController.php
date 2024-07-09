<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\ResultByCategoryDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HistoryEvaluationController extends Controller
{
    public function index(ResultByCategoryDataTable $datatable):View | JsonResponse{
        return $datatable->render('frontend.home.history-evaluation');
    }
}
