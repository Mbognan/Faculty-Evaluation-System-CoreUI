@extends('admin.layouts.master')

@section('header')
<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button"
            onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
            </svg>
        </button><a class="header-brand d-md-none" href="#">
            <svg width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('admin/assets/brand/coreui.svg#full') }}"></use>
            </svg></a>
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
        </ul>
        <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-list-rich')}}"></use>
                    </svg></a></li>
            <li class="nav-item"><a class="nav-link" href="#">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                    </svg></a></li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#"
                    role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('assets/img/avatars/8.jpg') }}"
                            alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Account</div>
                    </div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-bell')}}"></use>
                        </svg> Updates<span class="badge badge-sm bg-info ms-2">42</span></a><a
                        class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"></use>
                        </svg> Messages<span class="badge badge-sm bg-success ms-2">42</span></a><a
                        class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-task')}}"></use>
                        </svg> Tasks<span class="badge badge-sm bg-danger ms-2">42</span></a><a
                        class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-comment-square')}}"></use>
                        </svg> Comments<span class="badge badge-sm bg-warning ms-2">42</span></a>
                    <div class="dropdown-header bg-light py-2">
                        <div class="fw-semibold">Settings</div>
                    </div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                        </svg> Profile</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                        </svg> Settings</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-credit-card')}}"></use>
                        </svg> Payments<span class="badge badge-sm bg-secondary ms-2">42</span></a><a
                        class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-file')}}"></use>
                        </svg> Projects<span class="badge badge-sm bg-primary ms-2">42</span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                        </svg> Lock Account</a><a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                        </svg> Logout</a>
                </div>
            </li>
        </ul>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                    <!-- if breadcrumb is single--><span>Home</span>
                </li>
                <li class="breadcrumb-item active"><span>Dashboard</span></li>
            </ol>
        </nav>
    </div>
</header>
@endsection

@section('contents')
<div class="row">
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-primary">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                <svg class="icon">
                  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                </svg>)</span></div>
            <div>Users</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
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
            <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                <svg class="icon">
                  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                </svg>)</span></div>
            <div>Income</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
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
            <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                <svg class="icon">
                  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-top') }}"></use>
                </svg>)</span></div>
            <div>Conversion Rate</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
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
            <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                <svg class="icon">
                  <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom') }}"></use>
                </svg>)</span></div>
            <div>Sessions</div>
          </div>
          <div class="dropdown">
            <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg class="icon">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-options') }}"></use>
              </svg>
            </button>
            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection
