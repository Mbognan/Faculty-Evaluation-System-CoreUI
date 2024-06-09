@extends('frontend.layouts.master')
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
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
@section('home')
    @auth

        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.home.sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="manage_dashboard">
                            <div class="row">
                                <div class="col-xl-4 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                    <div class="manage_dashboard_single">
                                        <i class="far fa-star" aria-hidden="true"></i>
                                        <h3>116</h3>
                                        <p>Total Comments</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                    <div class="manage_dashboard_single orange">
                                        <i class="fas fa-list-ul" aria-hidden="true"></i>
                                        <h3>21</h3>
                                        <p>List Of Evaluator</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                    <div class="manage_dashboard_single green">
                                        <i class="far fa-heart" aria-hidden="true"></i>
                                        <h3>35</h3>
                                        <p>Total Feedback</p>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="active_package" >
                                        <h4>Faculty Evaluation</h4>
                                        <div class="table-responsive">
                                            <table class="table dashboard_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="active_left">Total Evaluators</td>
                                                        <td class="package_right">100</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Date</td>
                                                        <td class="package_right">1st Semester 2021-2022</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Overall Result</td>
                                                        <td class="package_right">89%</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Current Status</td>
                                                        <td class="package_right">Excellent</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Evaluation Status</td>
                                                        <td class="package_right">Ongoing</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Listings</td>
                                                        <td class="package_right">10</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Amenities</td>
                                                        <td class="package_right">5</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 mb-4">
                    <div class="dashboard_content">
                        <div class="manage_dashboard">
                            <div class="active_package shadow p-3 mb-5 bg-white rounded" >
                                <h4>Data Visualizations</h4>

                                <div id="container"></div>
                                <p class="highcharts-description">
                                    The pie chart titled "Faculty Evaluation Result By Category" presents the performance
                                    evaluation of faculty members in the BSIT Department, highlighting strengths and areas
                                    for improvement across key categories: Commitment, Knowledge of Subjects, Management of
                                    Learning, and Teaching for Independent Learning.
                                </p>
                                <hr>
                                <div id="container2" class="mt-4"></div>
                                <p class="highcharts-description">
                                    Bar chart showing horizontal columns. This chart type is often
                                    beneficial for smaller screens, as the user can scroll through the data
                                    vertically, and axis labels are easy to read.
                                </p>

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

    @endauth
@endsection

@push('scripts')
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/histogram-bellcurve.js') }}"></script>


    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            //totall mean by subject
            var totalMeanByCategory = @json($totalMeanByCategory);
            var subjects = Object.keys(totalMeanByCategory);
            var categories = Object.keys(totalMeanByCategory[subjects[0]]);
            var seriesData = [];

            categories.forEach(function(category) {
                var data = [];
                subjects.forEach(function(subject) {
                    var meanValue = totalMeanByCategory[subject][category] ? totalMeanByCategory[
                        subject][category].toFixed(2) : 0.00;
                    data.push(parseFloat(meanValue));
                })
                seriesData.push({
                    name: category,
                    data: data,
                });

            });





            //totalSum by category
            var totalSumByCategory = @json($totalSumByCategory);
            var data = [];


            for (var category in totalSumByCategory) {
                if (totalSumByCategory.hasOwnProperty(category)) {
                    data.push({
                        name: category,
                        y: parseFloat(totalSumByCategory[category])
                    })
                }
            }

            Highcharts.chart("container", {
                chart: {
                    type: "pie",
                },
                title: {
                    text: "Overall Faculty Performance Evaluation Result By Category",
                },
                tooltip: {
                    valueSuffix: "",
                },
                subtitle: {
                    text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">BSIT Department</a>',
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: "pointer",
                        dataLabels: [{
                                enabled: true,
                                distance: 20,
                            },
                            {
                                enabled: true,
                                distance: -40,
                                format: "{point.percentage:.1f}%",
                                style: {
                                    fontSize: "1.2em",
                                    textOutline: "none",
                                    opacity: 0.7,
                                },
                                filter: {
                                    operator: ">",
                                    property: "percentage",
                                    value: 10,
                                },
                            },
                        ],
                    },
                },
                series: [{
                    name: "mean",
                    colorByPoint: true,
                    data: data,
                }, ],
            });

            Highcharts.chart('container2', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Average Faculty Performance Evaluation Scores by Subject and Category'
                },
                xAxis: {
                    categories: subjects,
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Goals'
                    }
                },
                legend: {
                    reversed: true
                },
                plotOptions: {
                    series: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: seriesData,
            });
            // histogram chart
            const data2 = @json($histogramData);
            var specificCategoryData = @json($specificCategoryData);

            Highcharts.chart('container3', {
                title: {
                    text: 'Commitment'
                },
                xAxis: {
                    title: {
                        text: 'Total Rating'
                    },
                    alignTicks: false
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
                        accessibility: {
                            point: {
                                valueDescriptionFormat: '{index}. {point.x:.3f} to {point.x3:.3f}, {point.y}.'
                            }
                        }
                    }
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
                    alignTicks: false
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
                series: [{
                    name: 'Number of Evaluator',
                    type: 'histogram',
                    baseSeries: 's1',
                    zIndex: -1
                }, {
                    name: 'Data',
                    type: 'scatter',
                    data: specificCategoryData['Knowledge of Subjects'] || [],
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
                    alignTicks: false
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
                    alignTicks: false
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
        });
    </script>
@endpush
