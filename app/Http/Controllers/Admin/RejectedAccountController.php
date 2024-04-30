<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RejectedAccountDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RejectedAccountController extends Controller
{
    public function index(RejectedAccountDataTable $datatable):View | JsonResponse{
        return $datatable->render('admin.rejected_account.index');
    }
}
