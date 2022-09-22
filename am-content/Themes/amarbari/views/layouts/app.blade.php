<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    {!! SEO::generate(true) !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.ico') }}"/>
     <!-- All css file here -->
    @if(Session::has('lang_position'))
    @if(Session::get('lang_position') == 'RTL')
    <link rel="stylesheet" href="{{ theme_asset('assets/css/bootstrap-rtl.css') }}">
    @else
    <link rel="stylesheet" href="{{ theme_asset('assets/css/bootstrap.min.css') }}">
    @endif
    @else
    <link rel="stylesheet" href="{{ theme_asset('assets/css/bootstrap.min.css') }}">
    @endif
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,600,600i,700,700i&display=swap">
    <style>
        :root{
            --theme-color: {{ theme_color() }};
        }
    </style>
    <link rel="stylesheet" href="{{ theme_asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/hc-offcanvas-nav.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/selectric.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/helper.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/responsive.css') }}">
    @if(Session::has('lang_position'))
    @if(Session::get('lang_position') == 'RTL')
    <link rel="stylesheet" href="{{ theme_asset('assets/css/rtl.css') }}">
    @endif
    @endif
    @stack('css')

</head>
<body>
    <!-- header are start -->
    @include('theme::layouts.partials.header')
    <!-- header are end -->

    @yield('content')

    <!-- footer area start -->
    @include('theme::layouts.partials.footer')
    <!-- footer area end -->
    @php
    $get_currency_info=get_currency_info();
    $name=$get_currency_info['name'] ?? 'USD';
    $icon=$get_currency_info['icon'] ?? '$';
    $rate=$get_currency_info['rate'] ?? 1;
    $position=$get_currency_info['position'] ?? 'left';
    @endphp

    <input type="hidden" class="currency_name" value="{{ $name }}">
    <input type="hidden" class="currency_icon" value="{{ $icon }}">
    <input type="hidden" class="currency_rate" value="{{ $rate }}">
    <input type="hidden" class="currency_position" value="{{ $position }}">
    <input type="hidden" id="asset_url" value="{{ asset('/') }}">
    <input type="hidden" id="base_url" value="{{ asset('/') }}">
    <input type="hidden" value="{{ route('property.favourite') }}" id="favourite_property_url">
    <input type="hidden" id="favourite_check_url" value="{{ route('favourite.check') }}">

    <!-- All js file here -->
    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/iconify.min.js') }}"></script>
    <script src="{{ theme_asset('assets/js/hc-offcanvas-nav.js') }}"></script>
    <script src="{{ theme_asset('assets/js/jquery.selectric.js') }}"></script>
    <script src="{{ theme_asset('assets/js/helper.js') }}"></script>
    <script src="{{ theme_asset('assets/js/login.js') }}"></script>
    @stack('js')
    <script src="{{ theme_asset('assets/js/script.js') }}"></script>
    {{ google_analytics() }}
</body>
</html>
