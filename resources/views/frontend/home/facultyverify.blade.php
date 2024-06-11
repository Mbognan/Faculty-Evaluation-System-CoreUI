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
                    <div class="my_listing shadow p-3 mb-5 bg-white rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Class List</h4>
                            <div>
                                <a href="{{ route('faculty.class-list.import') }}" class="btn btn-primary"><i class="fas fa-upload"></i> Import</a>
                                <a href="{{ route('faculty.addStudent.index') }}" class="btn btn-info text-white"><i class="fas fa-upload"></i> Add</a>
                            </div>
                        </div>
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
