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
                @if(!empty($info->property_type) && $info->property_type->category->name != 'Residential land')
                <p class="mb-0 font-18 theme-text-seondary-black p-2">{{__('labels.determine_the_features')}}</p>
                <p class="mb-3 font-14 theme-text-grey ps-2">{{__('labels.choose_more_than_one')}}</p>
                <div class="row theme-gx-2 theme-gy-36 justify-content-end p-2">
                    @foreach(App\Category::where('type','feature')->get() as $row)
                    <div class="radio-container checkbox-step5 mb-3">
                        <input name="features[]" type="checkbox" value="{{ $row->id }}" @if(in_array($row->id, $features_array)) checked @endif >
                        <span class="checmark step font-14 font-medium">{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</span>
                    </div>
                    @endforeach
                </div>
                @endif
                <span class="font-24 d-flex justify-content-end py-3 px-2 font-weight-bold">{{__('labels.border_length')}}</span>
                <div class="col-12 d-flex justify-content-end flex-lg-row flex-sm-column">
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <label class="d-flex justify-content-end align-items-end">{{__('labels.land_depth')}}</label>
                        <input type="number" name="depth" value="{{ !empty($info->depth) ? $info->depth->content  : old('depth')}}" class="form-control">
                        <span class="meters_span">{{__('labels.meter')}}</span>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 apartment_details d-flex flex-column p-2">
                        <label class="d-flex justify-content-end align-items-end">
                            {{__('labels.land_length')}}</label>
                        <input type="number" name="length" value="{{ !empty($info->length) ? $info->length->content  : old('length')}}" class="form-control">
                        <span class="meters_span">{{__('labels.meter')}}</span>
                    </div>
                </div>
            </div>
            <div class="preview-property">
                <h2 class="d-flex justify-content-end align-items-end">{{__('labels.property_description_preview')}}</h2>
                <h6 class="d-flex justify-content-end align-items-end">{{__('labels.info_filled_preview')}}</h6>
                <p class="pb-0 mb-0"> <span>{{ Session::get('locale') == 'ar' && !empty($info->property_type) ? $info->property_type->category->ar_name : $info->property_type->category->name}}</span> {{__('labels.for')}} <span>{{ Session::get('locale') == 'ar' && !empty($info->property_status_type) ? $info->property_status_type->category->ar_name : $info->property_status_type->category->name}} </span>{{__('labels.in')}} <span>
                        , {{ Session::get('locale') == 'ar' ? $info->post_district->district->ar_name : $info->post_district->district->name }} , {{ Session::get('locale') == 'ar' ? $info->post_new_city->city->ar_name : $info->post_new_city->city->name }}</span></p>
                @if(!empty($info->landarea))
                <p class="pb-0 mb-0">{{__('labels.land_area')}}: <span>{{$info->landarea->content}} {{__('labels.sqm')}}</span></p>
                @endif
                @if(!empty($info->builtarea))
                <p class="pb-0 mb-0">{{__('labels.built_up_area')}}: <span>{{$info->builtarea->content}} {{__('labels.sqm')}}</span></p>
                @endif
                <!-- <p class="pb-0 mb-0">Property Borders: Length: <span>15m,</span>Depth: <span>20m</span></p> -->
                @if($info->option_data)
                @foreach ($info->option_data as $value)
                @if( $value->value != 0)
                <p class="pb-0 mb-0">{{__('labels.the_property_has')}} <span>{{ $value->value }} </span> {{ Session::get('locale') == 'ar' ? $value->category->ar_name : $value->category->name}}</p>
                @endif
                @endforeach
                @endif

                <p class="pb-0 mb-0">{{ Session::get('locale') == 'ar' && !empty($info->property_type) ? $info->property_type->category->ar_name : $info->property_type->category->name}} {{__('labels.has')}} <span>{{ $info->electricity_facility->content == 0 ? __("labels.electricity") : __("labels.no_electricity") }}</span> {{__('labels.and')}} <span>{{ $info->water_facility->content == 0 ? __("labels.water") : __("labels.no_water") }}</span> {{__('labels.connections')}}</p>
                <p class="pb-0 mb-0"> <span>{{!empty($info->property_age) ? $info->property_age->content : 'N/A'}}</span> :{{__("labels.building_year")}}</p>
                <p class="pb-0 mb-0">{{__('labels.price')}}: <span>{{$info->price->price}} {{__('labels.sar')}}</span></p>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
        <button class="btn btn-theme">{{__('labels.next')}}</button>
        <a href="{{ route('agent.property.forth_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
    </div>
    </div>
    </form>
</div>
<!-- Property Description Section Ends Here -->
</div>
@endsection
