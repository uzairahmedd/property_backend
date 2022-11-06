@extends('theme::newlayouts.app')
@section('content')
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
    <div class="filter-bar">
        <div class="container">
            <div class="row">
                <div class="location-icon col-lg-2 col-md-2 col-sm-2 col-xs-2 order-lg-1">
                    <div class="map-icon align-items-center d-flex justify-content-center">
                        <img src="assets/images/map-icon.svg" alt="">
                    </div>
                </div>
                <div
                    class="col-lg-6 col-md-10 col-sm-10 col-xs-10 order-lg-2 d-flex justify-content-end flex-md-row select-filter ms-auto">
                    <div class="auction-status-dropdown">
                        <div class="dropdown complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}"
                                                                alt=""></span>
                            <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button"
                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-toggle="dropdown">حالة المزاد
                            </button>
                            <ul class="dropdown-menu type-dropdown" aria-labelledby="dropdownMenuLink1">
                                <h3>حالة المزاد</h3>
                                <div class="type-dropdown-content">
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio03-09"
                                               name="radio-btn"/>
                                        <label class="type-box" for="radio03-09">شاليه</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio03-08"
                                               name="radio-btn"/>
                                        <label class="type-box" for="radio03-08">استراحة</label>
                                    </li>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <li class="type-all">
                                        <button class="btn type-box show-results-bttn">اظهار النتائج</button>
                                    </li>
                                    <li class="type-all">
                                        <button class="btn type-box">مسح</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="select-city-dropdowns">
                        <select name="" class="rent-select" id="select-drop-btn">
                            <option value="1">الرياض</option>
                            <option value="2">الخبر</option>
                            <option value="3">جازان</option>
                            <option value="1">بربدة</option>
                            <option value="2">نجران</option>
                            <option value="3">ابها</option>
                            <option value="4">تبوك</option>
                            <option value="5">الطائف</option>
                            <option value="6">الخرج</option>
                            <option value="7">عرعر</option>
                        </select>
                        <span class="s-rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}"
                                                              alt=""></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 order-lg-3 order-first search-box">
                    <div class="search-bar d-flex p-2 mt-1">
                        <img src="assets/images/search.svg" alt="">
                        <input type="search" class="theme-text-secondary-black w-100 border-0"
                               placeholder="تبحث عن عقار؟">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Property Listing Sale Section Starts Here -->
<div class="all-property-list contact-property-list">
    <div class="container position-relative d-flex justify-content-between">
        <div class="sort-by d-flex align-items-center">
            <img src="assets/images/sort-icon.svg" alt="">
            <p class="sort-text m-0 gap-8 theme-text-secondary-black">ترتيب حسب</p>
        </div>
        <div class="all-ads d-flex">
            <p class="all-results pe-2 theme-text-secondary-black"><span class="r-num font-bold pe-1">512</span>عدد
                النتائج</p>
            <div class="vertical-line"></div>
            <p class="ads theme-text-secondary-black ps-2">جميع الإعلانات</p>
        </div>
    </div>
</div>
<!-- Property listing Start -->

<div class="container">
    <div class="all-listing">
        <div class="property-lists">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="property-lists">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Property listing End -->
<!-- Property Sell and Buy section Starts Here -->
<div class="property-sl-banner property-sl-r d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-bold theme-text-white mb-0">هل عندك عقار للبيع أو للإيجار</h1>
        <h3 class="mb-0 theme-text-white">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق وصلت لبيع وتأجير
            العقار بالنيابة عنك بكل
            سهولة
        </h3>
        <div>
            <button class="btn-add btn-theme">
                اضف عقارك الأن
            </button>
        </div>
    </div>
</div>
<!-- Property Sell and Buy section Ends Here -->
<!-- Property listing Start -->
<div class="last-property-list container">
    <div class="all-listing">
        <div class="property-lists">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="property-lists">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="features">
                            <div class="d-flex justify-content-between">
                                <div class="content d-flex flex-column align-items-start theme-text-white">
                                    <div class="fav-elipse justify-content-center align-items-center theme-bg-blue">
                                        <span class="font-medium"><img src="assets/images/heart.svg" alt=""></span>
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
                            <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li> -->
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
                        <div class="offer-section mt-2">
                            <div class="d-flex justify-content-between">
                                <div class="offer-btn d-flex">
                                    <div class="add-offer-btn d-flex justify-content-center align-items-center me-3">
                                        <img src="{{theme_asset('assets/images/hammer-white.svg')}}" alt="">
                                        <p class="theme-text-white mb-0 mt-0 ps-2">اضف عرض</p>
                                    </div>
                                </div>
                                <div class="all-price d-flex flex-column justify-content-end align-items-right">
                                    <p class="mb-0 mt-0">أعلى مزايدة </p>
                                    <h2 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Property listing End -->
@endsection
