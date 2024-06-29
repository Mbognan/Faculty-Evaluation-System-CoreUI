@extends('frontend.layouts.master')

@section('home')
<section >
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.home.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing shadow p-3 mb-5 bg-white rounded" >
                        <h4 >Add Student <span class="text-danger">*</span>
                        </h4>
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
                                                @forelse ($subjects as $subject)
                                                <div class="input_area">
                                                    <div>{{ $subject }}</div>
                                                </div>

                                            @empty
                                                <!-- Display a message when there are no subjects -->
                                                <div class="text-danger">No subjects found for the given faculty ID.</div>
                                            @endforelse


                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="my_listing_single">
                                                <label>Academic Year<span class="text-danger">*</span></label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="Input subject" name="Academic_Year"
                                                        value="{{ $schedule->semester }} {{ $schedule->academic_year }}" required disabled>
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

                                    <button type="submit" class="read_btn" @if($subjects->isEmpty()) disabled @endif>Add</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
