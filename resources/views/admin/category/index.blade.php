@extends('admin.layouts.master');

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
<div class="container">
    <div class="card">
        <div class="card-header">Manage Category</div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
