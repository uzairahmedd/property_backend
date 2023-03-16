@extends('layouts.backend.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/yearpicker.css')}}">
    <script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection
<script>
    var interface = '<?php echo !empty($info->interface) ? $info->interface->content : ''; ?>';
    var meter = '<?php echo !empty($info->meter) ? $info->meter->content : ''; ?>';
    var pro_type_name = '<?php echo !empty($info->property_type) ? $info->property_type->category->name : ''; ?>';
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
@section('content')
    <p class="d-none" id="property_nature">{{__('labels.property_nature')}}</p>
    <p class="d-none" id="select_facing">{{__('labels.select_facing')}}</p>
    <p class="d-none" id="select_property_type">{{__('labels.select_property_type')}}</p>
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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('labels.edit_property') }}</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('flash_notification.message'))
                        <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                            <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×
                            </button>
                            {{ session()->get('flash_notification.message') }}
                        </div>
                    @endif
                    <ul class="nav nav-tabs d-flex" id="myTab" role="tablist">
                        {{--Step 1 Tab--}}
                        <li class="nav-item step_1">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#step_1" role="tab"
                               aria-controls="step_1" aria-selected="true">{{__('labels.step_1')}}</a>
                        </li>
                        {{--Step 2 Tab--}}
                        <li class="nav-item step_2" id="step_2_li">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_2" role="tab"
                               aria-controls="step_2" aria-selected="true">{{__('labels.step_2')}}</a>
                        </li>
                        {{--Step 3 Tab--}}
                        <li class="nav-item step_3">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_3" role="tab"
                               aria-controls="step_3" aria-selected="true">{{__('labels.step_3')}}</a>
                        </li>
                        {{--Step 4 Tab--}}
                        <li class="nav-item step_4">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab"
                               aria-controls="profile" aria-selected="false">{{__('labels.step_4')}}</a>
                        </li>
                        {{--Step 5 Tab--}}
                        <li class="nav-item step_5">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_5" role="tab"
                               aria-controls="step_5" aria-selected="true">{{__('labels.step_5')}}</a>
                        </li>
                        {{--Step 6 Tab--}}
                        <li class="nav-item step_6">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_6" role="tab"
                               aria-controls="step_6" aria-selected="true">{{__('labels.step_6')}}</a>
                        </li>
                        {{--Step 7 Tab--}}
                        <li class="nav-item step_7">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#finish" role="tab"
                               aria-controls="finish" aria-selected="true">{{__('labels.finish')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        {{--Step 1 Content Start--}}
                        <div class="tab-pane fade active show" id="step_1" role="tabpanel" aria-labelledby="step_1">
                            {{--                            <form method="post" action="{{ route('admin.property.update_property') }}" class="basicform">--}}
                            {{--                                @csrf--}}
                            {{--                                <input type="hidden" name="term_id" value="{{$id}}">--}}
                            <div class="pt-4">
                                <form id="productform" novalidate method="post"
                                      action="{{ route('admin.property.update',$info->id)}}">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label>{{__('labels.property')}}</label>
                                        <select class="form-control form-select-lg mb-3"
                                                aria-label=".form-select-lg example" name="status">
                                            <option value='' disabled selected>{{__('labels.select_property_type')}}</option>
                                            @foreach($status_category as $statuses)
                                                <option value='{{$statuses->id}}' {{ $info != '' && $info->property_status_type->category_id == $statuses->id ? 'selected' : '' }}>{{Session::get('locale')=='ar' ? $statuses->ar_name : $statuses->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @method('PUT')

                                    <div class="row">
                                        <div class="form-group col-6">
                                            @php
                                                $arr['title']= __('labels.english_title');
                                                $arr['id']= 'title';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('labels.enter_english_title');
                                                $arr['name']= 'title';
                                                $arr['is_required'] = true;
                                                $arr['value'] = $info->title;

                                                echo input($arr);
                                            @endphp
                                        </div>
                                        <div class="form-group col-6">
                                            @php
                                                $arr['title']= __('labels.arabic_title');
                                                $arr['id']= 'ar_title';
                                                $arr['type']= 'text';
                                                $arr['placeholder']= __('labels.enter_arabic_title');
                                                $arr['name']= 'ar_title';
                                                $arr['is_required'] = true;
                                                $arr['value'] = $info->ar_title;

                                                echo input($arr);
                                            @endphp
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="title">{{ __('labels.city') }}</label>
                                            <select class="form-control selectric" id="state" name="city">
                                                <option>{{ __('labels.city') }}</option>
                                                @foreach($cities as $city)
                                                    <option
                                                        value="{{ $city->id }}" {{ $info != '' && $info->post_new_city->city_id == $city->id ? 'selected' : (old('city') == $city->id ? 'selected' : '')}}>{{ Session::get('locale') == 'ar' ?  $city->ar_name : $city->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="title">{{ __('labels.district') }}</label>
                                            <select class="form-control selectric" id="state" name="district">
                                                <option>{{ __('labels.district') }}</option>
                                                @foreach($district as $dist)
                                                    <option name="$dist->name" value="{{ $dist->id }}" {{ $info != '' && $info->post_district->district_id == $dist->id ? 'selected' : (old('district') == $dist->id ? 'selected' : '')}}>{{ Session::get('locale') == 'ar' ?  $dist->ar_name : $dist->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        @php
                                            $arr22['title']= __('labels.locations');
                                            $arr22['id']= 'location_input';
                                            $arr22['type']= 'text';
                                            $arr22['placeholder']= __('labels.enter_location');
                                            $arr22['name']= 'location';
                                            $arr22['value']= $info->district->value ?? '';
                                            $arr22['is_required'] = true;
                                            echo input($arr22);
                                        @endphp
                                    </div>
                                    <div class="d-flex justify-content-end">
{{--                                        <button type="button" class="btn btn-default prev-step"></button>--}}
                                        <button type="submit" class="btn btn-primary next-step" id="next_btn1">
                                            {{__('labels.update')}}
                                        </button>
                                    </div>
                                </form>
                            </div>
                            {{--                            </form>--}}
                        </div>
                        {{--Step 2 Content Start--}}
                        <div class="tab-pane fade" id="step_2" role="tabpanel" aria-labelledby="step_2">
                            <form id="step_two_submit" novalidate method="post"
                                  action="{{ route('admin.property.second_update_property',$info->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="title">{{__('labels.property_nature')}}</label>
                                                <select class="form-control" id="parent_category_change"
                                                        name="parent_category"
                                                        onchange="property_type_triger(this, event)">
                                                    <option value='' disabled selected>{{__('labels.property_nature')}}</option>
                                                    @foreach($parent_category as $row)
                                                        <option value="{{ $row->id }}" {{ !empty($array["parent_category"]) && $array["parent_category"]== $row->id ? "selected" : "" }}>{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input id="all_feature_id" type="hidden" name="term_id"
                                                       value="{{ $info->id }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 property_types">
                                            <div class="form-group">
                                                <label>{{__('labels.property_type')}}</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        id="property_type_select"
                                                        onchange="land_triger(this, event)"
                                                        aria-label=".form-select-lg example" name="category">
                                                    @foreach($child_category as $row)
                                                        <option class="type_categpry" name="category"
                                                                value="{{ $row->id }}"
                                                                data-val="{{ !empty($array) ? $array['category'] : old('category') }}"
                                                                data-name="{{$row->name}}"
                                                                data-age="{{$row->property_age}}"
                                                                data-landarea="{{$row->land_area}}"
                                                                data-build="{{$row->buildup_area}}">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 land-size" id="top_land_size">
                                            <div class="form-group" id="land_size">
                                                <label>{{__('labels.land_area')}}</label>
                                                <input type="text" id="land_size_area"
                                                       value="{{ !empty($info->landarea) ? $info->landarea->content  : old("landarea")}}"
                                                       name="landarea" placeholder="{{__('labels.area_square_meter')}}"
                                                       class="form-control theme-border">
                                            </div>
                                        </div>
                                        <div class="col-sm-6" id="built_up_area">
                                            <div class="form-group">
                                                <label for="title">{{__('labels.built_up_area')}}</label>
                                                <input type="text" id="built_area"
                                                       value="{{ !empty($info->builtarea) ? $info->builtarea->content  : old("builtarea")}}"
                                                       name="builtarea" placeholder="{{__('labels.area_square_meter')}}"
                                                       class="form-control theme-border">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row built-up-year">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.building_year')}}</label>
                                                <div
                                                    class="d-flex justify-content-center align-items-center theme-gx-3 mb-4_5 ready-not-ready">
                                                    <div class="radio-container col-sm-6 radio-edit-two">
                                                        <input type="radio" name="ready" value="1"
                                                               data-isready='{{ !empty($info->ready)  ? $info->ready->content : old("ready")  }}'
                                                               id="ready">
                                                        <span
                                                            class="build-ready font-16 font-medium">{{__('labels.ready')}}</span>
                                                    </div>
                                                    <div class="radio-container col-sm-6 not-ready-margin">
                                                        <input type="radio" name="ready" value="0"
                                                               id="not_ready" {{ !empty($info->ready)  && $info->ready->content == 0 ? "checked"  : (old("ready") == 0 ? "checked" : "")}}>
                                                        <span
                                                            class="build-ready font-16 font-medium">{{__('labels.not_ready')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 form-group mt-3" id="year_calender">
                                            <label></label>
                                            <input type="text" autocomplete="off" class="yearpicker form-control hidden"
                                                   id='yearpicker' name="property_age" placeholder="Select a year"
                                                   value="{{ !empty($info->property_age) ? $info->property_age->content : old('property_age') }}"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mt-4">
                                            <div class="form-group">
                                                <label>{{__('labels.electricity_meter_is_there')}}</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example"
                                                        name="electricity_facility">
                                                    <option selected>{{__('labels.electricity_meter_is_there')}}</option>
                                                    <option value="0"
                                                            data-val="{{!empty($info->electricity_facility) ? $info->electricity_facility->content :  old('electricity_facility')}}" {{ !empty($info->electricity_facility) && $info->electricity_facility->content == 0 ? "selected"  : "" }}>
                                                        {{__('labels.yes')}}
                                                    </option>
                                                    <option value="1"
                                                            data-val="{{!empty($info->electricity_facility) ? $info->electricity_facility->content :  old('electricity_facility')}}" {{ !empty($info->electricity_facility) && $info->electricity_facility->content == 1 ? "selected"  : "" }}>
                                                        {{__('labels.no')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-4">
                                            <div class="form-group">
                                                <label>{{__('labels.water_meter_is_there')}}</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example" name="water_facility">
                                                    <option selected>{{__('labels.water_meter_is_there')}}</option>
                                                    <option value="0"
                                                            data-val="{{!empty($info->water_facility) ? $info->water_facility->content :  old('water_facility')}}" {{ !empty($info->water_facility) && $info->water_facility->content == 0 ? "selected"  : "" }}>
                                                        {{__('labels.yes')}}
                                                    </option>
                                                    <option value="1"
                                                            data-val="{{!empty($info->water_facility) ? $info->water_facility->content :  old('water_facility')}}" {{ !empty($info->water_facility) && $info->water_facility->content == 1 ? "selected"  : "" }}>
                                                        {{__('labels.no')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>{{__('labels.no_street')}}</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example"
                                                        onchange="dropdown_btn(this, event)" name="streets">
                                                    @for($i=1; $i<=4; $i++)
                                                        <option class="street_sdropdown" id="street"
                                                                data-streets='{{ !empty($info->streets) ? $info->streets->content : old("streets") }}'
                                                                value="{{$i}}" {{ !empty($info->streets) && $info->streets->content == $i ? "selected"  : "" }}>
                                                            {{$i}}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="street_detailss col-sm-8"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.property_price')}}</label>
                                                <input type="text" class="form-control"
                                                       value="{{ !empty($info->price) ? $info->price->price  : ""}}"
                                                       name="price" placeholder="{{__('labels.property_value')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
{{--                                    <button type="button" class="btn btn-info prev-step" id="p-btn1">Previous</button>--}}
                                    <button type="submit" class="btn btn-primary next-step" id="next_btn2">{{__('labels.update')}}</button>
                                </div>
                            </form>
                        </div>
                        {{--Step 3 Content Start--}}
                        <div class="tab-pane fade" id="step_3" role="tabpanel" aria-labelledby="step_3">
                            <form id="step_three_submit" novalidate method="post"
                                  action="{{ route('admin.property.third_update_property',$info->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="row all_features">
                                                    <div class="col-3 bedroom_features" id="bedroom_features"></div>
                                                    <div class="col-3 bathroom_features" id="bathroom_features"></div>
                                                    <div class="col-3 guest_room_features" id="guest_room_features"></div>
                                                    <div class="col-3 living_room_features" id="living_room_features"></div>
                                                    <div class="col-3 parking_features" id="parking_features"></div>
                                                    <div class="col-3 elevator_features" id="elevator_features"></div>
                                                    <div class="col-3 appartment_features" id="appartment_features"></div>
                                                    <div class="col-3 opening_features" id="opening_features"></div>
                                                    <div class="col-3 office_features" id="office_features"></div>
                                                </div>
                                                <input id="feature_id" type="hidden" name="term_id"
                                                       value="{{ $info->id }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="furnishing">{{__('labels.property_furnishing')}}</label>
                                                <select name="furnishing" id="furnishing" class="form-control">
                                                    <option
                                                        value="1" {{ !empty($info->property_condition) && $info->property_condition->content == 1 ? "selected"  : "" }}>
                                                        {{__('labels.furnished')}}
                                                    </option>
                                                    <option
                                                        value="2" {{ !empty($info->property_condition) && $info->property_condition->content == 2 ? "selected"  : "" }}>
                                                        {{__('labels.semi_furnished')}}
                                                    </option>
                                                    <option
                                                        value="3" {{ !empty($info->property_condition) && $info->property_condition->content == 3 ? "selected"  : "" }}>
                                                        {{__('labels.un_furnished')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>


                                        @if(!empty($info->property_type) && $info->property_type->category->property_floor == '1')
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="property_floor">{{__('labels.property_floor')}}</label>
                                                    <input type="text" name="property_floor"
                                                           value="{{ !empty( $info->property_floor) ? $info->property_floor->content  : old('property_floor') }}"
                                                           placeholder="{{__('labels.property_floor')}}"
                                                           id="interface_val3"
                                                           class="form-control street_view theme-border">
                                                </div>
                                            </div>
                                        @endif


                                        @if(!empty($info->property_type) && $info->property_type->category->total_floor == '1')
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="total_floors">{{__('labels.total_floors')}}</label>
                                                    <input type="text" name="total_floors"
                                                           value="{{ !empty( $info->total_floors) ? $info->total_floors->content  : old('total_floors') }}"
                                                           placeholder="{{__('labels.total_floors')}}"
                                                           class="form-control theme-border">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
{{--                                    <button type="button" class="btn btn-info prev-step" id="p-btn2">Previous</button>--}}
                                    <button type="submit" class="btn btn-primary next-step" id="next_btn3">{{__('labels.update')}}</button>
                                </div>
                            </form>
                        </div>
                        {{--Step 4 Content Start--}}
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="step_four_submit" novalidate method="post" action="{{ route('admin.property.fourth_update_property',$info->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-12 d-flex justify-content-between flex-wrap add_upload_img">
                                    <div class="col-lg-2 col-md-3 col-sm-3">
                                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                            <input type="file" name="media[]" class="file-input" onchange="loadFile(event)">
                                            <img id="first_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3">
                                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                            <input type="file" class="file-input" name="media[]" onchange="loadFile1(event)">
                                            <img id="second_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                        </div>

                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3">
                                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                            <input type="file" class="file-input" name="media[]" onchange="loadFile2(event)">
                                            <img id="third_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3">
                                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                            <input type="file" class="file-input" name="media[]" onchange="loadFile3(event)">
                                            <img id="forth_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3">
                                        <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                            <input type="file" class="file-input" name="media[]" onchange="loadFile4(event)">
                                            <img id="five_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                            <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    @foreach($info->medias as $key => $row)
                                        <div class="col-sm-3" id="m_area{{ $key }}">
                                            <div class="card">
                                                <img src="{{ asset($row->url) }}" alt="" height="100">
                                                <div class="card-footer">
                                                    <a class="btn btn-danger remove-btn col-12"
                                                       onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group pt-1">
                                            <label>{{__('labels.video_link')}}</label>
                                            <input type="text"
                                                   value="{{ !empty( $info->virtual_tour) ? $info->virtual_tour->content  : ""}}"
                                                   name="virtual_tour"
                                                   placeholder="{{__('labels.example')}} http://youtube.be/dkdsds"
                                                   class="form-control theme-border">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{--                                    <button type="button" class="btn btn-info prev-step" id="p-btn3">Previous</button>--}}
                                    <button type="submit" class="btn btn-primary next-step" id="next_btn4">{{__('labels.update')}}</button>
                                </div>
                            </form>
                        </div>
                        {{--Step 5 Content Start--}}
                        <div class="tab-pane fade" id="step_5" role="tabpanel" aria-labelledby="step_5">
                            <form id="step_fifth_submit" novalidate method="post"
                                  action="{{ route('admin.property.fifth_update_property',$info->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="pt-4">
                                    <div class="theme-gx-2 theme-gy-36 d-flex justify-content-between align-items-center flex-wrap p-2 form-check"
                                        id="tick_div">
                                        <div class="features_check" id="features_check"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.land_length')}}</label>
                                                <input type="text" name="length" class="form-control" id="land_length" value="{{!empty($info->length) ? $info->length->content : old('length')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.land_width')}}</label>
                                                <input type="text" id="depth_field" name="depth"
                                                       value="{{ !empty($info->depth) ? $info->depth->content  : old('depth')}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
{{--                                    <button type="button" class="btn btn-info prev-step" id="p-btn4">Previous</button>--}}
                                    <button type="submit" class="btn btn-primary next-step" id="next_btn5">{{__('labels.update')}}</button>
                                </div>
                            </form>
                        </div>
                        {{--Step 6 Content Start--}}
                        <div class="tab-pane fade" id="step_6" role="tabpanel" aria-labelledby="step_6">
                            <form id="step_sixth_submit" novalidate method="post"
                                  action="{{ route('admin.property.sixth_update_property',$info->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="pt-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.identification_no')}}</label>
                                                <input type="text" name="id_number" disabled  value="{{ isset($user_id->advertiser_id) ? $user_id->advertiser_id : old('id_number') }}" placeholder="1025151121" class="form-control payment theme-border">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>{{__('labels.instrument_no')}} {{__('labels.optional')}}</label>
                                                <input type="text" name="instrument_number" value="{{ !empty( $info->instrument_number) ? $info->instrument_number->content  : old('instrument_number') }}" placeholder="{{__('labels.instrument_no')}}" class="form-control payment theme-border">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chek-info d-flex flex-column justify-content-start align-items-start">
                                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                                            <div
                                                class="col-12 mb-3 d-flex align-items-center justify-content-start terms-check">
                                                <label class="form-check-label check-box-terms"
                                                       for="inlineCheckbox1"> {{__("labels.is_there_mortage")}}</label>
                                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                                <input class="form-check-input" name="rule[]" type="checkbox"
                                                       id="inlineCheckbox1"
                                                       value="1" {{ !empty( $info->rules) && str_contains($info->rules->content, '1') ? "checked"  : old("rule") }}>

                                            </div>
                                        </div>
                                        <div
                                            class="document theme-gx-32 d-flex justify-content-start align-items-start">
                                            <div
                                                class="col-12 mb-3 d-flex align-items-center justify-content-start terms-check">
                                                <label class="form-check-label check-box-terms"
                                                       for="inlineCheckbox2"> {{__("labels.right_and_obligations")}}</label>
                                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                                <input class="form-check-input" name="rule[]" type="checkbox"
                                                       id="inlineCheckbox2"
                                                       value="2" {{ !empty( $info->rules) && str_contains($info->rules->content, '2') ? "checked"  : old("rule") }}>
                                            </div>
                                        </div>
                                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                                            <div
                                                class="col-12 mb-3 d-flex align-items-center justify-content-start terms-check">
                                                <label class="form-check-label check-box-terms"
                                                       for="inlineCheckbox3">{{__("labels.info_property_effects")}}</label>
                                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                                <input class="form-check-input" name="rule[]" type="checkbox"
                                                       id="inlineCheckbox3"
                                                       value="3" {{ !empty( $info->rules) && str_contains($info->rules->content, '3') ? "checked"  : old("rule") }}>
                                            </div>
                                        </div>
                                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                                            <div
                                                class="col-12 mb-3 d-flex align-items-center justify-content-start terms-check">
                                                <label class="form-check-label check-box-terms"
                                                       for="inlineCheckbox4">{{__("labels.Property_disputes")}}</label>
                                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                                <input class="form-check-input" name="rule[]" type="checkbox"
                                                       id="inlineCheckbox4"
                                                       value="4" {{ !empty( $info->rules) && str_contains($info->rules->content, '4') ? "checked"  : old("rule") }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
{{--                                    <button type="button" class="btn btn-info prev-step" id="p-btn5">Previous</button>--}}
                                    <button type="submit" class="btn btn-primary next-step" id="next_btn6">{{__('labels.update')}}</button>
                                </div>
                            </form>
                        </div>
                        {{--Step 7 Content Start--}}
                        <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish">
                            <div class="pt-4 d-flex justify-content-center align-items-center">
                                <div class="description-card finished align-items-center justify-content-center">
                                    {{--                                    <input type="hidden" name="user_id" value="{{encrypt(Auth::User()->id)}}">--}}
                                    <p class="font-medium theme-text-seondary-black">{{__('labels.process_finished')}}</p>
                                    <svg class="check-spinner" viewBox="0 0 100 100" width="100px" height="100px">
                                        <defs>
                                            <linearGradient id="cs-grad-1" x1="0.5" y1="0" x2="0.5" y2="1">
                                                <stop offset="0%" stop-color="hsl(0,0%,100%)"/>
                                                <stop offset="100%" stop-color="hsl(0,0%,80%)"/>
                                            </linearGradient>
                                            <linearGradient id="cs-grad-2a" x1="0.5" y1="0" x2="0.5" y2="1"
                                                            gradientTransform="rotate(90,0.5,0.5)">
                                                <stop offset="0%" stop-color="hsl(123,90%,55%)"/>
                                                <stop offset="100%" stop-color="hsl(183,90%,25%)"/>
                                            </linearGradient>
                                            <linearGradient id="cs-grad-2b" x1="0.5" y1="0" x2="0.5" y2="1">
                                                <stop offset="0%" stop-color="hsl(123,90%,55%)"/>
                                                <stop offset="100%" stop-color="hsl(183,90%,25%)"/>
                                            </linearGradient>
                                        </defs>
                                        <circle class="check-spinner__circle" cx="50" cy="50" r="0"
                                                fill="url(#cs-grad-1)"/>
                                        <circle class="check-spinner__worm-a" cx="50" cy="50" r="46" fill="none"
                                                stroke="url(#cs-grad-2a)" stroke-width="8" stroke-linecap="round"
                                                stroke-dasharray="72.2 216.8" stroke-dashoffset="36.1"
                                                transform="rotate(-90,50,50)"/>
                                        <path class="check-spinner__worm-b"
                                              d="M 17.473 17.473 C 25.797 9.15 37.297 4 50 4 C 75.4 4 96 24.6 96 50 C 96 75.4 75.4 96 50 96 C 24.6 96 4 75.4 4 50 C 4 44.253 6.909 36.33 12.5 35 C 21.269 32.913 35 50 35 50 L 45 60 L 65 40"
                                              fill="none" stroke="url(#cs-grad-2b)" stroke-width="8"
                                              stroke-linecap="round" stroke-linejoin="round"
                                              stroke-dasharray="0 0 72.2 341.3"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="{{ route('agent.medias.destroy') }}" id="basicform">
            @csrf
            <input type="hidden" id="media_id" name="id[]">
            <input type="hidden" name="status" value="delete">
        </form>
        @endsection

        @section('script')
            <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize"></script> -->
            <script src="{{ asset('admin/js/edit_property.js') }}"></script>
            <script src="{{ asset('admin/js/form.js') }}"></script>
            <script src="{{ asset('admin/js/select2.min.js') }}"></script>
            <script>
                "use strict";

                //success response will assign here
                function success(res) {
                    // location.reload()
                }

                (function ($) {


                    $('#state').on('change', () => {
                        $('#id2').val($('#state').val());
                        $('#basicform3').submit();
                    });

                    var i = 50;
                    $('.add_more').on('click', () => {
                        i++;
                        var selectbox = $('.f_row').html();
                        var html = '<tr id="table_row' + i + '"> <td> ' + selectbox + ' </td><td> <input type="number" name="facilities_input[]" placeholder="Distance (Km)" class="form-control col-12" step="any"> </td><td> <button type="button"  class="btn btn-danger mt-1 float-left" onclick="remove_row(' + i + ')"><i class="fa fa-trash"></i></button> </td></tr>'

                        $('.facilities_area').append(html)
                    });

                    if ($('#state').val() != null) {
                        var state = $('#state').val();
                        $('#id2').val(state)
                        $('#basicform3').submit();
                    }

                })(jQuery);

                function remove_row(id) {

                    $('#table_row' + id + '').remove();
                }

                var m_id = '';

                function remove_image(param, key) {
                    m_id = key;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Do It!'
                    }).then((result) => {
                        if (result.value == true) {
                            $('#m_area' + m_id).remove();
                            $('#media_id').val(param);
                            $('#basicform').submit();
                        }
                    })

                }


                function success1(res) {
                    $('.states').show();
                    $('.res').remove();
                    $.each(res, function (index, value) {

                        $('#state').append("<option value='" + value.id + "' class='res'>" + value.name + "</option>");

                    });

                    var city_id = $('#city_id').val();
                    $('#city').val(city_id);
                }

                function success3(res) {
                    $('.city').show();
                    $('.res1').remove();
                    $.each(res, function (index, value) {

                        $('#city').append("<option value='" + value.id + "' class='res1'>" + value.name + "</option>");

                    })


                    var city_id = $('#city_id').val();
                    $('#city').val(city_id);
                }


                function initialize() {

                    var mapOptions, map, marker, searchBox, city,
                        infoWindow = '',
                        addressEl = document.querySelector('#location_input'),
                        latEl = document.querySelector('#latitude'),
                        longEl = document.querySelector('#longitude'),
                        element = document.getElementById('map-canvas');


                    mapOptions = {
                        // How far the maps zooms in.
                        zoom: 13,
                        // Current Lat and Long position of the pin/
                        center: new google.maps.LatLng($('#latitude').val(), $('#longitude').val()),

                        disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
                        scrollWheel: true, // If set to false disables the scrolling on the map.
                        draggable: true, // If set to false , you cannot move the map around.
                        // mapTypeId: google.maps.MapTypeId.HYBRID, // If set to HYBRID its between sat and ROADMAP, Can be set to SATELLITE as well.
                        maxZoom: 21, // Wont allow you to zoom more than this


                    };

                    /**
                     * Creates the map using google function google.maps.Map() by passing the id of canvas and
                     * mapOptions object that we just created above as its parameters.
                     *
                     */
                    // Create an object map with the constructor function Map()
                    map = new google.maps.Map(element, mapOptions); // Till this like of code it loads up the map.

                    /**
                     * Creates the marker on the map
                     *
                     */
                    marker = new google.maps.Marker({
                        position: mapOptions.center,
                        map: map,
                        draggable: true
                    });

                    /**
                     * Creates a search box
                     */
                    searchBox = new google.maps.places.SearchBox(addressEl);

                    /**
                     * When the place is changed on search box, it takes the marker to the searched location.
                     */
                    google.maps.event.addListener(searchBox, 'places_changed', function () {
                        var places = searchBox.getPlaces(),
                            bounds = new google.maps.LatLngBounds(),
                            i, place, lat, long, resultArray,
                            addresss = places[0].formatted_address;

                        for (i = 0; place = places[i]; i++) {
                            bounds.extend(place.geometry.location);
                            marker.setPosition(place.geometry.location); // Set marker position new.
                        }

                        map.fitBounds(bounds); // Fit to the bound
                        map.setZoom(15); // This function sets the zoom to 15, meaning zooms to level 15.


                        lat = marker.getPosition().lat();
                        long = marker.getPosition().lng();
                        latEl.value = lat;
                        longEl.value = long;

                        resultArray = places[0].address_components;


                        // Closes the previous info window if it already exists
                        if (infoWindow) {
                            infoWindow.close();
                        }
                        /**
                         * Creates the info Window at the top of the marker
                         */
                        infoWindow = new google.maps.InfoWindow({
                            content: addresss
                        });

                        infoWindow.open(map, marker);

                        $('#map-canvas').show();
                    });


                    /**
                     * Finds the new position of the marker when the marker is dragged.
                     */
                    google.maps.event.addListener(marker, "dragend", function (event) {
                        var lat, long, address, resultArray, citi;


                        lat = marker.getPosition().lat();
                        long = marker.getPosition().lng();

                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            latLng: marker.getPosition()
                        }, function (result, status) {
                            if ('OK' === status) { // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                                address = result[0].formatted_address;
                                resultArray = result[0].address_components;


                                addressEl.value = address;
                                latEl.value = lat;
                                longEl.value = long;

                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }

                            // Closes the previous info window if it already exists
                            if (infoWindow) {
                                infoWindow.close();
                            }

                            /**
                             * Creates the info Window at the top of the marker
                             */
                            infoWindow = new google.maps.InfoWindow({
                                content: address
                            });

                            infoWindow.open(map, marker);
                        });
                    });


                }
            </script>
        @endsection
