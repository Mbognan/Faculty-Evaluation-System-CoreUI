@extends('admin.layouts.master')
<style>
    .post_list_ul {
        margin: 0px;
        padding: 5px;
    }

    .post_list_ul li {
        list-style: none;
        padding: 5px 10px 5px 30px;
        background: #fff;
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.3);
        margin-bottom: 10px;
        cursor: move;
        position: relative;
        font-size: 16px;
    }


    .post_list_ul li .pos_num {
        display: inline-block;
        padding: 2px 5px;
        /* width: 30px; */
        height: 20px;
        line-height: 17px;
        background: rgb(6, 160, 65);
        color: #fff;
        text-align: center;
        border-radius: 5px;
        position: absolute;
        left: -5px;
        top: 6px;
    }

    .post_list_ul li:hover {
        list-style: none;
        background: #7a49eb;
        color: #fff;
    }

    .post_list_ul li.ui-state-highlight {
        padding: 20px;
        background-color: #eaecec;
        border: 1px dotted #ccc;
        cursor: move;
        margin-top: 12px;
    }

    .post_list_ul .btn_move {
        display: inline-block;
        cursor: move;
        background: #ededed;
        border-radius: 2px;
        width: 30px;
        height: 30px;
        text-align: center;
        line-height: 30px;
    }


</style>

@section('contents')
<div class="fs-2 fw-semibold">Evaluation Questionare</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item">
        <!-- if breadcrumb is single--><span>Home</span>
      </li>
      <li class="breadcrumb-item active"><span> Questionare</span></li>
    </ol>
  </nav>
<hr>
<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <strong class="">Question Management Area</strong>
            <a href="" class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i> Create
            </a>
        </div>
        <div class="card-body">
            <div class="accordion mb-4" id="accordionExample">
                @foreach ($categories as $category)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-coreui-toggle="collapse"
                                data-coreui-target="#collapse{{ $category->id }}">
                                {{ $category->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                            data-coreui-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered border-primary">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Question</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="post_sortable_{{ $category->id }}" class="post_list_ul">
                                            @foreach ($questions->where('category_id', $category->id) as $question)
                                                <tr class="ui-state-default" data-id="{{ $question->id }}">
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $question->question }}</td>
                                                    <td>
                                                        <a href="" class="ml-2"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="" class="ml-2"><i
                                                                class="fas fa-trash text-danger"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.question.store') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <select name="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option>Select Evaluation Category</option>
                            @foreach ($categories as $category )
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
