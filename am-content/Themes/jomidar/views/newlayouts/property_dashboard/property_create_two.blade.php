@extends('theme::newlayouts.app')
@section('content')
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
    var interface = '<?php echo !empty($post_data->interface) ? $post_data->interface->content : ''; ?>';
    var meter = '<?php echo !empty($post_data->meter) ? $post_data->meter->content : '';  ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<link rel="stylesheet" href="{{theme_asset('assets/newcss/yearpicker.css')}}">
<div class="add-property row-style">
    {{-- create dictionary of attribute some paragraph --}}
    <p class="d-none" id="property_nature">{{__('labels.property_nature')}}</p>
    <p class="d-none" id="select_facing">{{__('labels.select_facing')}}</p>
    <p class="d-none" id="east">{{__('labels.east')}}</p>
    <p class="d-none" id="west">{{__('labels.west')}}</p>
    <p class="d-none" id="north">{{__('labels.north')}}</p>
    <p class="d-none" id="south">{{__('labels.south')}}</p>
    <p class="d-none" id="street">{{__('labels.street')}}</p>
    <p class="d-none" id="width">{{__('labels.width')}}</p>
    <p class="d-none" id="meter">{{__('labels.meter')}}</p>
    <p id="land_areaa" class="d-none"> {{__('labels.land_area')}}</p>
    <p id="built_up_areaa" class="d-none">{{__('labels.built_up_area')}}</p>
    <p id="area_in_square_m" class="d-none">{{__('labels.area_in_square_m')}}</p>
    {{-- create dictionary of attribute some paragraph end--}}
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
                        <div class="radio-container radio-edit-two">
                            <input type="radio" name="parent_category" onclick="property_type_triger(this)" value="{{$row->id}}" {{ !empty($array) && $array['parent_category'] == $row->id ? "checked" : (old("parent_category") == $row->id ? "checked":"") }}>
                            <span class="checmark font-16 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="error nature_error"></div>
                    @if($errors->has('parent_category'))
                    <div class="error">{{ $errors->first('parent_category') }}</div>
                    @endif
                    <p class="theme-text-black font-18 mt-3" id="type_text">{{__('labels.type_property')}}</p>
                    <div class="col-12 justify-content-end property_types row theme-gx-3 mb-4_5" id="property_type_radio">
                        @foreach($child_category as $row)
                        <div class="radio-container radio-edit-two property_radio">
                            <input type="radio" name="category" class="type_categpry" onclick="land_triger(this)" data-age="{{$row->property_age}}" data-landarea="{{$row->land_area}}" data-build="{{$row->buildup_area}}" value="{{$row->id}}" data-val="{{ !empty($array) ? $array['category'] : old('category') }}" data-name="{{$row->name}}">
                            <span class="checmark font-16 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                        </div>
                        @endforeach
                    </div>
                    @if($errors->has('category'))
                    <div class="error">{{ $errors->first('category') }}</div>
                    @endif
                    <div class="col-12 d-flex justify-content-end built-land-both">
                        <div class="col-lg-4 d-flex flex-column align-items-end land-size" id="top_land_size">
                            <div id="land_size" class="d-flex justify-content-end align-items-end flex-column w-100">
                                <label for="land_size_area" class="theme-text-seondary-black">{{__('labels.land_size')}}
                                </label>
                                <input type="text" id="land_size_area" value="{{ !empty($post_data->landarea) ? $post_data->landarea->content  : old("landarea")}}" name="landarea" placeholder="{{__('labels.area_square_meter')}}" class="form-control theme-border">
                                <span class="error land_error"></span>
                            </div>

                        </div>
                        <div class="col-lg-4 d-flex flex-column  align-items-end" id="built_up_area">
                            <div class="d-flex justify-content-end align-items-end flex-column w-100">
                                <label for="built_area" class="theme-text-seondary-black">{{__('labels.built_up_area')}}
                                </label>
                                <input type="text"  id="built_area" value="{{ !empty($post_data->builtarea) ? $post_data->builtarea->content  : old("builtarea")}}" name="builtarea" placeholder="{{__('labels.area_square_meter')}}" class="form-control theme-border">
                                <span class="error area_error"></span>
                            </div>
                        </div>
                    </div>
                    @if($errors->has('area'))
                    <div class="error">{{ $errors->first('area') }}</div>
                    @endif


                    <div class="built-up-year mt-3">
                        <p class="theme-text-black font-18">{{__('labels.building_year')}}</p>
                        <div class="row theme-gx-3 mb-4_5 ready-not-ready">
                            <div class="radio-container radio-edit-two">
                                <input type="radio" name="ready" value="1" data-isready='{{ !empty($post_data->ready)  ? $post_data->ready->content : old("ready")  }}' id="ready">
                                <span class="build-ready font-16 font-medium">{{__('labels.ready')}}</span>
                            </div>
                            <div class="radio-container not-ready-margin">
                                <input type="radio" name="ready" value="0" id="not_ready" {{ !empty($post_data->ready)  && $post_data->ready->content == 0 ? "checked"  : (old("ready") == 0 ? "checked" : "")}}>
                                <span class="build-ready font-16 font-medium">{{__('labels.not_ready')}}</span>
                            </div>
                        </div>
                        <div id="year_calender">
                            <input type="text" class="yearpicker form-control hidden" id='yearpicker' name="property_age" placeholder="Select a year" value="{{ !empty($post_data->property_age) ? $post_data->property_age->content : old('property_age') }}" />
                        </div>
                    </div>
                    <span class="error year_picker_error"></span>
                    @if($errors->has('property_age'))
                    <span class="error">{{ $errors->first('property_age') }}</span>
                    @endif
                    <!-- property value Section Starts Here -->
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row property-value mt-3">
                        <div class="col-lg-6 col-md-12 flex-column mt-3">
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn gx-2 water-meter">
                                    <div class="radio-container yes-no-radio radio-edit-two">
                                        <input type="radio" name="electricity_facility" data-val="{{!empty($post_data->electricity_facility) ? $post_data->electricity_facility->content :  old('electricity_facility')}}" value="1">
                                        <span class="checmark font-16 font-medium">{{__('labels.no')}}</span>
                                    </div>
                                    <div class="radio-container radio-edit-two yes-no-radio">
                                        <input type="radio" name="electricity_facility" value="0" data-val="{{!empty($post_data->electricity_facility) ? $post_data->electricity_facility->content :  old('electricity_facility')}}">
                                        <span class="checmark font-16 font-medium">{{__('labels.yes')}}</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">{{__('labels.electricity_meter_is_there')}}</p>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="row d-flex yesno-btn gx-2 other-meter">
                                    <div class="radio-container yes-no-radio radio-edit-two">
                                        <input type="radio" name="water_facility" data-val="{{ !empty($post_data->water_facility) ? $post_data->water_facility->content : old('water_facility')}}" value="1">
                                        <span class="checmark font-16 font-medium">{{__('labels.no')}}</span>
                                    </div>
                                    <div class="radio-container yes-no-radio radio-edit-two">
                                        <input type="radio" name="water_facility" data-val="{{ !empty($post_data->water_facility) ? $post_data->water_facility->content :  old('water_facility')}}" value="0">
                                        <span class="checmark font-16 font-medium">{{__('labels.yes')}}</span>
                                    </div>
                                </div>
                                <p class="mb-0 font-18 theme-text-seondary-black meter_txt">{{__('labels.water_meter_is_there')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 d-flex add-address justify-content-end">
                            <div class="col-lg-8 col-md-10 col-sm-12 d-flex flex-column align-items-end">
                                <label for="value" class="font-18 theme-text-seondary-black"> {{ !empty($post_data->property_status_type) && $post_data->property_status_type->category->name == 'Rent'  ? __('labels.rental_value') : __('labels.Sale_value') }}</label>
                                <div class="position-relative d-flex align-items-center w-100">
                                    <input type="text" id="value" value="{{ !empty($post_data->price) ? $post_data->price->price  : old('price') }}" name="price" placeholder="{{ !empty($post_data->property_status_type) && $post_data->property_status_type->category->name == 'Rent'  ? __('labels.rental_value') : __('labels.Sale_value')  }}" class="form-control theme-border w-100">
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
                        <div class="radio-container radio-edit-two">
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
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" id="second_form_btn" class="btn btn-theme">{{__('labels.next')}}</button>
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
        startYear: 1975,
        endYear: 2023
    });
</script>
@endsection