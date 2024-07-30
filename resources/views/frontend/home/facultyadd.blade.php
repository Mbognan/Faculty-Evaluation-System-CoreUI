@extends('frontend.layouts.master')

@section('home')
<link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/nice-select.css') }}">


<section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>Evaluation Section</h1>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="#">dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="fp__dashboard mt_70 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <div class="fp__dashboard_area">
            <div class="row">
                <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    @include('frontend.home.sidebar')
                </div>

                <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__dashboard_content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="fp_dashboard_body">
                        <h3>order list</h3>
                        <div class="fp_dashboard_order">
                            <form method="POST" action="{{ route('faculty.store.index') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>Student ID<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Your student ID" name="StudentId"
                                                            value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Subject<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <div class="wsus__search_area">
                                                          <select class="select_2" name="subject">
                                                            <option value="">Choose Subject</option>
                                                            @foreach ($subjects as $subject)
                                                            <option value="{{ $subject }}">{{ $subject }}</option>
                                                            @endforeach
                                                          </select>
                                                        </div>
                                                      </div>

                                                    @forelse ($subjects as $subject)


                                                @empty
                                                    <!-- Display a message when there are no subjects -->
                                                    <div class="">No subjects found for the given faculty ID. <span class="text-danger">*note please import first</span></div>
                                                @endforelse


                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Academic Year<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Input subject"
                                                            value="{{ $schedule->semester }} {{ $schedule->academic_year }}" required disabled>
                                                            <input type="hidden" name="semester" value="{{ $schedule->id }}">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="my_listing_single">
                                            <label>Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{ asset('uploads/media_660d1fa83b0db.jpg') }}" alt="img" class="imf-fluid w-100" name="avatar">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="defaultAvatar" value="{{ asset('uploads/media_660d1fa83b0db.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" style="background-color:#025043" class="btn text-white" @if($subjects->isEmpty()) disabled @endif>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script src="{{ asset('frontend/assets/js-profile/js/select2.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js-profile/js/jquery.nice-select.min.js') }}"></script>
@endpush
