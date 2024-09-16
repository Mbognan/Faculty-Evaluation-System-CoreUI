@extends('frontend.layouts.master')

@section('home')
{{-- trading courasel --}}
{{-- @include('frontend.home-components.tradingcourasel') --}}
{{-- courasel  --}}

    {{-- @include('frontend.home-components.courasel') --}}

{{--
 <div class="large_add_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="large_add_banner_img">
                        <img src="images/placeholder_large.jpg" alt="adds">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="fp__banner" style="background: url('{{ asset('uploads/back.jpg') }}');">
        <div class="fp__banner_overlay">
            <div class="row banner_slider">
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('uploads/newsIntroImage (1).jpg') }}" alt="food item" class="img-fluid w-100">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1 class="text-white">Tatak Evsunista Award to Dr. Norberto C. Olavides</h1>
                                        <h4 class="text-white">- Palompon Institute of Technology</h4>
                                        <p class="text-white">In appreciation of his remarkable achievements and unwavering commitment in elevating the field of higher education.</p>
                                        <ul class="d-flex flex-wrap">
                                            {{-- <li><a class="common_btn " href="#">shop now</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('uploads/newsIntroImage.jpg') }}" alt="food item" class="img-fluid w-100">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1 class="text-white">PIT's 7th President</h1>

                                        <p class="text-white">We are pleased to officially announce Dr. Dennis Anota Mapa Del Pilar as the 7th President of PIT.<br>
                                             With a distinguished career and a commitment to excellence, Dr. Del Pilar is set to lead PIT into a future of innovation and growth.
                                        </p>
                                        {{-- <ul class="d-flex flex-wrap">
                                            <li><a class="common_btn_2" href="#">Read
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('uploads/lisence.jpg') }}" alt="food item" class="img-fluid w-100">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1 class="text-white">PIT's Newly Licensed Electrical Engineers and Master Electricians</h1>

                                        <p class="text-white">We extend our hearfelt congratulations once more to our newly registered Electrical Engineers! PIT will forever take pride in all your achievements. Best wishes as you embark on this new chapter!</p>
                                        <ul class="d-flex flex-wrap">
                                            {{-- <li><a class="common_btn" href="#">shop now</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fp__why_choose mt_60 xs_mt_70 mb-4">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                    <div class="fp__section_heading mb_25">
                        <h4>about FES</h4>
                        <h2>About Faculty Performance Evaluation</h2>
                        <span>
                            <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                        </span>
                        <p>Faculty Evaluation System is an online web application which automates the process of evaluating faculty performance.
                            The system facilitates a timely and efficient manner of monitoring faculty performance for timely intervention measures.
                            Confidentiality of the information is strictly observed.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="fp__choose_single">
                        <div class="icon icon_1">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="text">
                            <h3>Student Can Evaluate</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="fp__choose_single">
                        <div class="icon icon_2">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="text">
                            <h3>Upcomming!</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="fp__choose_single">
                        <div class="icon icon_3">
                            <i class="fas fa-percent"></i>
                        </div>
                        <div class="text">
                            <h3>Upcomming</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- @include('frontend.home-components.endsection') --}}
@endsection
@push('scripts')
<script src="https://cdn.lordicon.com/lordicon.js"></script>
@endpush
