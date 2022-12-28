@extends('theme::newlayouts.app')
@section('content')
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
    var interface = '<?php echo !empty($post_data->interface) ? $post_data->interface->content : ''; ?>';
    var meter = '<?php echo !empty($post_data->meter) ? $post_data->meter->content : '';  ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<!-- <link rel="stylesheet" href="{{theme_asset('assets/newcss/yearcalender.css')}}"> -->
<link rel="stylesheet" href="{{theme_asset('assets/newcss/yearpicker.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.second_update_property',$id) }}" class="post_form" id="second_form">
            @csrf
            @method('PUT')
            <div class="description-card card">
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex mt-n3 font-medium">
                        <span class="theme-text-sky ">2</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <p class="theme-text-black font-18">{{__('labels.property_nature')}}</p>
                    <div class="col-12 justify-content-end row">
                        @foreach($parent_category as $row)
                        <div class="radio-container">
                            <input type="radio" name="parent_category" term-id='{{$id}}' onclick="property_type(this)" value="{{$row->id}}" {{ !empty($array) && $array['parent_category'] == $row->id ? "checked" : (old("parent_category") == $row->id ? "checked":"") }}>
                            <span class="checmark font-16 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                        </div>
                        @endforeach
                    </div>
                    @if($errors->has('parent_category'))
                    <div class="error">{{ $errors->first('parent_category') }}</div>
                    @endif
                    <p class="theme-text-black font-18 mt-3" id="type_text">{{__('labels.type_property')}}</p>
                    <div class="col-12 justify-content-end property_types row theme-gx-3 mb-4_5" id="property_type_radio">
                        @foreach($child_category as $row)
                        <div class="radio-container radio-edit-two property_radio">
                            <input type="radio" name="category" value="{{$row->id}}" data-name="{{$row->name}}" {{ !empty($array) && $array['category'] == $row->id ? "checked" : (old("category") == $row->id ? "checked":"") }}>
                            <span class="checmark font-16 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                        </div>
                        @endforeach
                        @if($errors->has('category'))
                        <div class="error">{{ $errors->first('category') }}</div>
                        @endif
                    </div>


                    <div class="col-12 row justify-content-end">
                        <div class="col-lg-5 d-flex flex-column justify-content-end align-items-end land-size" id="land_size">
                            <label for="land_size_area" class="theme-text-seondary-black">{{__('labels.land_size')}}
                            </label>
                            <input type="number" id="land_size_area" step="any" value="{{ !empty($post_data->landarea) ? $post_data->landarea->content  : old("landarea")}}" name="landarea" placeholder="{{__('labels.area_square_meter')}}" class="form-control theme-border">
                        </div>
                        <div class="col-lg-5 d-flex flex-column justify-content-end align-items-end" id="built_up_area">
                            <label for="built_area" class="theme-text-seondary-black">{{__('labels.built_up_area')}}
                            </label>
                            <input type="number" step="any" id="built_area" value="{{ !empty($post_data->builtarea) ? $post_data->builtarea->content  : old("builtarea")}}" name="builtarea" placeholder="{{__('labels.area_square_meter')}}" class="form-control theme-border">
                        </div>
                    </div>
                    @if($errors->has('area'))
                    <div class="error">{{ $errors->first('area') }}</div>
                    @endif


                    <div class="built-up-year">
                        <p class="theme-text-black font-18">{{__('labels.building_year')}}</p>
                        <div class="row theme-gx-3 mb-4_5">
                            <div class="radio-container">
                                <input type="radio" name="ready" value="1" data-isready='{{ !empty($post_data->ready)  ? $post_data->ready->content : old("ready")  }}' id="ready">
                                <span class="build-ready font-16 font-medium">{{__('labels.ready')}}</span>
                            </div>
                            <div class="radio-container">
                                <input type="radio" name="ready" value="0" id="not_ready" {{ !empty($post_data->ready)  && $post_data->ready->content == 0 ? "checked"  : (old("ready") == 0 ? "checked" : "")}}>
                                <span class="build-ready font-16 font-medium">{{__('labels.not_ready')}}</span>
                            </div>
                        </div>
                        <div id="year_calender">
                            <input type="text" class="yearpicker form-control hidden" id='yearpicker' name="property_age" placeholder="Select a year" value="{{ !empty($post_data->property_age) ? $post_data->property_age->content : old('property_age') }}" />
                        </div>
                        @if($errors->has('property_age'))
                        <span class="error">{{ $errors->first('property_age') }}</span>
                        @endif

                    </div>
                    <!-- property value Section Starts Here -->
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row property-value">
                        <div class="col-lg-6 col-md-12 flex-column">
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn gx-2 other-meter">
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="electricity_facility" data-val="{{!empty($post_data->electricity_facility) ? $post_data->electricity_facility->content :  old('electricity_facility')}}" value="1">
                                        <span class="checmark font-16 font-medium">{{__('labels.no')}}</span>
                                    </div>
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="electricity_facility" value="0" data-val="{{!empty($post_data->electricity_facility) ? $post_data->electricity_facility->content :  old('electricity_facility')}}">
                                        <span class="checmark font-16 font-medium">{{__('labels.yes')}}</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">{{__('labels.electricity_meter_is_there')}}</p>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn gx-2 water-meter">
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="water_facility" data-val="{{ !empty($post_data->water_facility) ? $post_data->water_facility->content : old('water_facility')}}" value="1">
                                        <span class="checmark font-16 font-medium">{{__('labels.no')}}</span>
                                    </div>
                                    <div class="radio-container yes-no-radio">
                                        <input type="radio" name="water_facility" data-val="{{ !empty($post_data->water_facility) ? $post_data->water_facility->content :  old('water_facility')}}" value="0">
                                        <span class="checmark font-16 font-medium">{{__('labels.yes')}}</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">{{__('labels.water_meter_is_there')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 d-flex add-address justify-content-end">
                            <div class="col-lg-8 col-md-10 col-sm-12 d-flex flex-column align-items-end">
                                <label for="value" class="font-18 theme-text-seondary-black">{{__('labels.rental_value')}}</label>
                                <div class="position-relative d-flex align-items-center w-100">
                                    <input type="text" id="value" value="{{ !empty($post_data->price) ? $post_data->price->price  : old('price') }}" name="price" placeholder="{{__('labels.rental_value')}}" class="form-control theme-border w-100">
                                    <span class="font-14 font-medium position-absolute theme-text-blue price-unit">{{__('labels.sar')}}</span>
                                </div>
                                @if($errors->has('price'))
                                <span class="error">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- property value Section Ends Here -->
                    <!-- Street Section Starts Here -->
                    <p class="theme-text-black font-18">{{__('labels.no_street')}}</p>
                    <div class="row row d-flex flex-row-reverse justify-content-end flex-lg-row">
                        @for($i=4; $i>=1; $i--)
                        <div class="radio-container">
                            <input type="radio" name="streets" onclick="dropdown_btn(this)" id="street" data-streets='{{ !empty($post_data->streets) ? $post_data->streets->content : old("streets") }}' class="street_sdropdown" value="{{$i}}" {{ !empty($post_data->streets) && $post_data->streets->content == $i ? "checked"  : (old("streets") == $i ? "checked" : '') }}>
                            <span class="checmark font-16 font-medium">{{$i}}</span>
                        </div>
                        @endfor
                    </div>
                    @if($errors->has('streets'))
                    <span class="error">{{ $errors->first('streets') }}</span>
                    @endif
                    <!-- Street Section Ends Here -->
                    <div class="street_detailss"></div>
                    @if($errors->has('meter'))
                    <div class="error">{{ $errors->first('meter') }}</div>
                    @endif

                    {{--input with dropdown button start--}}
                    {{-- <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">--}}
                    {{-- <div class="col-lg-5 col-md-4 col-sm-12 d-flex align-items-end sec-street ">--}}
                    {{-- <div class="dropdown regional-drop d-flex justify-content-center align-items-center">--}}
                    {{-- <div class="interface-div">--}}
                    {{-- <button class="btn dropdown-toggle regional-drop-btn interface" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{-- {{__('labels.interface')}}--}}
                    {{-- </button>--}}
                    {{-- <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">--}}
                    {{-- <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">East</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">West</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">North</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">South</a></li>--}}
                    {{-- </ul>--}}
                    {{-- </div>--}}
                    {{-- <div class="meter-div">--}}
                    {{-- <p class="meter mb-0">{{__('labels.meter')}}</p>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- --}}
                    {{-- <div class="position-relative d-flex flex-column align-items-end w-100 street_info_2">--}}
                    {{-- <label for="" class="font-18 theme-text-seondary-black">{{__('labels.street_info_2')}}</label>--}}
                    {{-- <input type="text" name="street_info_one" value="{{ !empty( $post_data->street_info_one) ? $post_data->street_info_one->content  : old("street_info_one") }}" id="interface_val" placeholder="{{__('labels.street_view')}} " class="form-control street_view theme-border">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-lg-5 col-md-4 col-sm-12 regional-street-1 d-flex align-items-end first-street">--}}
                    {{-- <div class="dropdown regional-drop d-flex justify-content-center align-items-center">--}}
                    {{-- <div class="interface-btn">--}}
                    {{-- <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{-- {{__('labels.interface')}}--}}
                    {{-- </button>--}}
                    {{-- <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">--}}
                    {{-- <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">10m</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">20m</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">30m</a></li>--}}
                    {{-- </ul>--}}
                    {{-- </div>--}}
                    {{-- <div class="meter-div">--}}
                    {{-- <p class="meter mb-0">{{__('labels.meter')}}</p>--}}
                    {{-- </div>--}}

                    {{-- </div>--}}
                    {{-- <div class="position-relative d-flex flex-column align-items-end w-100">--}}
                    {{-- <label for="" class="font-18 theme-text-seondary-black">{{__('labels.street_info_1')}}</label>--}}
                    {{-- <input type="text" name="street_info_two" value="{{ !empty( $post_data->street_info_two) ? $post_data->street_info_two->content  : old("street_info_two") }}" id="interface_val2" placeholder="{{__('labels.street_view')}}" class="form-control street_view theme-border">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                    {{-- <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">--}}
                    {{-- <div class="col-lg-5 col-md-4 col-sm-12 d-flex align-items-end sec-street ">--}}
                    {{-- <div class="dropdown regional-drop d-flex justify-content-center align-items-center">--}}
                    {{-- <div class="interface-div">--}}
                    {{-- <button class="btn dropdown-toggle regional-drop-btn interface" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{-- {{__('labels.interface')}}--}}
                    {{-- </button>--}}
                    {{-- <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">--}}
                    {{-- <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">East</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">West</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">North</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val" href="#">South</a></li>--}}
                    {{-- </ul>--}}
                    {{-- </div>--}}
                    {{-- <div class="meter-div">--}}
                    {{-- <p class="meter mb-0">{{__('labels.meter')}}</p>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="position-relative d-flex flex-column align-items-end w-100 street_info_2">--}}
                    {{-- <label for="interface_val" class="font-18 theme-text-seondary-black">{{__('labels.street_info_2')}}</label>--}}
                    {{-- <input type="text" name="street_info_two" value="{{ !empty( $post_data->street_info_two) ? $post_data->street_info_two->content  : old("street_info_two") }}" id="interface_val" placeholder="{{__('labels.street_view')}} " class="form-control street_view theme-border">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- <div class="col-lg-5 col-md-4 col-sm-12 regional-street-1 d-flex align-items-end first-street">--}}
                    {{-- <div class="dropdown regional-drop d-flex justify-content-center align-items-center">--}}
                    {{-- <div class="interface-btn">--}}
                    {{-- <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
                    {{-- {{__('labels.interface')}}--}}
                    {{-- </button>--}}
                    {{-- <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">--}}
                    {{-- <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">10m</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">20m</a></li>--}}
                    {{-- <li><a class="dropdown-item inter_val2" href="#">30m</a></li>--}}
                    {{-- </ul>--}}
                    {{-- </div>--}}
                    {{-- <div class="meter-div">--}}
                    {{-- <p class="meter mb-0">{{__('labels.meter')}}</p>--}}
                    {{-- </div>--}}

                    {{-- </div>--}}
                    {{-- <div class="position-relative d-flex flex-column align-items-end w-100">--}}
                    {{-- <label for="interface_val2" class="font-18 theme-text-seondary-black">{{__('labels.street_info_1')}}</label>--}}
                    {{-- <input type="text" name="street_info_one" value="{{ !empty( $post_data->street_info_one) ? $post_data->street_info_one->content  : old("street_info_one") }}" id="interface_val2" placeholder="{{__('labels.street_view')}}" class="form-control street_view theme-border">--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}

                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">{{__('labels.next')}}</button>
                <a href="{{ route('agent.property.create_property', decrypt($id))}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
@section('step_two_js')
<script src="{{theme_asset('assets/newjs/yearpicker.js')}}"></script>
<script src="{{theme_asset('assets/newjs/step_two.js')}}"></script>
<script>
    var year = '2022'
    if ($('#yearpicker').val != '') {
        year = $('#yearpicker').val();
    }
    $("#yearpicker").yearpicker({
        year: year,
        startYear: 2012,
        endYear: 2030
    });
</script>
@endsection