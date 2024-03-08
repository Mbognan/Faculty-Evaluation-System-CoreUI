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

    .accordion-button {
    background-color: white !important;
    color: #fff;
}
</style>
{{-- @section('breadcrumbs')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Questions</span></li>
            </ol>
        </nav>
    </div>
@endsection --}}
@section('contents')

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header "><strong>Create Question Section</strong><span class="small ms-1 text-danger">*</span>
            </div>
            <div class="card-body">
    <div class="mb-3">
        <select name="status" class="form-select form-select-lg mb-3"
        aria-label=".form-select-lg example">
        <option >Select Evaluation Category</option>
        <option value="1">Enable</option>

    </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Create Questions</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

            </div>
        </div>
    </div>


        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header "><strong>Question Management Area</strong><span class="small ms-1 text-danger">*</span>
                </div>
                <div class="card-body">
    @foreach ($categories as $category)
        <div class="accordion mb-4" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-coreui-toggle="collapse"
                        data-coreui-target="#collapse{{ $category->id }}" aria-expanded="true"
                        aria-controls="collapse{{ $category->id }}">
                        {{ $category->title }}
                    </button>
                </h2>
                <div id="collapse{{ $category->id }}" class="accordion-collapse collapse"
                    data-coreui-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="post_sortable_{{ $category->id }}" class="post_list_ul">
                                    @foreach ($questions->where('category_id', $category->id) as $question)
                                        <tr class="ui-state-default" data-id="{{ $question->id }}">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                <a href="" class="ml-2"><i class="fa-solid fa-pen-to-square"></i></a>
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
        </div>
    @endforeach
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
            var category_id = $(this).attr('id').split('_')[2]; // Extract category ID from ID attribute

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
