@extends('frontend.layouts.master')
@section('home')
    @auth
        <section id="dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        @include('frontend.home.sidebar')
                    </div>

                    <div class="col-lg-9">
                        <div class="dashboard_content">
                            <div class="manage_dasboard">
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
                                            <p>List Of Participant</p>
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
                                            <h4>Raw Data</h4>
                                            <div class="table-responsive">
                                                <table class="table dashboard_table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="active_left">Total Evaluators</td>
                                                            <td class="package_right">100</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">Date</td>
                                                            <td class="package_right">1st Semester</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">total mean</td>
                                                            <td class="package_right">1900</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">Expired Date</td>
                                                            <td class="package_right">14 November, 2021</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">Package name</td>
                                                            <td class="package_right">Free</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">Maximum Listing </td>
                                                            <td class="package_right">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="active_left">Maximum Aminities</td>
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
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-9">
                        <div class="dashboard_content">
                            <div class="manage_dashboard">
                                <div class="active_package">
                                    <h4>Evaluation Result By Category</h4>
                                    <canvas class="chart" id="myChart" height="450" width="1377"
                                    style="display: block; box-sizing: border-box; height: 300px; width: 918px;"></canvas>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            label: 'Mean',
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
                });
    </script>
@endpush
