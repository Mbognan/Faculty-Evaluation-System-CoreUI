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
                                                <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item   ">
                                                        <span class="icon" style="background-color:#007bff"><i class="fas fa-users"></i></span>
                                                        <h4 style="color:#007bff">Total Student<span style="color:#007bff">(106)</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4">
                                                    <div class="fp__dsahboard_overview_item green">
                                                        <span class="icon"><i class="fas fa-user-check"></i></span>
                                                        <h4>Complete Evaluation<span>(76)</span></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-sm-6 col-md-4 mb-4">
                                                    <div class="fp__dsahboard_overview_item ">
                                                        <span class="icon"><i class="fas fa-user-clock"></i></span>
                                                        <h4>Remaining Student <span>(20)</span></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fp__dsahboard_overview">



                                                <div id="container"></div>


                                                <hr>
                                                <div id="container2" class="mt-4"></div>

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

        {{-- <div class="container mt-4">
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
                                    <div class="active_package">
                                        <h4>Faculty Evaluation</h4>
                                        <div class="table-responsive">
                                            <table class="table dashboard_table">
                                                <tbody>
                                                    <tr>
                                                        <td class="active_left">Number of Student who evaluated</td>
                                                        <td class="package_right">100</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Department</td>
                                                        <td class="package_right">BSIT</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Position</td>
                                                        <td class="package_right">Faculty</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Date</td>
                                                        <td class="package_right">1st Semester 2021-2022</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Evaluation Status</td>
                                                        <td class="package_right">Ongoing</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Overall Result</td>
                                                        <td class="package_right text-danger">49%</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="active_left">Result Status</td>
                                                        <td class="package_right text-danger">Very Poor</td>
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
                            <div class="active_package shadow p-3 mb-5 bg-white rounded">
                                <h4>Data Visualizations</h4>


                                        <div id="container"></div>


                                <hr>
                                <div id="container2" class="mt-4"></div>


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
        </div> --}}

    @endauth
@endsection

@push('scripts')
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/histogram-bellcurve.js') }}"></script>
    <script src="{{ asset('dist/circularProgressBar.min.js') }}"></script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // 'pie' is class name div
            const circle = new CircularProgressBar("pie");
            circle.initial();

            setTimeout(() => {
                const options = {
                    // item number you want to update
                    // read data-pie-index from the element
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
            var OveralltotalMeanByCategory = @json($OveralltotalMeanByCategory);


            let piedata = Object.keys(OveralltotalMeanByCategory).map(function(category) {
                return {
                    name: category,
                    y: OveralltotalMeanByCategory[category] || [],
                }
            })



            // Highcharts.chart("container", {
            //     chart: {
            //         type: "pie",
            //     },
            //     title: {
            //         text: "Overall Faculty Performance Evaluation Result By Category",
            //     },
            //     tooltip: {
            //         valueSuffix: "",
            //     },
            //     subtitle: {
            //         text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">BSIT Department</a>',
            //     },
            //     plotOptions: {
            //         series: {
            //             allowPointSelect: true,
            //             cursor: "pointer",
            //             dataLabels: [{
            //                     enabled: true,
            //                     distance: 20,
            //                 },
            //                 {
            //                     enabled: true,
            //                     distance: -40,
            //                     format: "{point.percentage:.1f}%",
            //                     style: {
            //                         fontSize: "1.2em",
            //                         textOutline: "none",
            //                         opacity: 0.7,
            //                     },
            //                     filter: {
            //                         operator: ">",
            //                         property: "percentage",
            //                         value: 10,
            //                     },
            //                 },
            //             ],
            //         },
            //     },
            //     series: [{
            //         name: "mean",
            //         colorByPoint: true,
            //         data: piedata,
            //     }, ],
            // });






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
                                        '<strong>63.31 %</strong>'
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










            ////////////////////////////////

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
