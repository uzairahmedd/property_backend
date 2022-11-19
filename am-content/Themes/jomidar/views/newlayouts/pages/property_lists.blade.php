@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/propertylist-search.css')}}">
<div class="filter-bar">
    <div class="container">
        <form class="search_form">
            <input type="text" name="status" value="{{$status}}">
            <input type="text" name="state" value="{{$state}}">
            <div class="row">
                <div class="location-icon col-lg-2 col-md-2 col-sm-2 col-xs-2 order-lg-1">
                    <div class="map-icon align-items-center d-flex justify-content-center">
                        <img src="assets/images/map-icon.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-10 col-sm-10 col-xs-10 order-lg-2 d-flex justify-content-end flex-md-row select-filter ms-auto">
                    <div class="no-rooms-drop-btn">
                        <div class="dropdown complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink-rooms" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">عدد الغرف
                            </button>
                            <ul class="dropdown-menu type-dropdown" aria-labelledby="dropdownMenuLink-rooms">
                                <h3>عدد الغرف</h3>
                                <div class="type-dropdown-content">
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio013-10" />
                                        <label class="type-box" for="radio013-10">1</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio012-09" />
                                        <label class="type-box" for="radio012-09">2</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio011-08" />
                                        <label class="type-box" for="radio011-08">3</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio010-07" />
                                        <label class="type-box" for="radio010-07">4</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio09-06" />
                                        <label class="type-box" for="radio09-06">5</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio08-05" />
                                        <label class="type-box" for="radio08-05">6</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio07-04" />
                                        <label class="type-box" for="radio07-04">7</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio06-03" />
                                        <label class="type-box" for="radio06-03">8</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio05-01" />
                                        <label class="type-box" for="radio05-01">9</label>
                                    </li>
                                    <li class="type-all">
                                        <input class="type-select-dropdown" type="radio" id="radio04-02" checked />
                                        <label class="type-box" for="radio04-02">10+</label>
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
                    <div class="type-rent-dropdowns">
                        <div class="dropdown complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink-property-type" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">النوع
                            </button>
                            <ul class="dropdown-menu type-dropdown" aria-labelledby="dropdownMenuLink-property-type">
                                <h3>نوع العقار</h3>
                                <div class="type-dropdown-content d-flex justify-content-around align-items-center">
                                    <div class="radio-container prop-checkbox" value="0" id="1">
                                        <div>
                                            <i class="fa-regular fa-building"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">عمارة</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="2">
                                        <div>
                                            <i class="fa-regular fa-chess-rook"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">قصر</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="3">
                                        <div>
                                            <i class="fa-regular fa-chess-queen"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">فيلا</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="4">
                                        <div>
                                            <i class="fa-regular fa-building"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">شقة</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="5">
                                        <div>
                                            <i class="fa-solid fa-house"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">شاليه</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="6">
                                        <div>
                                            <i class="fa-solid fa-spa"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">استراحة</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="7">
                                        <div>
                                            <i class="fa-solid fa-wheat-awn"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">مزرعة</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="8">
                                        <div>
                                            <i class="fa-solid fa-landmark-flag"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">أرض</span>
                                        </div>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="9">
                                        <div>
                                            <i class="fa-solid fa-house-medical-flag"></i>
                                        </div>
                                        <div>
                                            <input type="checkbox">
                                            <span class="checmark step font-14 font-medium">دوبلكس</span>
                                        </div>
                                    </div>
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
                    <div class="select-rent-dropdowns">
                        <div class="dropdown complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle rent-dropdown-toggle rent-btn" role="button" id="dropdownMenuLink-buy" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">ايجار
                            </button>
                            <ul class="dropdown-menu rent-dropdown" aria-labelledby="dropdownMenuLink-buy">
                                <div class="rent-dropdown-content" id="rent-propertylist-drop">
                                    <li class="rent-all">
                                        <input class="rent-select-dropdown" type="radio" id="list_radio_01" value="26" />
                                        <label class="rent-box sale_list" for="radio020-01">بيع</label>
                                    </li>
                                    <li class="rent-all">
                                        <input class="rent-select-dropdown drive_percent-box" type="radio" id="list_radio_02" value="27" checked />
                                        <label class="rent-box rent_list" for="radio020-02">ايجار</label>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 order-lg-3 order-first search-box search-input-bar">
                    <div class="search-bar d-flex p-2 mt-1">
                        <img src="assets/images/search.svg" alt="">
                        {{-- <input type="search" class="theme-text-secondary-black w-100 border-0"--}}
                        {{-- placeholder="تبحث عن عقار؟">--}}

                        <select class="theme-text-secondary-black border-0" theme="google" width="400" style="appearance: none;" placeholder=" تبحث عن عقار؟" data-search="true">
                            <!-- <option ></option> -->
                            @foreach ($states as $row)
                            <option value="{{ $row->id }}" @if($state==$row->id) selected="selected" @endif>{{ $row->name }}</option>
                            @endforeach
                            <!-- <option value="AX">الرياض<span class="property_num">(1)</span></option>
                            <option value="AX">جدة<span class="property_num">(132)</span></option>
                            <option value="AX">مكة المكرمة<span class="property_num">(1234)</span></option>
                            <option value="AX">المدينة المنورة<span class="property_num">(143)</span></option>
                            <option value="AX">جميع المدن<span class="property_num">(1234)</span></option>
                            <option value="AX">الدمام<span class="property_num">(164)</span></option>
                            <option value="AX">حائل<span class="property_num">(1454)</span></option>
                            <option value="AX">الخبر<span class="property_num">(1765)</span></option> -->
                        </select>
                    </div>
                </div>
            </div>
        </form>
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
            <div class="row" id="item_list">
                <!--  <div class="col-lg-3 col-md-4 col-sm-12">
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <!-- <div class="property-lists pt-4">
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
                        </div> -->
        <!-- Carousel indicators -->
        <!-- <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol> -->

        <!-- Wrapper for carousel items -->
        <!-- <div class="carousel-inner">
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    </div>
</div>
</div>
</div>
<!-- Property listing End -->
<!-- Property Sell and Buy section Starts Here -->
<div class="property-sl-banner property-sl-r d-flex justify-content-center align-items-center">
    <div class="col-12 col-sm-10 col-lg-8 col-xl-5">
        <h1 class="font-bold theme-text-white mb-0">هل عندك عقار للبيع أو للإيجار</h1>
        <h3 class="mb-0 theme-text-white">يمكنك تسويق عقارك على موقعنا بكل سهولة، او بإمكانك تفويض فريق وصلت لبيع
            وتأجير
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
<!-- <div class="last-property-list container">
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
<!-- <div class="col-lg-3 col-md-4 col-sm-12">
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
<!-- </div>
        </div> -->
<!-- <div class="property-lists pt-4">
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="whatsapp d-flex justify-content-center align-items-center">
                                        <img src="assets/images/whatsapp-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
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
                        <ol class="carousel-indicators">
                            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                        </ol>
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
                                    <div class="call d-flex justify-content-center align-items-center me-3">
                                        <img src="assets/images/mobile-icon.png" alt="">
                                    </div>
                                    <div class="calender d-flex justify-content-center align-items-center">
                                        <img src="assets/images/calender-icon.png" alt="">
                                    </div>
                                </div>
                                <div class="all-price d-flex justify-content-end align-items-center">
                                    <h3 class="theme-text-secondary-color"><span>4.5</span>مليون ر.س</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!-- </div>
</div> -->
<!-- Property listing End -->
@endsection

@section('property_list_select')
<script src="{{theme_asset('assets/newjs/propertylist-search.js')}}"></script>
<script>
    jQuery(document).ready(function($) {
        $('select').selectstyle({
            width: 400,
            height: 300,
            theme: 'light',
            onchange: function(val) {}
        });
    });
</script>
@endsection