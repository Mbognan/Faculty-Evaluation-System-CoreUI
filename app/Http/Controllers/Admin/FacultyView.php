<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacultyView extends Controller
{
    public function index():View{
        $users = User::where('user_type', 'faculty')->get();
        return view('admin.faculty.view',compact('users'));
    }
}
