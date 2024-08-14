{{-- <style>

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
</header> --}}
<style>
    .logo{
        max-width: 35%;
    }
</style>
  <!--=============================
        TOPBAR START
    ==============================-->
    <section class="fp__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8">
                    <ul class="fp__topbar_info d-flex flex-wrap">
                        <li><a href="mailto:pitad.21bacbacmarjoefrank@gmail.com"><i class="fas fa-envelope "></i> pitad.21bacbacmarjoefrank@gmail.com</a>
                        </li>
                        <li><a href="callto:0923120178"><i class="fas fa-phone-alt"></i> 0923120178</a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-md-4 d-none d-md-block">
                    <ul class="topbar_icon d-flex flex-wrap">
                        @guest
                            {{-- <li><a href="{{ route('login-user') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> --}}
                            <li><a href="{{ route('login-user') }}">Login</a> </li>
                            <li><a href="{{ route('register') }}">Register</a> </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('frontend/assets/images/pitno.png') }}" alt="" class="logo bold  ">Palompon Institute of Techonology
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('homeview') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">about PIT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                        <ul class="droap_menu">

                            <li><a href="blog_details.html">blog details</a></li>
                            <li><a href="cart_view.html">cart view</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="privacy_policy.html">privacy policy</a></li>
                            <li><a href="terms_condition.html">terms and condition</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="menu_icon d-flex flex-wrap">
                    <li>
                        <a href="#" class="menu_search"><i class="far fa-search"></i></a>
                        <div class="fp__search_form">
                            <form>
                                <span class="close_search"><i class="far fa-times"></i></span>
                                <input type="text" placeholder="Search . . .">
                                <button type="submit">search</button>
                            </form>
                        </div>
                    </li>

                    <li>
                        @auth
                        @if (Auth::user()->user_type === 'user')
                        <a  href="{{ route('user.profile.index') }}"><i class="fas fa-user"></i></a>
                        @elseif(Auth::user()->user_type === 'faculty')
                        <a   href="{{ route('user.profile.index') }}"><i class="fas fa-user"></i></a>
                        @endif
                    @endauth

                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="fp__menu_cart_area">
        <div class="fp__menu_cart_boody">
            <div class="fp__menu_cart_header">
                <h5>total item (05)</h5>
                <span class="close_cart"><i class="fal fa-times"></i></span>
            </div>
            <ul>
                <li>
                    <div class="menu_cart_img">
                        <img src="images/menu8.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="#">Hyderabadi Biryani </a>
                        <p class="size">small</p>
                        <span class="extra">coca-cola</span>
                        <span class="extra">7up</span>
                        <p class="price">$99.00 <del>$110.00</del></p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
                <li>
                    <div class="menu_cart_img">
                        <img src="images/menu4.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="#">Chicken Masalas</a>
                        <p class="size">medium</p>
                        <span class="extra">7up</span>
                        <p class="price">$70.00</p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
                <li>
                    <div class="menu_cart_img">
                        <img src="images/menu5.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="#">Competently Supply Customized Initiatives</a>
                        <p class="size">large</p>
                        <span class="extra">coca-cola</span>
                        <span class="extra">7up</span>
                        <p class="price">$120.00 <del>$150.00</del></p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
                <li>
                    <div class="menu_cart_img">
                        <img src="images/menu6.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="#">Hyderabadi Biryani</a>
                        <p class="size">small</p>
                        <span class="extra">7up</span>
                        <p class="price">$59.00</p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
                <li>
                    <div class="menu_cart_img">
                        <img src="images/menu1.png" alt="menu" class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text">
                        <a class="title" href="#">Competently Supply</a>
                        <p class="size">medium</p>
                        <span class="extra">coca-cola</span>
                        <span class="extra">7up</span>
                        <p class="price">$99.00 <del>$110.00</del></p>
                    </div>
                    <span class="del_icon"><i class="fal fa-times"></i></span>
                </li>
            </ul>
            <p class="subtotal">sub total <span>$1220.00</span></p>
            <a class="cart_view" href="cart_view.html"> view cart</a>
            <a class="checkout" href="check_out.html">checkout</a>
        </div>
    </div>

    <div class="fp__reservation">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Book a Table</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="fp__reservation_form">
                            <input class="reservation_input" type="text" placeholder="Name">
                            <input class="reservation_input" type="text" placeholder="Phone">
                            <input class="reservation_input" type="date">
                            <select class="reservation_input" id="select_js">
                                <option value="">select time</option>
                                <option value="">08.00 am to 09.00 am</option>
                                <option value="">10.00 am to 11.00 am</option>
                                <option value="">12.00 pm to 01.00 pm</option>
                                <option value="">02.00 pm to 03.00 pm</option>
                                <option value="">04.00 pm to 05.00 pm</option>
                            </select>
                            <select class="reservation_input" id="select_js2">
                                <option value="">select person</option>
                                <option value="">1 person</option>
                                <option value="">2 person</option>
                                <option value="">3 person</option>
                                <option value="">4 person</option>
                                <option value="">5 person</option>
                            </select>
                            <button type="submit">book table</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=============================
        MENU END
    ==============================-->

