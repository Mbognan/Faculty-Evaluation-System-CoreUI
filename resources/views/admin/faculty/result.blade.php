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
            <div class="col-lg-4 col-md-4">
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
            <div class="col-lg-8 col-md-8">
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
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="card-title mb-0">Evaluation Result By Category </h4>
                        <div class="small text-medium-emphasis">1st Sem - July 2022 </div>
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
                                            : ($percentage <= 90 ? 'bg-info' : 'bg-success') ));
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
                                <div class="progress-bar {{ $progressColor }}" role="progressbar"
                                    style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endsection

    @push('scripts')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
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
        return 'rgba(0, 128, 0, 0.2)' ; // green
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
        return 'rgba(0, 128, 0, 1)' ; // green
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

  // Config for the chart
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


const progressBars = document.querySelectorAll('.progress-bar');
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
</script>
@endpush

    @endpush
