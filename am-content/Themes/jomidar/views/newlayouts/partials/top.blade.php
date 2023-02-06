<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}" />
    <title> عقارات للبيع و للايجار في السعودية</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="{{ theme_asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/selectdrop/hierarchy-select.min.css')}}">
    <link href="{{ theme_asset('assets/newcss/select2.min.css')}}" rel="stylesheet" />
    <!-- owl carousel files -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.min.css')}}">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.js"></script>
    <!-- Home Stylesheet -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/common.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/home.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/view-item.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/en-responsive.css')}}">
    @stack('css')
</head>