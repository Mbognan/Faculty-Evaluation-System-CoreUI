@extends('admin.layouts.master')



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
            <div id="container2"></div>
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
    <div class="row">
        <div class="col-xl-9">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-title fs-4 fw-semibold" data-coreui-i18n="users">Users</div>
                            <div class="card-subtitle text-body-secondary mb-4"
                                data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered
                                users</div>
                        </div>
                        <div class="col-auto ms-auto">
                            <button class="btn btn-secondary">
                                <svg class="icon me-2">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
                                </svg><span data-coreui-i18n="addNewUser">Add new user</span>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="fw-semibold text-body-secondary">
                                <tr class="align-middle">
                                    <th class="text-center">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                        </svg>
                                    </th>
                                    <th data-coreui-i18n="user">User</th>
                                    <th class="text-center" data-coreui-i18n="country">Country</th>
                                    <th data-coreui-i18n="usage">Usage</th>
                                    <th data-coreui-i18n="activity">Activity</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/1.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-success"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Yiorgos Avraamu</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="new">New</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-success-gradient" role="progressbar"
                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -10, 'range': 'seconds' }">10 seconds
                                            ago</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/2.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-danger-gradient"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Avram Tarasios</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="recurring">Reccuring</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-br"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-info-gradient" role="progressbar"
                                                style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -5, 'range': 'minutes' }">5 minutes
                                            ago</div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/3.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-warning-gradient"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Quintin Ed</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="new">New</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-in"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-warning-gradient" role="progressbar"
                                                style="width: 74%" aria-valuenow="74" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'hours' }">1 hour ago
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/4.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-secondary-gradient"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Enéas Kwadwo</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="new">New</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-danger-gradient" role="progressbar"
                                                style="width: 98%" aria-valuenow="98" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'weeks' }">1 week ago
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/5.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-success"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Agapetus Tadeáš</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="new">New</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-es"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-info-gradient" role="progressbar"
                                                style="width: 22%" aria-valuenow="22" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -3, 'range': 'months' }">3 months ago
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown dropup">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <div class="avatar avatar-md"><img class="avatar-img"
                                                src="assets/img/avatars/6.jpg" alt="user@email.com"><span
                                                class="avatar-status bg-danger-gradient"></span></div>
                                    </td>
                                    <td>
                                        <div class="text-nowrap">Friderik Dávid</div>
                                        <div class="small text-body-secondary text-nowrap"><span
                                                data-coreui-i18n="new">New</span> | <span
                                                data-coreui-i18n="registered">Registered: </span><span
                                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan
                                                10, 2023</span></div>
                                    </td>
                                    <td class="text-center">
                                        <svg class="icon icon-xl">
                                            <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>
                                        </svg>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <div class="fw-semibold">50%</div>
                                            <div class="text-nowrap small text-body-secondary ms-3"><span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}">Jun
                                                    11, 2023</span> - <span
                                                    data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}">Jul
                                                    10, 2023</span></div>
                                        </div>
                                        <div class="progress progress-thin mt-1">
                                            <div class="progress-bar bg-success-gradient" role="progressbar"
                                                style="width: 43%" aria-valuenow="43" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login
                                        </div>
                                        <div class="fw-semibold text-nowrap"
                                            data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'years' }">1 year ago
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown dropup">
                                            <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="icon">
                                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                    href="#" data-coreui-i18n="info">Info</a><a
                                                    class="dropdown-item" href="#"
                                                    data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger"
                                                    href="#" data-coreui-i18n="delete">Delete</a></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
    {{-- <script src="{{ asset('admin/code/modules/series-label.js') }}"></script>
    <script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('admin/code/modules/accessibility.js') }}"></script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
            console.log(faculty_name);

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
                    data:averages
                }],
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            inside: false,
                            color: '#000',
                            align: 'right',
                            formatter: function() {
                                return this.y;
                            },
                            distance: 10
                        }
                    }
                }
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
            for(var categoryResult in overallCategoryResult) {
                if(overallCategoryResult.hasOwnProperty(categoryResult)){

                    dataPie.push({
                        name: categoryResult,
                        y:parseFloat(overallCategoryResult[categoryResult])
                    })
                }
            }
            Highcharts.chart('container3', {
                chart: {
                    type: 'pie',
                    height: 600
                },
                title: {
                    text: 'Average of Each faculty of BSIT Department',
                    align: 'left'
                },
                subtitle: {
                    text: 'Custom animation of pie series',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },

                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        borderWidth: 2,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b><br>{point.percentage:.1f}%',
                            distance: 20
                        }
                    }
                },
                series: [{
                    // Disable mouse tracking on load, enable after custom animation
                    enableMouseTracking: false,
                    animation: {
                        duration: 2000
                    },
                    colorByPoint: true,
                    data: dataPie
                }]
            });



        });
    </script>
@endpush
