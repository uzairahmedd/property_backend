@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/profile.css')}}">
    <div class="profile d-flex justify-content-end">
        <div class="favorite-container">
            <div class="nav-tab">
                <nav>
                    <div class="nav nav-tabs d-flex align-items-end justify-content-end" id="nav-tab" role="tablist">
                        <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab"
                           aria-controls="nav-profile" aria-selected="false">مزادات</a>
                        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab"
                           aria-controls="nav-home" aria-selected="true">إعلانات</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="all-listing">
                            <div class="property-lists">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="calender d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/calender-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="property-lists pt-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="calender d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/calender-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="all-listing">
                            <div class="property-lists">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="calender d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/calender-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="property-lists pt-4">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="whatsapp d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/whatsapp-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                            <div class="features">
                                                <div class="d-flex justify-content-between">
                                                    <div
                                                        class="content d-flex flex-column align-items-start theme-text-white">
                                                        <div
                                                            class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                                        <span class="font-medium"><img src="assets/images/heart.svg"
                                                                                       alt=""></span>
                                                        </div>
                                                        <div class="sale theme-bg-sky">
                                                            <span class="font-medium">للبيع</span>
                                                        </div>
                                                        <div class="sale theme-bg-blue">
                                                            <span class="font-medium">متاح</span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center pt-3">
                                                        <div class="documented">
                                                            <span class="font-medium">موثق</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Carousel indicators -->
                                            <ol class="carousel-indicators">
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                                                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                                            </ol>

                                            <!-- Wrapper for carousel items -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="assets/images/list.png" class="" alt="Slide 1">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="assets/images/list.png" class="" alt="Slide 3">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-container">
                                            <div class="mt-3 mb-0">
                                                <h3 class="resident-text">فيلا إطلالة مميزة في حي سكني هادئ</h3>
                                                <div class="d-flex align-items-start justify-content-end mt-2">
                                                    <p class="me-2">جدة - الطريق السريع - بالقرب من مسجد الهداي..</p>
                                                    <img src="assets/images/location.png" alt="">
                                                </div>
                                            </div>
                                            <div class="amenities">
                                                <div class="d-flex justify-content-between">
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>512</span>م2</p>
                                                        <img src="assets/images/bath-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>6</span> غرف</p>
                                                        <img src="assets/images/bed-icon.png" alt="">
                                                    </div>
                                                    <div class="area d-flex justify-content-center align-items-start">
                                                        <p class="theme-text-seondary-black"><span>2</span> حمام</p>
                                                        <img src="assets/images/area-icon.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-section mt-2">
                                                <div class="d-flex justify-content-between">
                                                    <div class="social-btn d-flex">
                                                        <div
                                                            class="call d-flex justify-content-center align-items-center me-3">
                                                            <img src="assets/images/mobile-icon.png" alt="">
                                                        </div>
                                                        <div
                                                            class="calender d-flex justify-content-center align-items-center">
                                                            <img src="assets/images/calender-icon.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="all-price d-flex justify-content-end align-items-center">
                                                        <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('theme::newlayouts.partials.sidebar')
    </div>
@endsection
