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
