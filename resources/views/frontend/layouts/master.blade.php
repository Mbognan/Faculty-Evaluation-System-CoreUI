<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Palompon Institute of Techonology </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('default/favicon.ico') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Header news -->
    @include('frontend.layouts.header')
    <!-- End Header news -->

    @yield('home')


    @include('frontend.layouts.footer')


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
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
</body>

</html>
