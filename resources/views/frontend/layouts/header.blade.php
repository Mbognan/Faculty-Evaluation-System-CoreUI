<style>

</style>
<header class="bg-light">
    <!-- Navbar  Top-->
    <div class="topbar d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-8">
                    <div class="topbar-left topbar-right d-flex align-items-center">
                        <ul class="topbar-sosmed p-0 mr-3">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                        </ul>
                        <div class="topbar-text">
                            Friday, May 19, 2023
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="list-unstyled topbar-right d-flex align-items-center justify-content-end">
                        <ul class="topbar-link mb-0">
                            @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="">Logout</button>
                            </form>
                        @else
                            <ul class="topbar-link mb-0">
                                <li><a href="{{ route('login-user') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Navbar Top  -->


    <!-- Navbar  -->

    <!-- Navbar menu  -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mb-0 mx-auto">

                        <img src="{{ asset('frontend/assets/images/logomaster.png') }}"  alt="Desktop Logo" class="desktop-logo img-fluid logo">

                        <img src="{{ asset('frontend/assets/images/pitno.png') }}" alt="Mobile Logo" class="mobile-logo img-fluid2 logo" style="font-size: 80px">

                </figure>

                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('homeview') }}">home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="about-us.html"> about </a>
                        </li>
                        <li class="nav-item dropdown has-megamenu">
                            <a class="nav-link" href="blog.html">Administration</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Pages </a>
                            <ul class="dropdown-menu animate fade-up">
                                <li><a class="dropdown-item icon-arrow" href="blog_details.html"> Blog single detail
                                    </a></li>
                                <li><a class="dropdown-item" href="404.html"> 404 Error </a>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html"> contact </a></li>
                    </ul>


                    <!-- Search bar.// -->

                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Search "
                                                id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                href="/search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
    </div>
    <!-- End Navbar menu  -->


    <!-- Navbar sidebar menu  -->
    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="widget__form-search-bar  ">
                        <div class="row no-gutters">
                            {{-- <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value=""
                                    placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div> --}}
                            <figure class="mb-0 mx-auto">
                                <a href="index.html">
                                    <img src="{{ asset('frontend/assets/images/pitno.png') }}" alt="Mobile Logo" class="mobile-logo img-fluid2 logo" style="font-size: 80px">
                                </a>
                            </figure>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link active text-dark" href="index.html"> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="about-us.html"> About </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="blog.html">Blog </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active dropdown-toggle  text-dark" href="#"
                                    data-toggle="dropdown">Pages </a>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a class="dropdown-item" href="blog_details.html">Blog details</a></li>
                                    <li><a class="dropdown-item" href="404.html"> 404 Error</a></li>

                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link  text-dark" href="contact.html"> Contact </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <div class="modal-footer">
                    <p>© 2024<a href="https://websolutionus.com/.com"> pitad21.bacbacmarjoefrank@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>
</header>
