@extends('frontend.layouts.master')

@section('home')
<section class="fp__dashboard mt_70 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <div class="fp__dashboard_area">
            <div class="row">
                <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">

                </div>

                <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__dashboard_content">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="fp_dashboard_body">
                        <h3>order list</h3>
                        <div class="fp_dashboard_order">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section >
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.home.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing" style="border: solid">
                            <h4 >Import Excel File<span class="text-danger">*Note it is recommended to follow the format of the DataTable</span>
                            </h4>
                            <form method="POST" action="{{ route('faculty.class-list.upload') }}"  enctype="multipart/form-data">
                                @csrf
                                <input name="users" type="file">
                                <input type="hidden" name="faculty_id" value="{{ auth()->user()->id }}">
                                <button style="margin-top:10px" type="submit" class="btn btn-primary">Import</button>
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
