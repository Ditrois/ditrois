<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &dash; Distrois</title>

    <link rel="icon" href="{{ asset('landing-page/img/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="../dashboard/node_modules/jqvmap/dist/jqvmap.min.css"> --}}
    {{-- <link rel="stylesheet" href="../dashboard/node_modules/weathericons/css/weather-icons.min.css"> --}}
    {{-- <link rel="stylesheet" href="../dashboard/node_modules/weathericons/css/weather-icons-wind.min.css"> --}}
    <link rel="stylesheet" href={{ asset("dashboard/assets/vendor/summernote/dist/summernote-bs4.css")}}>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/custom.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('dashboard.layout.navbar')
            <div class="main-sidebar">
                @yield('sidebar')
            </div>
            @yield('content')
        </div>
        @include('dashboard.layout.footer')
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('dashboard/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src={{ asset("dashboard/assets/vendor/summernote/dist/summernote-bs4.js")}}></script>
    {{-- <script src="../dashboard/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
        <script src="../dashboard/node_modules/chart.js/dist/Chart.min.js"></script>
        <script src="../dashboard/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
        <script src="../dashboard/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../dashboard/node_modules/summernote/dist/summernote-bs4.js"></script>
        <script src="../dashboard/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}

    <!-- Template JS File -->
    <script src="{{ asset('dashboard/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
