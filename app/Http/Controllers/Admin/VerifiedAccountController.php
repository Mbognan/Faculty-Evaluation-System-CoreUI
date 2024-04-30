<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserVerifiedDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerifiedAccountController extends Controller
{
    public function index(UserVerifiedDataTable $datatable):View | JsonResponse{
        return $datatable->render('admin.verified_account.index');
    }
}
