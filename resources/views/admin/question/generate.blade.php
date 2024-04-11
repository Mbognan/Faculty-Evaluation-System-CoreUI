<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Pdf</title>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.form-heading {
            text-align: center;
            margin-bottom: 5px; /* Adjust as needed */
        }
        .rating-period {
            text-align: center;
        }
        .table-gap{
            margin: 15px;
        }
    </style>
</head>
<body>
    <div class="mb-4">
        <div class="card mb-4">
            <div class="card-body">

                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <h4 class="card-title mb-0  form-heading">Instrument For Instruction/Teaching Effectiveness</h4>
                        <div class="small text-medium-emphasis rating-period">Rating Period 2022-2023</div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">SCALE</th>
                            <th class="" scope="col">DESCRIPTIVE RATING</th>
                            <th scope="col">QUALITATIVE DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">5</th>
                            <td class="">Outstanding</td>
                            <td>The performance almost exceeds the job requirements. The Faculty is an exceptional role
                                model</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">4</th>
                            <td class="text-center">Very Satisfactory</td>
                            <td>The performance meets and often exceeds the job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">3</th>
                            <td class="">Satisfactory</td>
                            <td>The performance meets the job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">2</th>
                            <td class="">Fair</td>
                            <td>The performance needs some development to meet job requirements</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">1</th>
                            <td class="">Poor</td>
                            <td>The faculty fails to meet the job requirements</td>
                        </tr>
                    </tbody>
                </table>

                <div class="table-gap"></div>
                @foreach ($categories as $category)
                <table class="table table-bordered mt-4 mb-4" style="border-color: #343a40;">
                    <thead>
                        <tr>

                            <th scope="col" class="fw-bold">{{ $category->title }}</th>
                            <th class="text-center" colspan="5" scope="col">Scale</th>
                        </tr>
                    </thead>
                    <tbody id="post_sortable_{{ $category->id }}" class="post_list_ul">
                        @foreach ($questions->where('category_id', $category->id) as $question)
                        <tr class="ui-state-default" data-id="{{ $question->id }}">

                            <td> {{ $question->question }}</td>
                            <td class="text-center" style="width: 20px;">1</td>
                            <td class="text-center" style="width: 20px;">2</td>
                            <td class="text-center" style="width: 20px;">3</td>
                            <td class="text-center" style="width: 20px;">4</td>
                            <td class="text-center" style="width: 20px;">5</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
