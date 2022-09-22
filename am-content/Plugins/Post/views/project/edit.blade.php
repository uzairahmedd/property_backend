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
                <h4>{{ __('Edit project') }}</h4>
            </div>
            <div class="card-body">
                @if (session()->has('flash_notification.message'))
                <div class="alert alert-{{ session()->get('flash_notification.level') }}">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('flash_notification.message') }}
                </div>
                @endif
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">{{ __('General') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">{{ __('Images') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">{{ __('Seo') }}</a>
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
                    </div>
                    <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <div class="pt-20">
                            <form id="productform" novalidate method="post" action="{{ route('admin.project.update',$info->id) }}">
                                @csrf
                                @method('PUT')
                                @php
                                $arr['title']= 'Name';
                                $arr['id']= 'title';
                                $arr['type']= 'text';
                                $arr['placeholder']= 'Enter Name';
                                $arr['name']= 'name';
                                $arr['is_required'] = true;
                                $arr['value'] = $info->title;

                                echo  input($arr);

                                $arr2['title']= 'Description';
                                $arr2['id']= 'Description';
                                $arr2['name']= 'excerpt';
                                $arr2['placeholder']= 'Short Description';
                                $arr2['is_required'] = true;
                                $arr2['value'] = $info->excerpt->content;

                                echo  textarea($arr2);

                                $arr3['title']= 'Content';
                                $arr3['id']= 'content';
                                $arr3['name']= 'content';
                                $arr3['placeholder']= '';
                                $arr3['is_required'] = true;
                                $arr3['value'] = $info->content->content;
                                echo  editor($arr3);

                                @endphp
                                <div class="form-group">
                                    <label for="title">{{ __('Select State') }}</label>
                                    <select class="form-control selectric"  id="state" name="state[]">
                                        <option >{{ __('Select State') }}</option>
                                        @foreach(App\Category::where('type','states')->get() as $row)
                                            <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group none city">
                                    <label for="title">{{ __('Select Area') }}</label>
                                    <select class="form-control" name="city" id="city">
                                        <option disabled="" selected="">{{ __('Select Area') }}</option>
                                    </select>
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
                                <input type="hidden" name="latitude" id="latitude" value="{{ $info->latitude->value ?? '' }}">
                                <input type="hidden" name="longitude" id="longitude" value="{{ $info->longitude->value ?? '' }}">
                                <div id="map-canvas" height="200"  class="map-canvas"></div>
                                    <p>{{ __('Options') }}</p>
                                    <hr>
                                    <div class="row">

                                    @foreach($input_options as $row)
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>{{ $row->name }}</label>
                                                <input type="number" step="any"  name="input_option[]" value="{{ $row->post_category_option->value ?? '' }}" placeholder="{{ $row->name }}" class="form-control">
                                                <input type="hidden"  name="input_id[]" value="{{ $row->id }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            <div class="form-group">
                                <div>
                                    <label>{{ __('Distance between facilities') }}</label>
                                    <button type="button" class="btn btn-primary float-right add_more">{{ __('Add More') }}</button>
                                    <hr>
                                    <div class="form-group mb-3">
                                        @php
                                        $rand=rand(100,300);
                                        @endphp
                                        <table class="table facilities_area">
                                            @if(count($info->facilities) == 0)

                                            <tr id="table_row{{ $rand }}">
                                                <td>
                                                    <select name="facilities[]" class="form-control">
                                                    <option value="">Select facility</option>
                                                    @foreach($facilities as $row)
                                                    <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="facilities_input[]" placeholder="Distance (Km)" class="form-control col-12">
                                                </td>

                                                <td>
                                                    <button type="button" onclick="remove_row({{ $rand }})" class="btn btn-danger mt-1 float-left delete_btn"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @else
                                            @foreach($info->facilities as $facility)
                                            <tr id="table_row{{ $rand.$facility->id }}">
                                                <td>
                                                    <select name="facilities[]" class="form-control">
                                                    <option value="">Select facility</option>
                                                    @foreach($facilities as $rows)
                                                    <option value="{{ $rows->id }}" @if($facility->category_id == $rows->id) selected="" @endif>{{ $rows->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input value="{{ $facility->value }}" type="text" name="facilities_input[]" placeholder="Distance (Km)" class="form-control col-12" >
                                                </td>

                                                <td>
                                                    <button type="button" onclick="remove_row({{ $rand.$facility->id }})" class="btn btn-danger mt-1 float-left delete_btn"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Features') }}</label>
                            <hr>
                            @foreach(App\Category::where('type','feature')->get() as $row)
                                <label class="checkbox-inline">
                                <input name="features[]" type="checkbox" value="{{ $row->id }}" @if(in_array($row->id, $array)) checked="" @endif>&nbsp {{ $row->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                    @php
                    $meta_title['title']= 'Meta Title';
                    $meta_title['id']= 'meta_title';
                    $meta_title['type']= 'text';
                    $meta_title['placeholder']= 'Enter Meta Name';
                    $meta_title['name']= 'meta_title';
                    $meta_title['is_required'] = true;
                    $meta_title['value'] = $seo->meta_title;

                    echo  input($meta_title);

                    @endphp
                    <div class="form-group">
                        <label>{{ __('Meta Tags') }}</label>
                        <input type="text" name="meta_tags" class="form-control" placeholder="tag1,tag2,tag3" value="{{ $seo->meta_tags ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('Meta Description') }}</label>
                        <textarea class="form-control" name="meta_description">{{ $seo->meta_description }}</textarea>
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
            <h5>{{ __('Contact Email') }}</h5>
            <hr>
            <input type="email" name="email" class="form-control" placeholder="contact mail" required value="{{ $contact_type->email ?? '' }}">
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
                <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
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
                <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="single-area">
    <div class="card sub">
        <div class="card-body">
            <h5>{{ __('Investor') }}</h5>
            <hr>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect selectric" name="investor[]">
                <option disabled="" selected="">{{ __('Select investor') }}</option>
                @foreach(\App\Category::where('type','investor')->get() as $row)
                <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif>{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="single-area">
    <div class="card sub">
        <div class="card-body">
            <h5>{{ __('Finish date') }}</h5>
            <hr>
            <input type="date" name="finished_at" class="form-control" required="" value="{{ $info->finished_at->content ?? '' }}">
        </div>
    </div>
</div>
<div class="single-area">
    <div class="card sub">
        <div class="card-body">
            <h5>{{ __('Open sell date') }}</h5>
            <hr>
            <input type="date" name="open_sell_date" class="form-control" required="" value="{{ $info->open_sell_date->content ?? '' }}">
        </div>
    </div>
</div>
</div>
</div>
</form>
<form method="post" action="{{ route('admin.locations.info') }}" id="basicform3">
  @csrf
  <input type="hidden" name="id" id="id2" >
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
    <input type="hidden"  name="status" value="delete">
</form>
<input type="hidden" id="city_id" value="{{ $info->city->category_id ?? '' }}">
@endsection

@section('script')
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script>
  "use strict";

  (function ($) {

        // CKEDITOR.replace( 'content' );

        $('#state').on('change',()=>{
        $('#id2').val($('#state').val());
        $('#basicform3').submit();
        });

        var i=50;
        $('.add_more').on('click',()=>{
        i++;
        var selectbox = $('.f_row').html();
        var html='<tr id="table_row'+i+'"> <td> '+selectbox+' </td><td> <input type="text" name="facilities_input[]" placeholder="Distance (Km)" class="form-control col-12"> </td><td> <button type="button"  class="btn btn-danger mt-1 float-left" onclick="remove_row('+i+')"><i class="fa fa-trash"></i></button> </td></tr>'

        $('.facilities_area').append(html)
        });

        if ($('#state').val() != null) {
        var state=$('#state').val();
        $('#id2').val(state)
        $('#basicform3').submit();
        }

    })(jQuery);

    function remove_row(id) {

          $('#table_row'+id+'').remove();
    }

    var m_id='';
    function remove_image(param,key) {
      m_id=key;
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
         $('#m_area'+m_id).remove();
         $('#media_id').val(param);
         $('#basicform').submit();
        }
      })

    }

    function success1(res) {
      $('.states').show();
      $('.res').remove();
      $.each(res,function(index,value){

        $('#state').append("<option value='"+value.id+"' class='res'>"+value.name+"</option>");

      });

       var city_id=$('#city_id').val();
      $('#city').val(city_id);
    }

    function success3(res) {
      $('.city').show();
      $('.res1').remove();
      $.each(res,function(index,value){

        $('#city').append("<option value='"+value.id+"' class='res1'>"+value.name+"</option>");

      })


      var city_id=$('#city_id').val();
      $('#city').val(city_id);
    }


    function initialize() {

    var mapOptions, map, marker, searchBox, city,
    infoWindow = '',
    addressEl = document.querySelector('#location_input'),
    latEl = document.querySelector( '#latitude' ),
    longEl = document.querySelector( '#longitude' ),
    element = document.getElementById( 'map-canvas' );


    mapOptions = {
    // How far the maps zooms in.
    zoom: 13,
    // Current Lat and Long position of the pin/
    center: new google.maps.LatLng( $('#latitude').val(), $('#longitude').val()),

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
  map = new google.maps.Map( element, mapOptions ); // Till this like of code it loads up the map.

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
   searchBox = new google.maps.places.SearchBox( addressEl );

  /**
   * When the place is changed on search box, it takes the marker to the searched location.
   */
   google.maps.event.addListener( searchBox, 'places_changed', function () {
    var places = searchBox.getPlaces(),
    bounds = new google.maps.LatLngBounds(),
    i, place, lat, long, resultArray,
    addresss = places[0].formatted_address;

    for( i = 0; place = places[i]; i++ ) {
      bounds.extend( place.geometry.location );
      marker.setPosition( place.geometry.location );  // Set marker position new.
    }

    map.fitBounds( bounds );  // Fit to the bound
    map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.


    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();
    latEl.value = lat;
    longEl.value = long;

    resultArray =  places[0].address_components;



    // Closes the previous info window if it already exists
    if ( infoWindow ) {
      infoWindow.close();
    }
    /**
     * Creates the info Window at the top of the marker
     */
     infoWindow = new google.maps.InfoWindow({
      content: addresss
    });

     infoWindow.open( map, marker );

     $('#map-canvas').show();
   } );


  /**
   * Finds the new position of the marker when the marker is dragged.
   */
   google.maps.event.addListener( marker, "dragend", function ( event ) {
    var lat, long, address, resultArray, citi;


    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
      if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
        address = result[0].formatted_address;
        resultArray =  result[0].address_components;


        addressEl.value = address;
        latEl.value = lat;
        longEl.value = long;

      } else {
        alert( 'Geocode was not successful for the following reason: ' + status );
      }

      // Closes the previous info window if it already exists
      if ( infoWindow ) {
        infoWindow.close();
      }

      /**
       * Creates the info Window at the top of the marker
       */
       infoWindow = new google.maps.InfoWindow({
        content: address
      });

       infoWindow.open( map, marker );
     } );
  });

 }
</script>
@endsection
