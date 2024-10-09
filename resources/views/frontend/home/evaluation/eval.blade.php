@extends('frontend.layouts.master')

@section('home')
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
                                    <h3>to be evaluated </h3>
                                    @if ($student->status === 0)
                                        <div class="alert alert-warning text-black"><i
                                                class="fas fa-exclamation-triangle"></i> Account is
                                            still
                                            pending please wait for further action!</div>
                                        @elseif ($student->status === 2)
                                        <div class="alert alert-danger "><i class="fas fa-skull-crossbones"></i>
                                            Account is rejected please contact
                                            the IT Department for Verification!</div>

                                @elseif ($student->status ==1)
                                    @if ($valid === false)
                                        <div class="alert alert-warning text-black">
                                            <h6><i class="fas fa-exclamation-triangle"></i> Faculty Evaluation is not
                                                Available right now
                                            </h6>
                                        </div>
                                    @elseif(empty($evalfaculty))
                                        <div class="alert alert-success ">
                                            <h6><i class="far fa-grin-beam-sweat"></i> No Faculty Available fo evaluation
                                                for now..
                                            </h6>
                                        </div>
                                    @else
                                        <div class="fp__dashoard_wishlist">
                                            <div class="row">
                                                @foreach ($faculties as $faculty)
                                                    <div class="col-xl-4 col-sm-6 col-lg-6">
                                                        <div class="fp__menu_item">
                                                            <div class="fp__menu_item_img">
                                                                <img src="{{ $faculty->avatar }}" alt="menu"
                                                                    class="img-fluid w-100">
                                                                <a class="category" href="#">COTE</a>
                                                            </div>
                                                            <div class="fp__menu_item_text">
                                                                <p class="rating">
                                                                    BSIT Faculty
                                                                </p>
                                                                <a class="title"
                                                                    href="menu_details.html">{{ $faculty->first_name }}
                                                                    {{ $faculty->last_name }}</a>


                                                                @if ($facultiesSubjects[$faculty->id]['remaining_subjects']->isEmpty())
                                                                    <div class="alert alert-success" role="alert">
                                                                        <h4 class="alert-heading"><i
                                                                                class="fas fa-thumbs-up"></i> All subjects
                                                                            evaluated!</h4>
                                                                        <p>You have completed evaluations for all your
                                                                            subjects for this faculty.</p>
                                                                    </div>
                                                                @else
                                                                    <p>Remaining Subjects</p>


                                                                    <ul class="d-flex flex-wrap justify-content-center">
                                                                        @foreach ($facultiesSubjects[$faculty->id]['remaining_subjects'] as $remainingSubject)
                                                                            <li><a
                                                                                    href="{{ route('user.profile-evaluate', ['id' => $faculty->id, 'subject' => $remainingSubject, 'schedule' => $schedule->id]) }}">{{ $remainingSubject }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>



                                        </div>



                                </div>
                                @endif
                                @endif




                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
{{-- <div class="col-md-12">
                    <!-- Breadcrumb -->
                    <ul class="breadcrumbs  bg-white mb-4">
                        <li class="breadcrumbs__item">
                            <a href="http://localhost/News%20portal%20source%20code/public" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="javascirt:;" class="breadcrumbs__url">Evaluation Section</a>
                        </li>
                        @if ($valid == true)
                            <li class="breadcrumbs__item">
                                <a href="javascirt:;" class="breadcrumbs__url">{{ $schedule->semester }}
                                    {{ $schedule->academic_year }}</a>
                            </li>
                        @else
                            <li class="breadcrumbs__item">
                                <a href="javascirt:;" class="breadcrumbs__url">Evaluation is not available right now</a>
                            </li>
                        @endif

                    </ul>
                </div> --}}
