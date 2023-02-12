@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    @include('theme::newlayouts.partials.user_header')
    <!-- Property Description Section Starts Here -->
    <div class="container">
        <form method="post" action="{{ route('agent.property.third_update_property',$id) }}" class="post_form" id="additional_form">
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
                    @if($row->name == 'Bedroom')
                    <p class="theme-text-black font-18">{{__('labels.bedroom')}}</p>
                    <div class="row gx-2 mb-4_5">
                        <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="9+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "9+"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+9</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="9" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "9"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">9</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="8" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "8"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">8</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="7" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "7"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">7</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "6"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5"  ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4"   ? "checked"  : ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3"   ? "checked"  :  ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2"  ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "1"  ? ""  : "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                    </div>
                    @endif

                    <!-- Bedroom Section Ends Here -->
                    <!-- Bathrooms Section Starts Here -->
                    @if($row->name == 'Bathroom')
                    <p class="theme-text-black font-18">{{__('labels.bathroom')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="9+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "9+" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+9</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="9" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "9" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">9</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="8" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "8" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">8</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="7" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "7" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">7</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="6" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "6" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">6</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2" ? "checked"  : ""}}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "1" ?  "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one ">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "0"  ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    <!-- Bathrooms Section Ends Here -->
                    <!-- Living room Section Starts Here -->
                    @if($row->name == 'Living-room')
                    <p class="theme-text-black font-18">{{__('labels.Living_room')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5+" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "1" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "0" ? ""  : "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    <!-- Living room Section Ends Here -->
                    <!-- Guest room Section Starts Here -->
                    @if($row->name == 'Guest-room')
                    <p class="theme-text-black font-18">{{__('labels.Guest_room')}}</p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5+" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4" ? "checked"  : ""}}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "1" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "0" ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    <!-- Guest room Section Ends Here -->
                    <!-- Parking Section Starts Here -->
                    @if($row->name == 'Parking')
                    <p class="theme-text-black font-18">{{__('labels.position_no')}} </p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5+" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "1" ? "checked"  : ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "0" ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    @if($row->name == 'Elevator')
                    <p class="theme-text-black font-18">{{__('labels.elevator_no')}} </p>
                    <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5+" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5+" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">+5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="5" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "5" ? "checked"  :  "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">5</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="4" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "4" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">4</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="3" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "3" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">3</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="2" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "2" ? "checked"  : "" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">2</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="{{ $row->name }}" value="1" {{ !empty($row->post_category_option)  && $row->post_category_option->value == "1" ? "checked"  : ""  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">1</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one">
                            <input type="radio" name="{{ $row->name }}" value="0" {{ !empty($row->post_category_option)  && $row->post_category_option->value != "0" ? ""  : "checked" }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.no_avail')}}</span>
                        </div>
                    </div>
                    @endif
                    @endforeach
                   <!-- for appartment and opening section -->
                    <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end">
                        <div class="col-lg-12 col-md-8 col-sm-12 regional-street-1 d-flex align-items-end">
                            <div class="col-12 d-flex flex-lg-row flex-sm-column-reverse justify-content-end align-items-end">
                                @foreach($input_options as $key=>$row)
                                @if($row->name == 'Appartments')
                                <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                                <div class="col-lg-3 col-md-12 col-sm-12 mb-4_5 d-flex flex-column ms-5 realestate_roles">
                                    <label for="" class="d-flex justify-content-end theme-text-black">{{__('labels.no_appartment')}} {{__('labels.optional')}}</label>
                                    <input type="text" name="{{ $row->name }}"  placeholder="{{__('labels.no_appartment')}}" value="{{ !empty($row->post_category_option) ? $row->post_category_option->value  : old('Appartments') }}" class="form-control theme-border">
                                </div>
                                @endif
                                @if($row->name == 'Openings')
                                <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                                <div class="col-lg-3 col-md-12 col-sm-12 mb-4_5 d-flex flex-column ms-5 realestate_roles">
                                    <label for="" class="d-flex justify-content-end theme-text-black">{{__('labels.no_openings')}}  {{__('labels.optional')}}</label>
                                    <input type="text" name="{{ $row->name }}"  placeholder="{{__('labels.no_openings')}}" value="{{ !empty($row->post_category_option) ? $row->post_category_option->value  : old('Openings') }}" class="form-control theme-border">
                                </div>
                                @endif
                                @if($row->name == 'Office')
                                <input type="hidden" name="input_option[{{ $row->name }}]" value="{{ $row->id }}">
                                <div class="col-lg-3 col-md-12 col-sm-12 mb-4_5 d-flex flex-column ms-5 realestate_roles">
                                    <label for="" class="d-flex justify-content-end theme-text-black">{{__('labels.no_office') }} {{__('labels.optional')}}</label>
                                    <input type="text" name="{{ $row->name }}"  placeholder="{{__('labels.no_office')}}" value="{{ !empty($row->post_category_option) ? $row->post_category_option->value  : old('Openings') }}" class="form-control theme-border">
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- Parking Section Ends Here -->
                    @if(!empty($info->property_type) && $info->property_type->category->furnishing_section == '1')
                    <!-- Furnishing Section Starts Here -->
                    <p class="theme-text-black font-18">{{__('labels.furnishing')}}</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="furnishing" data-val="{{ !empty($info->property_condition)  ? $info->property_condition->content : old('furnishing')}}" value="1">
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.furnished')}}</span>
                        </div>
                        <div class="radio-container radio-edit-third">
                            <input type="radio" name="furnishing" data-val="{{ !empty($info->property_condition)  ? $info->property_condition->content : old('furnishing')}}" value="2">
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.txt_furnished')}}</span>
                        </div>
                        <div class="radio-container radio-edit-third first_one">
                            <input type="radio" name="furnishing" value="3" data-val="{{ !empty($info->property_condition)  ? $info->property_condition->content : old('furnishing')}}">
                            <span class="checmark checkmark-step3 font-16 font-medium">{{__('labels.unfurnished')}}</span>
                        </div>
                    </div>
                    <!-- Furnishing Section Ends Here -->
                    @endif

                </div>
                <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end">
                    <div class="col-lg-6 col-md-8 col-sm-12 regional-street-1 d-flex align-items-end">
                        <div class="col-12 d-flex flex-lg-row flex-sm-column-reverse justify-content-end align-items-end">
                            @if(!empty($info->property_type) && $info->property_type->category->property_floor == '1')
                            <div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex flex-column">
                                <label for="" class="d-flex justify-content-end theme-text-black property_role_no">{{__('labels.property_floor')}}</label>
                                <input type="text" name="property_floor" value="{{ !empty( $info->property_floor) ? $info->property_floor->content  : old('property_floor') }}" placeholder="{{__('labels.property_floor')}}" id="interface_val3" class="form-control street_view theme-border">
                            </div>
                            @endif
                            @if(!empty($info->property_type) && $info->property_type->category->total_floor == '1')
                            <div class="col-12 col-lg-6 col-md-12 col-sm-12 d-flex flex-column ms-5 realestate_roles">
                                <label for="" class="d-flex justify-content-end theme-text-black">{{__('labels.total_floors')}}</label>
                                <input type="text" name="total_floors" value="{{ !empty( $info->total_floors) ? $info->total_floors->content  : old('total_floors') }}" placeholder="{{__('labels.total_floors')}}" class="form-control theme-border">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" id="additional_detail_btn" class="btn btn-theme">{{__('labels.next')}}</button>
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