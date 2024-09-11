<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Imports\PendingRegistration;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationPendingController extends Controller
{
    public function pendingRegistration(UserDataTable $dataTable):View |JsonResponse{
        return $dataTable->render('admin.pending_registration.index');
    }

    public function store(string $id):Response{
        $user = User::findOrFail($id);

        $user->status = 1;
        $user->save();

        toastr()->success('Account Verified Successfully!');
        return response(['status' => 'success','message' =>'Student Verified!']);
    }
    public function rejected(string $id){
        $user = User::findOrFail($id);

        $user->status = 2;
        $user->save();

        toastr()->success('Account Rejected Successfully!');
        return response(['status' => 'success','message' =>'Student Verified!']);
    }

    public function importPendingRegistration(Request $request){


        Excel::import(new PendingRegistration, $request->file('import_file'));

        return redirect()->back()->with('success', 'Student Verified Successfully.');
    }


}
