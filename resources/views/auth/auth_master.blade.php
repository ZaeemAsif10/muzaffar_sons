<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('public/admin_assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/admin_assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('public/admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('public/admin_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <title>Sign In</title>
</head>

<body class="bg-white">

    @yield('auth-content')

</body>

</html>
