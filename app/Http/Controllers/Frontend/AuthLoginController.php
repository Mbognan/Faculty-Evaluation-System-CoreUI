<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthLoginController extends Controller
{
    public function login():View{
        return view('frontend.auth.login');
    }
}
