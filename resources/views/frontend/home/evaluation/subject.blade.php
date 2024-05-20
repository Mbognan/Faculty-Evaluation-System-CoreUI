@extends('frontend.layouts.master')
{{-- <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/cards/card-1/assets/css/card-1.css"> --}}
@section('home')
<!-- Card 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 blog_pages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Breadcrumb -->
                <ul class="breadcrumbs  bg-white mb-4">
                    <li class="breadcrumbs__item">
                        <a href="http://localhost/News%20portal%20source%20code/public" class="breadcrumbs__url">
                            <i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="javascirt:;" class="breadcrumbs__url">Evaluation Section</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="javascirt:;" class="breadcrumbs__url">Subjects</a>
                    </li>

                </ul>
            </div>
        </div>
      <div class="row justify-content-center">

        <div class="col-12 col-lg-10 col-xl-8 col-xxl-7">
            @if ($remainingSubjects->isEmpty())

                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading"><i class="fas fa-thumbs-up"></i> All subjects evaluated!</h4>
                    <p>You have completed evaluations for all your subjects for this faculty.</p>
                </div>
            @else
          <div class="row gy-4 ">
            @foreach ($remainingSubjects as $subject )
            <div class="mb-4 col-12 col-sm-6" >
                <div class="card widget-card border-light shadow-sm">
                  <div class="card-body p-4" style="border: solid">
                    <div class="row">
                      <div class="col-8">
                        <h5 class="card-title widget-card-title mb-3">{{ $faculty->first_name }}{{ $faculty->last_name }}</h5>
                        <h4 class="card-subtitle text-body-secondary m-0">{{ $subject }}</h4>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                             <a href="{{ route('user.profile-evaluate',['id' => $faculty->id, 'subject' => $subject,'schedule' => $schedule->id]) }}">  <i class="fas fa-location-arrow"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            @endif


            {{-- <div class="col-12 col-sm-6">
              <div class="card widget-card border-light shadow-sm">
                <div class="card-body p-4" style="border: solid">
                  <div class="row">
                    <div class="col-8">
                      <h5 class="card-title widget-card-title mb-3">Janeth Aclao</h5>
                      <h4 class="card-subtitle text-body-secondary m-0">IT 118L</h4>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-end">
                        <div class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="card widget-card border-light shadow-sm">
                <div class="card-body p-4" style="border: solid">
                  <div class="row">
                    <div class="col-9">
                      <h5 class="card-title widget-card-title mb-3">Janeth Aclao</h5>
                      <h4 class="card-subtitle text-body-secondary m-0">IT 119L</h4>
                    </div>
                    <div class="col-3">
                      <div class="d-flex justify-content-end">
                        <div class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="card widget-card border-light shadow-sm">
                <div class="card-body p-4" style="border: solid">
                  <div class="row">
                    <div class="col-9">
                      <h5 class="card-title widget-card-title mb-3">Janeth S Aclao</h5>
                      <h4 class="card-subtitle text-body-secondary"> MS-102</h4>
                    </div>
                    <div class="col-3">
                      <div class="d-flex justify-content-end">
                        <div class="lh-1 text-white bg-info rounded-circle p-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
