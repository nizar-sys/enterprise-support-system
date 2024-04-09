<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('/stisla/dist') }}/assets/css/components.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
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
    <link rel="stylesheet" href="{{ asset('/assets/css//snackbar.min.css') }}">
    <script src="{{ asset('/assets/js/snackbar.min.js') }}"></script>
</head>

<body class="body">
    @yield('content')

    <!-- General JS Scripts -->
    <script src="{{ asset('/stisla/dist') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/modules/moment.min.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('/stisla/dist') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('/stisla/dist') }}/assets/js/custom.js"></script>
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
</body>

</html>
