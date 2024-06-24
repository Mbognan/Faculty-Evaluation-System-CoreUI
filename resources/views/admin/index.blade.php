@extends('admin.layouts.master')


<style>
       @import url("https://code.highcharts.com/css/highcharts.css");

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

.highcharts-color-1 {
  fill: #e55353;
  stroke: #e55353;
}

.highcharts-axis.highcharts-color-1 .highcharts-axis-line {
  stroke: #e55353;
}

.highcharts-axis.highcharts-color-1 text {
  fill: #e55353;
}
</style>

@section('contents')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card mb-4 text-white bg-primary">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fs-4 fw-semibold">{{ $totalSudent }} <span class="fs-6 fw-normal">
                                <i class="fas fa-user-graduate"></i></span></div>
                        <div>Evaluators</div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
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
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
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
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
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
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a
                                class="dropdown-item" href="#">Another action</a><a class="dropdown-item"
                                href="#">Something else here</a></div>
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
                            <div class="card-subtitle text-secondary mb-4">
                                <button id="switch" class="btn btn-info text-white">
                                    switch <i class="fas fa-exchange-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-auto ms-auto">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table" class="table mb-0 table border" data-toggle="default">
                            <thead class=" table-light fw-semibold">
                                <tr class="align-middle">
                                    <th class="text-center">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
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
                                            <div class="text-nowrap">{{ $faculty['firstName'] }} {{ $faculty['lastName'] }}
                                            </div>
                                            <div class="small text-body-secondary text-nowrap"><span
                                                    data-coreui-i18n="new">BSIT</span> | <span
                                                    data-coreui-i18n="registered">Registered: </span><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                    10, 2023</span></div>
                                        </td>


                                        <td  align="right">
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
                            <tfoot class="table-light fw-semibold">
                                <tr class="align-middle fw-bold">
                                    <td colspan="2" class="fw-bold">Overall Result per Category:</td>
                                    <td align="right" id="overall-commitment">40%</td>
                                    <td align="right" id="overall-knowledge">69%</td>
                                    <td align="right" id="overall-teaching">36%</td>
                                    <td align="right" id="overall-management">58%</td>
                                    <td align="right" id="overall-total">89%</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- bar chart and pie --}}
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
    {{-- bar sentiment analysis --}}
    <div class="row">
        <div class="col-xl-9">
            <div id="containerSentiment"></div>
        </div>
        <div class="col-xl-3">
            <div class="row">
                <div class="col-md-4 col-xl-12">
                    <div class="card mb-4 text-white bg-primary-gradient">
                        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                        </svg>)</span></div>
                                <div data-coreui-i18n="users">Users</div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                        data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                                        data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item"
                                        href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                            </div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                            <canvas class="chart" id="card-chart1" height="90" width="299"
                                style="display: block; box-sizing: border-box; height: 80px; width: 266px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-12">
                    <div class="card mb-4 text-white bg-warning-gradient">
                        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                        </svg>)</span></div>
                                <div data-coreui-i18n="conversionRate">Conversion Rate</div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                        data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                                        data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item"
                                        href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                            </div>
                        </div>
                        <div class="chart-wrapper mt-3" style="height:80px;">
                            <canvas class="chart" id="card-chart3" height="90" width="335"
                                style="display: block; box-sizing: border-box; height: 80px; width: 298px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-12">
                    <div class="card mb-4 text-white bg-danger-gradient">
                        <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                            <div>
                                <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                        </svg>)</span></div>
                                <div data-coreui-i18n="sessions">Sessions</div>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-transparent text-white p-0" type="button"
                                    data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                        data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                                        data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item"
                                        href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                            </div>
                        </div>
                        <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                            <canvas class="chart" id="card-chart4" height="90" width="299"
                                style="display: block; box-sizing: border-box; height: 80px; width: 266px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/series-label.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {





            document.getElementById('switch').addEventListener('click', function () {
    const tableBody = document.querySelector('#data-table tbody');
    const isDefaultData = tableBody.dataset.toggle === 'default';

    // Data sets
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
    const overallResults = isDefaultData ?
        { commitment: '50%', knowledge: '70%', teaching: '46%', management: '68%', total: '79%' } :
        { commitment: '40%', knowledge: '69%', teaching: '36%', management: '58%', total: '89%' };


    tableBody.innerHTML = '';

    // Populate table with data
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

    // Update the overall result
    document.getElementById('overall-commitment').innerText = overallResults.commitment;
    document.getElementById('overall-knowledge').innerText = overallResults.knowledge;
    document.getElementById('overall-teaching').innerText = overallResults.teaching;
    document.getElementById('overall-management').innerText = overallResults.management;
    document.getElementById('overall-total').innerText = overallResults.total;

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

            let seriesData = [{
                    name: 'Commitment',
                    data: []
                },
                {
                    name: 'Knowledge of the subject',
                    data: []
                },
                {
                    name: 'Teaching effectiveness',
                    data: []
                },
                {
                    name: 'Management Learning',
                    data: []
                }
            ];

            let facultyIds = Object.keys(facultyCategoryAverages);

            facultyIds.forEach(facultyId => {
                seriesData[0].data.push(parseFloat(facultyCategoryAverages[facultyId][32]));
                seriesData[1].data.push(parseFloat(facultyCategoryAverages[facultyId][33]));
                seriesData[2].data.push(parseFloat(facultyCategoryAverages[facultyId][34]));
                seriesData[3].data.push(parseFloat(facultyCategoryAverages[facultyId][35]));
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

            });


            (function(H) {
                H.seriesTypes.pie.prototype.animate = function(init) {
                    const series = this,
                        chart = series.chart,
                        points = series.points,
                        {
                            animation
                        } = series.options,
                        {
                            startAngleRad
                        } = series;

                    function fanAnimate(point, startAngleRad) {
                        const graphic = point.graphic,
                            args = point.shapeArgs;

                        if (graphic && args) {

                            graphic
                                // Set inital animation values
                                .attr({
                                    start: startAngleRad,
                                    end: startAngleRad,
                                    opacity: 1
                                })
                                // Animate to the final position
                                .animate({
                                    start: args.start,
                                    end: args.end
                                }, {
                                    duration: animation.duration / points.length
                                }, function() {
                                    // On complete, start animating the next point
                                    if (points[point.index + 1]) {
                                        fanAnimate(points[point.index + 1], args.end);
                                    }
                                    // On the last point, fade in the data labels, then
                                    // apply the inner size
                                    if (point.index === series.points.length - 1) {
                                        series.dataLabelsGroup.animate({
                                                opacity: 1
                                            },
                                            void 0,
                                            function() {
                                                points.forEach(point => {
                                                    point.opacity = 1;
                                                });
                                                series.update({
                                                    enableMouseTracking: true
                                                }, false);
                                                chart.update({
                                                    plotOptions: {
                                                        pie: {
                                                            innerSize: '40%',
                                                            borderRadius: 8
                                                        }
                                                    }
                                                });
                                            });
                                    }
                                });
                        }
                    }

                    if (init) {
                        // Hide points on init
                        points.forEach(point => {
                            point.opacity = 0;
                        });
                    } else {
                        fanAnimate(points[0], startAngleRad);
                    }
                };
            }(Highcharts));
            //pie chart

            var overallCategoryResult = @json($overallCategoryAverages);
            var dataPie = [];


            for (var categoryResult in overallCategoryResult) {
                if (overallCategoryResult.hasOwnProperty(categoryResult)) {

                    dataPie.push({
                        name: categoryResult,
                        y: parseFloat(overallCategoryResult[categoryResult])
                    })
                }
            }



            Highcharts.chart('container3', {
                chart: {
                    type: 'pie',
                    height: 600
                },
                title: {
                    text: 'BSIT Department Overall Results'
                },
                tooltip: {
                    valueSuffix: '%'
                },
                subtitle: {
                    text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [{
                    name: 'Average',
                    enableMouseTracking: false,
                    animation: {
                        duration: 2000
                    },
                    colorByPoint: true,
                    data: dataPie
                }]
            });

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



        xAxis: {
          categories: ["Tokelau", "Ireland", "Italy", "Timor-Leste","leee-me",'tae-nasan',"lemnia"],
        },

        yAxis: [
          {
            // Primary axis
            min:0,
            max:100,
            tickInterval: 10,
            className: "highcharts-color-p",
            title: {
              text: "Positive",
            },
          },
          {
            // Secondary axis
            min:0,
            max:100,
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

        series: [
          {
            name: "Postive",
            data: [92.5, 73.1, 64.8, 49.0,89.9,30,7],
            tooltip: {
              valueSuffix: "%",
            },
          },
          {
            name: "Negative",
            data: [33.7, 27.1, 24.9, 21.2,21.5,70,89],
            yAxis: 1,
          },
        ],
      });

        });
    </script>
@endpush
