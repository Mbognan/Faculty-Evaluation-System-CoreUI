<!DOCTYPE html>
<html>
<head>
    <title>Subject Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: yellow;
        }
    </style>
</head>
<body>



<table>
    <tr>
        <th colspan="30" style="background-color: yellow">{{ $subject }}</th>
    </tr>
    @foreach($results->groupBy('category_id') as $categoryId => $resultsByCategory)
    <tr>
        <th style="background-color: yellow" colspan="17">{{ $resultsByCategory->first()->category->title }}</th>
    </tr>
    <tr>
        <td>STUDENT</td>
        @php $counter = 1; @endphp
        @foreach($resultsByCategory as $result)
            <td>S{{ $counter++ }}</td>
        @endforeach
    </tr>
    <tr>
        <td>RATING</td>
        @foreach($resultsByCategory as $result)
            <td>{{ $result->results_by_category }}</td>
        @endforeach
    </tr>
    @endforeach
</table>


</body>
</html>
