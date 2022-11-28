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
        <div id="load_cover">
            <div class="loaderInner">
                <div class="loader-logo"></div>
            </div>
        </div>
        <form class="search_form">
            <input type="hidden" id="state" name="state" value="{{$state}}">
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
                                        <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">أقل سعر</label>
                                    </div>
                                    <div class="mb-3 field col-lg-6 col-md-6 col-sm-12 p-1 position-relative">
                                        <input type="number" class="input-max" value="" class="form-control font-medium font-16 text-end font-14" placeholder="10,000.0000+ ر.س   ">
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
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <!-- Tab -->
                                            <nav>
                                                <p class="rent-buy-txt">نوع العرض</p>
                                                <div class="nav nav-tabs mb-4 rent-tabs d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
                                                    @foreach($statuses as $status_data)
                                                        @if( $status_data->name =='Sale')
                                                            <a class="nav-item nav-link rent-link nav-sale active" id="nav-rent-tab" data-bs-toggle="tab" value="{{$status_data->id}}" href="#nav-rent" role="tab" aria-controls="nav-rent" aria-selected="true">للبيع</a>
                                                        @elseif( $status_data->name =='Rent')
                                                            <a class="nav-item nav-link rent-link nav-rent" id="nav-buy-tab" data-bs-toggle="tab" href="#nav-buy" value="{{$status_data->id}}" role="tab" aria-controls="nav-buy" aria-selected="false">للايجار</a>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">
                                                    {{--                                                <p class="rent-buy-txt">حالة العقار</p>--}}
                                                    {{--                                                    <div class="rent-buy-pans d-flex justify-content-center align-items-center">--}}
                                                    {{--                                                        <li class="buy-rent-pan" name="category" value="1">قيد الإنشاء</li>--}}
                                                    {{--                                                        <li class="buy-rent-pan" name="category" value="2">جاهز</li>--}}
                                                    {{--                                                        <li class="buy-rent-pan" name="category" value="3">الجميع</li>--}}
                                                    {{--                                                </div>--}}
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="complete-btn"><a href="">تم</a></button>
                                                        <button class="reset-btn"><a href="">إعادة ضبط</a></button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
                                                    <p class="rent-buy-txt">مدة الايجار</p>
                                                    <div class="rent-buy-pans d-flex flex-row-reverse justify-content-center align-items-center">
                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown" value="" type="radio" id="radio02-01" name="status" checked />
                                                            <label class="rent-box any" for="radio02-01">الجميع</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio02-02" name="status" />
                                                            <label class="rent-box rent_label_list" for="radio02-02">يومياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio03-03" name="status" />
                                                            <label class="rent-box project_label" for="radio03-03">أسبوعياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio04-04" name="status" />
                                                            <label class="rent-box project_label" for="radio04-04">شهرياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio05-05" name="status" />
                                                            <label class="rent-box project_label" for="radio05-05">سنوياً</label>
                                                        </li>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="complete-btn"><a href="">تم</a></button>
                                                        <button class="reset-btn"><a href="">إعادة ضبط</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of tab -->
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 order-lg-3 order-first search-box search-input-bar">
                    <div class="search-bar d-flex p-2 mt-1">
                        <img src="assets/images/search.svg" alt="">
                        <select class="theme-text-secondary-black border-0" theme="google" width="400" style="appearance: none;" placeholder=" تبحث عن عقار؟" data-search="true" id="property_states_dropdown">
                            @foreach ($states as $row)
                            <option value="{{ $row->id }}" @if($state==$row->id) selected="selected" @endif>{{ $row->name }}</option>
                            @endforeach
                            <!-- <option value="AX">الرياض<span class="property_num">(1)</span></option> -->
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
<div class="container main_slider">
    <div class="all-listing">
        <div class="property-lists">
            <div class="row" id="item_list">
            </div>
        </div>
    </div>
</div>
<!-- Property Sell and Buy section Starts Here -->
<div class="propertly-list-banner property-list-sl-r d-flex justify-content-center align-items-center hide">
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
<!-- second list section -->
<div class="container second_container">
    <div class="all-listing">
        <div class="property-lists">
            <div class="row" id="second_item_list">
            </div>
        </div>
    </div>
</div>
<div class="row align-items-center">
    <div class="col-lg-12">
        <div class="pagination-area f-right">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                </ul>
            </nav>
        </div>
    </div>
    <div class="col-lg-12 ">
        <div class="show-pagination-info text-center">
            <p class="show-info">{{ __('Showing') }} <span><span id="from"></span> - <span id="to"></span> {{ __('of') }} <span id="total"></span></span> {{ __('List') }}</p>
        </div>
    </div>
</div>


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
