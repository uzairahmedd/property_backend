@extends('theme::newlayouts.app')
@section('content')
<link rel="stylesheet" href="{{theme_asset('assets/newcss/property_step.css')}}">
<div class="add-property row-style">
    <div class="head text-center">
        <h1 class="font-bold theme-text-white pt-5">أدرج عقارك معنا</h1>
        <p class="theme-text-white font-medium mb-0 mt-2">يمكنك بسهولة تسويق عقارك على موقعنا</p>
    </div>
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
                    <p class="theme-text-black font-18">غرف النوم</p>
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
                            <span class="checmark checkmark-step3 font-16 font-medium">غير متوفر</span>
                        </div>
                    </div>
                    @endif

                    <!-- Bedroom Section Ends Here -->
                    <!-- Bathrooms Section Starts Here -->
                    @if($row->name == 'Bathrooms')
                    <p class="theme-text-black font-18">دورات المياه</p>
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
                    <p class="theme-text-black font-18">صالات</p>
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
                            <span class="checmark checkmark-step3 font-16 font-medium">غير متوفر</span>
                        </div>
                    </div>
                    @endif
                    <!-- lounges Section Ends Here -->
                    <!-- Boards Section Starts Here -->
                    @if($row->name == 'Boards')
                    <p class="theme-text-black font-18">مجالس</p>
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
                    <p class="theme-text-black font-18">عدد المواقف</p>
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
                    <p class="theme-text-black font-18">التأثيث</p>
                    <div class="row gx-2 mb-4_5">
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="1" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 1 ? "checked"  : (old("furnishing") == 1 ? "checked" : "") }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">غير مفروشة</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="2" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 2 ? "checked"  : (old("furnishing") == 2 ? "checked" : "") }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">نص مفروشة</span>
                        </div>
                        <div class="radio-container">
                            <input type="radio" name="furnishing" value="3" {{ !empty($post_data->property_condition)  && $post_data->property_condition->content == 3 ? "checked"  :  "checked"  }}>
                            <span class="checmark checkmark-step3 font-16 font-medium">مفروشة</span>
                        </div>
                    </div>
                    <!-- Furnishing Section Ends Here -->

                </div>
                <div class="col-12 d-flex flex-column-reverse flex-lg-row flex-md-row justify-content-end mt-5">
                    <div class="col-lg-6 col-md-8 col-sm-12 regional-street-1 d-flex align-items-end">
                        <div class="dropdown regional-drop d-flex">
                            <button class="btn dropdown-toggle regional-drop-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                رقم دور العقار
                            </button>
                            <img src="http://127.0.0.1:8000/assets/images/arrow-down.svg" alt="" class="position-absolute region-drop-icon">
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="">
                                <li><a class="dropdown-item inter_val3" href="#">1</a></li>
                                <li><a class="dropdown-item inter_val3" href="#">2</a></li>
                                <li><a class="dropdown-item inter_val3" href="#">3</a></li>
                                <li><a class="dropdown-item inter_val3" href="#">4</a></li>
                                <li><a class="dropdown-item inter_val3" href="#">5</a></li>
                            </ul>
                            <p class="ps-3">دور</p>
                        </div>
                        <div class="position-relative d-flex flex-column align-items-end w-100">
                            <label for="" class="font-14 theme-text-seondary-black"> أدوار العقار</label>
                            <input type="text" name="role" value="{{ !empty( $post_data->role) ? $post_data->role->content  : old("role") }}" placeholder="إجمالي الأدوار" id="interface_val3" class="form-control street_view theme-border">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between description-btn-group">
                <button type="submit" class="btn btn-theme">التالي</button>
                <a href="{{ route('agent.property.second_edit_property', $id)}}" class="btn btn-theme-secondary previous_btn center_property">السابق</a>
            </div>
        </form>
    </div>
    <!-- Property Description Section Ends Here -->
</div>
@endsection
@section('property_create')
<script src="{{theme_asset('assets/newjs/property_create.js')}}"></script>
@endsection