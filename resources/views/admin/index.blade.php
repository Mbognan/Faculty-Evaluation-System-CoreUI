@extends('admin.layouts.master')


<style>
    @import url("https://code.highcharts.com/css/highcharts.css");


    .custom-link {
        color: black;
        text-decoration: none;
        transition: color 0.4s ease;
    }

    .custom-link:hover {
        color: #6f42c1;
        text-decoration: underline;
    }

    .progress-bar-container {
        display: flex;
        width: 100%;
        height: 10px;
        background-color: #f1f7ff;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 10px;
        margin-left: 10px
    }

    .progress-bar {
        height: 100%;
        margin-right: 3px;
    }




    .labels {
        display: flex;
        /* justify-content: space-between; */
        flex-wrap: wrap;
    }

    .labels ul {

        padding: 0;
        margin: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .labels li {
        display: flex;
        align-items: center;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px;
        margin-left: 30px
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .highcharts-yaxis .highcharts-axis-line {
        stroke-width: 2px;
    }

    /* Link the series colors to axis colors */
    .highcharts-color-p {
        fill: #7cb5ec;
        stroke: #7cb5ec;
    }

    .highcharts-axis.highcharts-color-p .highcharts-axis-line {
        stroke: #7cb5ec;
    }

    .highcharts-axis.highcharts-color-p text {
        fill: #7cb5ec;
    }

    .highcharts-color-1 {}

    .highcharts-axis.highcharts-color-1 .highcharts-axis-line {}

    .highcharts-axis.highcharts-color-1 text {}

    .btn {
        background-color: transparent;
        /* Remove background color */
        color: white;
        /* Text color */
        border: 2px solid #17a2b8;
        /* Border color */
        padding: 10px 20px;
        /* Padding */
        font-size: 16px;
        /* Font size */
        cursor: pointer;
        /* Cursor pointer */
        transition: box-shadow 0.3s ease;
        /* Smooth transition for shadow */
        border-radius: 5px;
        /* Rounded corners */
        display: inline-flex;
        /* Centering content horizontally */
        align-items: center;
        /* Centering content vertically */
        gap: 5px;
        /* Space between text and icon */
    }

    .btn:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Shadow on hover */
    }

    .center-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
</style>

@section('contents')
    @if ($allDataEmpty)
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-primary">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $totalSudent }} <span class="fs-6 fw-normal">
                                    <i class="fas fa-user-graduate"></i></span></div>
                            <div>All Student Registered</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                    </use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                    href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                    class="dropdown-item" href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-info">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">{{ $facultyCount }} <span class="fs-6 fw-normal">
                                    <i class="fas fa-chalkboard-teacher"></i></span></div>
                            <div>BSIT Department faculty</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                    </use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                    href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                    class="dropdown-item" href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-warning">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">46 <span class="fs-6 fw-normal">

                                </span></div>
                            <div>Average for this Semester</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                    </use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                    href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                    class="dropdown-item" href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                        <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card mb-4 text-white bg-danger">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fs-4 fw-semibold">44%</span></div>
                            <div>Satisfactory of the Student</div>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}">
                                    </use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                    href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a
                                    class="dropdown-item" href="#">Something else here</a></div>
                        </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        {{-- combine bar and line chart --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <div id="container2"></div>
                        <div class="row">
                            <div class="col">
                                <div class="card-title fs-4 fw-semibold">Summary Report</div>
                                <div class="card-subtitle text-secondary mb-4 d-flex justify-content-between mb-4">


                                    <div>
                                        <button id="switch" class="btn btn-info text-white d-flex align-items-center">
                                            switch
                                            <lord-icon src="https://cdn.lordicon.com/ogkflacg.json" trigger="hover"
                                                colors="primary:#ffffff" style="height:25px">
                                            </lord-icon>
                                        </button>
                                    </div>

                                    <!-- Right-aligned Button -->
                                    {{-- <div>
                                        <button id="right-switch"
                                            class="btn btn-info text-white d-flex align-items-center">
                                            Right Switch
                                            <lord-icon src="https://cdn.lordicon.com/ogkflacg.json" trigger="hover"
                                                colors="primary:#ffffff" style="height:25px">
                                            </lord-icon>
                                        </button>
                                    </div> --}}


                                </div>
                            </div>
                            <div class="col-auto ms-auto">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-9">
                                <div class="table-responsive">
                                    <table id="data-table" class="table mb-0 table border" data-toggle="default"
                                        style="border: 5px">
                                        <thead class=" table-light fw-semibold">
                                            <tr class="align-middle">
                                                <th class="text-center">
                                                    <svg class="icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people">
                                                        </use>
                                                    </svg>
                                                </th>
                                                <th>User</th>
                                                <th class="">Avg. for Commitment</th>
                                                <th>Avg. for Knowledge of the Subject</th>
                                                <th>Avg. for Teaching of Effectiveness</th>
                                                <th>Avg. for Management of learning</th>
                                                <th align="right">Total Average</th>
                                            </tr>
                                        </thead>


                                        <tbody class="">
                                            @foreach ($facultyData as $faculty)
                                                <tr class="align-middle">
                                                    <td class="text-center">
                                                        <div class="avatar avatar-lg"><img class="avatar-img"
                                                                src="{{ $faculty['avatar'] }}" alt="user@email.com"><span
                                                                class="avatar-status bg-success"></span></div>
                                                    </td>
                                                    <td>
                                                        <div class="text-nowrap">{{ $faculty['firstName'] }}
                                                            {{ $faculty['lastName'] }}
                                                        </div>
                                                        <div class="small text-body-secondary text-nowrap"><span
                                                                data-coreui-i18n="new">BSIT</span> | <span
                                                                data-coreui-i18n="registered">Registered: </span><span
                                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                                10, 2023</span></div>
                                                    </td>


                                                    <td align="right">
                                                        {{ $faculty['commitment_percent'] }}%
                                                    </td>
                                                    <td align="right">
                                                        {{ $faculty['knowledge_percent'] }}%
                                                    </td>
                                                    <td align="right">
                                                        {{ $faculty['teaching_percent'] }}%
                                                    </td>
                                                    <td class="" align="right">
                                                        {{ $faculty['management_percent'] }}%
                                                    </td>
                                                    <td align="right">
                                                        {{ $faculty['totalPercentage'] }}%
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-3 ">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5>About</h5>
                                    <a>
                                        <lord-icon src="https://cdn.lordicon.com/lecprnjb.json"
                                            trigger="hover"></lord-icon>
                                    </a>
                                </div>
                                <div class="text-italic text-secondary">No brief description, or topic provided.</div>
                                <div class="mt-4">
                                    <a class="custom-link" href="{{ route('admin.evaluation_schedule.index') }}">
                                        <i class="icon  cil-star"></i> Evaluation Date: January 1, 2024</a>
                                </div>

                                <hr>
                                <div class="mt-2 center-container">
                                    <h5>BSIT Department Result</h5>
                                    <div class="pie"
                                        data-pie='{ "percent": {{ $OverallDepartmentPercentageFormatted }}, "colorSlice": "#24ACFE", "colorCircle": "#f1f1f1", "fontWeight": 100 }'
                                        data-pie-index="2" style="width:200px;height:200px;"></div>
                                    <div class="labels">
                                        <li>
                                            <span class="dot" style="background-color: #24ACFE;"></span> Percentage
                                        </li>


                                    </div>
                                </div>
                                <hr>
                                <div class="mt-2 center-container">
                                    <h6>BSIT Students</h6>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar"
                                            style="width: {{ $verifiedper }}%; background-color: #3399FF;"
                                            title="{{ $verifiedper }}%"></div>
                                        <div class="progress-bar"
                                            style="width: {{ $pendingper }}%; background-color: #f1e05a;"
                                            title="{{ $pendingper }}%"></div>
                                        <div class="progress-bar"
                                            style="width: {{ $rejectedper }}%; background-color: #e34c26;"
                                            title="{{ $rejectedper }}%"></div>
                                    </div>
                                    <div class="labels">
                                        <li>
                                            <span class="dot" style="background-color: #3399FF;"></span> Verified
                                            {{ $verified }}
                                        </li>
                                        <li>
                                            <span class="dot" style="background-color: #e34c26;"></span> rejected
                                            {{ $rejected }}
                                        </li>

                                        <li>
                                            <span class="dot" style="background-color: #f1e05a;"></span> Pending
                                            {{ $pending }}
                                        </li>

                                    </div>
                                </div>


                                {{-- <hr>
                            <h5 class="mb-4 text-bold">Sentiment Analysis</h5>
                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: 80%; background-color: #26e34c;"
                                    title="Positive 80%"></div>
                                <div class="progress-bar" style="width: 15%; background-color: #e34c26;"
                                    title="Negative 15%"></div>
                                <div class="progress-bar" style="width: 5%; background-color: #f1e05a;"
                                    title="Neutral 5%"></div>
                            </div>
                            <div class="labels">
                                <li>
                                    <span class="dot" style="background-color: #26e34c;"></span> Positive 80%
                                </li>
                                <li>
                                    <span class="dot" style="background-color: #e34c26;"></span> Negative 15%
                                </li>

                                <li>
                                    <span class="dot" style="background-color: #f1e05a;"></span> Neutral 5%
                                </li>

                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-body p-4">

                                    <div id="container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-body p-4">
                                    <div id="container3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        {{-- bar chart and pie --}}

        {{-- bar sentiment analysis --}}
        <div class="row">
            <div class="col-xl-6 mb-4">
                <div id="containerSentiment"></div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-4 col-xl-12">
                        <div class="card mb-4 text-black bg-primary-gradient">
                            <div id="wordcloudContainer"></div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-success px-3 mb-3"><small
                                            class="text-medium-emphasis">Postive</small>
                                        <div class="fs-5 fw-semibold">9.123</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-danger px-3 mb-3"><small
                                            class="text-medium-emphasis">Negative</small>
                                        <div class="fs-5 fw-semibold">22.643</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-start border-start-4 border-start-warning px-3 mb-3"><small
                                            class="text-medium-emphasis">Neutral</small>
                                        <div class="fs-5 fw-semibold">22.643</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4 col-xl-12">
                    <div class="card mb-4 text-black bg-warning-gradient">
                        <div id="halfpie"></div>
                    </div>
                </div> --}}
                </div>

            </div>
        </div>
        </div>
    @else
        <div class="alert alert-primary" role="alert">
            <i class="fas fa-info-circle"></i> No data available. Please check back later or contact support if you believe
            this is an error.
        </div>
    @endif

@endsection
@push('scripts')
    <script src="{{ asset('dist/circularProgressBar.min.js') }}"></script>
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/series-label.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('admin/code/modules/wordcloud.js') }}"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const circle = new CircularProgressBar('pie');
            circle.initial();


            document.getElementById('switch').addEventListener('click', function() {

    const tableBody = document.querySelector('#data-table tbody');
    const isDefaultData =  tableBody.dataset.toggle === 'default';



    const defaultData = @json($facultyData)

    const alternateData = defaultData.map(faculty => ({
        ...faculty,
        commitment_avg: faculty.commitment_percent + '%',
        knowledge_avg: faculty.knowledge_percent + '%',
        teaching_avg: faculty.teaching_percent + '%',
        management_avg: faculty.management_percent + '%',
        total: faculty.totalPercentage + '%'
    }))



    const dataToUse = isDefaultData ? alternateData : defaultData;



    tableBody.innerHTML = '';

    dataToUse.forEach(faculty => {
        const row = document.createElement('tr');
        row.classList.add('align-middle');
        row.innerHTML = `
            <td class="text-center">
                <div class="avatar avatar-lg"><img class="avatar-img" src="${faculty.avatar}" alt="${faculty.firstName} ${faculty.lastName}"><span class="avatar-status bg-success"></span></div>
            </td>
            <td>
                <div class="text-nowrap">${faculty.firstName} ${faculty.lastName}</div>
                <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> | <span data-coreui-i18n="registered">Registered: </span><span data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 10, 2023</span></div>
            </td>
            <td class="" align="right">${faculty.commitment_avg}</td>
            <td align="right">${faculty.knowledge_avg}</td>
            <td align="right">${faculty.teaching_avg}</td>
            <td class="" align="right">${faculty.management_avg}</td>
            <td align="right">${faculty.total}</td>
        `;
        tableBody.appendChild(row);
    });

                // Toggle data attribute
                tableBody.dataset.toggle = isDefaultData ? 'alternate' : 'default';
});

            var Averages = @json($facultyAverages);
            var facultyAverages = @json($categoryAverages);

            let data2 = [];

            for (let facultyId in Averages) {
                if (Averages.hasOwnProperty(facultyId)) {
                    data2.push(parseFloat(Averages[facultyId]));
                }
            }

            var facultyCategoryAverages = @json($facultyCategoryAverages);
            var categories =  @json($categorz);
            let facultyIds = Object.keys(facultyCategoryAverages);
            let categoryIDs = Object.keys(categories);

            let seriesData = categoryIDs.map(categoryId => ({
                    name: categories[categoryId],
                    data: []
                }));

            facultyIds.forEach(facultyId => {
                categoryIDs.forEach((categoryId, index) => {
                    let value = parseFloat(facultyCategoryAverages[facultyId][categoryId]);
                    seriesData[index].data.push(value);
                });
            });

            //bar and line chart
            Highcharts.chart('container2', {
                title: {
                    text: 'Average of Each faculty of BSIT Department',
                    align: 'left'
                },
                xAxis: {
                    categories: facultyIds
                },
                yAxis: {
                    title: {
                        text: 'Average'
                    },
                    min: 0, // Minimum value for y-axis
                    max: 30
                },
                tooltip: {
                    valueSuffix: ' Average'
                },
                exporting: {
                    enabled: false,
                },


                plotOptions: {
                    series: {
                        borderRadius: '25%'
                    }
                },
                series: [{
                        type: 'column',
                        name: 'Commitment',
                        data: seriesData[0].data
                    },
                    {
                        type: 'column',
                        name: 'Knowledge of the subject',
                        data: seriesData[1].data
                    },
                    {
                        type: 'column',
                        name: 'Teaching effectiveness',
                        data: seriesData[2].data
                    },
                    {
                        type: 'column',
                        name: 'Management Learning',
                        data: seriesData[3].data
                    },
                    {
                        type: 'line',
                        step: 'center',
                        name: 'Average',
                        data: data2,
                        marker: {
                            lineWidth: 2,
                            lineColor: Highcharts.getOptions().colors[5],
                            fillColor: 'white'
                        }
                    }
                ]
            });

            // bar race chart
            let facultyAveragesBarChart = @json($facultyAveragesBarChart);
            let faculty_name = Object.keys(facultyAveragesBarChart);
            let averages = Object.values(facultyAveragesBarChart);
            averages = averages.map(value => parseFloat(value));


            Highcharts.chart('container', {
                chart: {
                    type: 'bar',
                    height: 600,
                },
                title: {
                    text: 'Top Performace of BSIT Faculty'
                },
                xAxis: {
                    categories: faculty_name
                },
                series: [{
                    name: 'Performance',
                    data: averages
                }],
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            inside: false,
                            color: '#000',
                            align: 'right',
                            formatter: function() {
                                return this.y + '%';
                            },
                            distance: 10
                        }
                    }
                },
                tooltip: {
                    valueSuffix: '%'
                },
                exporting: {
                    enabled: false,
                },



            });



            //pie chart

            var overallCategoryResult = @json($overallCategoryAverages);
            console.log(overallCategoryResult);
            var labelsRadar = Object.keys(overallCategoryResult);
            var dataRadar = Object.values(overallCategoryResult);


            Highcharts.chart('container3', {
                chart: {
                    type: 'pie',
                    height: 600,
                    custom: {},
                    events: {
                        render() {
                            const chart = this,
                                series = chart.series[0];
                            let customLabel = chart.options.chart.custom.label;

                            if (!customLabel) {
                                customLabel = chart.options.chart.custom.label =
                                    chart.renderer.label(
                                        'Overall<br/>' +
                                        '<strong>75.31 %</strong>'
                                    )
                                    .css({
                                        color: '#000',
                                        textAnchor: 'middle'
                                    })
                                    .add();
                            }

                            const x = series.center[0] + chart.plotLeft,
                                y = series.center[1] + chart.plotTop -
                                (customLabel.attr('height') / 2);

                            customLabel.attr({
                                x,
                                y
                            });
                            // Set font size based on chart diameter
                            customLabel.css({
                                fontSize: `${series.center[2] / 12}px`
                            });
                        }
                    }
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                title: {
                    text: 'BSIT Department Overall Evaluation'
                },
                exporting: {
                    enabled: false
                },
                subtitle: {
                    text: 'Source: <a href="https://www.ssb.no/transport-og-reiseliv/faktaside/bil-og-transport">2021-2022 1st Semester</a>'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        borderRadius: 8,
                        dataLabels: [{
                            enabled: true,
                            distance: 20,
                            format: '{point.name}'
                        }, {
                            enabled: true,
                            distance: -15,
                            format: '{point.percentage:.0f}%',
                            style: {
                                fontSize: '0.9em'
                            }
                        }],
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Registrations',
                    colorByPoint: true,
                    innerSize: '65%',
                    data: [{
                        name: 'Commitment',
                        y: 23.9
                    }, {
                        name: 'Knowledge of the subject',
                        y: 12.6
                    }, {
                        name: 'Management Learning',
                        y: 37.0
                    }, {
                        name: 'Teaching Effectiveness',
                        y: 26.4
                    }]
                }]
            });





            const sentimentAnalysis = @json($overallSentimentAnalysisByFaculty);
            const sentimentName = Object.keys(sentimentAnalysis);
            const sentiments = Object.values(sentimentAnalysis);

            const negativeData = sentiments.map(s => s.negative)
            const positiveData = sentiments.map(s => s.positive)





            // bar chart sentiment
            Highcharts.chart("containerSentiment", {
                chart: {
                    type: "column",
                    styledMode: true,
                },

                title: {
                    text: "Sentimet Analysis Per Faulty",
                    align: "left",
                },

                exporting: {
                    enabled: false,
                },



                xAxis: {
                    categories: sentimentName,
                },

                yAxis: [{
                        // Primary axis
                        min: 0,
                        max: 100,
                        tickInterval: 10,
                        className: "highcharts-color-0",
                        title: {
                            text: "Positive",
                        },
                    },
                    {
                        // Secondary axis
                        min: 0,
                        max: 100,
                        tickInterval: 10,
                        className: "highcharts-color-1",
                        opposite: true,
                        title: {
                            text: "Negative",
                        },
                    },
                ],

                plotOptions: {
                    column: {
                        borderRadius: 5,
                    },
                },

                series: [{
                        name: "Postive",
                        data: positiveData,
                        tooltip: {
                            valueSuffix: "%",
                        },
                    },
                    {
                        name: "Negative",
                        data: negativeData,
                        yAxis: 1,
                    },
                ],
            });



            //wordcloud

            const comments = @json($comments);
            const text = comments.join(" ");
            lines = text.replace(/[():'?0-9]+/g, "").split(/[,\. ]+/g),
                data = lines.reduce((arr, word) => {
                    let obj = Highcharts.find(arr, (obj) => obj.name === word);
                    if (obj) {
                        obj.weight += 1;
                    } else {
                        obj = {
                            name: word,
                            weight: 1,
                        };
                        arr.push(obj);
                    }
                    return arr;
                }, []);


            const minWeight = 2; // You can adjust this value as needed
            const filteredData = data.filter(word => word.weight >= minWeight);


            Highcharts.chart("wordcloudContainer", {
                accessibility: {
                    screenReaderSection: {
                        beforeChartFormat: "<h5>{chartTitle}</h5>" +
                            "<div>{chartSubtitle}</div>" +
                            "<div>{chartLongdesc}</div>" +
                            "<div>{viewTableButton}</div>",
                    },
                },
                series: [{
                    type: "wordcloud",
                    data: filteredData,
                    name: "Occurrences",
                }, ],
                title: {
                    text: "Most Common words",
                    align: "left",
                },
                subtitle: {
                    text: "Sentiment Analysis",
                    align: "left",
                },
                tooltip: {
                    headerFormat: '<span style="font-size: 16px"><b>{point.key}</b>' + "</span><br>",
                },
                exporting: {
                    enabled: false,
                }
            });


        });
    </script>
@endpush
