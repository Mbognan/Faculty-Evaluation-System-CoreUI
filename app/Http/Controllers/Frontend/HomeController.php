<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function homeview():View{
        $heroes = Hero::all();
        // dd($heroes->all());
        return view('frontend.home.home',compact('heroes'));
    }

    public function index():View{
        $user = Auth::user();
        return view('frontend.home.profile',compact('user'));
    }
}
