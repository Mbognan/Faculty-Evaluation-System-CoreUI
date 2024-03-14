@extends('admin.layouts.master')

<style>
    .dynamic-col {
        overflow-wrap: break-word;
    }

    .table-gap {
        margin-bottom: 7rem !important;
    }


</style>

@section('contents')
    <div class="fs-2 fw-semibold mb-4">Evaluation Questionnaire</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span> Questionnaire</span></li>
        </ol>
    </nav>
    <hr>

    <div class="mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="mb-8">
                    </div>
                    <div class="btn-toolbar d-none d-md-block mb-8" role="toolbar" aria-label="Toolbar with buttons">
                        <button class="btn btn-info text-white" type="button">Print Evaluation
                            <svg class="icon">
                                <use
                                    xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-cloud-download') }}">
                                </use>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <h4 class="card-title mb-0 text-center">Instrument For Instruction/Teaching Performance</h4>
                        <div class="small text-medium-emphasis text-center">Rating Period 2022-2023</div>
                    </div>
                </div>

                <table class="table table-bordered bordered-dark mt-4 mb-4" style="border-color: #343a40;">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">SCALE</th>
                            <th class="text-center" scope="col">DESCRIPTIVE RATING</th>
                            <th scope="col">QUALITATIVE DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">5</th>
                            <td class="text-center">Outstanding</td>
                            <td>The performance almost exceeds the job requirements. The Faculty is an exceptional role
                                model</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">4</th>
                            <td class="text-center">Very Satisfactory</td>
                            <td>The performace meets and often exceeds the job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">3</th>
                            <td class="text-center">Satisfactory</td>
                            <td>The performance meets the job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">2</th>
                            <td class="text-center">Fair</td>
                            <td>The performance needs some development to meet job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1</th>
                            <td class="text-center">Poor</td>
                            <td>The faculty fails to meet the job requirements</td>
                        </tr>
                    </tbody>
                </table>

                <div class="table-gap"></div>

                <div class="row justify-content-center mb-2">
                    <div class="col-md-6">
                        <h4 class="card-title mb-0 text-center">Question</h4>
                        <div class="small text-medium-emphasis text-center">Rating Period 2022-2023</div>
                    </div>
                </div>
                @foreach ($categories as $category)

                    <table class="table table-bordered mt-4 mb-4" style="border-color: #343a40;">
                        <thead>
                            <tr>

                                <th scope="col" class="fw-bold">{{ $category->title }}</th>
                                <th class="text-center" colspan="5" scope="col" >Scale</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="post_sortable_{{ $category->id }}" class="post_list_ul">
                            @foreach ($questions->where('category_id', $category->id) as $question)
                                <tr class="ui-state-default" data-id="{{ $question->id }}">

                                    <td>{{ $loop->index + 1 }}. {{ $question->question }}</td>
                                    <td class="text-center" style="width: 20px;">1</td>
                                    <td class="text-center" style="width: 20px;">2</td>
                                    <td class="text-center" style="width: 20px;">3</td>
                                    <td class="text-center" style="width: 20px;">4</td>
                                    <td class="text-center" style="width: 20px;">5</td>
                                    <td style="width: 90px;">
                                        <div style="display: flex;">
                                            <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="" class="delete-item btn btn-sm btn-danger ml-2" style="margin-left: 5px;"><i class="fas fa-trash text-white"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @endforeach
                <div class="text-end">
                    <button class="btn btn-info text-white" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Add Evaluation Question
                    </button>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>

                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.question.store') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <select name="category" class="form-select form-select-lg mb-3"
                                aria-label=".form-select-lg example">
                                <option>Select Evaluation Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-floating">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Create Questions</label>
                                <textarea name="question" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary active"
                            data-bs-dismiss="modal">Close</button>
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
    <script>
        $(document).ready(function() {
            $("tbody[id^='post_sortable']").sortable({
                placeholder: "ui-state-highlight",
                update: function(event, ui) {
                    var post_order_ids = [];
                    var category_id = $(this).attr('id').split('_')[
                        2]; // Extract category ID from ID attribute

                    $(this).find('tr').each(function() {
                        post_order_ids.push($(this).data("id"));
                    });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('admin.post.order_change') }}",
                        dataType: "json",
                        data: {
                            order: post_order_ids,
                            category_id: category_id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            $('#' + $(this).attr('id') + ' tr').each(function(index) {
                                $(this).find('td:first').text(index + 1);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
