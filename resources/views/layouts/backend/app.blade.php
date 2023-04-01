<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    @yield('style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

</head>

<body>
<div class="overflow-hidden position-relative {{ session()->has('locale') && session()->get('locale') =='en' ? 'ltr' : 'rtl'}}" id="main-home" data-session="">
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
    <div class="modal fade" id="property_logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('labels.Property_Logs')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('labels.close')}}</button>
                </div>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{theme_asset('assets/newjs/yearpicker.js')}}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.selectric.min.js') }}"></script>
    @yield('script')
    <script src="{{ asset('admin/js/main.js') }}"></script>
    @yield('land_block_js')
</div>
</body>

</html>
