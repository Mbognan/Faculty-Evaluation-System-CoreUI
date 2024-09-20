@extends('admin.layouts.master')


{{-- <link rel="stylesheet" href="{{ asset('admin/assets/css/yearpicker.css') }}" > --}}


@section('contents')
<div class="fs-2 fw-semibold">Academic Year</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span>Academic Year</span></li>
    </ol>
  </nav>
  <hr>
    <div class="container">
        <div class="card mt-4 mb-6">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Manage Academic Year</span>
                <a href="" class="btn btn-info text-white rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Create</a>
            </div>
            <div class="card-body">
                <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                {{ $dataTable->table() }}
                </table>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Evaluation Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.evaluation_schedule.store') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="yearpicker form-control" value="" name="selected_year" />
                        <label for="floatingInput">Academic Year</label>
                    </div>
                    <div class="form-floating">
                        <select name="semester" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example">
                            <option >Select Semester</option>
                            <option value="First Semester">First Semester</option>
                            <option value="Second Semester">Second Semester</option>

                        </select>
                    </div>
                    <div class="form-floating">
                        <select name="status" class="form-select form-select-lg mb-3"
                            aria-label=".form-select-lg example" >
                            <option value="2">Ongoing</option>
                        </select>
                    </div>

                    <button type="button" class="btn btn-outline-secondary active" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary active me-auto">Create</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>


    <div class="modal fade" id="editScheduleModal" tabindex="-1"  aria-labelledby="editScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Evaluation Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <input type="hidden" id="schedule_id" value="">
                        <div class="form-floating mb-3">
                            <input id="description" name="description" type="text" class="form-control" id="floatingInput" placeholder="">
                            <label for="floatingInput">Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="academic_year" type="text" class="yearpicker form-control" value="" name="selected_year" />
                            <label for="floatingInput">Academic Year</label>
                        </div>
                        <div class="form-floating">
                            <select id="semester" name="semester" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example">
                                <option value="">Select Semester</option>
                                <option value="first_semester">First Semester</option>
                                <option value="second_semester">Second Semester</option>

                            </select>
                        </div>
                        <div class="form-floating">
                            <select id="status" name="status" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example" >
                                <option value="2">Ongoing</option>
                                <option value="1">Closed</option>
                            </select>
                        </div>

                        <button type="button" class="btn btn-outline-secondary active" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary active me-auto update_schedules">Save changes</button>

                </div>
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('admin/assets/js/yearpicker.js') }}"></script>

<script src="https://cdn.tailwindcss.com/"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.tailwindcss.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>


        $('#exampleModal').on('shown.bs.modal', function () {
            $(".yearpicker").yearpicker({
                year: 2021,
                startYear: 2018,
                endYear: 2060,
            });
        });


$(document).ready(function() {
    $('#evaluationschedule-table').on('click', '.edit-item', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var scheduleId = href.substring(href.lastIndexOf('/') + 1);


        var url = "{{ route('admin.evaluation_schedule.edit', ':id') }}";
        url = url.replace(':id', scheduleId);
        $('#editScheduleModal').modal('show');
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                if (response.status === '200') {


                    $('#semester').append($('<option>').text(response.schedules.semester).attr(
                        'value', response.schedules.semester));
                    $('#description').val(response.schedules.description);
                    $('#academic_year').val(response.schedules.academic_year);
                    $('#status').val(response.schedules.evaluation_status);
                    $('#schedule_id').val(scheduleId);
                } else {

                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });

    $(document).on('click', '.update_schedules', function(e) {
        e.preventDefault();
        var scheduleId = $('#schedule_id').val();
        var data = {
            'semester': $('#semester').val(),
            'description': $('#description').val(),
            'academic_year': $('#academic_year').val(),
            'status': $('#status').val(),
            '_token': "{{ csrf_token() }}",
        };

        console.log(scheduleId);
        $.ajax({
            url: "{{ route('admin.evaluation_schedule_update', ':id') }}".replace(':id', scheduleId),
            method: "PUT",
            data: data,
            success: function(response) {
                console.log('Success:', response);


// Optionally, close the modal and refresh the table
    $('#editScheduleModal').modal('hide');
    location.reload();


            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText);
                location.reload();
            }
        });
    });



});




    </script>
@endpush
