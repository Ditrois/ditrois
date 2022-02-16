<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ditrois - Website and Software Development Company">
    <!-- Title-->
    <title>Ditrois - Website and Software Development Company</title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/core-img/favicon.ico') }}" type="image/x-icon">
    <!-- All CSS Stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/all-css-libraries.css') }}">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
  </head>
  <body>
    <!-- Preloader-->
    <!-- <div class="preloader" id="preloader">
      <div class="spinner-grow text-light" role="status"><span class="visually-hidden">Loading...</span></div>
    </div> -->
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
</body>
</html>