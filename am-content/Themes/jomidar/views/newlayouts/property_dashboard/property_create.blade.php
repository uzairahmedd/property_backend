@extends('theme::newlayouts.app')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sel" rel="stylesheet" />
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/selectdrop/create-property.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/newcss/selectdrop/hierarchy-select.min.css')}}">
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here start -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.store_property') }}">
            @csrf
            <input type="hidden" name="term_id" value="{{$id}}">
            <input type="hidden" id="district_id" value="{{$post_data != '' ?  $post_data->district->district_id : old('district')}}">
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
<<<<<<< HEAD
                            <div>
                                    <button onclick="return false" class="fa fa-question-circle mt-1 tooltip_btn" type="btn" style="font-size: 1rem;" aria-hidden="true">
                                        <span>{{__('labels.tooltip_google')}}</span>
                                    </button>
                                     <label for="english_title" class="theme-text-seondary-black">{{__('labels.property_title_en')}}</label>
                            </div>
=======
                            <label for="english_title" class="theme-text-seondary-black"><span data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('labels.property_title_tooltip')}}">
                                    <i class="fa fa-question-circle" style="font-size: 1rem;"></i>
                                </span>{{__('labels.property_title_en')}}</label>
>>>>>>> f9bde03751b3a4ea40c31ce3e4de03567f9cdd33
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <input type="text" value="{{ $post_data != '' ? $post_data->title : old('title')}}" name="title" id="english_title" placeholder="{{__('labels.property_title_en')}}" class="form-control theme-border">
                            </div>
                            @if($errors->has('title'))
                            <div class="error pt-1">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column align-items-end property_address ps-0 pt-sm-0 prop-title-ar">
<<<<<<< HEAD
                            <div>
                                <button onclick="return false" class="fa fa-question-circle mt-1 tooltip_btn" type="btn" style="font-size: 1rem;" aria-hidden="true">
                                    <span>{{__('labels.tooltip_google')}}</span>
                                </button>
                                <label for="ar_title" class="theme-text-seondary-black property_title_ar">{{__('labels.property_title_ar')}}</label>
                            </div>
=======
                            <label for="ar_title" class="theme-text-seondary-black property_title_ar"><span data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('labels.property_title_tooltip')}}">
                                    <i class="fa fa-question-circle" style="font-size: 1rem;"></i>
                                </span>{{__('labels.property_title_ar')}}</label>
>>>>>>> f9bde03751b3a4ea40c31ce3e4de03567f9cdd33
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
                                <div class="dropdown hierarchy-select" id="district">
                                    <button type="button" name="district" class="dropdown-toggle form-control district-form-control" id="example-two-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('labels.please_select_district')}}</button>
                                    <div class="dropdown-menu" aria-labelledby="example-two-button">
                                        <div class="hs-searchbox">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="{{__('labels.search_district')}}">
                                        </div>
                                        <div class="hs-menu-inner" name="district">
                                            <a class="dropdown-item" data-value="" data-default-selected="" href="#">{{__('labels.select_district')}}</a>
                                        </div>
                                    </div>
                                    <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true" type="text"/>
                                </div>
{{--                                <select data-placeholder="Select your location" class="select2 form-control"--}}
{{--                                        tabindex="5" id="" name="district">--}}
{{--                                    <option value="" disabled selected>{{__('labels.select_district')}}</option>--}}
{{--                                </select>--}}
{{--                                <p id="please_select_district" class="d-none">{{__('labels.please_select_district')}}</p>--}}
{{--                                conflict select start--}}
{{--                                <select data-placeholder="Select your location" class="select-icon chosen-select" tabindex="5" id="districts" name="district">--}}
{{--                                    <option value="" disabled selected>{{__('labels.select_district')}}</option>--}}
{{--                                </select>--}}
{{--                                <p id="please_select_district" class="d-none">{{__('labels.please_select_district')}}</p>--}}


                            </div>
                            @if($errors->has('district'))
                            <div class="error pt-1">{{ $errors->first('district') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-end">
                            <label for="cities" class="theme-text-seondary-black">{{__('labels.city')}}</label>
                            <div class="position-relative d-flex justify-content-end align-items-center w-100">
                                <img src="{{asset('assets/images/arrow-down.svg')}}" alt="" class="position-absolute input-drop-icon">
<<<<<<< HEAD

                                <div class="dropdown hierarchy-select" id="cities">
                                    <button type="button" class="dropdown-toggle form-control cities-form-control" tabindex="5" name="city" id="cities" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('labels.select_the_city')}}</button>
                                    <div class="dropdown-menu" aria-labelledby="example-two-button">
                                        <div class="hs-searchbox">
                                            <input type="text" class="form-control" placeholder="{{__('labels.search_cities')}}" autocomplete="off">
                                        </div>
                                        <div class="hs-menu-inner" name="city">
                                            @foreach(App\Category::where('type','states')->get() as $row)
                                            <a class="dropdown-item" value="{{ $row->id }}" data-value="" data-default-selected="" href="#" {{ in_array($row->id, $array) ?  "selected" : (old('city') == $row->id ? 'selected' : '')  }}>{{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input class="d-none" name="example_two" readonly="readonly" aria-hidden="true" type="text"/>
                                </div>
{{--                                <select data-placeholder="Select your location" class="select2 form-control"--}}
{{--                                        tabindex="5" name="city" id="cities">--}}
{{--                                    <option value="" disabled selected> {{__('labels.select_city')}}</option>--}}
{{--                                    @foreach(App\Category::where('type','states')->get() as $row)--}}
{{--                                        <option value="{{ $row->id }}" {{ in_array($row->id, $array) ?  "selected" : (old('city') == $row->id ? 'selected' : '')  }}> {{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
=======
                                <select data-placeholder="Select your location" class="select-icon chosen-select" tabindex="5" name="city" id="cities">
                                    <option value="" disabled selected> {{__('labels.select_city')}}</option>
                                    @foreach(App\Models\City::get() as $row)
                                    <option value="{{ $row->id }}" {{ $post_data != '' &&  $post_data->saudi_post_city->city_id ==  $row->id ?  "selected" : (old('city') == $row->id ? 'selected' : '')  }}> {{ Session::get('locale') == 'ar' ? $row->ar_name : $row->name}}</option>
                                    @endforeach
                                </select>
>>>>>>> f9bde03751b3a4ea40c31ce3e4de03567f9cdd33
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
<<<<<<< HEAD
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Popper Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
<script src="{{theme_asset('assets/newjs/selectdrop/hierarchy-select.js')}}"></script>
<script>
    $(document).ready(function(){
        $('#cities').hierarchySelect({
            hierarchy: false,
            width: 'auto'
        });
    });
    $(document).ready(function(){
        $('#district').hierarchySelect({
            hierarchy: false,
            width: 'auto'
        });
    });
</script>
@endsection
=======
<script src="{{theme_asset('assets/newjs/selectdrop/chosen.jquery.js')}}"></script>
<script src="{{theme_asset('assets/newjs/selectdrop/init.js')}}"></script>
@endsection
>>>>>>> f9bde03751b3a4ea40c31ce3e4de03567f9cdd33
