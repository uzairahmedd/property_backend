@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.store_property') }}">
            @csrf
            @php
            $form_check=microtime();
            Session::put('form_check', $form_check);
            @endphp
            <!-- <input type="hidden" name="form_check" value="{{$form_check}}"> -->
            <input type="hidden" name="term_id" value="{{$id}}">
            <div class="description-card card">
                @if($errors->has('message'))
                <div class="error d-flex justify-content-end pt-1">{{ $errors->first('message') }}</div>
                @endif
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex justify-content-end mt-n3 font-medium">
                        <span class="theme-text-sky ">1</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <p class="theme-text-black font-18 ">{{__('labels.property_description')}}</p>
                    <div class="theme-gx-3 mb-4_5">
                        <div class="row">
                            @foreach($status_category as $status)
                            @if( $status->name =='Sale')
                            <div class="radio-container">
                                <input type="radio" name="status" id="create_status1" value="{{ $status->id }}" {{ $post_data != '' && $post_data->property_status_type->category_id == $status->id ? "checked" : (old("status") == $status->id ? "checked" : '') }}>
                                <span class="checmark font-16 font-medium">{{__('labels.sale')}}</span>
                            </div>
                            @elseif($status->name =='Rent')
                            <div class="radio-container">
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


                    <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end">
                        <label for="title" class="font-14 theme-text-seondary-black">{{__('labels.property_address')}}</label>
                        <div class="position-relative d-flex justify-content-end align-items-center w-100">
                            <input type="text" value="{{ $post_data != '' ? $post_data->title : old('title')}}" name="title" id="title" placeholder="{{__('labels.property_address')}}" class="form-control theme-border">
                        </div>
                        @if($errors->has('title'))
                        <div class="error pt-1">{{ $errors->first('title') }}</div>
                        @endif
                    </div>


                    <div class="col-12 d-flex flex-wrap justify-content-end mb-4_5 mt-4">
                        <label for="description" class="d-flex flex-column-reverse flex-lg-row align-items-end">
                            <span class="font-16 theme-text-sky">{{__('labels.prop_exam')}}</span>
                            <span class="theme-text-seondary-black">{{__('labels.property_descr')}}</span>
                        </label>
                        <div class="col-12 d-flex flex-wrap justify-content-end">
                            <textarea name="description" cols="30" rows="3" placeholder="{{__('labels.enter_here')}}" id="description" class="form-control b-r-8 theme-border">{{ $post_data != '' ? $post_data->description->content  : (old("description")) }}</textarea>
                        </div>
                        @if($errors->has('description'))
                        <div class="error pt-1">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row justify-content-evenly">

                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end property_address">
                            <label class="font-14 theme-text-seondary-black">{{__('labels.region')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <img src="{{asset('assets/images/arrow-down.svg')}}" alt="" class="position-absolute input-drop-icon">
                                <select class="form-control add_prop_btn" name="city">
                                    <option value="" disabled selected>  {{__('labels.select_region')}}</option>
                                    @foreach(App\Category::where('type','states')->latest()->get() as $row)
                                    <option value="{{ $row->id }}" {{ $post_data != '' && $post_data->city->category_id == $row->id ? "selected" : (old("city") == $row->id ? "selected" : '') }}>{{ $row->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('city'))
                            <div class="error pt-1">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end property_address">
                            <label for="location" class="font-14 theme-text-seondary-black">{{__('labels.address_property')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <input type="text" name="location" value="{{ $post_data != '' ? $post_data->city->value  : old('location') }}" id="location" placeholder="{{__('labels.city')}}" class="form-control theme-border">
                                <img src="{{asset('assets/images/location.png')}}" alt="" class="position-absolute input-icon">
                            </div>
                            @if($errors->has('location'))
                            <div class="error pt-1">{{ $errors->first('location') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 d-flex flex-column align-items-end">
                            <label for="area" class="font-14 theme-text-seondary-black">{{__('labels.property_area')}}</label>
                            <input type="number" step="any" id="area" value="{{ $post_data != '' ? $post_data->area->content  : old('area') }}" name="area" placeholder="{{__('labels.area_square_meter')}}" class="form-control theme-border">
                            @if($errors->has('area'))
                            <div class="error pt-1">{{ $errors->first('area') }}</div>
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
