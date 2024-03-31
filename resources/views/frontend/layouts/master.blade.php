<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Palompon Institute of Techonology </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('default/favicon.ico') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    {{-- <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css"> --}}
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/css-profile/images/favicon.png')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/all.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header news -->
    @include('frontend.layouts.header')
    <!-- End Header news -->

    @yield('home')


    @include('frontend.layouts.footer')


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
     <!--main/custom js-->
     <script src="{{ asset('frontend/assets/js-profile/js/main.js')}}"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Function to toggle logo based on screen size
        function toggleLogo() {
            var desktopLogo = document.querySelector('.desktop-logo');
            var mobileLogo = document.querySelector('.mobile-logo');
            if (window.innerWidth <= 1202) { // Check if screen size is mobile
                desktopLogo.style.display = 'none';
                mobileLogo.style.display = 'block';
            } else {
                desktopLogo.style.display = 'block';
                mobileLogo.style.display = 'none';
            }
        }

        // Call the function initially
        toggleLogo();

        // Listen for window resize event to toggle logo
        window.addEventListener('resize', toggleLogo);
    </script>

@stack('scripts')
</body>

</html>
