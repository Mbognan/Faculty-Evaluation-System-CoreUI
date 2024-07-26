@extends('frontend.layouts.master')




@section('home')
<style>
       .dataTables_filter {
    margin-bottom: 20px;
}
</style>
    <section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Evaluation History</h1>
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
                                <div class="table-responsive">
                                    <table class="">
                                        {{ $dataTable->table() }}
                                    </table>
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




    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
