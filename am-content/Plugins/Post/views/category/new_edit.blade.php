@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css') }}" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4>{{ __('labels.edit_new_category') }}</h4>
                <form method="post" action="{{ route('admin.category.update',$info->id) }}" class="basicform">
                    @csrf
                    @method('PUT')
                    <!-- <div class="form-group">
                        <label for="text">{{ __('Name') }}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="name" id="text" placeholder="Enter Name" autocomplete="off" required="" value="{{ $info->name }}">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="text">{{__('labels.enter_name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="name" id="text" placeholder="{{__('labels.enter_name')}}" autocomplete="off" required="" value="{{ $info->name }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" id="target" data-icon="{{ $info->icon->content ?? '' }}" role="iconpicker"></button>
                            </div>
                        </div>
                        <input type="hidden" name="icon" id="icon" class="item-menu" value="{{ $info->icon->content ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="text">{{__('labels.enter_arabic_name')}}</label>
                        <div class="input-group">
                            <input type="text" class="form-control item-menu" name="ar_name" id="ar_text" placeholder="{{__('labels.enter_arabic_name')}}" autocomplete="off" required="" value="{{ $info->ar_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="p_id">{{__('labels.parent_category')}}</label>
                        <select multiple="" class="form-control select2" name="child[]">
                            @foreach($categories as $row)
                            <option value="{{ $row->id }}" @if(in_array($row->id, $childs)) selected="" @endif>{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="land_area" value="1" @if($info->land_area==1) checked @endif id="land_area">
                            <label for="land_area">{{__('labels.land_area')}}</label>
                        </div>
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="buildup_area" value="1" @if($info->buildup_area==1) checked @endif id="buildup_area">
                            <label for="buildup_area">{{__('labels.built_up_area')}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="property_age" value="1" @if($info->property_age==1) checked @endif id="property_age">
                            <label for="land_area">{{__('labels.property_age')}}</label>
                        </div>
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="features_section" value="1" @if($info->features_section==1) checked @endif id="features_section">
                            <label for="land_area">{{__('labels.features_section')}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="furnishing_section" value="1" @if($info->furnishing_section==1) checked @endif id="furnishing_section">
                            <label for="land_area">{{__('labels.furnishing_section')}}</label>
                        </div>
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="total_floor" value="1" @if($info->total_floor==1) checked @endif id="total_floor">
                            <label for="land_area">{{__('labels.total_floors')}} </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 item form-group">
                            <input type="checkbox" name="property_floor" value="1" @if($info->property_floor==1) checked @endif id="property_floor">
                            <label for="land_area">{{__('labels.property_floor')}}</label>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    {{ publish(['class'=>'basicbtn']) }}
    <div class="single-area">
        <div class="card sub">
            <div class="card-body">
                <h5>{{__('labels.is_featured')}}</h5>
                <hr>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="featured">
                    <option value="1" @if($info->featured==1) selected="" @endif>{{ __('labels.yes') }}</option>
                    <option value="0" @if($info->featured==0) selected="" @endif>{{ __('labels.no') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="type" value="category">
</form>
@endsection

@section('script')
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') }}"></script>
<script src="{{ asset('admin/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/form.js') }}"></script>
<script>
    "use strict";
    (function($) {
        $('#target').on('change', function(e) {

            $('#icon').val(e.icon)
        });

    })(jQuery);

    //success response will assign here
    function success(res) {
        location.reload()
    }
</script>
@endsection