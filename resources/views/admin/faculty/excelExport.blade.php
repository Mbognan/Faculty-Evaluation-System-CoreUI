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

                <div class="table-gap"></div>

                <table class="table table-bordered mt-4 mb-4" style="border-color: #343a40;">
                    <thead>
                        <tr>
                            <th  class="fw-bold">Category</th>
                            <th>Total result</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
                    <tbody id="post_sortable_" class="post_list_ul">
                        @foreach ($results as $result )
                        <tr class="ui-state-default" data-id="">
                            <td>{{$result->category->title }}</td>
                            <td>{{$result->results_by_category }}</td>
                            <td>25%</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>
