@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
@endsection
@section('content')
<p class="hidden" id="plot_basic_detail">{{__('labels.plot_basic_details')}}</p>
<p class="hidden" id="property_nature">{{__('labels.property_nature')}}</p>
<p class="hidden" id="plot_number">{{__('labels.plot_number')}}</p>
<p class="hidden" id="plot_price">{{__('labels.plot_price')}}</p>
<p class="hidden" id="planned_number">{{__('labels.planned_number')}}</p>
<p class="hidden" id="plot_area">{{__('labels.plot_area')}}</p>
<p class="hidden" id="plot_all_side_coordinate">{{__('labels.plot_all_side_coordinate')}}</p>
<p class="hidden" id="plot_center_coordinate">{{__('labels.plot_center_coordinate')}}</p>
<p class="hidden" id="plot_bottom_left_coordinate">{{__('labels.plot_bottom_left_coordinate')}}</p>
<p class="hidden" id="plot_right_bottom_coordinate">{{__('labels.plot_right_bottom_coordinate')}}</p>
<p class="hidden" id="plot_top_right_coordinate">{{__('labels.plot_top_right_coordinate')}}</p>
<p class="hidden" id="plot_top_left_coordinate">{{__('labels.plot_top_left_coordinate')}}</p>
<p class="hidden" id="plot_all_side_measurement">{{__('labels.plot_all_side_measurement')}}</p>
<p class="hidden" id="left_measurement">{{__('labels.left_measurement')}}</p>
<p class="hidden" id="right_measurement">{{__('labels.right_measurement')}}</p>
<p class="hidden" id="top_measurement">{{__('labels.top_measurement')}}</p>
<p class="hidden" id="bottom_measurement">{{__('labels.bottom_measurement')}}</p>
<p class="hidden" id="comma_seperated ">{{__('labels.comma_seperated')}}</p>
<p class="hidden" id="rem_plot_form">{{__('labels.rem_plot_form')}}</p>
<p class="hidden" id="commercial  ">{{__('labels.commercial ')}}</p>
<p class="hidden" id="residential  ">{{__('labels.residential ')}}</p>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="header">
                    <h4>{{ __('labels.add_land_block') }}</h4>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- <ul class="nav nav-tabs d-flex" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#step_1" role="tab" aria-controls="step_1" aria-selected="true">Step 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_2" role="tab" aria-controls="step_2" aria-selected="true">Step 2</a>
                    </li> -->
                <!-- <li class="nav-item">
                            <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_3" role="tab" aria-controls="step_3"
                               aria-selected="true">Step 3</a>
                        </li> -->
                <!-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">Step 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_5" role="tab" aria-controls="step_5" aria-selected="true">Step 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#step_6" role="tab" aria-controls="step_6" aria-selected="true">Step 5</a>
                    </li> -->
                <!-- <li class="nav-item">
                        <a class="nav-link" id="home-tab3" data-toggle="tab" href="#finish" role="tab" aria-controls="finish" aria-selected="true">Finish</a>
                    </li> -->
                <!-- </ul> -->

                <div class="tab-content" id="myTabContent2">
                    {{--step 1 start here--}}
                    <!-- <div class="tab-pane fade active show" id="step_1" role="tabpanel" aria-labelledby="step_1">-->
                    <form method="post" action="{{ route('admin.property.block_store') }}" class="land_block_basicform">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="status">{{__('labels.property')}}</label>
                            <select class="form-control form-select-lg mb-3" required="" name="status" id="status" aria-label=".form-select-lg example">
                                <option value='' disabled selected>{{__('labels.select_property_type')}}</option>
                                @foreach($status_category as $status)
                                <option value='{{$status->id}}'>{{Session::get('locale') == 'ar' ? $status->ar_name : $status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">{{__('labels.english_title')}}</label>
                                    <input type="text" name="title" id="exampleFormControlTextarea2" placeholder="{{__('labels.english_title')}}" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{__('labels.arabic_title')}}</label>
                                    <input type="text" name="ar_title" id="exampleFormControlTextarea1" placeholder="{{__('labels.arabic_title')}}" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.select_your_city')}}</label>
                                        <select name="city" required="" id="land_block_city" class="form-control form-select-lg mb-3 select2" aria-label=".form-select-lg example">
                                            <option value='' disabled selected>{{__('labels.select_your_city')}}</option>
                                            @foreach($cities as $row)
                                            <option value="{{ $row->id }}"> {{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.select_your_district')}}</label>
                                        <select name="district" required="" id="land_block_district" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.address')}}</label>
                                        <input type="text" name="location" placeholder="{{__('labels.comma_seperated')}}" required="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="virtual_tour">{{__('labels.add_images')}}</label>
                                        <input type="file" multiple="multiple" name="media[]" id="media" placeholder="Add images" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="virtual_tour">{{__('labels.video_link')}}</label>
                                        <input type="text" name="virtual_tour" id="virtual_tour" placeholder="{{__('labels.video_link')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- first step end -->
                        <!-- <div class="form-group d-flex justify-content-between">
                                <button class="btn btn-primary previous-btn" type="submit">Previous
                                    </button>
                                <button class="btn btn-primary save-btn basicbtn" type="submit">Save
                                </button>
                            </div> -->
                        <!-- </form>
                    </div> -->
                        {{--step 1 end here--}}
                        {{--step 2 start here--}}
                        <!-- <div class="tab-pane fade" id="step_2" role="tabpanel" aria-labelledby="step_2">
                        <form method="post" action="{{ route('admin.property.store') }}">
                            @csrf -->
                        <!-- second page start  -->
                        <!-- <div class="row"> -->
                        <!-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nature">Property Nature</label>
                                    <select class="form-control form-select-lg mb-3" name="parent_category" required="" aria-label=".form-select-lg example">
                                        <option value='' disabled selected>Property Nature</option>
                                        @foreach($parent_category as $row)
                                        <option value="{{ $row->id }}"> {{ $row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> -->
                        <!-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="property_type">Property Type</label>
                                    <select class="form-control form-select-lg mb-3" required="" id="property_type" name="category" aria-label=".form-select-lg example">
                                        <option selected value="0">Land block</option>
                                    </select>
                                </div>
                            </div> -->
                        <!-- <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="price">Property Value</label>
                                    <input type="text" name="price" id="price" required="" placeholder="Propery price" class="form-control">
                                </div>
                            </div> -->
                        <!-- </div> -->
                        <div class="wrapper">
                            <h6 style="text-align:center">{{__('labels.plot_basic_details')}}</h6>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="property_nature">{{__('labels.property_nature')}}</label>
                                        <select class="form-control form-select-lg mb-3" name="property_nature[]" required="" aria-label=".form-select-lg example">
                                            <option value='' disabled selected>{{__('labels.property_nature')}}</option>
                                            @foreach($parent_category as $row)
                                            <option value="{{ $row->id }}"> {{Session::get('locale') == 'ar' ? $row->ar_name : $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="number">{{__('labels.plot_number')}}</label>
                                        <input type="text" name="plot_number[]" id="number" required="" placeholder="{{__('labels.plot_number')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="price">{{__('labels.plot_price')}}</label>
                                        <input type="text" name="plot_price[]" id="price" required="" placeholder="{{__('labels.plot_price')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="planned_number">{{__('labels.planned_number')}}</label>
                                        <input type="text" name="planned_number[]" id="planned_number" required="" placeholder="{{__('labels.planned_number')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="total_area">{{__('labels.plot_area')}}</label>
                                        <input type="text" name="total_area[]" id="total_area" required="" placeholder="{{__('labels.plot_area')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 style="text-align:center">{{__('labels.plot_all_side_coordinate')}}</h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="bottom_left_coordinate">{{__('labels.plot_center_coordinate')}}</label>
                                        <input type="text" name="center_coordinate[]" id="center_coordinate" required="" placeholder="{{__('labels.comma_seperated')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="bottom_left_coordinate">{{__('labels.plot_bottom_left_coordinate')}}</label>
                                        <input type="text" name="bottom_left_coordinate[]" id="bottom_left_coordinate" required="" placeholder="{{__('labels.plot_bottom_left_coordinate')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bottom_right_coordinate">{{__('labels.plot_right_bottom_coordinate')}}</label>
                                        <input type="text" name="bottom_right_coordinate[]" id="bottom_right_coordinate" required="" placeholder="{{__('labels.plot_right_bottom_coordinate')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="top_right_coordinate">{{__('labels.plot_top_right_coordinate')}}</label>
                                        <input type="text" name="top_right_coordinate[]" id="top_right_coordinate" required="" placeholder="{{__('labels.plot_top_right_coordinate')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="top_left_coordinate">{{__('labels.plot_top_left_coordinate')}}</label>
                                        <input type="text" name="top_left_coordinate[]" id="top_left_coordinate" required="" placeholder="{{__('labels.plot_top_left_coordinate')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 style="text-align:center">{{__('labels.plot_all_side_measurement')}}</h6>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="Left_measurement">{{__('labels.left_measurement')}}</label>
                                        <input type="text" name="left_measurement[]" id="Left_measurement" required="" placeholder="{{__('labels.left_measurement')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="right_measurement">{{__('labels.right_measurement')}}</label>
                                        <input type="text" name="right_measurement[]" id="right_measurement" required="" placeholder="{{__('labels.right_measurement')}}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="top_measurement">{{__('labels.top_measurement')}}</label>
                                        <input type="text" name="top_measurement[]" id="top_measurement" required="" placeholder="{{__('labels.top_measurement')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="bottom_measurement">{{__('labels.bottom_measurement')}}</label>
                                        <input type="text" name="bottom_measurement[]" id="bottom_measurement" required="" placeholder="{{__('labels.bottom_measurement')}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="javascript:void(0);" class="remove_field btn btn-danger" style="float:right">Remove Plot form</a> -->
                        </div>
                        <p><button class="add_fields btn btn-success">{{__('labels.add_more_plots')}}</button></p>
                        <!-- <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="electricity">Is there an electricity meter?</label>
                                        <select class="form-control form-select-lg mb-3" id="electricity" name="electricity_facility" aria-label=".form-select-lg example">
                                            <option value="0" selected>Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="water">Is there a water meter?</label>
                                        <select class="form-control form-select-lg mb-3" id="water" name="water_facility" aria-label=".form-select-lg example">
                                            <option value="0" selected>Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="streets">No of Street</label>
                                        <input type="number" required="" max='4' min='0' id="streets" name="streets" placeholder="No of streets" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="street_info_one">Street Information 1</label>
                                        <input type="text" name="street_info_one" id="street_info_one" placeholder="Street Information 1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="street_info_two">Street Information 2</label>
                                        <input type="text" name="street_info_two" id="street_info_two" placeholder="Street Information 2" class="form-control">
                                    </div>
                                </div>
                            </div> -->
                        <!-- end step two -->
                        <!-- <div class="form-group d-flex justify-content-between">
                                <button class="btn btn-primary previous-btn" type="submit">Previous
                                </button>
                                <button class="btn btn-primary save-btn" type="submit">Save
                                </button>
                            </div> -->
                        <!-- </form>
                    </div> -->
                        {{--step 2 end here--}}
                        {{--step 3 start here--}}
                        <!-- <div class="tab-pane fade" id="step_3" role="tabpanel" aria-labelledby="step_3">
                        <form method="post" action="{{ route('admin.property.store') }}">
                            @csrf
                            <div id="features" class="hiden">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Parking">NO of Parking</label>
                                            <input type="number" id="Parking" name="Parking" required="" max='6' min="0" placeholder="NO of Parking" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Board">No of Board</label>
                                            <input type="number" max='6' min="0" name="Board" required="" id="Board" placeholder="No of Board" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lounges">No of Lounges</label>
                                            <input type="number" id="" name="lounges" max='6' required="" min="0" placeholder="No of Lounges" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">No of Bathrooms</label>
                                            <input type="number" id="Bathrooms" name="Bathrooms" max="6" min="0" placeholder="No of Bathrooms" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">No of Bedrooms</label>
                                            <input type="number" id="Bedrooms" name="Bedrooms" required="" max='6' min="0" placeholder="No of Bedrooms" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="furnishing">Property furnishing</label>
                                        <select name="furnishing" id="furnishing" class="form-control">
                                            <option value="1">Furnished</option>
                                            <option value="2">Semi Furnished</option>
                                            <option value="3" selected>Un-Furnished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="role">Property role</label>
                                        <input type="text" name="role" id="role" placeholder="Property role" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <button class="btn btn-primary previous-btn" type="submit">Previous
                                </button>
                                <button class="btn btn-primary save-btn" type="submit">Save
                                </button>
                            </div>
                        </form>
                    </div> -->
                        {{--step 3 end here--}}
                        {{--step 4 start here--}}
                        <!--  <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3"> -->
                        <!-- <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                            @csrf
                            <input type="hidden" name="term_id" class="term_id" value="">
                        </form>  -->
                        <!-- <div class="row"> -->
                        <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="virtual_tour">Add images</label>
                                    <input type="file" multiple="multiple" name="media[]" id="media" placeholder="Add images" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="virtual_tour">Video Link</label>
                                    <input type="text" name="virtual_tour" id="virtual_tour" placeholder="Video link" class="form-control">
                                </div>
                            </div> -->
                        <!-- <div class="col-sm-3" id="">
                            <div class="card">
                                <div class="card-body">
                                    <img src="" alt="" height="100" width="150">
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-danger col-12" onclick="">{{ __('Remove') }}</button>
                                </div>
                            </div>
                        </div> -->

                        <!-- </div> -->
                        <!-- <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="virtual_tour">Video Link</label>
                                <input type="text" name="virtual_tour" id="virtual_tour" placeholder="Video link" class="form-control">
                            </div>
                        </div>
                    </div> -->
                        <!-- <div class="form-group d-flex justify-content-between">
                             <button class="btn btn-primary previous-btn" type="submit">Previous
                                    </button> 
                            <button class="btn btn-primary save-btn" type="submit">Save
                            </button>
                        </div> -->
                        <!-- </div> -->
                        {{--step 4 end here--}}
                        {{--step 5 start here--}}
                        <!-- <div class="tab-pane fade" id="step_5" role="tabpanel" aria-labelledby="step_5">
                        <form method="post" action="{{ route('admin.property.store') }}">
                            @csrf -->
                        <!-- start step 3 -->
                        <!-- <div id="features" class="hiden">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Parking">NO of Parking</label>
                                            <input type="number" id="Parking" name="Parking" required="" max='6' min="0" placeholder="NO of Parking" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Board">No of Board</label>
                                            <input type="number" max='6' min="0" name="Board" required="" id="Board" placeholder="No of Board" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lounges">No of Lounges</label>
                                            <input type="number" id="" name="lounges" max='6' required="" min="0" placeholder="No of Lounges" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">No of Bathrooms</label>
                                            <input type="number" id="Bathrooms" name="Bathrooms" max="6" min="0" placeholder="No of Bathrooms" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">No of Bedrooms</label>
                                            <input type="number" id="Bedrooms" name="Bedrooms" required="" max='6' min="0" placeholder="No of Bedrooms" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="virtual_tour">Block length</label>
                                    <input type="text" name="length" id="length" placeholder="Block length" class="form-control">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="virtual_tour">Block width</label>
                                        <input type="text" name="depth" id="depth" placeholder="Block width" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="checkbox" id="vehicle1" name="rule[]" value="1">
                        <label for="vehicle1"> {{__("labels.is_there_mortage")}}</label><br>
                        <input type="checkbox" id="vehicle2" name="rule[]" value="2">
                        <label for="vehicle2"> {{__("labels.right_and_obligations")}}</label><br>
                        <input type="checkbox" id="vehicle3" name="rule[]" value="3">
                        <label for="vehicle3"> {{__("labels.info_property_effects")}}</label><br>
                        <input type="checkbox" id="vehicle3" name="rule[]" value="4">
                        <label for="vehicle3"> {{__("labels.Property_disputes")}}</label><br> -->
                        <!-- <div class="chek-info d-flex flex-column justify-content-end align-items-end">
                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                                <a class="form-check-label check-box-terms" for="inlineCheckbox1"> {{__("labels.is_there_mortage")}}</a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox1" value="1" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '1') ? "checked"  : old("rule") }}>

                            </div>
                        </div>
                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                                <a class="form-check-label check-box-terms" for="inlineCheckbox2"> {{__("labels.right_and_obligations")}}</a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox2" value="2" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '2') ? "checked"  : old("rule") }}>

                            </div>
                        </div>
                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                                <a class="form-check-label check-box-terms" for="inlineCheckbox3">{{__("labels.info_property_effects")}}</a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox3" value="3" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '3') ? "checked"  : old("rule") }}>
                            </div>
                        </div>
                        <div class="document theme-gx-32 d-flex justify-content-end align-items-end">
                            <div class="col-12 mb-3 d-flex align-items-center justify-content-end terms-check">
                                <a class="form-check-label check-box-terms" for="inlineCheckbox4">{{__("labels.Property_disputes")}}</a>
                                <span class="theme-text-seondary-black font-16 ms-1"> </span>
                                <input class="form-check-input" name="rule[]" type="checkbox" id="inlineCheckbox4" value="4" {{ !empty( $post_data->rules) && str_contains($post_data->rules->content, '4') ? "checked"  : old("rule") }}>
                            </div>
                        </div>
                    </div> -->
                        <!-- end third step -->
                        <!-- <div class="form-group d-flex justify-content-between">
                                <button class="btn btn-primary previous-btn" type="submit">Previous
                                </button>
                                <button class="btn btn-primary save-btn" type="submit">Save
                                </button>
                            </div> -->
                        <!-- </form>
                    </div> -->
                        {{--step 5 end here--}}
                        {{--step 6 start here--}}
                        <!-- <div class="tab-pane fade" id="step_6" role="tabpanel" aria-labelledby="step_6">
                        <form method="post" action="{{ route('admin.property.store') }}">
                            @csrf -->
                        <!-- start step 3 -->
                        <!-- <div id="features" class="hiden">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Parking">NO of Parking</label>
                                            <input type="number" id="Parking" name="Parking" required="" max='6' min="0" placeholder="NO of Parking" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Board">No of Board</label>
                                            <input type="number" max='6' min="0" name="Board" required="" id="Board" placeholder="No of Board" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lounges">No of Lounges</label>
                                            <input type="number" id="" name="lounges" max='6' required="" min="0" placeholder="No of Lounges" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bathrooms">No of Bathrooms</label>
                                            <input type="number" id="Bathrooms" name="Bathrooms" max="6" min="0" placeholder="No of Bathrooms" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="Bedrooms">No of Bedrooms</label>
                                            <input type="number" id="Bedrooms" name="Bedrooms" required="" max='6' min="0" placeholder="No of Bedrooms" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        <!-- <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_number">Identification No.</label>
                                    <input type="text" id="id_number" name="id_number" placeholder="Identification No" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="instrument_number">Deed No.</label>
                                    <input type="text" name="instrument_number" id="instrument_number" placeholder="Deed No" class="form-control" required="">
                                </div>
                            </div>
                        </div> -->
                        <!-- end third step -->
                        <div class="form-group d-flex justify-content-between" style="float:right;">
                            <!-- <button class="btn btn-primary previous-btn">Previous
                            </button> -->
                            <button class="btn btn-primary save-btn" type="submit">{{__('labels.save')}}
                            </button>
                        </div>
                        <!-- </form>
                    </div> -->
                        {{--step 6 end here--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="user_id" id="user_id">
</form>

<form method="post" action="{{ route('admin.properties.findUser') }}" id="basicform3">
    @csrf
    <input type="hidden" name="email" id="user_mail">
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    "use strict";

    function success(res) {
        location.reload()
    }
    $('#email').on('focusout', () => {
        $('#user_mail').val($('#email').val());
        $('#basicform3').submit();
    });

    function success3(res) {
        $('#user_id').val(res.id);
        $('.submitbtn').removeAttr('disabled');
    }


    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 100; //Maximum allowed input fields 
        var wrapper = $(".wrapper"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var plot_basic_detail = $('#plot_basic_detail').text();
        var bottom_measurement = $('#bottom_measurement').text();
        var top_measurement = $('#top_measurement').text();
        var right_measurement = $('#right_measurement').text();
        var left_measurement = $('#left_measurement').text();
        var plot_all_side_measurement = $('#plot_all_side_measurement').text();
        var plot_top_left_coordinate = $('#plot_top_left_coordinate').text();
        var plot_top_right_coordinate = $('#plot_top_right_coordinate').text();
        var plot_right_bottom_coordinate = $('#plot_right_bottom_coordinate').text();
        var plot_bottom_left_coordinate = $('#plot_bottom_left_coordinate').text();
        var plot_center_coordinate = $('#plot_center_coordinate').text();
        var plot_all_side_coordinate = $('#plot_all_side_coordinate').text();
        var comma_seperated = $('#comma_seperated ').text();
        var plot_area = $('#plot_area').text();
        var planned_number = $('#planned_number').text();
        var plot_number = $('#plot_number').text();
        var rem_plot_form = $('#rem_plot_form').text();
        var residential = $('#residential').text();
        var property_nature = $('#property_nature').text();
        var plot_price = $('#plot_price').text();
        var commercial = $('#commercial').text();
        // var please_select_district = $('#please_select_district').text();
        var x = 1; //Initial input field is set to 1
        $(add_button).click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '/admin/real-state/property_nature';
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('.parent_category').html('');
                    if (x < max_fields) {
                        x++; //input field increment
                        //add input field
                        $(wrapper).append('<div><hr><h6 style="text-align:center">' + x + ' : ' + plot_basic_detail + '</h6><div class="row"> <div class="col-sm-3"><div class="form-group"><label for="property_nature">' + property_nature + '</label><select class="form-control form-select-lg mb-3 parent_category" name="property_nature[]" required="" aria-label=".form-select-lg example"></select></div></div> <div class="col-sm-3"><div class="form-group"><label for="number">' + plot_number + '</label> <input type="text" name="plot_number[]" id="number" required="" placeholder="' + plot_number + '" class="form-control"> </div></div> <div class="col-sm-2"><div class="form-group"><label for="price">' + plot_price + '</label> <input type="text" name="plot_price[]"  required="" placeholder="' + plot_price + '" class="form-control"></div> </div><div class="col-sm-2"> <div class="form-group"><label for="planned_number">' + planned_number + '</label><input type="text" name="planned_number[]"  required="" placeholder="' + planned_number + '" class="form-control"></div></div><div class="col-sm-2"><div class="form-group"><label for="planned_number">' + plot_area + '</label><input type="text" name="total_area[]" id="planned_number" required="" placeholder="' + plot_area + '" class="form-control"></div> </div> </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_coordinate + '</h6> <div class="row"> <div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_center_coordinate + '</label><input type="text" name="center_coordinate[]" id="center_coordinate" required="" placeholder="' + comma_seperated + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_bottom_left_coordinate + '</label><input type="text" name="bottom_left_coordinate[]"  required="" placeholder="' + plot_bottom_left_coordinate + '" class="form-control"></div></div><div class="col-sm-4"> <div class="form-group"> <label for="bottom_right_coordinate">' + plot_right_bottom_coordinate + '</label><input type="text" name="bottom_right_coordinate[]"  required="" placeholder="' + plot_right_bottom_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"> <label for="top_right_coordinate">' + plot_top_right_coordinate + '</label><input type="text" name="top_right_coordinate[]"  required="" placeholder="' + plot_top_right_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="top_left_coordinate">' + plot_top_left_coordinate + '</label><input type="text" name="top_left_coordinate[]"  required="" placeholder="' + plot_top_left_coordinate + '" class="form-control"> </div></div>  </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_measurement + '</h6><div class="row"><div class="col-sm-3"><div class="form-group"><label for="left_measurement">' + left_measurement + '</label><input type="text" name="left_measurement[]"  required="" placeholder="' + left_measurement + '" class="form-control"></div> </div><div class="col-sm-3"><div class="form-group"><label for="right_measurement">' + right_measurement + '</label><input type="text" name="right_measurement[]" required="" placeholder="' + right_measurement + '" class="form-control"></div></div><div class="col-sm-3"><div class="form-group"><label for="top_measurement">' + top_measurement + '</label><input type="text" name="top_measurement[]"  required="" placeholder="' + top_measurement + '" class="form-control"></div> </div><div class="col-sm-3"> <div class="form-group"><label for="bottom_measurement">' + bottom_measurement + '</label><input type="text" name="bottom_measurement[]"  required="" placeholder="' + bottom_measurement + '" class="form-control"></div></div></div><a href="javascript:void(0);" class="remove_field btn btn-danger" style="float:right">' + rem_plot_form + '</a></div>');
                    }
                    var name = '';
                    $('.parent_category').append('<option disabled selected>' + property_nature + '</option>');
                    $.each(response.data, function(index, value_data) {
                        name = value_data.name
                        if (locale == 'ar') {
                            name = value_data.ar_name;
                        }
                        $('.parent_category').append('<option value=' + value_data.id + '>' + name + '</option>');
                    });
                }
            })
        });

        //when user click on remove button
        $(wrapper).on("click", ".remove_field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
        })
    });
</script>
@endsection