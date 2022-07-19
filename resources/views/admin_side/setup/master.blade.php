<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- loader-->
    <link href="{{ asset('public/admin_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/admin_assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('public/admin_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/admin_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('public/admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets/css/toastr.css')}}">

    <!--Theme Styles-->
    <link href="{{ asset('public/admin_assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin_assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/admin_assets/css/header-colors.css') }}" rel="stylesheet" />

    <title>Muzaffar & Sons</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        @include('admin_side.setup.sidebar')
        <!--end sidebar -->

        <!--start top header-->
        @include('admin_side.setup.header')
        <!--end top header-->

        @yield('content')

        <!--start footer-->
        {{-- @include('admin_side.setup.footer') --}}
        <!--end footer-->

    </div>
    <!--end wrapper-->


    <!-- JS Files-->
    <script src="{{ asset('public/admin_assets/js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('public/admin_assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="{{ asset('public/admin_assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('public/admin_assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/js/index.js') }}"></script>
    <script src="{{asset('public/admin_assets/js/toastr.min.js')}}"></script>
    <!-- Main JS-->
    <script src="{{ asset('public/admin_assets/js/main.js') }}"></script>


</body>

</html>
