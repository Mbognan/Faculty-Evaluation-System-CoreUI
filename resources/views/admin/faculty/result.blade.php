@extends('admin.layouts.master')
<style>
    .profile-social a {
        margin-right: 10px;
        /* Adjust as needed */
    }

    .link-muted {
        color: #aaa;
    }

    .link-muted:hover {
        color: #1266f1;
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



                <div class="col-md-12 ">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title mb-0">The Overall Evaluation Result By Category </h4>
                                    <div class="small text-medium-emphasis text-disabled">1st Semester - July 2022 </div>
                                </div>
                                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                                    <form method="POST" action="{{ route('admin.export-excel', ['id' => $user->id]) }}">
                                        @csrf
                                        <button class="btn btn-info text-white" type="submit">Print Summary Result
                                            <svg class="icon">
                                                <use
                                                    xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-cloud-download') }}">
                                                </use>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <canvas class="chart" id="myChart" height="450" width="1377"
                                    style="display: block; box-sizing: border-box; height: 300px; width: 918px;"></canvas>
                            </div>

                        </div>

                        {{--
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
                                            <div class="progress-bar progress-bar1 {{ $progressColor }}"
                                                role="progressbar" style="width: {{ $percentage }}%"
                                                aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="d-flex justify-content-between ">
                                <div>
                                    <h4 class="card-title mb-0">Subject-wise Evaluation Results: A Stacked Bar Chart </h4>
                                </div>

                            </div>
                            <div class="col-md-12 mt-4">
                                <canvas class="chart" id="myChartStack" height="800" width="1377"
                                    style="display: block; box-sizing: border-box; height: 500px; width: 918px;"></canvas>
                            </div>


                        </div>


                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header" data-coreui-i18n="trafficAndSales">Sentiment Analysis Section</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Sentiment Analysis -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="card-title fs-4 fw-semibold">Setiment Analysis By Percentage</div>
                                            <div class="card-subtitle text-disabled">1st Semester - 2024</div>
                                            <div class="example">
                                                <div class="tab-content rounded-bottom">
                                                    <div class="tab-pane p-3 active preview" role="tabpanel"
                                                        id="preview-1002">
                                                        <div class="c-chart-wrapper">
                                                            <canvas id="piecanva"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4 bg-info text-white">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="card-title text-white">Total Student</div>
                                                <div class=" text-white p-2 rounded">
                                                    <i class="fas fa-user-friends fa-2x"></i>
                                                </div>
                                            </div>
                                            <div class="fs-4 fw-semibold pb-3">436 Students</div><small
                                                class="text-success"> </small>
                                        </div>
                                    </div>
                                    <!-- Total Satisfied Students -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="card-title text-disabled">Total Student who are Satisfied</div>
                                                <div class=" text-success p-2 rounded">
                                                    <i class="far fa-smile fa-2x"></i>
                                                </div>
                                            </div>
                                            <div class="fs-4 fw-semibold pb-3">44 Students</div><small
                                                class="text-success">(50.4%
                                                <svg class="icon">
                                                    <use
                                                        xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}">
                                                    </use>
                                                </svg>)</small>
                                        </div>
                                    </div>
                                    <!-- Total Unsatisfied Students -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="card-title text-disabled">Total Student who are Unsatisfied
                                                </div>
                                                <div class=" text-danger p-2 rounded">
                                                    <i class="far fa-frown fa-2x"></i>
                                                </div>
                                            </div>
                                            <div class="fs-4 fw-semibold pb-3">385 Students</div><small
                                                class="text-danger">(17.2%
                                                <svg class="icon">
                                                    <use
                                                        xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}">
                                                    </use>
                                                </svg>)</small>
                                        </div>
                                    </div>
                                    <!-- Total Neutral Students -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="card-title text-disabled">Total Student who are Neutral</div>
                                                <div class=" text-warning p-2 rounded">
                                                    <i class="far fa-meh fa-2x"></i>
                                                </div>
                                            </div>
                                            <div class="fs-4 fw-semibold pb-3">70 Students</div><small
                                                class="text-warning">(20.2%
                                                <svg class="icon">
                                                    <use
                                                        xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-warning') }}">
                                                    </use>
                                                </svg> ) </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 mb-4">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div class="card text-dark">
                                    <div class="card-body p-4">
                                        <h4 class="mb-0">Recent comments</h4>
                                        <p class="fw-light mb-4 pb-2">Latest Comments section by users</p>

                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 07, 2021
                                                        <span class="badge bg-primary">Pending</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and
                                                    scrambled it.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Lara Stewart</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 15, 2021
                                                        <span class="badge bg-success">Approved</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="text-success"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-danger"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin literature from 45 BC, making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at
                                                    Hampden-Sydney College in Virginia, looked up one of the more obscure
                                                    Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                                    the cites.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" style="height: 1px;" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 24, 2021
                                                        <span class="badge bg-danger">Rejected</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    There are many variations of passages of Lorem Ipsum available, but the
                                                    majority have suffered alteration in some form, by injected humour, or
                                                    randomised words which don't look even slightly believable. If you are
                                                    going to use a passage of Lorem Ipsum, you need to be sure.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-0" />

                                    <div class="card-body p-4">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(24).webp"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold mb-1">Betty Walker</h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0">
                                                        March 30, 2021
                                                        <span class="badge bg-primary">Pending</span>
                                                    </p>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-pencil-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-redo-alt ms-2"></i></a>
                                                    <a href="#!" class="link-muted"><i
                                                            class="fas fa-heart ms-2"></i></a>
                                                </div>
                                                <p class="mb-0">
                                                    It uses a dictionary of over 200 Latin words, combined with a handful of
                                                    model sentence structures, to generate Lorem Ipsum which looks
                                                    reasonable. The generated Lorem Ipsum is therefore always free from
                                                    repetition, injected humour, or non-characteristic words etc.
                                                </p>
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
    @endsection

    @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
            integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const category = {!! json_encode(array_keys($resultsWithTitles)) !!};
                const resultsByCategory = {!! json_encode(array_values($resultsWithTitles)) !!};

                let combineData = category.map((cat, index) => {
                    return {
                        category: cat,
                        mean: resultsByCategory[index]
                    };
                });

                combineData.sort((a, b) => b.mean - a.mean);

                const sortedCategories = combineData.map(data => data.category);
                const sortedResults = combineData.map(data => data.mean);

                const data = {
                    labels: sortedCategories,
                    datasets: [{
                        label: 'The Mean of each Category',
                        data: sortedResults,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(255, 159, 64, 0.5)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(201, 203, 207, 0.5)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],

                        borderWidth: 1
                    }]
                };

                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                        indexAxis: 'y',
                        responsive: true,

                        scales: {
                            x: {
                                beginAtZero: true,
                                barPercentage: 0.5, // Adjust bar width (0.0 to 1.0)
                                categoryPercentage: 0.5 // Adjust category width (0.0 to 1.0)
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
                // Pie Chart

                const data2 = {
                    labels: ['Positive', 'Negative', 'Neutral'],
                    datasets: [{
                        label: 'Number of Students',
                        data: [200, 109, 77],
                        backgroundColor: [
                            'rgb(40, 167, 69)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 40
                    }]
                };

                const doughnutLabel = {
                    id: 'doughnutLabel',
                    beforeDatasetsDraw(chart, args, pluginOption) {
                        const {
                            ctx,
                            data
                        } = chart;
                        ctx.save();
                        const xCoor = chart.getDatasetMeta(0).data[0].x;
                        const yCoor = chart.getDatasetMeta(0).data[0].y;

                        ctx.font = 'bold 25px Arial';
                        ctx.fillStyle = 'black';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'middle';
                        ctx.fillText(`${data2.labels[0]}:${data2.datasets[0].data[0]}`, xCoor, yCoor);
                    }
                }

                const config2 = {
                    type: 'doughnut',
                    data: data2,
                    options: {
                        responsive: true,
                        scales: {

                        },
                        plugins: {
                            datalabels: {

                                color: 'black',
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
                    plugins: [ChartDataLabels, doughnutLabel, ]
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

                const ctx3 = document.getElementById('myChartStack');

                new Chart(ctx3, {
                    type: 'bar',
                    data: {
                        labels: ['IT 101L', 'Cap 101C', 'RSI 103', 'SER 102', 'IT 102', 'Entr 101'],
                        datasets: [{
                                label: 'Commitment',
                                data: [50, 60, 30, 50, 20, 30],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 99, 132, 1)',
                                ],
                                borderWidth: 1,
                                barThickness: 100,

                            },
                            {
                                label: 'Knowledge of Subjects',
                                data: [54, 87, 38, 47, 42, 34],
                                backgroundColor: [
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                ],
                                borderColor: [
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(255, 206, 86, 1)',
                                ],
                                borderWidth: 1,
                                barThickness: 100,

                            },
                            {
                                label: 'Management of Learning',
                                data: [40, 19, 21, 50, 60, 30],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(75, 192, 192, 1)',
                                ],
                                borderWidth: 1,
                                barThickness: 100,

                            },
                            {
                                label: 'Teaching for Independent Learning',
                                data: [12, 19, 30, 50, 29, 30],
                                backgroundColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(54, 162, 235, 1)',
                                ],
                                borderWidth: 1,
                                barThickness: 100,

                            }

                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                stacked: true
                            },
                            y: {
                                stacked: true
                            }
                        }
                    }
                });

            });


            // Stack Bar   Chart
        </script>
    @endpush
