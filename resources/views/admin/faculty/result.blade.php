@extends('admin.layouts.master')
<style>
    @import url("https://code.highcharts.com/css/highcharts.css");

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
                {{-- <div class="col-lg-4">
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
                </div> --}}
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> <img src="{{ $user->avatar }}"
                                    alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                                    <p class="text-secondary mb-1">BSIT Department Faculty</p>
                                    <p class="text-muted font-size-sm">Palompon Institute of Technology</p> <button
                                        class="btn btn-primary">Follow</button> <button
                                        class="btn btn-outline-primary">Message</button>
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
                                    <a class="btn btn-info text-white" target="__blank" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 ">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="col-md-12 mb-4">

                                <figure class="highcharts-figure">
                                    <div id="containerDrilldown"></div>

                                </figure>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            {{-- <ul class="nav nav-tabs" id="ex-with-icons" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                                </li>
                              </ul> --}}

                            <ul class="nav nav-tabs mb-3" id="ex-with-icons" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true"><i class="fas fa-chart-column fa-fw me-2"></i>StackBar
                                        Chart</button>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab" aria-controls="profile" aria-selected="false"><i
                                            class="fas fa-diagram-project fa-fw me-2"></i>Radar
                                        Chart</button>

                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false"> <i class="fas fa-cogs fa-fw me-2"></i>Histogram</button>

                                </li>
                            </ul>




                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade show active" id="home"
                                    role="tabpanel"aria-labelledby="home-tab">
                                    <div class="d-flex justify-content-between mt-4">

                                        <diV>

                                        </diV>
                                        <div class="btn-toolbar d-none d-md-block" role="toolbar"
                                            aria-label="Toolbar with buttons">
                                            <form method="POST"
                                                action="{{ route('admin.export.raw_result', ['id' => $user->id]) }}">
                                                @csrf
                                                <div class="d-flex align-items-center">
                                                    <select name="subject" class="form-select me-2">
                                                        <option>Select Subject</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject }}">{{ $subject }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <button class="btn btn-info text-white" type="submit">
                                                        <svg class="icon">
                                                            <use
                                                                xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-cloud-download') }}">
                                                            </use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div class="">

                                            <div id="container2" class="mt-4"></div>
                                            {{-- <div class="c-chart-wrapper">
                                                    <canvas class="chart" id="myChartStack" height="800"
                                                        width="1377"
                                                        style="display: block; box-sizing: border-box; height: 500px; width: 918px;"></canvas>
                                                </div> --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="d-flex justify-content-between mt-4">
                                        <div>
                                            <h4 class="card-title mb-0">Overview of Faculty Performance Percentages Across
                                                Subjects (Radar Chart) </h4>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mt-4">
                                            <div class="card mb-4">
                                                <div class="card-body">

                                                    <div class="example">
                                                        <div class="tab-content rounded-bottom">
                                                            <div class="c-chart-wrapper">
                                                                <div id="containerRadar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-4">
                                            {{-- <div class="row"> --}}
                                            <div class="col mb-4">
                                                <div class="card text-white bg-primary">
                                                    <div class="card-body">
                                                        <div class="fs-4 fw-semibold">{{ $formatedHighest }}%</div>
                                                        <div>{{ $highestKey }}</div>
                                                        <div class="progress progress-white progress-thin my-2">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div><small class="text-medium-emphasis-">Highest Average among
                                                            subject</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-4">
                                                <div class="card text-white bg-danger">
                                                    <div class="card-body">
                                                        <div class="fs-4 fw-semibold">{{ $formatedLowest }}%</div>
                                                        <div>{{ $lowestKey }}</div>
                                                        <div class="progress progress-white progress-thin my-2">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div><small class="text-medium-emphasis-">Lowest Average among
                                                            subject</small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div id="container"></div>

                                </div>


                            </div>

                        </div>

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

                                <div id="containerSentiment"></div>
                                <hr>
                                <div id="containerWord"></div>



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
                                    <div class="fs-4 fw-semibold pb-3">436 Students</div><small class="text-success">
                                    </small>
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
                                    <div class="fs-4 fw-semibold pb-3">44 Students</div><small class="text-success">(50.4%
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
                                    <div class="fs-4 fw-semibold pb-3">385 Students</div><small class="text-danger">(17.2%
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
                                    <div class="fs-4 fw-semibold pb-3">70 Students</div><small class="text-warning">(20.2%
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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp" alt="avatar"
                                        width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">
                                                March 07, 2021
                                                <span class="badge bg-primary">Pending</span>
                                            </p>
                                            <a href="#!" class="link-muted"><i
                                                    class="fas fa-pencil-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar"
                                        width="60" height="60" />
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
                                            <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(33).webp" alt="avatar"
                                        width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">
                                                March 24, 2021
                                                <span class="badge bg-danger">Rejected</span>
                                            </p>
                                            <a href="#!" class="link-muted"><i
                                                    class="fas fa-pencil-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
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
                                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(24).webp" alt="avatar"
                                        width="60" height="60" />
                                    <div>
                                        <h6 class="fw-bold mb-1">Betty Walker</h6>
                                        <div class="d-flex align-items-center mb-3">
                                            <p class="mb-0">
                                                March 30, 2021
                                                <span class="badge bg-primary">Pending</span>
                                            </p>
                                            <a href="#!" class="link-muted"><i
                                                    class="fas fa-pencil-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                            <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
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
    <script src="{{ asset('admin/code/highcharts.js') }}"></script>
    <script src="{{ asset('admin/code/modules/data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/drilldown.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/histogram-bellcurve.js') }}"></script>
    <script src="{{ asset('admin/code/highcharts-more.js') }}"></script>
    <script src="{{ asset('admin/code/modules/wordcloud.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
        integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const category = {!! json_encode(array_keys($totalPercentageByCategory)) !!};
            const resultsByCategory = {!! json_encode(array_values($totalPercentageByCategory)) !!};

            let combineData = category.map((cat, index) => {
                return {
                    category: cat,
                    mean: resultsByCategory[index]
                };
            });


            //radar chart
            const chartData = @json($overallPercentageBySubject);

            const labelsRadar = Object.keys(chartData);
            const dataRadar = Object.values(chartData);


            Highcharts.chart("containerRadar", {
                chart: {
                    polar: true,
                    type: "line",
                },

                accessibility: {
                    description: "A spiderweb chart compares the allocated budget " +
                        "against actual spending within an organization. The spider " +
                        "chart has six spokes. Each spoke represents one of the 6 " +
                        "departments within the organization: sales, marketing, " +
                        "development, customer support, information technology and " +
                        "administration. The chart is interactive, and each data point " +
                        "is displayed upon hovering. The chart clearly shows that 4 of " +
                        "the 6 departments have overspent their budget with Marketing " +
                        "responsible for the greatest overspend of $20,000. The " +
                        "allocated budget and actual spending data points for each " +
                        "department are as follows: Sales. Budget equals $43,000; " +
                        "spending equals $50,000. Marketing. Budget equals $19,000; " +
                        "spending equals $39,000. Development. Budget equals $60,000; " +
                        "spending equals $42,000. Customer support. Budget equals $35," +
                        "000; spending equals $31,000. Information technology. Budget " +
                        "equals $17,000; spending equals $26,000. Administration. Budget " +
                        "equals $10,000; spending equals $14,000.",
                },

                title: {
                    text: "Radar Chart",
                    x: -80,
                },

                pane: {
                    size: "80%",
                },

                xAxis: {
                    categories: labelsRadar,
                    tickmarkPlacement: "on",
                    lineWidth: 0,
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
                        "%{point.y:,.0f}</b><br/>",
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

        // Histogram Chart
        const data9 = @json($histogramData);

        Highcharts.chart('container', {
            title: {
                text: 'Faculty Performance Evaluation Histogram'
            },
            xAxis: {
                title: {
                    text: 'Total Rating'
                },
                alignTicks: false,
                min: 0,
                max: 25


            },
            yAxis: {
                title: {
                    text: 'Number of Evaluator'
                },
                alignTicks: false,
                min: 0,

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
                name: 'Histogram',
                type: 'histogram',
                baseSeries: 's1',
                zIndex: -1
            }, {
                name: 'Data',
                type: 'scatter',
                data: data9,
                id: 's1',
                visible: false,
                showInLegend: false
            }]
        });


        //over alll result by category bar chart

        const drilldownData = @json($overAllMean);

        var seriesData = [];
        for (let key in drilldownData) {
            let numericValue = parseFloat(drilldownData[key]);
            seriesData.push({
                name: key,
                y: numericValue,

            });
        }


        Highcharts.chart("containerDrilldown", {
            chart: {
                type: "column",
            },
            title: {
                align: "left",
                text: "Overall Evaluation Result",
            },
            subtitle: {
                align: "left",
                text: '1st Semester January, 2022',
            },
            accessibility: {
                announceNewData: {
                    enabled: true,
                },
            },
            xAxis: {
                type: "category",
            },
            yAxis: {
                title: {
                    text: "Overall Evaluation Result",
                },
                min: 0,
                max: 100
            },
            legend: {
                enabled: false,
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: "{point.y:.1f}%",
                        style: {
                            textDecoration: 'none' // Remove underline from labels
                        }
                    },
                },
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
                    "<b>{point.y:.2f}%</b> of total<br/>",
            },

            series: [{
                name: "Browsers",
                colorByPoint: true,
                data: seriesData
            }, ],

        });
        // bar stacked
        var totalMeanByCategory = @json($totalMeanByCategory);
        console.log(totalMeanByCategory);
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
            exporting: {
                enabled: false,
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
                                opacity: 1,
                            })
                            // Animate to the final position
                            .animate({
                                    start: args.start,
                                    end: args.end,
                                }, {
                                    duration: animation.duration / points.length,
                                },
                                function() {
                                    // On complete, start animating the next point
                                    if (points[point.index + 1]) {
                                        fanAnimate(points[point.index + 1], args.end);
                                    }
                                    // On the last point, fade in the data labels, then
                                    // apply the inner size
                                    if (point.index === series.points.length - 1) {
                                        series.dataLabelsGroup.animate({
                                                opacity: 1,
                                            },
                                            void 0,
                                            function() {
                                                points.forEach((point) => {
                                                    point.opacity = 1;
                                                });
                                                series.update({
                                                        enableMouseTracking: true,
                                                    },
                                                    false
                                                );
                                                chart.update({
                                                    plotOptions: {
                                                        pie: {
                                                            innerSize: "40%",
                                                            borderRadius: 8,
                                                        },
                                                    },
                                                });
                                            }
                                        );
                                    }
                                }
                            );
                    }
                }

                if (init) {
                    // Hide points on init
                    points.forEach((point) => {
                        point.opacity = 0;
                    });
                } else {
                    fanAnimate(points[0], startAngleRad);
                }
            };
        })(Highcharts);

        Highcharts.chart("containerSentiment", {
            chart: {
                type: "pie",
            },
            title: {
                text: "Departamental Strength of the Company",
                align: "left",
            },
            subtitle: {
                text: "Custom animation of pie series",
                align: "left",
            },
            exporting:{
                enabled: false,
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>",
            },
            accessibility: {
                point: {
                    valueSuffix: "%",
                },
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    borderWidth: 2,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: true,
                        format: "<b>{point.name}</b><br>{point.percentage:.1f}%",
                        distance: 20,
                    },
                },
            },

            series: [{
                // Disable mouse tracking on load, enable after custom animation
                enableMouseTracking: false,
                animation: {
                    duration: 2000,
                },


                data: [{
                        name: "Neutral",
                        y: 190,
                        color:"#FF0000 "
                    },
                    {
                        name: "Negative",
                        y: 50.4,
                        color: "##FFA500"
                    },
                    {
                        name: "Positive",
                        y: 99,
                    },
                ],
            }, ],
        });

        const text =
          "Chapter 1. Down the Rabbit-Hole " +
          "Alice was beginning to get very tired of sitting by her sister on " +
          "the bank, and of having nothing to do: " +
          "once or twice she had peeped into the book her sister was reading, " +
          "but it had no pictures or conversations " +
          "in it, 'and what is the use of a book,' thought Alice " +
          "'without pictures or conversation?'" +
          "So she was considering in her own mind (as well as she could, for " +
          "the hot day made her feel very sleepy " +
          "and stupid), whether the pleasure of making a daisy-chain would be " +
          "worth the trouble of getting up and picking " +
          "the daisies, when suddenly a White Rabbit with pink eyes ran close " +
          "by her.",
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

      console.log(data);

      Highcharts.chart("containerWord", {
        accessibility: {
          screenReaderSection: {
            beforeChartFormat:
              "<h5>{chartTitle}</h5>" +
              "<div>{chartSubtitle}</div>" +
              "<div>{chartLongdesc}</div>" +
              "<div>{viewTableButton}</div>",
          },
        },
        series: [
          {
            type: "wordcloud",
            data,
            name: "Occurrences",
          },
        ],
        title: {
          text: "Wordcloud Most Common Words use ",
          align: "left",
        },
        exporting:{
            enabled: false,
        },
        subtitle: {
          text: "keywords",
          align: "left",
        },
        tooltip: {
          headerFormat:
            '<span style="font-size: 16px"><b>{point.key}</b>' + "</span><br>",
        },
      });
    </script>
@endpush
