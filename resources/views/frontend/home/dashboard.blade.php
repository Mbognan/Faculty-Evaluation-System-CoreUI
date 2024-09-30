@extends('frontend.layouts.master')

@section('home')
    @auth
        <style>
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
        </style>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
            <div class="fp__breadcrumb_overlay">
                <div class="container">
                    <div class="fp__breadcrumb_text">
                        <h1>user dashboard</h1>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><a href="#">dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="fp__dashboard mt_70 xs_mt_90 mb_100 xs_mb_70">
            <div class="container">
                <div class="fp__dashboard_area">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                            @include('frontend.home.sidebar')
                        </div>
                        <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__dashboard_content">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active">
                                        <div class="fp_dashboard_body">

                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6 col-md-4 mt-4">
                                                    <div class="fp__dsahboard_overview_item   ">
                                                        <span class="icon" style="background-color:#007bff"><i
                                                                class="fas fa-users"></i></span>
                                                        <h4 style="color:#007bff">Total Student Registered<span
                                                                style="color:#007bff">({{ $totalStudent }})</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4 mt-4">
                                                    <div class="fp__dsahboard_overview_item green">
                                                        <span class="icon"><i class="fas fa-user-check"></i></span>
                                                        <h4>Complete Evaluation<span>({{ $token }})</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4 mb-4 mt-4">
                                                    <div class="fp__dsahboard_overview_item ">
                                                        <span class="icon"><i class="fas fa-user-clock"></i></span>
                                                        <h4>Remaining Student <span>({{ $pendingstudenteval }})</span></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fp__dsahboard_overview">
                                                <label for="id_label_single">
                                                    Select to view Evaluation Result History:
                                                    <select class="js-example-basic-single mb-4" name="state"
                                                        style="width: 50%" id="dateRange" onchange="updateChart()">
                                                        @foreach ($allEvaluationSchedules as $schedule)
                                                        <option value="{{ $schedule->id }}" {{ $schedule->evaluation_status == 2 ? 'selected': '' }}>{{ $schedule->academic_year }} {{ $schedule->semester }}</option>


                                                        @endforeach

                                                    </select>

                                                </label>
                                                <div id="container"></div>


                                                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                            data-bs-target="#home" type="button" role="tab"
                                                            aria-controls="home" aria-selected="true">StackBar Chart</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                            data-bs-target="#profile" type="button" role="tab"
                                                            aria-controls="profile" aria-selected="false">Radar Chart</button>
                                                    </li>

                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                        aria-labelledby="home-tab">
                                                        <div id="container2" class="mt-4"></div>
                                                    </div>
                                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                                        aria-labelledby="profile-tab">
                                                        <div id="containerRadar"></div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div id="container3" class="mt-4"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="container4" class="mt-4"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="container5" class="mt-4"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div id="container6" class="mt-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    @endauth
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/histogram-bellcurve.js') }}"></script>
    <script src="{{ asset('dist/circularProgressBar.min.js') }}"></script>
    <script src="{{ asset('admin/code/highcharts-more.js') }}"></script>



    <script>
        const users = @json($users->first_name . ' ' . $users->last_name);

        const dataByDateRange = {
            1: [{
                name: 'Commitment',
                y: 25
            }, {
                name: 'Knowledge of the subject',
                y: 12.6
            }, {
                name: 'Management Learning',
                y: 17
            }, {
                name: 'Teaching Effectiveness',
                y: 19
            }],
            3: [{
                name: 'Commitment',
                y: 20.9
            }, {
                name: 'Knowledge of the subject',
                y: 15.3
            }, {
                name: 'Management Learning',
                y: 25.
            }, {
                name: 'Teaching Effectiveness',
                y: 9.7
            }],
            4: [{
                name: 'Commitment',
                y: 25.4
            }, {
                name: 'Knowledge of the subject',
                y: 14.6
            }, {
                name: 'Management Learning',
                y: 6.0
            }, {
                name: 'Teaching Effectiveness',
                y: 24.0
            }],
            5: [{
                name: 'Commitment',
                y: 22.5
            }, {
                name: 'Knowledge of the subject',
                y: 20
            }, {
                name: 'Management Learning',
                y: 24.8
            }, {
                name: 'Teaching Effectiveness',
                y: 23.3
            }]
        };





        function updateChart() {
            const dateRange = document.getElementById('dateRange').value;
            Highcharts.chart('container', {
                chart: {
                    type: 'pie',
                    height: 400,
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
                                        '<strong>' + calculateOverallPercentage(dataByDateRange[
                                            dateRange]) + ' %</strong>'
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
                    text: 'Overall Evaluation Results for ' + users + ' ' + getSubtitleText(dateRange)
                },
                subtitle: {
                    text: 'Source: ' + getSubtitleText(dateRange)
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
                    name: 'Average / Mean',
                    colorByPoint: true,
                    innerSize: '65%',
                    data: dataByDateRange[dateRange] // Set data based on selected date range
                }]
            });



            const barstackresult = @json($chartData);

            const subjects = barstackresult[dateRange]?.subject || [];
            const seriesData = barstackresult[dateRange]?.seriesData || [];

            const formattedSeriesData = seriesData.map(series => ({
                name: series.name,
                data: series.data.map(value => parseFloat(value) || 0.0) // Convert to number, default to 0
            }));

            // Redraw the bar chart with updated data
            Highcharts.chart('container2', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Average Performance Evaluation Result by Subject of ' + users
                },
                xAxis: {
                    categories: subjects,
                    title: {
                        text: 'Subjects'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Means'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.1f}' // Show one decimal place


                        }
                    }
                },
                series: seriesData,
            });
        }


        function calculateOverallPercentage(data) {
            const total = data.reduce((sum, point) => sum + point.y, 0);
            return total.toFixed(2);
        }


        function getSubtitleText(dateRange) {
            const ranges = {
                1: '2023-2024 1st Semester',
                3: '2021-2022 2nd Semester',
                4: '2020-2021 1st Semester',
                5: '2020-2021 2nd Semester'
            };
            return ranges[dateRange] || 'Unknown Date Range';
        }

        // Initialize chart with default date range
        updateChart();


        document.addEventListener('DOMContentLoaded', function() {
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });

            const circle = new CircularProgressBar("pie");
            circle.initial();

            setTimeout(() => {
                const options = {

                    index: 1,
                    // update props
                    percent: 90,
                    colorSlice: "#fff",
                    fontColor: "black",
                    fontSize: "1.2rem",
                    fontWeight: 600,

                };
                circle.animationTo(options);
            }, 500); // after 3s update

            // histogram chart
            const data2 = @json($histogramData);
            var specificCategoryData = @json($specificCategoryData);

            Highcharts.chart('container3', {
                title: {
                    text: 'Commitment',

                },
                xAxis: {
                    title: {
                        text: 'Total Rating'
                    },
                    alignTicks: false,
                    min: 5,
                    max: 25,
                },
                yAxis: {
                    title: {
                        text: 'Number of Evaluator'
                    },
                    alignTicks: false
                },
                plotOptions: {
                    histogram: {
                        binWidth: 1,
                        accessibility: {
                            point: {
                                valueDescriptionFormat: '{index}. {point.x:.3f} to {point.x3:.3f}, {point.y}.'
                            }
                        }
                    }
                },
                exporting:{
                    enabled: false,
                },
                series: [{
                    name: 'Number of Evaluator',
                    type: 'histogram',
                    baseSeries: 's1',
                    zIndex: -1
                }, {
                    name: 'Data',
                    type: 'scatter',
                    data: specificCategoryData['Commitment'] || [],
                    id: 's1',
                    visible: false,
                    showInLegend: false
                }]
            });
            Highcharts.chart('container4', {
                title: {
                    text: 'Knowledge of the Subject'
                },
                xAxis: {
                    title: {
                        text: 'Total Rating'
                    },
                    alignTicks: false,
                    min: 5,
                    max: 25,
                },
                yAxis: {
                    title: {
                        text: 'Number of Evaluator'
                    },
                    alignTicks: false
                },
                plotOptions: {
                    histogram: {
                        binWidth: 1, // Set the bin width to 4
                        color: 'lightgreen',
                        accessibility: {
                            point: {
                                valueDescriptionFormat: '{index}. {point.x:.3f} to {point.x3:.3f}, {point.y}.'
                            }
                        }
                    }
                },
                exporting:{
                    enabled: false,
                },
                series: [{
                    name: 'Number of Evaluator',
                    type: 'histogram',
                    baseSeries: 's1',
                    zIndex: -1
                }, {
                    name: 'Data',
                    type: 'scatter',
                    data: specificCategoryData['Knowledge of the Subject'] || [],
                    id: 's1',
                    visible: false,
                    showInLegend: false
                }]
            });
            Highcharts.chart('container5', {
                title: {
                    text: 'Teaching for Independent Learning'
                },
                xAxis: {
                    title: {
                        text: 'Total Rating'
                    },
                    alignTicks: false,
                    min: 5,
                    max: 25,
                },
                yAxis: {
                    title: {
                        text: 'Number of Evaluator'
                    },
                    alignTicks: false
                },
                plotOptions: {
                    histogram: {
                        binWidth: 1, // Set the bin width to 4
                        color: 'orange',
                        accessibility: {
                            point: {
                                valueDescriptionFormat: '{index}. {point.x:.3f} to {point.x3:.3f}, {point.y}.'
                            }
                        }
                    }
                },
                exporting:{
                    enabled: false,
                },
                series: [{
                    name: 'Number of Evaluator',
                    type: 'histogram',
                    baseSeries: 's1',
                    zIndex: -1
                }, {
                    name: 'Data',
                    type: 'scatter',
                    data: specificCategoryData['Teaching for Independent Learning'] || [],
                    id: 's1',
                    visible: false,
                    showInLegend: false
                }]
            });
            Highcharts.chart('container6', {
                title: {
                    text: 'Management of Learning'
                },
                xAxis: {
                    title: {
                        text: 'Total Rating'
                    },
                    alignTicks: false,
                    min: 5,
                    max: 25,
                },
                yAxis: {
                    title: {
                        text: 'Number of Evaluator'
                    },
                    alignTicks: false
                },
                plotOptions: {
                    histogram: {
                        binWidth: 1, // Set the bin width to 4
                        color: 'purple',
                        accessibility: {
                            point: {
                                valueDescriptionFormat: '{index}. {point.x:.3f} to {point.x3:.3f}, {point.y}.'
                            }
                        }
                    }
                },
                exporting:{
                    enabled: false,
                },
                series: [{
                    name: 'Number of Evaluator',
                    type: 'histogram',
                    baseSeries: 's1',
                    zIndex: -1
                }, {
                    name: 'Data',
                    type: 'scatter',
                    data: specificCategoryData['Management of Learning'] || [],
                    id: 's1',
                    visible: false,
                    showInLegend: false
                }]
            });

            //radar chart
            const chartData = @json($overallPercentageBySubject);

            console.log(chartData);
            const labelsRadar = Object.keys(chartData);
            const dataRadar = Object.values(chartData);
            Highcharts.chart("containerRadar", {
                chart: {
                    polar: true,
                    type: "line",
                },


                title: {
                    text: "Differentials of Percentages",
                    x: -80,
                },

                pane: {
                    size: "80%",
                },

                xAxis: {
                    categories: labelsRadar,
                    tickmarkPlacement: "on",
                    lineWidth: 0,
                    title: {
                        text: 'Subject'
                    },

                },

                yAxis: {
                    gridLineInterpolation: "polygon",
                    lineWidth: 0,
                    min: 0,
                    max: 100,
                    tickInterval: 20,
                },

                tooltip: {
                    shared: true,
                    pointFormat: '<span style="color:{series.color}">{series.name}: <b>' +
                        "{point.y:,.0f}%</b><br/>",
                },

                legend: {
                    align: "right",
                    verticalAlign: "middle",
                    layout: "vertical",
                },

                series: [{
                    name: "Percentage",
                    type: "area",
                    data: dataRadar,
                    pointPlacement: "on",
                }, ],

                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500,
                        },
                        chartOptions: {
                            legend: {
                                align: "center",
                                verticalAlign: "bottom",
                                layout: "horizontal",
                            },
                            pane: {
                                size: "70%",
                            },
                        },
                    }, ],
                },
            });

        });
    </script>
@endpush
