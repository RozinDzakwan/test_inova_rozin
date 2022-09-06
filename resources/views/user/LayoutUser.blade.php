<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inova Medika</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('bootUser/images/icons/favicon.png') }}" />

    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bootUser/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bootUser/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/vendor/MagnificPopup/magnific-popup.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('bootUser/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bootUser/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.css') }}">
    <!--===============================================================================================-->
</head>

<body class="animsition">
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="{{ route('user.index') }}" class="logo">
                        <img src="{{ asset('bootUser/logo.jpg') }}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="@if ($header == 'Home') active-menu @endif">
                                <a href="{{ route('user.index') }}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="@if ($header == 'Obat') active-menu @endif">
                                <a href="{{ route('userobat.index') }}" style="text-decoration: none">Obat</a>
                            </li>
                            <li class="@if ($header == 'Konsultasi') active-menu @endif">
                                <a href="{{ route('userkonsultasi.index') }}">Konsultasi</a>
                            </li>
                            <li class="@if ($header == 'Pegawai') active-menu @endif">
                                <a href="{{ url('userpegawai') }}">Pegawai</a>
                            </li>
                            <li class="@if ($header == '') active-menu @endif">
                                <a href="">Cabang</a>
                            </li>
                            <li class="@if ($header == 'Riwayat') active-menu @endif">
                                <a href="{{ url('riwayat') }}">Riwayat</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <style>
                            #ll:hover {
                                background-color: #171010;
                            }
                        </style>
                        <div class="flex-c-m h-full p-lr-19" id="ll">
                            <a href="{{ url('logout') }}">
                                @if (session()->get('id'))
                                    <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11">
                                        logout
                                    </div>
                                @else
                                    <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11">
                                        login
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{ route('user.index') }}"><img src="{{ asset('bootUser/logo.jpg') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li class="">
                    <a href="{{ route('user.index') }}">Home</a>
                </li>
                <li class="">
                    <a href="{{ route('userobat.index') }}">Obat</a>
                </li>

                <li>
                    <a href="{{ route('userkonsultasi.index') }}">Konsultasi</a>
                </li>

                <li>
                    <a href="about.html">Pegawai</a>
                </li>
                <li>
                    <a href="contact.html">Cabang</a>
                </li>
                <li>
                    <a href="{{ url('riwayat') }}">Riwayat</a>
                </li>
            </ul>
        </div>

    </header>


    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <span class="mtext-101 cl5">
                        Welcome
                    </span>
                    <div><br></div>
                    <li class="p-b-13">
                        <a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
                            Home
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>


    <!-- Cart -->


    @yield('content')
    <!-- Slider -->


    <!-- Footer -->
    <footer class="bg3 p-t-60 p-b-32">
        <div class="container">
            <div class="row">
                <div class="p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Muhammad Rozin Dzakwan
                    </h4>
                    {{-- <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shoes
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Watches
                            </a>
                        </li>
                    </ul> --}}
                </div>

                {{-- <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        GET IN TOUCH
                    </h4>

                    <p class="stext-107 cl7 size-201">
                        Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us
                        on (+1) 96 716 6879
                    </p>

                    <div class="p-t-27">
                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Newsletter
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                                placeholder="email@example.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->


    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('bootUser/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('bootUser/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('bootUser/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('bootUser/js/main.js') }}"></script>
</body>

</html>
