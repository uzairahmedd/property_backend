<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/khiaratee_favicon.png') }}"/>
    <title> عقارات للبيع و للايجار في السعودية</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="{{ theme_asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Select All files -->
    <!-- <link href="css/select2.css" rel="stylesheet" /> -->
    <!-- owl carousel files -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/owl.theme.default.min.css')}}">
    <!-- Home Stylesheet -->
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/common.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/home.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/view-item.css')}}">
    @stack('css')
</head>
