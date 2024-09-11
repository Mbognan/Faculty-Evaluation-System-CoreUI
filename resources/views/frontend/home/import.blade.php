@extends('frontend.layouts.master')

@section('home')

<link rel="stylesheet" href="{{ asset('css/filepond.css') }}">
<section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>user </h1>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="#">import</a></li>
                </ul>
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
    <script src="{{ asset('dist/filepond.js') }}"></script>
    <script>
         // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    </script>

@endsection
@push('scripts')


@endpush
