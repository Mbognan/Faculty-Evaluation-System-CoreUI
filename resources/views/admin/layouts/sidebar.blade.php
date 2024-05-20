{{-- <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('admin/assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <image href="{{ asset('admin/assets/img/test.png') }}" width="46" height="46" />
        </svg>

    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a>
            </li>
    </ul>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
        </svg> Dashboard</a>
    </li>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>

    <li class="nav-title">Theme</li>
</div> --}}


<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <svg class="sidebar-brand-full" width="100" height="80" alt="CoreUI Logo">
            <image href="{{ asset('admin/assets/brand/pitno.png') }}" width="110" height="70" />
        </svg>
        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            <image href="{{ asset('admin/assets/brand/pitno.png') }}" width="46" height="46" />
        </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a>
        </li>
        <li class="nav-title">Manage Evaluation</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-group') }}"></use>
                </svg> Faculty</a>



            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.faculty.index') }}"><span
                            class="nav-icon"></span>
                        Create Faculty</a></li>
                        <li class="nav-group"><a class="nav-link " href="{{ route('admin.faculty-view') }}">
                            View Result</a>
                        </li>
            </ul>
        </li>

        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg>Evaluation Mngt.</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.index') }}"><span
                            class="nav-icon"></span>
                        Category</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.question.index') }}"><span
                            class="nav-icon"></span>
                        Questions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.evaluation_schedule.index') }}"><span
                            class="nav-icon"></span>
                        Academic Year</a></li>
            </ul>
        </li>

        <li class="nav-title">Manage Request</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-https') }}"></use>
            </svg>Account Verification</a>



        <ul class="nav-group-items">
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.account.verified') }}">
                Verified Accounts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.registration.pending') }}">
                Pending Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.rejected.index') }}">
                    Rejected Accounts </a></li>
        </ul>
    </li>

        <li class="nav-title">Sections</li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.hero.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-apps') }}"></use>
                </svg>Hero Section</a></li>
        <li class="nav-item"><a class="nav-link" href="typography.html">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
                </svg> Under Develop</a></li>


    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
