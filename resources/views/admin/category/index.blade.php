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
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manage Category</span>
                <a href="" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Create</a>
            </div>
            <div class="card-body">
                <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                {{ $dataTable->table() }}
                </table>
            </div>
        </div>
    </div>
    <div class="container">

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="title" type="text" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput">Category</label>
                        </div>
                        <div class="form-floating">
                            <select name="status" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example">
                                <option >Select Status</option>
                                <option value="1">Enable</option>
                                <option value="2">Disable</option>

                            </select>
                        </div>

                        <button type="button" class="btn btn-outline-secondary active" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary active me-auto">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
