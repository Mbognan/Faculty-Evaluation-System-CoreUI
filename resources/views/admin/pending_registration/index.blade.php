@extends('admin.layouts.master');
@section('contents')

<div class="fs-2 fw-semibold">Manage Request</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span>Pending Registration</span></li>
    </ol>
  </nav>
  <hr>

  <div class="container">
    <div class="card mt-4 mb-6">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>Manage Pending Registration</span>
            <button  class="btn btn-info text-white rounded-pill"  type="button" data-bs-toggle="modal"
            data-bs-target="#exampleModal"><i class="cil-sync"></i> import</button>
        </div>
        <div class="card-body">
            <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
            {{ $dataTable->table() }}
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>

            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.registration.import-pending') }}"  enctype="multipart/form-data" >
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="file" name="import_file">
                    </div>
                    <button type="button" class="btn btn-outline-secondary active" data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-outline-primary active me-auto">import</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>

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
