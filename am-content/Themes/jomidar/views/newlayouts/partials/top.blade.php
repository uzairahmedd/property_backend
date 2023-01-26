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
    <!-- owl carousel files -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.min.css')}}">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.12.0/mapbox-gl.js"></script>
    <!-- <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css"> -->
    <!-- Home Stylesheet -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/common.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/home.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/view-item.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/en-responsive.css')}}">
    @stack('css')
</head>