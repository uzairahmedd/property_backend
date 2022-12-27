@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.third_update_property',$id) }}" class="post_form">
            @csrf
            @method('PUT')
            <div class="description-card card">
                <div class="d-flex flex-column align-items-end">
                    <div class="col-12 d-flex mt-n3 font-medium">
                        <span class="theme-text-sky ">3</span>/
                        <span class="theme-text-seondary-black">6</span>
                    </div>
                    <!-- Bedroom Section Starts Here -->
                    @foreach($input_options as $key=>$row)
                    @if($row->name == 'Bedrooms')
                    <p class="theme-text-black font-18">{{__('labels.bedroom')}}</p>
                    <div class="row gx-2 mb-4_5">
                        <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 6  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 5  ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 4   ? "checked"  : ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 3   ? "checked"  :  ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 2  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 1  ? "checked"  : ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != 0  ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif

                    <!-- Bedroom Section Ends Here -->
                    <!-- Bathrooms Section Starts Here -->
                    @if($row->name == 'Bathrooms')
                    <p class="theme-text-black font-18">{{__('labels.bathroom')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 6 ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 5 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 4 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 3 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 2 ? "checked"  : ""}}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value != 1 ?  ""  :  "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                    </div>
                    @endif
                    <!-- Bathrooms Section Ends Here -->
                    <!-- lounges Section Starts Here -->
                    @if($row->name == 'lounges')
                    <p class="theme-text-black font-18">{{__('labels.lounges')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 6 ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 5 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 4 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 3 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 2 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 1 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != 0 ? ""  : "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    <!-- lounges Section Ends Here -->
                    <!-- Boards Section Starts Here -->
                    @if($row->name == 'Boards')
                    <p class="theme-text-black font-18">{{__('labels.boards')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 6 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 5 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 4 ? "checked"  : ""}}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 3 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 2 ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 1 ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != 0 ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">غير متوفر</span>
                        </div>
                    </div>
                    @endif
                    <!-- Boards Section Ends Here -->
                    <!-- Parking Section Starts Here -->
                    @if($row->name == 'Parking')
                    <p class="theme-text-black font-18">{{__('labels.position_no')}} </p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 6 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 5 ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 4 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 3 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == 2 ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value != 1 ? ""  : "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- Parking Section Ends Here -->
                    <!-- Furnishing Section Starts Here -->
                    <p class="theme-text-black font-18">{{__('labels.furnishing')}}</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="1" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 1 ? "checked"  : (old("furnishing") == 1 ? "checked" : "") }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.furnished')}}</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="2" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 2 ? "checked"  : (old("furnishing") == 2 ? "checked" : "") }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.txt_furnished')}}</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="3" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 3 ? "checked"  :  "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.unfurnished')}}</span>
                        </div>
                    </div>
                    <!-- Furnishing Section Ends Here -->

                </div>
                <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">
                    <div class="col-lg-6 col-md-8 col-sm-12 regional-street-1 d-flex align-items-end">
{{--                        <div class="dropdown regional-drop d-flex">--}}
{{--                            <div class="interface-div">--}}
{{--                                <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    {{__('labels.property_role_no')}}--}}
{{--                                </button>--}}
{{--                                <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">--}}
{{--                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">--}}
{{--                                    <li><a class="dropdown-item inter_val3" href="#">1</a></li>--}}
{{--                                    <li><a class="dropdown-item inter_val3" href="#">2</a></li>--}}
{{--                                    <li><a class="dropdown-item inter_val3" href="#">3</a></li>--}}
{{--                                    <li><a class="dropdown-item inter_val3" href="#">4</a></li>--}}
{{--                                    <li><a class="dropdown-item inter_val3" href="#">5</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="meter-div">--}}
{{--                                <p class="meter mb-0">{{__('labels.role')}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="position-relative d-flex flex-column align-items-end w-100">--}}
{{--                            <label for="" class="font-18 theme-text-seondary-black">{{__('labels.real_estate_roles')}}</label>--}}
{{--                            <input type="text" name="role" value="{{ !empty( $post_data->role) ? $post_data->role->content  : old("role") }}" placeholder="{{__('labels.total_innings')}}" id="interface_val3" class="form-control street_view theme-border">--}}
{{--                        </div>--}}

                            <div class="col-12 d-flex flex-lg-row flex-sm-column-reverse justify-content-end align-items-end">
                                <div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex flex-column">
                                    <label for="" class="d-flex justify-content-end theme-text-black property_role_no">{{__('labels.property_role_no')}}</label>
                                    <select class="form-select form-control w-100 select-face" aria-label="Default select example">
                                        <option selected="">{{__('labels.property_role_no')}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex flex-column ms-5 realestate_roles">
                                    <label for="" class="d-flex justify-content-end theme-text-black">{{__('labels.real_estate_roles')}}</label>
                                    <input type="text" class="form-control d-flex justify-content-start align-items-start w-100" placeholder="{{__('labels.total_innings')}}">
                                    <span class="role_span">{{__('labels.role')}}</span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">{{__('labels.next')}}</button>
                <a href="{{ route('agent.property.second_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">{{__('labels.previous')}}</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
@section('property_create')
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
@endsection
