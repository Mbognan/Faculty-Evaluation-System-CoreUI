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
                    <div class="my_listing shadow p-3 mb-5 bg-white rounded">
                        <h4 style="justify-content: space-between">Class List <a href="{{ route('faculty.class-list.import') }}" class="btn btn-primary"><i class="fas fa-upload"></i> Import</a>
                        </h4>
                        {{ $dataTable->table() }}
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
