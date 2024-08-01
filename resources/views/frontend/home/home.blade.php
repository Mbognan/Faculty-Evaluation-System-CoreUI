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
                                        <h1 class="text-white">Lorem ipsom trying to test</h1>
                                        <h4 class="text-white">Palompon Institute of Technology</h4>
                                        <p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima
                                            et debitis ut distinctio optio qui voluptate natus.</p>
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

                                        <p class="text-white">We are pleased to officially announce Dr. Dennis Anota Mapa Del Pilar as the 7th President of PIT.</p>
                                        {{-- <ul class="d-flex flex-wrap">
                                            <li><a class="common_btn" href="#">shop now</a></li>
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
                                            <img src="images/slider_img_3.png" alt="food item" class="img-fluid w-100">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1 class="text-white">Great food. Tastes good.</h1>
                                        <h3 class="text-white">Fast Food & Restaurants</h3>
                                        <p class="text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima
                                            et debitis ut distinctio optio qui voluptate natus.</p>
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


    {{-- @include('frontend.home-components.endsection') --}}
@endsection
@push('scripts')

@endpush
