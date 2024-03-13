<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FacultyDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\FacultyRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacultyController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(FacultyDataTable $datatable):View | JsonResponse
    {
        return  $datatable->render('admin.faculty.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacultyRequest $request):RedirectResponse
    {
        $imagePath = $this->uploadImage($request,'avatar');
        $user = new User();
        $user->avatar = $imagePath;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->status = $request->status;
        $user->gender = $request->gender;
        $user->user_type = $request->user_type;

        $user->save();

        toastr()->success('User saved successfully!');

        return redirect()->back();




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
