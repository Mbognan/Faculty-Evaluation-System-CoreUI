@extends('frontend.layouts.master')

@section('home')
    {{-- <section id="" class="blog_pages">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.home.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content ">
                        <div class="my_listing active_package shadow p-3 mb-5 bg-white rounded">
                            <h4>student profile</h4>
                            @if ($user->status === 0)
                                <div class="alert alert-warning" role="alert">
                                    <h7>Account Pending</h7>
                                </div>
                            @elseif ($user->status === 2)
                                <div class="alert alert-danger" role="alert">
                                    <h7>Account Rejected <span>*note please go the the IT Department for confirmation</span>
                                    </h7>
                                </div>
                            @else
                                <div class="alert alert-success" role="alert">
                                    <h7>Account Verified <span>*IT1002897</span></h7>
                                </div>
                            @endif
                            <form action="{{ route('faculty.profile-update') }}" method="POST"
                                enctype="multipart/form-data">
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

                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="my_listing_single">
                                            <label>Avatar</label>
                                            <div class="profile_pic_upload">
                                                <img src="{{ asset($user->avatar) }}" alt="img" class="imf-fluid w-100"
                                                    name="avatar">
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
                        <div class="my_listing list_mar  active_package shadow p-3 mb-5 bg-white rounded" >
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
    </section> --}}
    <section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>user dashboard</h1>
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

                                <div class="tab-pane fade show active" >
                                    <div class="fp_dashboard_body">
                                        <h3>Welcome to your Profile</h3>
                                        <div class="fp__dsahboard_overview">
                                            <div class="row">
                                                @if ( auth()->check() && auth()->user()->user_type === 'faculty')
                                                {{-- <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item green">
                                                        <span class="icon"><i class="fas fa-user-check"></i></span>
                                                        <h4>Evaluated  <span>(76)</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item ">
                                                        <span class="icon"><i class="fas fa-user-clock"></i></span>
                                                        <h4>Pending Student <span>(20)</span></h4>
                                                    </div>
                                                </div> --}}
                                                @elseif( auth()->check() && auth()->user()->user_type === 'user')
                                                <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item green">
                                                        <span class="icon"><i class="fas fa-clipboard-check"></i></span>
                                                        <h4>completed <span>(76)</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item warning">
                                                        <span class="icon"><i class="fab fa-wpforms"></i></i></span>
                                                        <h4>to be evaluated <span>(71)</span></h4>
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
                                        </div>


                                        <div class="fp_dash_personal_info">
                                            @if ($user->status === 0)
                                                <div class="alert alert-warning" role="alert">
                                                    <h7>Account Pending</h7>
                                                </div>
                                            @elseif ($user->status === 2)
                                                <div class="alert alert-danger" role="alert">
                                                    <h7>Account Rejected <span>*note please go the the IT Department for
                                                            confirmation</span>
                                                    </h7>
                                                </div>
                                            @else
                                                <div class="alert alert-success" role="alert">
                                                    <h7>Account Verified <span>*BSIT Department</span></h7>
                                                </div>
                                            @endif
                                            <h4>Parsonal Information
                                                <a class="dash_info_btn">
                                                    <span class="edit">edit</span>
                                                    <span class="cancel">cancel</span>
                                                </a>
                                            </h4>

                                            <div class="personal_info_text">
                                                <p><span>Name:</span> {{ $user->first_name }} B. {{ $user->last_name }}</p>
                                                <p><span>Email:</span> {{ $user->email }}</p>
                                                @if (auth()->user()->user_type === 'user')
                                                <p><span>Student ID:</span> {{ $user->student_id }}</p>
                                                @endif

                                                <p><span>User Type:</span> {{ ucfirst($user->user_type) }} </p>
                                            </div>
                                            {{-- Profile section --}}
                                            <div class="fp_dash_personal_info_edit comment_input p-0">
                                                <form method="POST" action="{{route( 'user.homeProfile.update')}}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="fp__comment_imput_single">
                                                                <label>first name</label>
                                                                <input type="text" value="{{ $user->first_name }}" name="first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="fp__comment_imput_single">
                                                                <label>last name</label>
                                                                <input type="text" value="{{ $user->last_name }}" name="last_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12">
                                                            <div class="fp__comment_imput_single">
                                                                <label>email</label>
                                                                <input type="email"  value="{{ $user->email }}" name="email">
                                                            </div>
                                                        </div>
                                                        @if (auth()->user()->user_type === 'user')
                                                        <div class="col-xl-6 col-lg-6">
                                                            <div class="fp__comment_imput_single">
                                                                <label>Student ID</label>
                                                                <input type="text" value="{{ $user->student_id }}" name="student_id">
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="col-xl-12">

                                                            <button type="submit" class="common_btn">update</button>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="{{ auth()->user()->user_type }}" name="user_type">
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
@endpush
