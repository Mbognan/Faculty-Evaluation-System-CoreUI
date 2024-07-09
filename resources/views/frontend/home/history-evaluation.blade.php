@extends('frontend.layouts.master')

@section('home')


<section id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.home.sidebar')
            </div>
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing shadow p-3 mb-5 bg-white rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Evaluation History</h4>
                        </div>

                        <div class="table-responsive">
                            {{ $dataTable->table() }}
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
