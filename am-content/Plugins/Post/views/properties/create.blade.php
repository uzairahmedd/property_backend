@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="header">
                    <h4>{{ __('Add Property') }}</h4>
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

                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#images" role="tab" aria-controls="profile" aria-selected="false">Images</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="profile-tab3">
                        <form action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="dropzone" id="mydropzone">
                            @csrf
                            <input type="hidden" name="term_id" value="">
                        </form>
                        <div class="row">

                            <div class="col-sm-3" id="">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="" alt="" height="100" width="150">
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-danger col-12" onclick="">{{ __('Remove') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <form method="post" action="{{ route('admin.property.store') }}">
                            @csrf
                            <!-- first step start -->
                            <div class="form-group mt-3">
                                <label for="status">Property</label>
                                <select class="form-control form-select-lg mb-3" required="" name="status" id="status" aria-label=".form-select-lg example">
                                    <option value='' disabled selected>Select Property Type</option>
                                    @foreach($status_category as $status)
                                    <option value='{{$status->id}}'>{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea2">English title</label>
                                        <input type="text" name="title" id="exampleFormControlTextarea2" placeholder="Enter English title" required="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Arabic title</label>
                                        <input type="text" name="ar_title" id="exampleFormControlTextarea1" placeholder="Enter Arabic title" required=""  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="location">Address of Property</label>
                                            <input type="text" id="location" placeholder="Address" name="location" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="region">Select your Region</label>
                                            <select name="city" required="" id="region" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                                <option value='' disabled selected>Select your Region</option>
                                                @foreach(App\Category::where('type','states')->get() as $row)
                                                <option value="{{ $row->id }}"> {{ $row->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- first step end -->
                            <!-- second page start  -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="nature">Property Nature</label>
                                        <select class="form-control form-select-lg mb-3" name="parent_category" required="" id="nature" aria-label=".form-select-lg example">
                                            <option value='' disabled selected>Property Nature</option>
                                            @foreach($parent_category as $row)
                                            <option value="{{ $row->id }}"> {{ $row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="property_type">Property Type</label>
                                        <select class="form-control form-select-lg mb-3" required="" id="property_type" name="category" aria-label=".form-select-lg example">
                                            <option selected>Property Type</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price">Property Value</label>
                                        <input type="text" name="price" id="price" required="" placeholder="Propery price" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="electricity">Is there an electricity meter?</label>
                                        <select class="form-control form-select-lg mb-3" id="electricity" name="electricity_facility" aria-label=".form-select-lg example">
                                            <!-- <option value="" disabled selected>Is there an electricity meter?</option> -->
                                            <option value="0" selected>Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="water">Is there a water meter?</label>
                                        <select class="form-control form-select-lg mb-3" id="water" name="water_facility" aria-label=".form-select-lg example">
                                            <!-- <option value="" disabled selected>Is there a water meter?</option> -->
                                            <option value="0" selected>Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="streets">No of Street</label>
                                        <input type="number" required="" max='4' min='0'  id="streets" name="streets" placeholder="No of streets" class="form-control">
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
                            </div>
                            <!-- end step two -->
                            <!-- start step 3 -->
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
                                        <input type="number" id="Bathrooms" name="Bathrooms"  max="6" min="0" placeholder="No of Bathrooms" class="form-control">
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
                                            <!-- <option value="" disabled selected>Please setelect furnishing</option> -->
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
                            <!-- end third step -->
                            <!-- start 4 step -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="virtual_tour">Video Link</label>
                                        <input type="text" name="virtual_tour" id="virtual_tour" placeholder="Video link" class="form-control">
                                    </div>
                                </div>

                                <!-- end 4 step -->
                                <!-- start 5 step -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="features">Property features</label>
                                        <select multiple="" id="features" class="form-control select2" name="features[]">
                                            <option value="">Please setelect features</option>
                                            @foreach($feature as $features)
                                            <option value="{{ $features->id}}">{{ $features->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- end 5 step -->
                            <!-- start 6 step -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="id_number">Identification No.</label>
                                        <input type="text" id="id_number" name="id_number" placeholder="Identification No" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="instrument_number">Instrument No.</label>
                                        <input type="text" name="instrument_number" id="instrument_number" placeholder="Instrument No" class="form-control" required="">
                                    </div>
                                </div>
                            </div>

                            <!-- start 6 step -->
                            <div class="form-group">
                                <button class="btn btn-primary submitbtn" type="submit">Save
                                </button>
                            </div>
                    </div>


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

    $('#email').on('focusout', () => {
        $('#user_mail').val($('#email').val());
        $('#basicform3').submit();
    });

    function success3(res) {
        $('#user_id').val(res.id);
        $('.submitbtn').removeAttr('disabled');
    }
</script>
@endsection
