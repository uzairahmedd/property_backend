@extends('layouts.backend.app')

@section('style')
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
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                               aria-controls="home" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab"
                               aria-controls="profile" aria-selected="false">Images</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
                            <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data"
                                  class="dropzone" id="mydropzone">
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
                                                <button class="btn btn-danger col-12"
                                                        onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="pt-20">
                                <form id="productform" novalidate method="post"
                                      action="{{ route('admin.property.update',$info->id) }}">
                                    @csrf
                             
                                    <div class="form-group mt-3">
                                        <label>Property</label>
                                        <select class="form-control form-select-lg mb-3"
                                                aria-label=".form-select-lg example">
                                            <option value='' disabled selected>Select Property Type</option>
                                            @foreach($status_category as $statuses)
                                            <option value='{{$statuses->id}}' {{ $info->property_status_type->category_id == $statuses->id ? 'selected' : '' }}>{{ $statuses->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @method('PUT')

                                    @php

                                        $arr['title']= 'English title';
                                        $arr['id']= 'title';
                                        $arr['type']= 'text';
                                        $arr['placeholder']= 'Enter english title';
                                        $arr['name']= 'title';
                                        $arr['is_required'] = true;
                                        $arr['value'] = $info->title;

                                        echo  input($arr);

                                        $arr['title']= 'Arabic title';
                                        $arr['id']= 'ar_title';
                                        $arr['type']= 'text';
                                        $arr['placeholder']= 'Enter Arabic title';
                                        $arr['name']= 'title';
                                        $arr['is_required'] = true;
                                        $arr['value'] = $info->ar_title;

                                        echo  input($arr);

                                        $arr2['title']= 'English Description';
                                        $arr2['id']= 'Description';
                                        $arr2['name']= 'dsscription';
                                        $arr2['placeholder']= 'English Description';
                                        $arr2['is_required'] = true;
                                        $arr2['value'] = $info->description->content ?? '';

                                        echo editor($arr2);

                                        $arr2['title']= 'Arabic Description';
                                        $arr2['id']= 'ar_Description';
                                        $arr2['name']= 'ar_dsscription';
                                        $arr2['placeholder']= 'Arabic Description';
                                        $arr2['is_required'] = true;
                                        $arr2['value'] = $info->arabic_description->content ?? '';

                                        echo editor($arr2);

                                        $arr22['title']= 'Area';
                                        $arr22['id']= 'area';
                                        $arr22['type']= 'number';
                                        $arr22['placeholder']= 'Enter area';
                                        $arr22['name']= 'area';
                                        $arr22['value']= $info->area->content ?? '';
                                        $arr22['is_required'] = true;

                                        echo  input($arr22);

                                        $arr22['title']= 'Location';
                                        $arr22['id']= 'location_input';
                                        $arr22['type']= 'text';
                                        $arr22['placeholder']= 'Enter Location';
                                        $arr22['name']= 'location';
                                        $arr22['value']= $info->city->value ?? '';
                                        $arr22['is_required'] = true;

                                        echo  input($arr22);

                                    @endphp

                                     
                                    <div class="form-group">
                                        <label for="title">{{ __('Select State') }}</label>
                                        <select class="form-control selectric" id="state" name="state[]">
                                            <option value='' disabled selected>{{ __('Select State') }}</option>
                                            @foreach(App\Category::where('type','states')->get() as $row)
                                                <option value="{{ $row->id }}" {{ $info->city->category_id == $row->id ? "selected" : ''}}>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                            <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Property Nature</label>
                                        <select class="form-control" name="parent_category" id="parent_category">
                                            <option value='' disabled selected>Property Nature</option>
                                            @foreach($parent_category as $row)
                                            <option value="{{ $row->id }}" {{ $info->city->category_id == $row->id ? "selected" : ''}} >Property Nature</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    </div>
                                    @php
                                        $arr22['title']= 'Location';
                                        $arr22['id']= 'location_input';
                                        $arr22['type']= 'text';
                                        $arr22['placeholder']= 'Enter Location';
                                        $arr22['name']= 'location';
                                        $arr22['value']= $info->city->value ?? '';
                                        $arr22['is_required'] = true;

                                        echo  input($arr22);
                                    @endphp
                                    <input type="hidden" name="latitude" id="latitude"
                                           value="{{ $info->latitude->value ?? '' }}">
                                    <input type="hidden" name="longitude" id="longitude"
                                           value="{{ $info->longitude->value ?? '' }}">
                                    <div id="map-canvas" height="200" class="map-canvas"></div>
                                    <hr>

                                        {{--property nature, type and value input box--}}
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Property Nature</label>
                                                    <select class="form-control form-select-lg mb-3"
                                                            aria-label=".form-select-lg example">
                                                        <option selected>Property Nature</option>
                                                        <option value="1">Residential</option>
                                                        <option value="2">Commercial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Property Type</label>
                                                    <select class="form-control form-select-lg mb-3"
                                                            aria-label=".form-select-lg example">
                                                        <option selected>Property Type</option>
                                                        <option value="1">Building</option>
                                                        <option value="2">Charlet</option>
                                                        <option value="2">Duplex</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Property Value</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>

{{--                                        <div class="col-sm-4">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>{{ __('Min Price') }}</label>--}}
{{--                                                <input type="number" step="any" name="min_price" class="form-control"--}}
{{--                                                       required="" value="{{ $info->min_price->price ?? '' }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-sm-4">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>{{ __('Max Price') }}</label>--}}
{{--                                                <input type="number" step="any" name="max_price" class="form-control"--}}
{{--                                                       required="" value="{{ $info->max_price->price ?? '' }}">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    {{--water and electric Facilities--}}
                                     <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Is there an electricity meter?</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example">
                                                    <option selected>Is there an electricity meter?</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Is there a water meter?</label>
                                                <select class="form-control form-select-lg mb-3"
                                                        aria-label=".form-select-lg example">
                                                    <option selected>Is there a water meter?</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <p>{{ __('Options') }}</p>--}}
{{--                                    <hr>--}}
{{--                                    <div class="row">--}}
{{--                                        @foreach($input_options as $row)--}}
{{--                                            <div class="col-sm-3">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label>{{ $row->name }}</label>--}}
{{--                                                    <input type="number" step="any" name="input_option[]"--}}
{{--                                                           value="{{ $row->post_category_option->value ?? '' }}"--}}
{{--                                                           placeholder="{{ $row->name }}" class="form-control">--}}
{{--                                                    <input type="hidden" name="input_id[]" value="{{ $row->id }}">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div>--}}
{{--                                            <label>{{ __('Distance between facilities') }}</label>--}}
{{--                                            <button type="button" class="btn btn-primary float-right add_more">Add--}}
{{--                                                More--}}
{{--                                            </button>--}}
{{--                                            <hr>--}}
{{--                                            <div class="form-group mb-3">--}}
{{--                                                @php--}}
{{--                                                    $rand=rand(100,300);--}}
{{--                                                @endphp--}}
{{--                                                <table class="table facilities_area">--}}
{{--                                                    @if(count($info->facilities) == 0)--}}
{{--                                                        <tr id="table_row{{ $rand }}">--}}
{{--                                                            <td>--}}
{{--                                                                <select name="facilities[]" class="form-control">--}}
{{--                                                                    <option--}}
{{--                                                                        value="">{{ __('Select facility') }}</option>--}}
{{--                                                                    @foreach($facilities as $row)--}}
{{--                                                                        <option value="{{ $row->id }}"--}}
{{--                                                                                @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </select>--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                <input type="number" name="facilities_input[]"--}}
{{--                                                                       placeholder="Distance (Km)"--}}
{{--                                                                       class="form-control col-12" step="any">--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                <button type="button" onclick="remove_row({{ $rand }})"--}}
{{--                                                                        class="btn btn-danger mt-1 float-left delete_btn">--}}
{{--                                                                    <i class="fa fa-trash"></i></button>--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
{{--                                                    @else--}}
{{--                                                        @foreach($info->facilities as $facility)--}}
{{--                                                            <tr id="table_row{{ !empty($rand.$facility->id) ? $rand.$facility->id : null }}">--}}
{{--                                                                <td>--}}
{{--                                                                    <select name="facilities[]" class="form-control">--}}
{{--                                                                        <option--}}
{{--                                                                            value="">{{ __('Select facility') }}</option>--}}
{{--                                                                        @foreach($facilities as $rows)--}}
{{--                                                                            <option value="{{ $rows->id }}"--}}
{{--                                                                                    @if($facility->category_id == $rows->id) selected="" @endif>{{ $rows->name }}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </select>--}}
{{--                                                                </td>--}}
{{--                                                                <td>--}}
{{--                                                                    <input value="{{ $facility->value }}" type="number"--}}
{{--                                                                           step="any" name="facilities_input[]"--}}
{{--                                                                           placeholder="Distance (Km)"--}}
{{--                                                                           class="form-control col-12">--}}
{{--                                                                </td>--}}
{{--                                                                <td>--}}
{{--                                                                    <button type="button"--}}
{{--                                                                            onclick="remove_row({{ $rand.$facility->id }})"--}}
{{--                                                                            class="btn btn-danger mt-1 float-left delete_btn">--}}
{{--                                                                        <i class="fa fa-trash"></i></button>--}}
{{--                                                                </td>--}}
{{--                                                            </tr>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </table>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    {{--Street Information Input Boxes--}}
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>No. of Street</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Street Information 1</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Street Information 2</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    {{--Optional Facilities parking, board, charlet--}}
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Parking</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Board</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Lounges</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bathrooms</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Bedrooms</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>{{ __('Select Category') }}</label>
                                        <select class="form-control" name="type">
                                            <?php echo ConfigCategory('category') ?>
                                        </select>
                                    </div>
                                    {{-- youtube video link--}}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Video Link</label>
                                                <input type="number" step="any" name="" class="form-control"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>
                            {{--Property Features Checkboxes--}}
                                    <div class="form-group">
                                        <label>{{ __('Features') }}</label>
                                        <hr>
                                        @foreach(App\Category::where('type','feature')->get() as $row)
                                            <label class="checkbox-inline">
                                                <input name="features[]" type="checkbox" value="{{ $row->id }}"
                                                       @if(in_array($row->id, $array)) checked="" @endif>&nbsp {{ $row->name }}
                                            </label>

                                        @endforeach
                                    </div>
                            {{--identification and instrument number--}}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Identification No.</label>
                                                <input type="number" name="" class="form-control"
                                                       required="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Instrument No.</label>
                                                <input type="number" name="" class="form-control"
                                                       required="">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ publish(['class'=>'basicbtn']) }}
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Moderation status') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric"
                            name="moderation_status">
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
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Status') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="status[]">
                        @foreach(\App\Category::where('type','status')->get() as $row)
                            <option value="{{ $row->id }}"
                                    @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Project') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="project">
                        <option value="">{{ __('Select Project') }}</option>
                        @foreach(\App\Terms::where('type','project')->where('status',1)->get() as $row)
                            <option value="{{ $row->id }}"
                                    @if($row->id==$child) selected="" @endif>{{ $row->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="single-area">
            <div class="card sub">
                <div class="card-body">
                    <h5>{{ __('Category') }}</h5>
                    <hr>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="category[]">
                        @foreach(\App\Category::where('type','category')->get() as $row)
                            <option value="{{ $row->id }}"
                                    @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>
    <form method="post" action="{{ route('admin.locations.info') }}" id="basicform3">
        @csrf
        <input type="hidden" name="id" id="id2">
    </form>
    <div class="none">
        <div class="f_row">
            <select name="facilities[]" class="form-control">
                <option value="">{{ __('Select facility') }}</option>
                @foreach($facilities as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <form method="post" action="{{ route('admin.medias.destroy') }}" id="basicform">
        @csrf
        <input type="hidden" id="media_id" name="id[]">
        <input type="hidden" name="status" value="delete">
    </form>
    <input type="hidden" id="city_id" value="{{ $info->city->category_id ?? '' }}">
@endsection

@section('script')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize"></script>
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        "use strict";

        (function ($) {

            CKEDITOR.replace( 'Description' );
            CKEDITOR.replace( 'ar_Description' );

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
                    marker.setPosition(place.geometry.location);  // Set marker position new.
                }

                map.fitBounds(bounds);  // Fit to the bound
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
                geocoder.geocode({latLng: marker.getPosition()}, function (result, status) {
                    if ('OK' === status) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
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
