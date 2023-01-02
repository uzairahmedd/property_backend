@extends('theme::newlayouts.app')
@section('content')
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here start -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.store_property') }}">
            @csrf
            <input type="hidden" name="term_id" value="{{$id}}">
            <input type="hidden" id="district_id" value="{{$post_data != '' ?  $post_data->district->category_id : ''}}">
            <div class="description-card card">
                @if($errors->has('message'))
                <div class="error d-flex justify-content-end pt-1">{{ $errors->first('message') }}</div>
                @endif
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex justify-content-end mt-n3 font-medium">
                        <span class="theme-text-sky ">1</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <p class="theme-text-black font-18 prop-desc-one">{{__('labels.property_description')}}</p>
                    <div class="theme-gx-3 mb-4_5">
                        <div class="row">
                            @foreach($status_category as $status)
                            @if( $status->name =='Sale')
                            <div class="radio-container radio-sale-one">
                                <input type="radio" name="status" id="create_status1" value="{{ $status->id }}" {{ $post_data != '' && $post_data->property_status_type->category_id == $status->id ? "checked" : (old("status") == $status->id ? "checked" : '') }}>
                                <span class="checmark font-16 font-medium">{{__('labels.sale')}}</span>
                            </div>
                            @elseif($status->name =='Rent')
                            <div class="radio-container radio-rent-one">
                                <input type="radio" name="status" id="create_status2" value="{{ $status->id }}" {{ $post_data != '' && $post_data->property_status_type->category_id == $status->id ? "checked" : (old("status") == $status->id ? "checked" : '') }}>
                                <span class="checmark font-16 font-medium">{{__('labels.rent')}}</span>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div>
                            @if($errors->has('status'))
                            <div class="error d-flex justify-content-end pt-1">{{ $errors->first('status') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-column-reverse flex-lg-row justify-content-evenly">
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column align-items-end region-drop prop-title-en">
                            <label for="english_title" class="theme-text-seondary-black">{{__('labels.property_title_en')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <input type="text" value="{{ $post_data != '' ? $post_data->title : old('title')}}" name="title" id="english_title" placeholder="{{__('labels.property_title_en')}}" class="form-control theme-border">
                            </div>
                            @if($errors->has('title'))
                            <div class="error pt-1">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column align-items-end property_address ps-0 pt-sm-0 prop-title-ar">
                            <label for="ar_title" class="theme-text-seondary-black property_title_ar">{{__('labels.property_title_ar')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <input type="text" value="{{ $post_data != '' ? $post_data->ar_title : old('ar_title')}}" name="ar_title" id="ar_title" placeholder="{{__('labels.property_title_ar')}}" class="form-control theme-border property_title_ar">
                            </div>
                            @if($errors->has('ar_title'))
                            <div class="error pt-1">{{ $errors->first('ar_title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 mt-4 d-flex flex-column-reverse flex-lg-row justify-content-evenly">
                        <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-end property_address">
                            <label for="location" class="theme-text-seondary-black">{{__('labels.address_property')}}
                            </label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <input type="text" name="location" value="{{ $post_data != '' ? $post_data->district->value  : old('location') }}" id="location" placeholder="{{__('labels.address_property')}}" class="form-control theme-border">
                                <img src="{{asset('assets/images/location.png')}}" alt="" class="position-absolute input-icon">
                            </div>
                            @if($errors->has('location'))
                            <div class="error pt-1">{{ $errors->first('location') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-end region-drop">
                            <label for="district" class="theme-text-seondary-black">{{__('labels.district')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <img src="{{asset('assets/images/arrow-down.svg')}}" alt="" class="position-absolute input-drop-icon">
                                <select class="form-control add_prop_btn" id="district" name="district">
                                    <option value="" disabled selected>{{__('labels.select_district')}}</option>
                                </select>
                                <p id="please_select_district" class="d-none">{{__('labels.please_select_district')}}</p>
                            </div>
                            @if($errors->has('district'))
                            <div class="error pt-1">{{ $errors->first('district') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-end">
                            <label for="cities" class="theme-text-seondary-black">{{__('labels.city')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <img src="{{asset('assets/images/arrow-down.svg')}}" alt="" class="position-absolute input-drop-icon">
                                <select class="form-control add_prop_btn" id="cities" name="city">
                                    <option value="" disabled selected> {{__('labels.select_city')}}</option>
                                    @foreach(App\Category::where('type','states')->get() as $row)
                                    <option value="{{ $row->id }}" @if(in_array($row->id, $array)) selected="" @endif> {{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('city'))
                            <div class="error pt-1">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">{{__('labels.next')}}</button>
                <button class="btn btn-theme-secondary previous_btn">{{__('labels.previous')}}</button>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
@section('property_create')
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
@endsection
