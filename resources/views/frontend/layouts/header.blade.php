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
                                <a href="#"><i class="fab fa-facebook-f"></i></i></a>
                            </li>
                        </ul>
                        <div class="topbar-text" id="currentDateTime">
                            Friday, May 19, 2023
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="list-unstyled topbar-right d-flex align-items-center justify-content-end">
                        <ul class="topbar-link mb-0">


                            @guest
                                <ul class="topbar-link mb-0">
                                    <li><a href="{{ route('login-user') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            @endguest


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

                    <img src="{{ asset('frontend/assets/images/logomaster.png') }}" alt="Desktop Logo"
                        class="desktop-logo img-fluid logo">

                    <img src="{{ asset('frontend/assets/images/pitno.png') }}" alt="Mobile Logo"
                        class="mobile-logo img-fluid2">

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
                            <a class="nav-link" href="contact.html"> contact </a>

                        </li>
                        <li class="nav-item">
                            @auth
                            @if (Auth::user()->user_type === 'user')
                            <a class="nav-link" href="{{ route('user.evaluation.index') }}" target="_blank" rel="noopener noreferrer">Evaluate</a>
                            @endif
                            @endauth
                        </li>
                        <li class="nav-item">
                            @auth
                                @if (Auth::user()->user_type === 'user')
                                    <a class="nav-link" href="{{ route('user.profile.index') }}">Dashboard</a>
                                @elseif(Auth::user()->user_type === 'faculty')
                                    <a class="nav-link" href="{{ route('user.profile.index') }}">Dashboard</a>
                                @endif
                            @endauth
                        </li>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li class="nav-item"> <button type="submit" class=" nav-link bg-white"><i
                                            class="fas fa-sign-out-alt icon-home"></i></button> </i></li>
                            </form>
                        @endauth

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
                                    <img src="{{ asset('frontend/assets/images/pitno.png') }}" alt="Mobile Logo"
                                        class="mobile-logo img-fluid2 logo" style="font-size: 80px">
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
                                <a class="nav-link text-dark" href="blog.html">Contact </a>
                            </li>
                            @auth
                            @if (Auth::user()->user_type === 'user')
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('user.evaluation.index') }}">Evaluate </a>
                            </li>
                            @endif
                            @endauth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"    onclick="event.preventDefault();
                                this.closest('form').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a>
                            </form>

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
