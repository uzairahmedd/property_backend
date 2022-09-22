<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>
  <!-- Favicon icon -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.ico') }}"/>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">
  @yield('style')
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

</head>

<body>

 <div id="app">
  <div class="main-wrapper">
    <div class="navbar-bg"></div>
    @include('layouts/backend/partials/header')
    @include('layouts/backend/partials/sidebar')
    <!-- Main Content -->
    <div class="main-content">
        @yield('head')

        @yield('content')
    </div>
  </div>
</div>

@yield('extra')

<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('admin/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.all.min.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.selectric.min.js') }}"></script>
@yield('script')
<script src="{{ asset('admin/js/main.js') }}"></script>


</body>
</html>
