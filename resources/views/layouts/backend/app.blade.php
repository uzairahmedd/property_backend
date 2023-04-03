<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
{{--    <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>--}}
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">
        <link href="{{asset('admin/assets/css/datatables.bundle.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    @yield('style')
    <!-- Template CSS -->
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">--}}
    @stack('dashboard_css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/responsive.css') }}">

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
    <script src="{{asset('admin/assets/js/datatables.bundle.js')}}"></script>

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




{{--    <!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}

{{--<!--begin::Head-->--}}
{{--<head>--}}
{{--    <meta charset="utf-8"/>--}}
{{--    --}}{{--    <meta name="description" content="ersions. Grab your copy now and get life-time updates for free."/>--}}
{{--    --}}{{--    <meta name="keywords" content="bootstrap timepicker, fullcalendar, datatables, flaticon"/>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1"/>--}}
{{--    --}}{{--    <meta property="og:locale" content="en_US"/>--}}
{{--    --}}{{--    <meta property="og:type" content="article"/>--}}
{{--    --}}{{--    <meta property="og:title"--}}
{{--    --}}{{--          content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>--}}
{{--    --}}{{--    <meta property="og:url" content="https://keenthemes.com/metronic"/>--}}
{{--    --}}{{--    <meta property="og:site_name" content="Keenthemes | Metronic"/>--}}
{{--    --}}{{--    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>--}}
{{--    <title>{{ config('app.name') }} | {{ Request::segment(2) }}</title>--}}
{{--    <!-- Favicon icon -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>--}}
{{--    <!--begin::Fonts-->--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">--}}
{{--    <!--end::Fonts-->--}}
{{--    <!-- Template CSS -->--}}
{{--    --}}{{--    <!-- General CSS Files -->--}}
{{--        <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">--}}
{{--        <link rel="stylesheet" href="{{ asset('admin/assets/css/fontawesome.min.css') }}">--}}
{{--        <link rel="stylesheet" href="{{ asset('admin/assets/css/selectric.css') }}">--}}
{{--    <!--begin::Page Vendor Stylesheets(used by this page)-->--}}
{{--    <link href="{{asset('admin/assets/css/datatables.bundle.css')}}" rel="stylesheet"--}}
{{--          type="text/css"/>--}}
{{--    <link href="{{asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <!--end::Page Vendor Stylesheets-->--}}
{{--    <!--begin::Global Stylesheets Bundle(used by all pages)-->--}}
{{--    <link href="{{asset('admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <link href="{{asset('admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>--}}
{{--    <!--end::Global Stylesheets Bundle-->--}}

{{--</head>--}}
{{--<!--end::Head-->--}}

{{--<!--begin::Body-->--}}
{{--<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">--}}
{{--<!--begin::Main-->--}}
{{--<!--begin::Root-->--}}
{{--<div class="d-flex flex-column flex-root">--}}
{{--    <!--begin::Page-->--}}
{{--    <div class="page d-flex flex-row flex-column-fluid">--}}
{{--        <!--begin::Wrapper-->--}}
{{--        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">--}}
{{--            @include('layouts/backend/partials/header')--}}
{{--            @include('layouts/backend/partials/sidebar')--}}
{{--            <!-- Main Content -->--}}
{{--        </div>--}}
{{--        <div class="main-content">--}}
{{--            @yield('head')--}}

{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="modal fade" id="property_logs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLongTitle">{{__('labels.Property_Logs')}}</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}

{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('labels.close')}}</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!--begin::Javascript-->--}}
{{--<script>var hostUrl = "assets/";</script>--}}
{{--<!--begin::Global Javascript Bundle(used by all pages)-->--}}
{{--<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/scripts.bundle.js')}}"></script>--}}
{{--<!--end::Global Javascript Bundle-->--}}
{{--<!--begin::Page Vendors Javascript(used by this page)-->--}}
{{--<script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>--}}

{{--<!--end::Page Vendors Javascript-->--}}
{{--<!--begin::Page Custom Javascript(used by this page)-->--}}
{{--<script src="{{asset('admin/assets/new_js/widgets.bundle.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/custom/widgets.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/custom/apps/chat/chat.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/custom/utilities/modals/upgrade-plan.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/custom/utilities/modals/new-target.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/new_js/custom/utilities/modals/users-search.js')}}"></script>--}}
{{--<!--end::Page Custom Javascript-->--}}
{{--<!--end::Javascript-->--}}

{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>--}}
{{--<!-- Template JS File -->--}}
{{--<script src="{{ asset('admin/assets/js/plugins.bundle.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>--}}
{{--<script src="{{theme_asset('assets/newjs/yearpicker.js')}}"></script>--}}
{{--<script src="{{ asset('admin/assets/js/custom.js') }}"></script>--}}
{{--<script src="{{ asset('admin/assets/js/jquery.selectric.min.js') }}"></script>--}}
{{--@yield('script')--}}
{{--<script src="{{ asset('admin/js/main.js') }}"></script>--}}
{{--@yield('land_block_js')--}}

{{--</body>--}}

{{--</html>--}}




















