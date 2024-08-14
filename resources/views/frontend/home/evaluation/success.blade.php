@extends('frontend.layouts.master')

@section('home')




<section class="fp__signin mt-4" style="background: url('{{ asset('uploads/back.jpg') }}');">
    <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="border border-3 border-success mt-4"></div>
                    <div class="card  bg-white shadow p-5">
                        <div class="mb-4 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                                fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <h1>Thank You !</h1>
                            <p>Your response is encrypted and secure!</p>
                            <a href="{{ route('user.evaluation.index') }}"  class="btn btn-outline-success">Go to Evaluation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
