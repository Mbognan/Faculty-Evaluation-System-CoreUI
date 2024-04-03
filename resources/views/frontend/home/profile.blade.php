@extends('frontend.layouts.master')

@section('home')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.home.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing " style="border:solid">
                            <h4>basic information</h4>
                            <form action="{{ route('faculty.profile-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>First Name<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="" name="first_name"
                                                            value="{{ $user->first_name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>last Name<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="" name="last_name"
                                                            value="{{ $user->last_name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>email<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="Email" placeholder="Email" name="email"
                                                            value="{{ $user->email }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>address<span class="text-danger">*</span></label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="address" name="address"
                                                            value="Palompon Of Technology" required>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="my_listing_single">
                                            <label>Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{ asset($user->avatar) }}" alt="img" class="imf-fluid w-100" name="avatar">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="oldAvatar" value="{{ $user->avatar }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar "  style="border:solid">
                            <h4 class="text-danger">change password</h4>
                            <form action="#" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>current password<span class="text-danger">*</span></label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Current Password"
                                                    name="current_password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>new password<span class="text-danger">*</span></label>
                                            <div class="input_area">
                                                <input type="password" placeholder="New Password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password<span class="text-danger">*</span></label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class=" btn btn-danger">Reset Password</button>
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
@push('scripts')

@endpush
