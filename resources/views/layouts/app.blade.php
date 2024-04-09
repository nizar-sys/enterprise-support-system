@php
    $userAuth = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/jquery.min.js"></script>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet"
        href="{{ asset('/stisla/dist') }}/assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/summernote/summernote-bs4.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/css//snackbar.min.css') }}">
    <script src="{{ asset('/assets/js/snackbar.min.js') }}"></script>
    @yield('c_css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('/uploads/images/' . $userAuth->avatar) }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ $userAuth->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <form action="{{ route('logout') }}" class="d-none" id="form-logout" method="post">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); $('#form-logout').submit()"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand mb-5">
                        <a href="{{ route('home', []) }}">
                            <img src="{{ asset('/assets/img/brand/ess-logo.jpeg') }}" class="navbar-brand-img"
                                width="120" alt="...">
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('home', []) }}">ESS</a>
                    </div>
                    <ul class="sidebar-menu">
                        @include('_partials.menus')
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h3>@yield('title-header')</h3>
                        <div class="section-header-breadcrumb">
                            @yield('breadcrumb')
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('/stisla/dist') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/moment.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('/stisla/dist') }}/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/chart.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('/stisla/dist') }}/assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('/stisla/dist') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/js/custom.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        @if (Session::has('success'))
            Snackbar.show({
                text: "{{ session('success') }}",
                backgroundColor: '#28a745',
                actionTextColor: '#212529',
            })
        @elseif (Session::has('error'))
            Snackbar.show({
                text: "{{ session('error') }}",
                backgroundColor: '#dc3545',
                actionTextColor: '#212529',
            })
        @elseif (Session::has('info'))
            Snackbar.show({
                text: "{{ session('info') }}",
                backgroundColor: '#17a2b8',
                actionTextColor: '#212529',
            })
        @endif ;
    </script>

    @yield('script')
</body>

</html>
