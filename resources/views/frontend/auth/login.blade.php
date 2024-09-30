@extends('frontend.layouts.master')

@section('home')

<!--=========================
    SIGNIN START
==========================-->
<section class="fp__signin mt-4" style="background: url('{{ asset('uploads/back.jpg') }}');">
    <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="fp__login_area">
                        <h2>Welcome back!</h2>
                        <p>Sign in to continue</p>
                        <form action="{{ route('login') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="fp__login_imput">
                                        <label>Email</label>
                                        @if ($errors->first('email'))
                                        <code>{{ $errors->first('email') }}</code>
                                        @endif
                                        <input name="email" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="fp__login_imput">
                                        <label>Password</label>
                                        <div class="form-outline mb-4">
                                            @if ($errors->first('password'))
                                            <code>{{ $errors->first('password') }}</code>
                                            @endif
                                            <input name="password" type="password" placeholder="Password" required minlength="6">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="fp__login_imput fp__login_check_area">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="fp__login_imput">
                                        <button type="submit" class="common_btn">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="or"><span>or</span></p>
                        <p class="create_account">Don’t have an account? <a href="sign_up.html">Create Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
    SIGNIN END
==========================-->

@endsection
