@extends('frontend.layouts.master')

@section('home')
{{-- trading courasel --}}
{{-- @include('frontend.home-components.tradingcourasel') --}}
{{-- courasel  --}}

    @include('frontend.home-components.courasel')

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


    {{-- @include('frontend.home-components.endsection') --}}
@endsection
