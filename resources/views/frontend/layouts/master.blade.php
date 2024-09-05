<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Palompon Institute of Techonology </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('default/favicon.ico') }}">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet"> --}}
    {{-- <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css"> --}}
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/css-profile/images/favicon.png')}}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/all.min.css')}}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/assets/css-profile/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">





<link rel="stylesheet" href="{{ asset('frontend/new/css/all.min.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/bootstrap.min.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/spacing.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/slick.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/nice-select.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/venobox.min.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/animate.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/jquery.exzoom.css') }}" >

<link rel="stylesheet" href="{{ asset('frontend/new/css/style.css') }}" >
<link rel="stylesheet" href="{{ asset('frontend/new/css/responsive.css') }}" >

</head>
<body>
    <style>

    </style>
    <!-- Header news -->
    @include('frontend.layouts.header')
    <!-- End Header news -->

    @yield('home')


    @include('frontend.layouts.footer')


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
     <!--main/custom js-->
     <script src="{{ asset('frontend/new/js/jquery-3.6.0.min.js') }}" ></script>
     <script src="{{ asset('frontend/assets/js-profile/js/main.js')}}"></script>
     <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
       <!--jquery library js-->

  <!--bootstrap js-->
  <script src="{{ asset('frontend/new/js/bootstrap.bundle.min.js') }}" ></script>
  <!--font-awesome js-->
  <script src="{{ asset('frontend/new/js/Font-Awesome.js') }}" ></script>
  <!-- slick slider -->
  <script src="{{ asset('frontend/new/js/slick.min.js') }}" ></script>
  <!-- isotop js -->
  <script src="{{ asset('frontend/new/js/isotope.pkgd.min.js') }}" ></script>
  <!-- simplyCountdownjs -->
  <script src="{{ asset('frontend/new/js/simplyCountdown.js') }}" ></script>
  <!-- counter up js -->
  <script src="{{ asset('frontend/new/js/jquery.waypoints.min.js') }}" ></script>
  <script src="{{ asset('frontend/new/js/jquery.countup.min.js') }}" ></script>
  <!-- nice select js -->
  <script src="{{ asset('frontend/new/js/jquery.nice-select.min.js') }}" ></script>
  <!-- venobox js -->
  <script src="{{ asset('frontend/new/js/venobox.min.js') }}" ></script>
  <!-- sticky sidebar js -->
  <script src="{{ asset('frontend/new/js/sticky_sidebar.js') }}" ></script>
  <!-- wow js -->
  <script src="{{ asset('frontend/new/js/wow.min.js') }}" ></script>
  <!-- ex zoom js -->
  <script src="{{ asset('frontend/new/js/jquery.exzoom.js') }}" ></script>

  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <!--main/custom js-->
  <script src="{{ asset('frontend/new/js/main.js') }}" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
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



        function updateDateTime() {
        // Get the current date and time
        var currentDate = new Date();

        // Format the date and time
        var dateTimeString = currentDate.toLocaleString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: true
        });

        // Display the date and time
        document.getElementById('currentDateTime').innerText = dateTimeString;
    }

    // Update the date and time immediately and then every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
    </script>

@stack('scripts')
</body>

</html>
