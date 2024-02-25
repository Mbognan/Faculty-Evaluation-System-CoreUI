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
@section('breadcrumbs')
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
@endsection
@section('contents')

@foreach ($categories as $category )
<div class="container">
    <div class="card mt-4"> <!-- Added mt-3 class for margin-top -->
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>{{ $category->title }}</span>

        </div>
        <div class="card-body">
            <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul id="post_sortable" class="post_list_ul">
                                    @foreach ($questions->where('category_id',$category->id) as $question)
                                    <li class="ui-state-default" data-id="{{ $question->id }}">
                                        <span class="pos_num">{{ $loop->index + 1 }}</span>
                                        <span>{{ $question->question }}</span>
                                    </li>
                                    @endforeach


                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
</div>

@endforeach





@endsection
@push('scripts')

<script>

</script>

@endpush
