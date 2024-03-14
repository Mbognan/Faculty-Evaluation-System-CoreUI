@extends('admin.layouts.master')

@section('breadcrumbs')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Category</span></li>
                <li class="breadcrumb-item active"><span>Datatable</span></li>
            </ol>
        </nav>
    </div>
@endsection

@section('contents')

<div class="fs-2 fw-semibold">Faculty</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span> Faculty</span></li>
    </ol>
  </nav>
  <hr>
    <div class="container">
        <div class="card mt-4 mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>List Of Faculty</span>
                <a href="{{ route('admin.faculty.create') }}" class="btn btn-info text-white rounded-pill"> <i class="fa fa-plus"></i> Create</a>
            </div>
            <div class="card-body">
                <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                {{ $dataTable->table() }}
                </table>
            </div>
        </div>
    </div>





@endsection
@push('scripts')

<script src="https://cdn.tailwindcss.com/"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.tailwindcss.js"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
