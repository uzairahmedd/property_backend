@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.five_update_property',$id) }}">
            @csrf
            @method('PUT')
            <div class="description-card card align-items-end">
                <div class="col-12 d-flex mt-n3 font-medium">
                    <span class="theme-text-sky ">5</span>/
                    <span class="theme-text-seondary-black">6</span>
                </div>
                <p class="mb-0 font-18 theme-text-seondary-black p-2">{{__('labels.determine_the_features')}}</p>
                <p class="mb-3 font-14 theme-text-grey ps-2">{{__('labels.choose_more_than_one')}}</p>
                <div class="row theme-gx-2 theme-gy-36 justify-content-end p-2">
                    @foreach(App\Category::where('type','feature')->get() as $row)
                    <div class="radio-container checkbox-step5">
                        <input name="features[]" type="checkbox" value="{{ $row->id }}" @if(in_array($row->id, $features_array)) checked @endif >
                        <span class="checmark step font-14 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                    </div>
                    @endforeach
                </div>
                <!-- <div class="col-12 d-flex flex-lg-row flex-sm-column justify-content-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">{{__('labels.apartment_numberss')}}</lable>
                        <input type="text" class="form-control">
                    </div>
                </div> -->
                <!-- <div class="col-12 d-flex flex-lg-row flex-sm-column justify-content-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">{{__('labels.car_parking_no')}}</lable>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">
                            {{__('labels.opening_no')}}</lable>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <span class="font-24 d-flex justify-content-end py-3 px-2 font-weight-bold">{{__('labels.border_length')}}</span>
                <div class="col-12 d-flex justify-content-end flex-lg-row flex-sm-column">
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">{{__('labels.land_depth')}}</lable>
                        <input type="text" class="form-control">
                        <span class="meters_span">{{__('labels.meter')}}</span>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">
                            {{__('labels.land_length')}}</lable>
                        <input type="text" class="form-control">
                        <span class="meters_span">{{__('labels.meter')}}</span>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <lable class="d-flex justify-content-end align-items-end">{{__('labels.total_floors')}}</lable>
                        <input type="text" class="form-control">
                    </div>
                </div>-->
            </div> 




            <div class="d-flex justify-content-between description-btn-group">
                <button class="btn btn-theme">{{__('labels.next')}}</button>
                <a href="{{ route('agent.property.forth_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
