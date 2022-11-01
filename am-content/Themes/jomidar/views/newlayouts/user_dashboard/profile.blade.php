@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
    <div class="profile d-flex justify-content-between">
        <div class="col-12 col-lg-9 px-4 px-lg-3 mx-auto">
            <div class="main-content">
                <div
                    class="mb-4_5 d-flex flex-column-reverse flex-lg-row align-items-end  card personal-card justify-content-between align-items-lg-center">
                    <div class="d-flex flex-column align-items-end">
                        <span class="font-16 theme-text-sky">رقم الجوال</span>
                        <div class="d-flex align-items-center">
                            <img src="{{asset('assets/images/tick-verified.png')}}" alt="">
                            <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">05546106060</h3>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-end mb-3 mb-lg-0">
                        <span class="font-16 theme-text-sky">مسجل منذ</span>
                        <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">12-10-2022</h3>
                    </div>
                    <div class="d-flex align-items-center mb-3 mb-lg-0">
                        <div class="col d-flex flex-column align-items-end">
                            <span class="font-16 theme-text-sky">أهلا بك,</span>
                            <h3 class="font-lg-18 font-24 font-medium theme-text-blue mb-0 ms-2">خالد بن عبدالعزيز أل
                                عثمان</h3>
                        </div>
                        <div class="dp-elipse d-flex align-items-center justify-content-center">
                            <img src="{{asset('assets/images/avatar.png')}}" alt="" class="img-fluid">
                            <div class="file-container">
                                <input type="file">
                                <img src="{{asset('assets/images/dp-camera.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-3 flex-wrap justify-content-between">
                    <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                        <div class="card stat-card align-items-end">
                            <span class="font-16 theme-text-sky mb-2">
                                عدد المشاهدات
                            </span>
                            <h2 class="theme-text-blue font-medium">
                                250
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                        <div class="card stat-card align-items-end">
                            <span class="font-16 theme-text-sky mb-2">
                                مزادات شاركت بها
                            </span>
                            <h2 class="theme-text-blue font-medium">
                                2
                            </h2>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-xl-4">
                        <div class="card stat-card align-items-end">
                            <span class="font-16 theme-text-sky mb-2">
                                عدد الإعلانات </span>
                            <h2 class="theme-text-blue font-medium">
                                8
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('theme::newlayouts.partials.sidebar')
    </div>
@endsection
