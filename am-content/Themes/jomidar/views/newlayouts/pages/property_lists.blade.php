@extends('theme::newlayouts.app')
@section('content')
<script>
    var state_id = '<?php echo $state; ?>';
    var status_id = '<?php echo $status; ?>';
    var parent_category = '<?php echo $parent_category; ?>';
    var category = '<?php echo $category; ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/second-page.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/propertylist-search.css')}}">
<div id="fade" class="overlay"></div>
<div class="filter-bar">
    <div class="container">
        <div id="load_cover">
            <div class="loaderInner">
                <div class="loader-logo"></div>
            </div>
        </div>
        <form class="search_form">
            <input type="hidden" id="state" name="state" value="{{$state}}">
            <input type="hidden" id="status_list" name="status" value="{{$status}}">
            <input type="hidden" id="parent_category" name="parent_category" value="{{$parent_category}}">
            <input type="hidden" id="category" name="category" value="{{$category}}">
            <input type="hidden" id="room" name="room" value="">
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
                            <button class="btn dropdown-toggle budget-dropdown-toggle budget-btn" role="button" id="dropdownMenuLink-rooms" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.budget')}}
                            </button>
                            <ul class="dropdown-menu budget-dropdown" id="budgetdropdown" aria-labelledby="dropdownMenuLink-rooms">
                                <h3>{{__('labels.budget_sar')}}</h3>
                                <div class="type-dropdown-content price-input d-flex justify-content-between align-items-center mb-4">
                                    <div class="mb-3 field p-1 position-relative">
                                        <input type="number" class="input-min" value="" class="form-control font-medium font-16 text-end font-14" placeholder=" 0 {{__('labels.sar')}}">
                                        <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.low_price')}}</label>
                                    </div>
                                    <div class="mb-3 field p-1 position-relative">
                                        <input type="number" class="input-max" value="" class="form-control font-medium font-16 text-end font-14" placeholder="10,000.0000+ {{__('labels.sar')}}">
                                        <label for="floating-Input" class="floating-Input position-absolute font-medium theme-text-seondary-black b-r-8">{{__('labels.high_price')}}</label>
                                    </div>
                                </div>

                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" id="min_price" name="min_price" class="range-min" min="0" max="10000000" value="0" step="100">
                                    <input type="range" id="max_price" name="max_price" class="range-max" min="0" max="10000000" value="10000000" step="100">
                                </div>



                                <div class="d-flex justify-content-between mt-4">
                                    <li class="room-no-drop">
                                        <button id="price_btn" class="btn type-box show-results-bttn">{{__('labels.apply')}}</button>
                                    </li>
                                    <li class="room-no-drop">
                                        <button class="reset-reset-btn btn type-box">{{__('labels.reset')}}</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="no-rooms-drop-btn">
                        <div class="dropdown room-type-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle room-dropdown-toggle room-btn" role="button" id="dropdownMenuLink-room" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.bedroom')}}
                            </button>
                            <ul class="dropdown-menu room-dropdown" aria-labelledby="dropdownMenuLink-room">
                                <h3>{{__('labels.bedroom')}}</h3>
                                <div class="room-dropdown-content d-flex justify-content-right align-items-center">
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="0">
                                        <span class="checmark step font-14 font-medium">0</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="1">
                                        <span class="checmark step font-14 font-medium">1</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="2">
                                        <span class="checmark step font-14 font-medium">2</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="3">
                                        <span class="checmark step font-14 font-medium">3</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="4">
                                        <span class="checmark step font-14 font-medium">4</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="5">
                                        <span class="checmark step font-14 font-medium">5</span>
                                    </div>
                                    <div class="room-container property_radio">
                                        <input type="checkbox" value="6">
                                        <span class="checmark step font-14 font-medium">6</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <li class="room-no-drop">
                                        <button id="room_btn" class="btn type-box show-results-bttn">{{__('labels.apply')}}</button>
                                    </li>
                                    <li class="room-no-drop">
                                        <button class="room-reset-btn btn type-box">{{__('labels.reset')}}</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="type-rent-dropdowns">
                        <div class="dropdown type-drop">
                            <span class="room-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            <button class="btn dropdown-toggle type-dropdown-toggle type-btn" role="button" id="dropdownMenuLink-property-type" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.type')}}
                            </button>
                            <ul class="dropdown-menu type-dropdown" aria-labelledby="dropdownMenuLink-property-type">
                                <h3>{{__('labels.type_property')}}</h3>
                                <div class="type-dropdown-content d-flex justify-content-around align-items-center">
                                    @foreach($categories as $category_data)
                                    <div class="radio-container prop-checkbox">
                                        <input type="checkbox" data-name="{{$category_data->name}}" value="{{$category_data->id}}" {{ $category != "" && $category == $category_data->id ? "checked" : '' }}>
                                        <span class="checmark step font-14 font-medium"><i class="{{ !empty($category_data->icon) ? $category_data->icon->content : 'fas fa-home'}}"></i>{{$category_data->name}}</span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <li class="type-all">
                                        <button id="nature_btn" class="btn type-box show-results-bttn">{{__('labels.apply')}}</button>
                                    </li>
                                    <li class="type-all">
                                        <button class="nature-reset-btn btn type-box">{{__('labels.reset')}}</button>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="select-rent-dropdowns">
                        <div class="dropdown list-complete-rent-drop">
                            <span class="rent-toggle-icon"><img src="{{theme_asset('assets/images/arrow-down.svg')}}" alt=""></span>
                            @foreach($statuses as $status_data)
                            @if( $status_data->id == $status && $status_data->name =='Sale')
                            <button class="btn dropdown-toggle list-rent-dropdown-toggle list-rent-btn" role="button" id="dropdownMenuLink-buy" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.for_buy')}}
                            </button>
                            @elseif($status_data->id == $status && $status_data->name =='Rent')
                            <button class="btn dropdown-toggle list-rent-dropdown-toggle list-rent-btn" role="button" id="dropdownMenuLink-buy" data-bs-toggle="dropdown" aria-expanded="false" data-toggle="dropdown">{{__('labels.rent')}}
                            </button>
                            @endif
                            @endforeach
                            <ul class="dropdown-menu list-rent-dropdown" aria-labelledby="dropdownMenuLink-buy">
                                <div class="rent-dropdown-content">
                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <!-- Tab -->
                                            <nav>
                                                <p class="rent-buy-txt">{{__('labels.purpose')}}</p>
                                                <div class="nav nav-tabs mb-4 rent-tabs d-flex justify-content-center align-items-center" id="nav-tab" role="tablist">
                                                    @foreach($statuses as $status_data)
                                                    @if( $status_data->name =='Sale')
                                                    <a class="nav-item nav-link rent-link nav-sale active" id="nav-rent-tab" data-bs-toggle="tab" data-value="{{$status_data->id}}" href="#nav-rent" role="tab" aria-controls="nav-rent" aria-selected="true">{{__('labels.sale')}}</a>
                                                    @elseif( $status_data->name =='Rent')
                                                    <a class="nav-item nav-link rent-link nav-sale" id="nav-buy-tab" data-bs-toggle="tab" href="#nav-buy" data-value="{{$status_data->id}}" role="tab" aria-controls="nav-buy" aria-selected="false">{{__('labels.rent')}}</a>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-rent" role="tabpanel" aria-labelledby="nav-rent-tab">
                                                    {{-- <p class="rent-buy-txt">حالة العقار</p>--}}
                                                    {{-- <div class="rent-buy-pans d-flex justify-content-center align-items-center">--}}
                                                    {{-- <li class="buy-rent-pan" name="category" value="1">قيد الإنشاء</li>--}}
                                                    {{-- <li class="buy-rent-pan" name="category" value="2">جاهز</li>--}}
                                                    {{-- <li class="buy-rent-pan" name="category" value="3">الجميع</li>--}}
                                                    {{-- </div>--}}
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="complete-btn list-complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                        <button class="reset-btn"><a href=""> {{__('labels.reset')}}</a></button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="nav-buy" role="tabpanel" aria-labelledby="nav-buy-tab">
                                                    <p class="rent-buy-txt">{{__('labels.rental_fre')}}</p>
                                                    <div class="rent-buy-pans d-flex flex-row-reverse justify-content-center align-items-center">
                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown" value="" type="radio" id="radio02-01" checked />
                                                            <label class="rent-box any" for="radio02-01">الجميع</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio02-02" />
                                                            <label class="rent-box rent_label_list" for="radio02-02">يومياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio03-03" />
                                                            <label class="rent-box project_label" for="radio03-03">أسبوعياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio04-04" />
                                                            <label class="rent-box project_label" for="radio04-04">شهرياً</label>
                                                        </li>

                                                        <li class="rent-all">
                                                            <input class="rent-select-dropdown drive_percent-box" value="" type="radio" id="radio05-05" />
                                                            <label class="rent-box project_label" for="radio05-05">سنوياً</label>
                                                        </li>
                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <button class="complete-btn list-complete-btn"><a href="">{{__('labels.apply')}}</a></button>
                                                        <button class="reset-btn"><a href=""> {{__('labels.reset')}}</a></button>
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
                        <select class="theme-text-secondary-black border-0" theme="google" width="400" style="appearance: none;" placeholder="{{__('labels.looking_property')}}" data-search="true" id="property_states_dropdown">
                            <option value="" disabled selected>{{__('labels.looking_property')}}</option>
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
            <p class="sort-text m-0 gap-8 theme-text-secondary-black">{{__('labels.sort_by')}}</p>
        </div>
        <div class="all-ads d-flex">
            <p class="all-results pe-2 theme-text-secondary-black"><span class="r-num font-bold pe-1 results"></span>{{__('labels.results')}}</p>
            <div class="vertical-line"></div>
            <p class="ads theme-text-secondary-black ps-2">{{__('labels.all_properties')}}</p>
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
