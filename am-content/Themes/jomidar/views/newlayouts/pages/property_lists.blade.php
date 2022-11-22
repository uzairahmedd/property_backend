@extends('theme::newlayouts.app')
@section('content')
<script>
    var state_id = '<?php echo $state; ?>';
    var status_id = '<?php echo $status; ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/propertylist-search.css')}}">
<div class="filter-bar">
    <div class="container">
        <form class="search_form">
            <input type="hidden" name="status" value="{{$status}}">
            {{-- <input type="text" name="state" value="{{$state}}">--}}
            <div class="row">
                <div class="filter-drop location-icon col-lg-1 col-md-2 col-sm-2 col-xs-2 order-lg-1" id="filter-map">
                    <div class="map-icon align-items-center d-flex justify-content-center">
                        <img src="assets/images/map-icon.svg" alt="">
                    </div>
                </div>
                <div class="col-lg-7 filter-drop col-md-10 col-sm-10 col-xs-10 order-lg-2 d-flex justify-content-end flex-md-row select-filter ms-auto flex-wrap" id="filter-drop">
                    <div class="budget-drop-btn" id="budget-drop">
                        <div class="dropdown budget-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle budget-dropdown-toggle budget-btn" role="button" id="dropdownMenuLink-rooms" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">الميزانية
                            </button>
                            <ul class="dropdown-menu budget-dropdown" id="budgetdropdown" aria-labelledby="dropdownMenuLink-rooms">
                                <h3>الميزانية ( ريال سعودي )</h3>
                                <div class="type-dropdown-content price-input d-flex justify-content-between align-items-center mb-4">
                                    <div class="mb-3 field col-lg-6 col-md-6 col-sm-12  p-1 position-relative">
                                        <input type="number" class="input-min" value="" class="form-control font-medium font-16 text-end font-14" placeholder=" 0 ر.س   ">
                                        {{-- <input type="email" name="email" value="" class="form-control font-medium font-16 text-end font-14" placeholder="أعلى سعر">--}}
                                        <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">أقل سعر</label>
                                    </div>
                                    <div class="mb-3 field col-lg-6 col-md-6 col-sm-12 p-1 position-relative">
                                        <input type="number" class="input-max" value="" class="form-control font-medium font-16 text-end font-14" placeholder="10,000.0000+ ر.س   ">
                                        {{-- <input type="email" name="email" value="" class="form-control font-medium font-16 text-end font-14" placeholder="0 ر.س">--}}
                                        <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">أعلى سعر</label>
                                    </div>
                                </div>

                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                                    <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                                </div>



                                <div class="d-flex justify-content-between mt-4">
                                    <li class="room-no-drop">
                                        <button class="btn type-box show-results-bttn">اظهار النتائج</button>
                                    </li>
                                    <li class="room-no-drop">
                                        <button class="btn type-box">مسح</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="no-rooms-drop-btn">
                        <div class="dropdown room-type-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle room-dropdown-toggle room-btn" role="button" id="dropdownMenuLink-roomss" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown"> عدد الفرف
                            </button>
                            <ul class="dropdown-menu room-dropdown" aria-labelledby="dropdownMenuLink-roomss">
                                <h3>عدد الغرف</h3>
                                <div class="room-dropdown-content d-flex justify-content-right align-items-center">
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_studio">
                                        <span class="roommark room_studio font-16 font-medium" for="room_studio">Studio</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_1">
                                        <span class="roommark room1 font-16 font-medium" for="room_1">1</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_2">
                                        <span class="roommark room2 font-16 font-medium" for="room_2">2</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_3">
                                        <span class="roommark room3 font-16 font-medium" for="room_3">3</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_4">
                                        <span class="roommark room4 font-16 font-medium" for="room_4">4</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_5">
                                        <span class="roommark room5 font-16 font-medium" for="room_5">5</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_6">
                                        <span class="roommark room6 font-16 font-medium" for="room_6">6</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_7">
                                        <span class="roommark room7 font-16 font-medium" for="room_7">7</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_8">
                                        <span class="roommark room8 font-16 font-medium" for="room_8">8</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="radio" id="room_9">
                                        <span class="roommark room9 font-16 font-medium" for="room_9">9+</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <li class="room-no-drop">
                                        <button class="btn type-box show-results-bttn">اظهار النتائج</button>
                                    </li>
                                    <li class="room-no-drop">
                                        <button class="btn type-box">مسح</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="type-rent-dropdowns">
                        <div class="dropdown type-drop">
                            <span class="room-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle type-dropdown-toggle type-btn" role="button" id="dropdownMenuLink-property-type" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">النوع
                            </button>
                            <ul class="dropdown-menu type-dropdown" aria-labelledby="dropdownMenuLink-property-type">
                                <h3>نوع العقار</h3>
                                <div class="type-dropdown-content d-flex justify-content-around align-items-center">
                                    <div class="radio-container prop-checkbox" value="0" id="1">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="عمارة"><i class="fa-regular fa-building"></i>عمارة</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="2">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="قصر"><i class="fa-regular fa-chess-rook"></i>قصر</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="3">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="فيلا"><i class="fa-regular fa-chess-queen"></i>فيلا</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="4">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="شقة"><i class="fa-regular fa-building"></i>شقة</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="5">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="شاليه"><i class="fa-solid fa-house"></i>شاليه</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="6">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="استراحة"> <i class="fa-solid fa-spa"></i>استراحة</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="7">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="مزرعة"><i class="fa-solid fa-wheat-awn"></i>مزرعة</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="8">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="أرض"><i class="fa-solid fa-landmark-flag"></i>أرض</span>
                                    </div>
                                    <div class="radio-container prop-checkbox" value="0" id="9">
                                        <input type="checkbox">
                                        <span class="checmark step font-14 font-medium" value="دوبلكس"><i class="fa-solid fa-house-medical-flag"></i>دوبلكس</span>
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
                        <div class="dropdown list-complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle list-rent-dropdown-toggle list-rent-btn" role="button" id="dropdownMenuLink-buy" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">ايجار
                            </button>
                            <ul class="dropdown-menu list-rent-dropdown" aria-labelledby="dropdownMenuLink-buy">
                            <div class="rent-dropdown-content">
                            @foreach($statuses as $status_data)
                                    @if( $status_data->name =='Sale')
                                        <li class="rent-all">
                                            <input class="rent-select-dropdown" value="{{ $status_data->id}}" type="radio" data-title="بيع" id="sale_rent" name="status" {{$status == $status_data->id ? 'checked' : ''}} />
                                            <label class="rent-box sale_list" for="sale_rent">بيع</label>
                                        </li>
                                    @elseif($status_data->name =='Rent')
                                        <li class="rent-all">
                                            <input class="rent-select-dropdown drive_percent-box" value="{{ $status_data->id}}" data-title="ايجار" type="radio" id="radio_rent" name="status"  {{$status == $status_data->id ? 'checked' : ''}} />
                                            <label class="rent-box rent_list_label" for="radio_rent">ايجار</label>
                                        </li>
                                    @elseif($status_data->name =='Projects')
                                        <li class="rent-all">
                                            <input class="rent-select-dropdown drive_percent-box" value="{{ $status_data->id}}" data-title="المشاريع" type="radio" id="project_rent" name="status" {{$status == $status_data->id ? 'checked' : ''}} />
                                            <label class="rent-box project_list" for="project_rent">المشاريع</label>
                                        </li>
                                    @endif
                                @endforeach
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

                        <select name="state" class="theme-text-secondary-black border-0" theme="google" width="400" style="appearance: none;" placeholder=" تبحث عن عقار؟" data-search="true" id="property_states_dropdown">
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
    <div class="filter-all-bar container position-relative d-flex justify-content-between">
        <div class="sort-by d-flex align-items-center">
            <img src="assets/images/sort-icon.svg" alt="">
            <p class="sort-text m-0 gap-8 theme-text-secondary-black">ترتيب حسب</p>
        </div>
        <div class="all-ads d-flex">
            <p class="all-results pe-2 theme-text-secondary-black"><span class="r-num font-bold pe-1 results"></span>عدد
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
<div class="propertly-list-banner property-list-sl-r d-flex justify-content-center align-items-center">
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

    setTimeout(function() {
        if (state_id != null && state_id != '') {
            var text = $('.ss_ul li[value=' + state_id + ']').attr("data-title");
            $('#select_style_text').text(text);
        }
    }, 2000);
</script>
@endsection
