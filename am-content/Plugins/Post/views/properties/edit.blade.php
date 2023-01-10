@extends('layouts.backend.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('Edit Property') }}</h4>
            </div>
            <div class="card-body">
                @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×
                    </button>
                    {{ session()->get('flash_notification.message') }}
                </div>
                @endif
                <ul class="nav nav-tabs d-flex" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#step_1" role="tab" aria-controls="step_1" aria-selected="true">Step 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_2" role="tab" aria-controls="step_2" aria-selected="true">Step 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_3" role="tab" aria-controls="step_3" aria-selected="true">Step 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">Step 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_5" role="tab" aria-controls="step_5" aria-selected="true">Step 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_6" role="tab" aria-controls="step_6" aria-selected="true">Step 6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="true">Finish</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
                        <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                            @csrf
                            <input type="hidden" name="term_id" value="{{ $info->id }}">
                        </form>
                        <div class="row">
                            @foreach($info->medias as $key => $row)
                            <div class="col-sm-3" id="m_area{{ $key }}">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset($row->url) }}" alt="" height="100" width="150">
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-danger col-12" onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Video Link</label>
                                    <input type="text" value="{{ !empty( $info->virtual_tour) ? $info->virtual_tour->content  : ""}}" name="virtual_tour" placeholder="{{__('labels.example')}} http://youtube.be/dkdsds" class="form-control theme-border">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="step_1" role="tabpanel" aria-labelledby="step_1">
                        <div class="pt-4">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf
                                <div class="form-group mt-3">
                                    <label>Property</label>
                                    <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option value='' disabled selected>Select Property Type</option>
                                        @foreach($status_category as $statuses)
                                        <option value='{{$statuses->id}}' {{ $info->property_status_type->category_id == $statuses->id ? 'selected' : '' }}>{{ $statuses->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-6">
                                        @php
                                        $arr['title']= 'English title';
                                        $arr['id']= 'title';
                                        $arr['type']= 'text';
                                        $arr['placeholder']= 'Enter english title';
                                        $arr['name']= 'title';
                                        $arr['is_required'] = true;
                                        $arr['value'] = $info->title;

                                        echo input($arr);
                                        @endphp
                                    </div>
                                    <div class="form-group col-6">
                                        @php
                                        $arr['title']= 'Arabic title';
                                        $arr['id']= 'ar_title';
                                        $arr['type']= 'text';
                                        $arr['placeholder']= 'Enter Arabic title';
                                        $arr['name']= 'title';
                                        $arr['is_required'] = true;
                                        $arr['value'] = $info->ar_title;

                                        echo input($arr);
                                        @endphp
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="title">{{ __('Select State') }}</label>
                                        <select class="form-control" aria-label=".form-select-lg example">
                                            <option value='' disabled selected>{{ __('Select State') }}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="title">District</label>
                                        <select class="form-control" aria-label=".form-select-lg example">
                                            <option value="" disabled="" selected="">Select District</option>
                                            <option value="1">Izdehar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    @php
                                    $arr22['title']= 'Location';
                                    $arr22['id']= 'location_input';
                                    $arr22['type']= 'text';
                                    $arr22['placeholder']= 'Enter Location';
                                    $arr22['name']= 'location';
                                    $arr22['value']= $info->city->value ?? '';
                                    $arr22['is_required'] = true;

                                    echo input($arr22);
                                    @endphp
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step_2" role="tabpanel" aria-labelledby="step_2">
                        <div class="pt-4">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Property Nature</label>
                                            <select class="form-control" name="parent_category" id="nature">
                                                <option value='' disabled selected>Property Nature</option>
                                                @foreach($parent_category as $row)
                                                <option value="{{ $row->id }}" {{ !empty($array) && $array['parent_category'] == $row->id ? "selected" : "" }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <select class="form-control form-select-lg mb-3" id="property_type" aria-label=".form-select-lg example">
                                                @foreach($child_category as $row)
                                                <option value="{{ $row->id }}" {{ !empty($array) && $array['category'] == $row->id ? "selected" : "" }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Built-up Area</label>
                                            <input type="text" placeholder="Built-up Area" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Land Area</label>
                                            <input type="text" placeholder="Land Area" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Building year</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option selected>No Ready</option>
                                                <option>Ready</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mt-2">
                                            <label></label>
                                            <input type="calender" placeholder="Land Area" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is there an electricity meter?</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option selected>Is there an electricity meter?</option>
                                                <option value="0" {{ !empty($info->electricity_facility) && $info->electricity_facility->content == 0 ? "selected"  : "" }}>
                                                    Yes
                                                </option>
                                                <option value="1" {{ !empty($info->electricity_facility) && $info->electricity_facility->content == 1 ? "selected"  : "" }}>
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is there a water meter?</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option selected>Is there a water meter?</option>
                                                <option value="1" {{ !empty($info->water_facility) && $info->water_facility->content == 1 ? "selected"  : "" }}>
                                                    Yes
                                                </option>
                                                <option value="0" {{ !empty($info->water_facility) && $info->water_facility->content == 0 ? "selected"  : "" }}>
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>No. of Street</label>
                                            <select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option value="" disabled selected>No. of Streets?</option>
                                                @for($i=0; $i<=4; $i++) <option value="1" {{ !empty($info->streets) && $info->streets->content == $i ? "selected"  : "" }}>
                                                    {{$i}}
                                                    </option>
                                                    @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Street Information 1</label>
                                            <input type="text" class="form-control" value="{{ !empty( $info->street_info_one) ? $info->street_info_one->content  : ""}}" class="form-control street_view theme-border">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Street Information 2</label>
                                            <input type="text" class="form-control" value="{{ !empty( $info->street_info_two) ? $info->street_info_two->content  : ""}}" class="form-control street_view theme-border">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label>Property Price</label>
                                        <input type="text" class="form-control" value="{{ !empty($info->price) ? $info->price->price  : ""}}" name="price" placeholder="Property Value">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step_3" role="tabpanel" aria-labelledby="step_3">
                        <div class="pt-4">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf
                                <div class="row">
                                    @foreach($input_options as $row)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>{{ $row->name }}</label>
                                            <input class="form-control" type="number" step="any" name="input_option[]" value="{{ $row->post_category_option->value ?? '' }}" placeholder="{{ $row->name }}" class="form-control">
                                            <input type="hidden" name="input_id[]" value="{{ $row->id }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="furnishing">Property furnishing</label>
                                            <select name="furnishing" id="furnishing" class="form-control">
                                                <option value="1" {{ !empty($info->property_condition) && $info->property_condition->content == 1 ? "selected"  : "" }}>
                                                    Furnished
                                                </option>
                                                <option value="2" {{ !empty($info->property_condition) && $info->property_condition->content == 2 ? "selected"  : "" }}>
                                                    Semi Furnished
                                                </option>
                                                <option value="3" {{ !empty($info->property_condition) && $info->property_condition->content == 3 ? "selected"  : "" }}>
                                                    Un-Furnished
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="role">Property role</label>
                                            <input type="text" name="role" value="{{ !empty($info->role) && $info->role->content  ? $info->role->content  : '' }}" id="role" placeholder="Property role" class="form-control">
                                        </div>
                                    </div> -->
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step_5" role="tabpanel" aria-labelledby="step_5">
                        <div class="pt-20">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf
                                <div class="p-0 m-0 col-sm-12">
                                    <div class="form-group">
                                        <label for="features">Property features</label>
                                        <select multiple="" id="features" class="form-control select2" name="features[]">
                                            <option value="">Please setelect features</option>
                                            @foreach(App\Category::where('type','feature')->get() as $row)
                                            <option value="{{ $row->id}}" @if(in_array($row->id, $features_array)) selected="" @endif >{{ $row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="step_6" role="tabpanel" aria-labelledby="step_6">
                        <div class="pt-4">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Identification No.</label>
                                            <input type="text" class="form-control" value="{{ !empty( $info->instrument_number) ? $info->instrument_number->content  : '' }}" placeholder="10251511212151">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Instrument No.</label>
                                            <input type="text" class="form-control" value="{{ !empty( $info->id_number) ? $info->id_number->content  : '' }}" placeholder="a4234234243">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="finish">
                        <div class="pt-4">
                            <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
                                @csrf

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="productform" novalidate method="post" action="{{ route('admin.property.update',$info->id) }}">
    @csrf
    @method('PUT')
    {{ publish(['class'=>'basicbtn']) }}

        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Moderation status') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="moderation_status">
                        <option value="1" @if($info->status==1) selected="" @endif>{{ __('Publish') }}</option>
                        <option value="2" @if($info->status==2) selected="" @endif>{{ __('Incomplete') }}</option>
                        <option value="3" @if($info->status==3) selected="" @endif>{{ __('Pending') }}</option>
                        <option value="4" @if($info->status==4) selected="" @endif>{{ __('Reject') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Is Featured') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="featured">
                        <option value="1" @if($info->featured==1) selected="" @endif>{{ __('Yes') }}</option>
                        <option value="0" @if($info->featured==0) selected="" @endif>{{ __('No') }}</option>
                    </select>
                </div>
            </div>
        </div>
        <!--  <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{ __('Status') }}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="status[]">
                    @foreach(\App\Category::where('type','status')->get() as $row)
            <option value="{{ $row->id }}" @if(in_array($row->id, $array))
                selected=""
            @endif>{{ $row->name }}</option>

        @endforeach
        </select>
    </div>
</div>
</div> -->
        <!-- <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{ __('Project') }}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="project">
                    <option value="">{{ __('Select Project') }}</option>
                    @foreach(\App\Terms::where('type','project')->where('status',1)->get() as $row)
            <option value="{{ $row->id }}" @if($row->id==$child)
                selected=""
            @endif>{{ $row->title }}</option>

        @endforeach
        </select>
    </div>
</div>
</div> -->
        <!-- <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{ __('Category') }}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="category[]">
                    @foreach(\App\Category::where('type','category')->get() as $row)
            <option value="{{ $row->id }}" @if(in_array($row->id, $array))
                selected=""
            @endif>{{ $row->name }}</option>

        @endforeach
        </select>
    </div>
</div>
</div> -->
</div>
</div>
</form>
<form method="post" action="{{ route('admin.locations.info') }}" id="basicform3">
    @csrf
    <input type="hidden" name="id" id="id2">
</form>

<form method="post" action="{{ route('admin.medias.destroy') }}" id="basicform">
    @csrf
    <input type="hidden" id="media_id" name="id[]">
    <input type="hidden" name="status" value="delete">
</form>
<input type="hidden" id="city_id" value="{{ $info->city->category_id ?? '' }}">
@endsection

@section('script')
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize"></script> -->
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script>
    "use strict";

    //success response will assign here
    function success(res) {
        location.reload()
    }

    (function($) {


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
        $.each(res, function(index, value) {

            $('#state').append("<option value='" + value.id + "' class='res'>" + value.name + "</option>");

        });

        var city_id = $('#city_id').val();
        $('#city').val(city_id);
    }

    function success3(res) {
        $('.city').show();
        $('.res1').remove();
        $.each(res, function(index, value) {

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
        google.maps.event.addListener(searchBox, 'places_changed', function() {
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
        google.maps.event.addListener(marker, "dragend", function(event) {
            var lat, long, address, resultArray, citi;


            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: marker.getPosition()
            }, function(result, status) {
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