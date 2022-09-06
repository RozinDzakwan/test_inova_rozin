<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('judul')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('bootLogin/images/icons/favicon.ico ') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/bootstrap/css/bootstrap.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bootLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bootLogin/fonts/iconic/css/material-design-iconic-font.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/animate/animate.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/css-hamburgers/hamburgers.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/animsition/css/animsition.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/select2/select2.min.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/vendor/daterangepicker/daterangepicker.css ') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/css/util.css ') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootLogin/css/main.css ') }}">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{ asset('bootLogin/background.jpg') }})">
            @yield('content')
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/jquery/jquery-3.2.1.min.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/animsition/js/animsition.min.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/bootstrap/js/popper.js ') }}"></script>
    <script src="{{ asset('bootLogin/vendor/bootstrap/js/bootstrap.min.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/select2/select2.min.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/daterangepicker/moment.min.js ') }}"></script>
    <script src="{{ asset('bootLogin/vendor/daterangepicker/daterangepicker.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/vendor/countdowntime/countdowntime.js ') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootLogin/js/main.js ') }}"></script>

</body>

</html>
