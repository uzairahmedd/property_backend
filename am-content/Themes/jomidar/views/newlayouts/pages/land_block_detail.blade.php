@extends('theme::newlayouts.app')
<style>
    #map {
        height: 500px;
    }

    .mapboxgl-popup {
        max-width: 400px;
        font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
    }
</style>
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
@section('content')
<link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
<div class="map-page m-0 p-0">
    <div class="map-container">
        <div class="row">
            <div class="col-lg-8">
                <div class="map">
                    <div id="map"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar mt-3">
                    <div class="land-info">
                        <div class="info-piece d-flex flex-column justify-content-end align-items-end">
                            <h3 class="city-title">{{ Session::get('locale') == 'ar' ? @$property->ar_title. ' '.@$property->property_status_type->category->ar_name : @$property->title. ' '.@$property->property_status_type->category->name }}</h3>
                            <div class="d-flex justify-content-end mt-2">
                                <p class="neighborhood-title" id="full_address"> </p>
                                <img class="location-icon" src="{{asset('assets/images/location.png')}}" alt="">
                            </div>


                        </div>
                        <div class="property-list">
                            <div class="chart-block">
                                <div class="chart-block commertial-block font-bold">
                                    {{__('labels.residential')}}
                                    <div class="dot" style="background-color:#fffd8d; border-radius: 50%;">
                                    </div>
                                </div>
                                <div class="chart-block residential-block font-bold">
                                    {{__('labels.commercial')}}
                                    <div class="dot" style="background-color:red; border-radius: 50%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-action d-flex justify-content-end align-items-end">
                            <a href="#" class="btn sidebar-btn">
                                <img class="map-icon" src="{{asset('assets/images/whatsapp-icon.png')}}" alt="">
                                <p style="vertical-align: inherit;" class="font-bold">{{__('labels.chat')}}</p>
                            </a>
                            <a href="#" class="btn sidebar-btn">
                                <img class="map-icon" src="{{theme_asset('assets/images/phone_icon.png')}}" alt="">
                                <p style="vertical-align: inherit;" class="font-bold" data-toggle="tolltip" title="{{$property->user->phone}}">{{__('labels.call_me')}}</p>
                            </a>
                            @if (Auth::check())
                            @php
                            $data = DB::table('terms_user')->where([
                            ['terms_id',$property->id],
                            ['user_id',Auth::User()->id]
                            ])->first();
                            if($data)
                            {
                            $property_id = $data->terms_id;
                            }else{
                            $property_id = null;
                            }
                            @endphp

                            <button class="btn sidebar-btn" onclick="favourite_property('{{$property->id}}')">
                                <i class="fa-regular fa-heart {{isset($property_id) ? 'fa-solid' : 'fa-regular'}} heart{{$property->id}}"></i>
                                <p style="vertical-align: inherit;" class="font-bold">{{__('labels.add_favorites')}}</p>
                            </button>
                            @else
                            <button class="btn sidebar-btn" data-bs-toggle="modal" data-bs-target="#login_modal">
                                <i class="fa-regular fa-heart" style="color: rgb(199, 201, 0);"></i>
                                <p style="vertical-align: inherit;" class="font-bold">{{__('labels.add_favorites')}}</p>
                            </button>
                            @endif
                        </div>
                        <div class="property-type mt-3">
                            <input type="hidden" id="term_id" value="{{$property->id}}">
                            <div class="location-sidebar d-flex justify-content-end align-items-end flex-row">
                                <div class="type-title">
                                    <h5 class="type-title" id="type">N/A</h5>
                                </div>
                                <div class="type-icon">
                                    <img class="building-icon" src="{{asset('assets/images/land-icon.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="property-block d-flex justify-content-between align-items-center mt-3">
                            <div class="block-info d-flex flex-column justify-content-end align-items-end piece-no">
                                <p class="block-title font-bold">{{__('labels.piece_no')}}</p>
                                <div class="block-value">
                                    <h4 id="piece_no">N/A</h4>
                                </div>
                            </div>
                            <!-- <div class="block-info d-flex flex-column justify-content-end align-items-end">
                                <p class="block-title">Block No.</p>
                                <div class="block-value">
                                    <h4>N/A</h4>
                                </div>
                            </div> -->
                            <div class="block-info d-flex flex-column justify-content-end align-items-end">
                                <p class="block-title font-bold">{{__('labels.no_planned')}}</p>
                                <div class="block-value">
                                    <h4 id="planned_number">N/A</h4>
                                </div>
                            </div>
                        </div>
                        <div class="property-price d-flex mt-3">
                            <p class="price-sr m-0" id="price_piece">N/A</p>
                            <p class="price-title m-0 font-bold">{{__('labels.total_price')}}</p>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <h4>{{__('labels.meaurements')}}</h4>
                        </div>
                        <div class="property-price d-flex mt-3">
                            <p class="price-sr m-0" id="area_land">N/A</p>
                            <p class="price-title m-0 font-bold">{{__('labels.total_area')}}</p>
                        </div>
                        <div class="ordicate-block d-flex justify-content-between align-items-center">
                            <div class="coordinate-block d-flex flex-column justify-content-center">
                                <p class="font-bold">{{__('labels.left')}}</p>
                                <div class="block-value">
                                    <p id="left_area" class="m-0">N/A</p>
                                </div>
                            </div>
                            <div class="coordinate-block d-flex flex-column justify-content-center">
                                <p class="font-bold">{{__('labels.right')}}</p>
                                <div class="block-value">
                                    <p id="right_area" class="m-0">N/A</p>
                                </div>
                            </div>
                            <div class="coordinate-block d-flex flex-column justify-content-center">
                                <p class="font-bold">{{__('labels.bottom')}}</p>
                                <div class="block-value">
                                    <p id="bottom_area" class="m-0">N/A</p>
                                </div>
                            </div>
                            <div class="coordinate-block d-flex flex-column justify-content-center">
                                <p class="font-bold">{{__('labels.top')}}</p>
                                <div class="block-value">
                                    <p id="top_area" class="m-0">N/A</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{theme_asset('assets/newjs/land_block_map.js')}}"></script>
@endpush