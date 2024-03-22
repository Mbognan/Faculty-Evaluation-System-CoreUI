@extends('admin.layouts.master')
<style>
    .profile-social a {
        margin-right: 10px;
        /* Adjust as needed */
    }
</style>
@section('contents')
    <div class="fs-2 fw-semibold">Faculty</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span> Faculty</span></li>
            <li class="breadcrumb-item active"><span> View Faculty</span></li>
        </ol>
    </nav>
    <hr>

    <div class="page-content fade-in-up">
        <div class="row">

        </div>




        <div class="container-lg">
            <div class="row row-cols-2">
                <div class="col-lg-4">
                    <div class="container d-flex justify-content-center align-items-center mb-4">
                        <div class="card">
                            <div class="user text-center">
                                <div class="profile mt-3">
                                    <img src="{{ $user->avatar }}" class="rounded-circle" width="150">
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <h4 class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</h4>
                                <span class="text-muted d-block mb-2">Palompon</span>
                                <div class="profile-social m-b-20">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook"></i></a>
                                    <a href=""><i class="fab fa-pinterest"></i></a>
                                    <a href=""><i class="fab fa-dribbble"></i></a>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                                    <div class="stats ">
                                        <h6 class="mb-0">Students</h6>
                                        <span>8,797</span>
                                    </div>
                                    <div class="stats ">
                                        <h6 class="mb-0">Overall Rank</h6>
                                        <span>142</span>
                                    </div>
                                    <div class="stats   ">
                                        <h6 class="mb-0">Ranks</h6>
                                        <span>129</span>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    (239) 816-9029
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->gender }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Bay Area, San Francisco, CA
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Faculty
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Evaluation Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Completed <i class="fas fa-check-circle text-success" style=""></i>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info text-white" target="__blank"
                                        href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title mb-0">Evaluation Result By Category </h4>
                                    <div class="small text-medium-emphasis text-disabled">1st Semester - July 2022 </div>
                                </div>
                                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                                    <button class="btn btn-info text-white" type="button">Print Summary Result
                                        <svg class="icon">
                                            <use
                                                xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-cloud-download') }}">
                                            </use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            {{-- <canvas id="myChart" style="max-width: 999px; max-height: 500px;"></canvas> --}}
                            <canvas class="chart" id="myChart" height="450" width="1377"
                                style="display: block; box-sizing: border-box; height: 300px; width: 918px;"></canvas>
                        </div>


                        <div class="card-footer">
                            <div class="row row-cols-1 row-cols-md-4 text-center">
                                @foreach ($allCategories as $index => $cat)
                                    @php
                                        $result = $resultsByCategory[$cat->title] ?? 0;
                                        $percentage = ($result * 100) / 100;
                                        $progressColor =
                                            $percentage <= 40
                                                ? 'bg-danger'
                                                : ($percentage <= 60
                                                    ? 'bg-warning'
                                                    : ($percentage <= 80
                                                        ? 'bg-primary'
                                                        : ($percentage <= 90
                                                            ? 'bg-info'
                                                            : 'bg-success')));
                                        $progressRate =
                                            $percentage <= 40
                                                ? 'Poor'
                                                : ($percentage <= 60
                                                    ? 'Fair'
                                                    : ($percentage <= 80
                                                        ? 'Satisfactory'
                                                        : ($percentage <= 90
                                                            ? 'Very Satisfactory'
                                                            : 'Outstanding')));
                                    @endphp
                                    <div class="col mb-sm-2 mb-0">
                                        <div class="text-medium-emphasis">{{ $cat->title }}</div>
                                        <div class="fw-semibold">{{ $progressRate }} ({{ $result }} %)</div>
                                        <div class="progress progress-thin mt-2">
                                            <div class="progress-bar progress-bar1 {{ $progressColor }}" role="progressbar"
                                                style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card text-white bg-info">
                                    <div class="card-body">
                                        <div class="text-medium-emphasis-inverse text-end mb-4">
                                            <div class="col">
                                                <div class="card-title fs-4 fw-semibold "><i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fs-4 fw-semibold">87</div>
                                        <small class="text-medium-emphasis-inverse text-uppercase fw-semibold">Total
                                            Students Participants</small>
                                        <div class="progress progress-white progress-thin mt-3">
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="card-title text-disabled">Satisfied</div>
                                        <div class=" text-success p-2 rounded">
                                            <i class="far fa-smile fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="fs-4 fw-semibold pb-3">44 Students</div><small class="text-success">(50.4%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                                        </svg>)</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="card-title text-disabled">Unsatisfied </div>
                                        <div class=" text-danger p-2 rounded">
                                            <i class="far fa-frown fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="fs-4 fw-semibold pb-3">385 Students</div><small class="text-danger">(17.2%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                        </svg>)</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="card-title text-disabled">Neutral</div>
                                        <div class=" text-warning p-2 rounded">
                                            <i class="far fa-meh fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="fs-4 fw-semibold pb-3">70 Students</div><small class="text-warning">(20.2%
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                                        </svg>)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="card-title fs-4 fw-semibold">Setiment Analysis By Percentage</div>
                            <div class="card-subtitle text-disabled">1st Semester - 2024</div>
                            <div class="example">
                                <div class="tab-content rounded-bottom">
                                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1002">
                                        <div class="c-chart-wrapper">
                                            <canvas id="piecanva"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">


            </div>
            <div class="col d-flex justify-content-center align-items-center">

            </div>
        </div>
    @endsection

    @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
            integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @push('scripts')
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const category = {!! json_encode($category) !!};
                    const resultsByCategory = {!! json_encode(array_values($resultsByCategory)) !!};

                    function generateBackgroundColors(data) {
                        return data.map(result => {
                            const percentage = result * 100 / 100;
                            if (percentage <= 40) {
                                return 'rgba(255, 0, 0, 0.2)'; // Red
                            } else if (percentage <= 60) {
                                return 'rgba(255, 255, 0, 0.2)'; // Yellow
                            } else if (percentage <= 80) {
                                return 'rgba(0, 0, 255, 0.2)'; // blue
                            } else if (percentage <= 90) {
                                return 'rgba(23, 162, 184, 0.2)'; // Purple
                            } else {
                                return 'rgba(0, 128, 0, 0.2)'; // green
                            }
                        });
                    }

                    function generateBorderColors(data) {
                        return data.map(result => {
                            const percentage = result * 100 / 100;
                            if (percentage <= 40) {
                                return 'rgba(255, 0, 0, 1)'; // Red
                            } else if (percentage <= 60) {
                                return 'rgba(255, 255, 0, 1)'; // Yellow
                            } else if (percentage <= 80) {
                                return 'rgba(0, 0, 255, 1)'; // blue
                            } else if (percentage <= 90) {
                                return 'rgba(128, 0, 128, 1)'; // Purple
                            } else {
                                return 'rgba(0, 128, 0, 1)'; // green
                            }
                        });
                    }

                    const backgroundColor = generateBackgroundColors(resultsByCategory);
                    const borderColor = generateBorderColors(resultsByCategory);

                    const data = {
                        labels: category,
                        datasets: [{
                            label: 'The Mean of each Category',
                            data: resultsByCategory,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 1
                        }]
                    };

                    const config = {
                        type: 'bar',
                        data: data,
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    };

                    // Render the chart
                    const myChart = new Chart(document.getElementById('myChart'), config);

                    // Pie Chart

                    const data2 = {
                        labels: ['Satisfied', 'Unsatisfied', 'Neutral'],
                        datasets: [{
                            label: 'Number of Students',
                            data: [44, 483, 77],
                            backgroundColor: [
                                'rgb(40, 167, 69)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                        }]
                    };

                    const config2 = {
                        type: 'pie',
                        data: data2,
                        options: {
                            scales: {

                            },
                            plugins: {
                                datalabels: {

                                    color: 'white',
                                    formatter: (value, context) => {
                                        const datapoints = context.chart.data.datasets[0].data;

                                        function totalSum(total, datapoint) {
                                            return total + datapoint
                                        }
                                        const totalValue = datapoints.reduce(totalSum, 0)
                                        const totalPercentage = (value / totalValue * 100).toFixed(2)
                                        return `${totalPercentage}%`
                                    }
                                }
                            }
                        },
                        plugins: [ChartDataLabels]
                    };

                    const ctx = document.getElementById('piecanva').getContext('2d');
                    new Chart(ctx, config2);

                    const progressBars = document.querySelectorAll('.progress-bar1');
                    progressBars.forEach((progressBar, index) => {
                        const percentage = data.datasets[0].data[index] * 100 / 100;
                        if (percentage <= 40) {
                            progressBar.classList.add('bg-danger');
                        } else if (percentage <= 60) {
                            progressBar.classList.add('bg-warning');
                        } else if (percentage <= 80) {
                            progressBar.classList.add('bg-primary');
                        } else {
                            progressBar.classList.add('bg-success');
                        }
                    });
                });
            </script>
        @endpush
    @endpush
