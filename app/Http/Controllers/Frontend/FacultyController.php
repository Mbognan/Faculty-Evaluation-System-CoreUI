<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacultyController extends Controller
{
    public function index():View{

        return view('frontend.home.dashboard');
    }
    public function profile():View{
        return view('frontend.home.facultyprofile');
    }
}
