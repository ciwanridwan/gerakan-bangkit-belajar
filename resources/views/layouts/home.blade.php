<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gerakan Bangkit Belajar</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo111.png')}}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    @yield('css-paragraf')
    <!-- =======================================================
  * Template Name: Avilon - v2.1.0
  * Template URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    @include('layouts.homes.header')
    @include('layouts.homes.intro')

    <main id="main">

        @yield('content')
    </main><!-- End #main -->

    @include('layouts.footer.footer')

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/venobox/venobox.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/superfish/superfish.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/hoverIntent/hoverIntent.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>