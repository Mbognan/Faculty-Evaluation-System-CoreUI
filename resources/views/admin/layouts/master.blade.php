<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('admin/assets/img/test.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('admin/assets/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('admin/assets/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('admin/assets/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('admin/assets/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('admin/assets/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('admin/assets/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin/assets/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin/assets/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin/assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admin/assets/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('assets/favicon/manifest.json') }}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('admin/assets/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{ asset('admin/css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="{{ asset('admin/vendors/@coreui/icons/css/free.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.tailwindcss.css" rel="stylesheet">

</head>
@include('admin/layouts.sidebar')
<!--Main content -->
<div class="wrapper d-flex flex-column min-vh-100 bg-light">

     <!-- header -->
     <header class="header header-sticky mb-4 ">
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
                        <div class="avatar avatar-md"><img class="avatar-img" src="{{ asset('admin/assets/img/avatars/8.jpg') }}"
                                alt="user@email.com"></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <div class="fw-semibold">Account</div>
                        </div><a class="dropdown-item" href="#">


                       <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                            <svg class="icon me-2">
                            </svg> Profile
                        </a>
                            <a class="dropdown-item" href="">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-settings')}}"></use>
                            </svg> Settings
                        </a>
                            <a class="dropdown-item" href="#">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"></use>
                            </svg> Lock Account
                        </a>
                        <a class="dropdown-item" href="#">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('admin/vendors/@coreui/icons/svg/free.svg#cil-account-logout')}}"></use>
                            </svg> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>


    </header>
<body>

    <div class="body flex-grow-1 px-3">

        <div class="container-lg">

            <!-- Main content -->
            @yield('contents')
        </div>
    </div>

    <footer class="footer">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI UI Components</a></div>
      </footer>
</div>

<script src="{{ asset('admin/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendors/simplebar/js/simplebar.min.js') }}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset('admin/vendors/chart.js/js/chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
<script src="{{ asset('admin/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>



<script>

  @if ($errors->any())
         @foreach ($errors->all() as $error )
            toastr.error("{{ $error }}")
         @endforeach
        @endif


        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            if (response.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                );

                            } else if (response.status === 'error') {
                                Swal.fire(
                                    'Something wen\'t wrong!',
                                    response.message,
                                    'error'
                                );
                            }
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
</script>
@stack('scripts')
</body>
</html>
