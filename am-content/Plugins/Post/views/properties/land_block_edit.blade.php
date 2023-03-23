@extends('layouts.backend.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
<script>
    var locale = '<?php echo Session::get('locale'); ?>';
</script>
@endsection
@section('content')
<p class="hidden" id="plot_basic_detail">{{__('labels.plot_basic_details')}}</p>
<p class="hidden" id="blockcount">{{!empty($blockcount) ? $blockcount : ' '}}</p>
<p class="hidden" id="property_nature">{{__('labels.property_nature')}}</p>
<p class="hidden" id="plot_number">{{__('labels.plot_number')}}</p>
<p class="hidden" id="plot_price">{{__('labels.plot_price')}}</p>
<p class="hidden" id="planned_number">{{__('labels.planned_number')}}</p>
<p class="hidden comma_seperated">{{__('labels.comma_seperated')}}</p>
<p class="hidden" id="plot_area">{{__('labels.plot_area')}}</p>
<p class="hidden" id="plot_all_side_coordinate">{{__('labels.plot_all_side_coordinate')}}</p>
<p class="hidden" id="plot_center_coordinate">{{__('labels.plot_center_coordinate')}}</p>
<p class="hidden" id="plot_bottom_left_coordinate">{{__('labels.plot_bottom_left_coordinate')}}</p>
<p class="hidden" id="plot_right_bottom_coordinate">{{__('labels.plot_right_bottom_coordinate')}}</p>
<p class="hidden" id="plot_top_right_coordinate">{{__('labels.plot_top_right_coordinate')}}</p>
<p class="hidden" id="plot_top_left_coordinate">{{__('labels.plot_top_left_coordinate')}}</p>
<p class="hidden" id="plot_all_side_measurement">{{__('labels.plot_all_side_measurement')}}</p>
<p class="hidden" id="left_measurement">{{__('labels.left_measurement')}}</p>
<p class="hidden" id="right_measurement">{{__('labels.right_measurement')}}</p>
<p class="hidden" id="top_measurement">{{__('labels.top_measurement')}}</p>
<p class="hidden" id="bottom_measurement">{{__('labels.bottom_measurement')}}</p>
<p class="hidden" id="comma_seperated ">{{__('labels.comma_seperated')}}</p>
<p class="hidden" id="rem_plot_form">{{__('labels.rem_plot_form')}}</p>
<p class="hidden" id="commercial  ">{{__('labels.commercial ')}}</p>
<p class="hidden" id="residential  ">{{__('labels.residential ')}}</p>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="header">
                    <h4>{{ __('labels.add_land_block') }}</h4>
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
                <div class="tab-content" id="myTabContent2">
                    <form method="post" action="{{ route('admin.property.block_update') }}" class="land_block_updateform">
                        @csrf
                        <div class="form-group mt-3">
                            <label for="status">{{__('labels.property')}}</label>
                            <select class="form-control form-select-lg mb-3" required="" name="status" id="status" aria-label=".form-select-lg example">
                                <option value='' disabled selected>{{__('labels.select_property_type')}}</option>
                                @foreach($status_category as $status)
                                <option value='{{$status->id}}' {{ $info != '' && $info->property_status_type->category_id == $status->id ? 'selected' : '' }}>{{Session::get('locale')=='ar' ? $status->ar_name : $status->name}}</option>
                                @endforeach
                            </select>
                            <input id="term_id" type="hidden" name="term_id" value="{{ $info->id }}">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea2">{{__('labels.english_title')}}</label>
                                    <input type="text" name="title" id="exampleFormControlTextarea2" value="{{$info->title}}" placeholder="{{__('labels.english_title')}}" required="" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{__('labels.arabic_title')}}</label>
                                    <input type="text" name="ar_title" id="exampleFormControlTextarea1" value="{{$info->ar_title}}" placeholder="{{__('labels.arabic_title')}}" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.select_your_city')}}</label>
                                        <select name="city" required="" id="land_block_city" class="form-control form-select-lg mb-3 select2" aria-label=".form-select-lg example">
                                            <option value='' disabled selected>{{__('labels.select_your_city')}}</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $info != '' && $info->post_new_city->city_id == $city->id ? 'selected' : (old('city') == $city->id ? 'selected' : '')}}>{{ Session::get('locale') == 'ar' ?  $city->ar_name : $city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.select_your_district')}}</label>
                                        <select class="form-control" id="land_block_district" name="district">
                                            <option>{{ __('labels.district') }}</option>
                                            @foreach($district as $dist)
                                            <option name="$dist->name" value="{{ $dist->id }}" {{ $info != '' && $info->post_district->district_id == $dist->id ? 'selected' : (old('district') == $dist->id ? 'selected' : '')}}>{{ Session::get('locale') == 'ar' ?  $dist->ar_name : $dist->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="region">{{__('labels.address')}}</label>
                                        <input type="text" name="location" value="{{!empty($info->post_district) ? $info->post_district->value : ''}}" placeholder="{{__('labels.address')}}" required="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="position-relative d-flex flex-column align-items-center justify-content-center b-r-8 input-container">
                                        <input type="file" name="media[]" class="file-input" onchange="loadFile(event)">
                                        <img id="first_image" src="{{asset('assets/images/bx_image-alt.png')}}" alt="">
                                        <span class="font-16 theme-text-sky">{{__('labels.add_photo')}}</span>
                                    </div>
                                </div>

                                @foreach($info->medias as $key => $row)
                                <div class="col-sm-3" id="m_area{{ $key }}">
                                    <div class="card">
                                        <img src="{{ asset($row->url) }}" alt="" height="100">
                                        <div class="card-footer">
                                            <a class="btn btn-danger remove-btn col-12" onclick="remove_image({{ $row->id }},{{ $key }})">{{ __('Remove') }}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label for="virtual_tour">{{__('labels.video_link')}}</label>
                                        <input type="text" value="{{ !empty( $info->virtual_tour) ? $info->virtual_tour->content  : ""}}" name="virtual_tour" placeholder="{{__('labels.example')}} http://youtube.be/dkdsds" class="form-control theme-border">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wrapper"></div>
                        <button class="add_fields btn btn-success" style="">{{__('labels.add_more_plots')}}</button>
                        <div class="form-group d-flex justify-content-between" style="float:right;">

                            <button class="btn btn-primary save-btn mx-1" type="submit">{{__('labels.update')}}</button>
                        </div>
                        {{--step 6 end here--}}
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
<form method="post" action="{{ route('agent.medias.destroy') }}" id="basicform">
    @csrf
    <input type="hidden" id="media_id" name="id[]">
    <input type="hidden" name="status" value="delete">
</form>
@endsection

@section('script')
<script src="{{ asset('admin/js/form.js') }}"></script>
<script src="{{ asset('admin/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/js/land_block.js') }}"></script>
<script type="text/javascript">
    "use strict";

    function success(res) {
        location.reload()
    }
    $('#email').on('focusout', () => {
        $('#user_mail').val($('#email').val());
        $('#basicform3').submit();
    });

    function success3(res) {
        $('#user_id').val(res.id);
        $('.submitbtn').removeAttr('disabled');
    }

    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 100; //Maximum allowed input fields
        var wrapper = $(".wrapper"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var plot_basic_detail = $('#plot_basic_detail').text();
        var bottom_measurement = $('#bottom_measurement').text();
        var top_measurement = $('#top_measurement').text();
        var right_measurement = $('#right_measurement').text();
        var left_measurement = $('#left_measurement').text();
        var plot_all_side_measurement = $('#plot_all_side_measurement').text();
        var plot_top_left_coordinate = $('#plot_top_left_coordinate').text();
        var plot_top_right_coordinate = $('#plot_top_right_coordinate').text();
        var plot_right_bottom_coordinate = $('#plot_right_bottom_coordinate').text();
        var plot_bottom_left_coordinate = $('#plot_bottom_left_coordinate').text();
        var plot_center_coordinate = $('#plot_center_coordinate').text();
        var plot_all_side_coordinate = $('#plot_all_side_coordinate').text();
        var seperate_comma = $('#seperate_comma').text();
        var plot_area = $('#plot_area').text();
        var planned_number = $('#planned_number').text();
        var plot_number = $('#plot_number').text();
        var rem_plot_form = $('#rem_plot_form').text();
        var residential = $('#residential').text();
        var property_nature = $('#property_nature').text();
        var plot_price = $('#plot_price').text();
        var commercial = $('#commercial').text();
        // var please_select_district = $('#please_select_district').text();
        var x = 1; //Initial input field is set to 1
        $(add_button).click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url = '/admin/real-state/parent_property';
            $.ajax({
                type: 'get',
                url: url,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $('.parent_category').html('');
                    if (x < max_fields) {
                        x++; //input field increment
                        //add input field
                        $(wrapper).append('<div><hr><h6 style="text-align:center">' + x + ' : ' + plot_basic_detail + '</h6><div class="row"> <div class="col-sm-3"><div class="form-group"><label for="property_nature">' + property_nature + '</label><select class="form-control form-select-lg mb-3 parent_category" name="property_nature[]" required="" aria-label=".form-select-lg example"></select></div></div> <div class="col-sm-3"><div class="form-group"><label for="number">' + plot_number + '</label> <input type="text" name="plot_number[]" id="number" required="" placeholder="' + plot_number + '" class="form-control"> </div></div> <div class="col-sm-2"><div class="form-group"><label for="price">' + plot_price + '</label> <input type="text" name="plot_price[]"  required="" placeholder="' + plot_price + '" class="form-control"></div> </div><div class="col-sm-2"> <div class="form-group"><label for="planned_number">' + planned_number + '</label><input type="text" name="planned_number[]"  required="" placeholder="' + planned_number + '" class="form-control"></div></div><div class="col-sm-2"><div class="form-group"><label for="planned_number">' + plot_area + '</label><input type="text" name="total_area[]" id="planned_number" required="" placeholder="' + plot_area + '" class="form-control"></div> </div> </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_coordinate + '</h6> <div class="row"> <div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_center_coordinate + '</label><input type="text" name="center_coordinate[]" id="center_coordinate" required="" placeholder="' + seperate_comma + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="bottom_left_coordinate">' + plot_bottom_left_coordinate + '</label><input type="text" name="bottom_left_coordinate[]"  required="" placeholder="' + plot_bottom_left_coordinate + '" class="form-control"></div></div><div class="col-sm-4"> <div class="form-group"> <label for="bottom_right_coordinate">' + plot_right_bottom_coordinate + '</label><input type="text" name="bottom_right_coordinate[]"  required="" placeholder="' + plot_right_bottom_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"> <label for="top_right_coordinate">' + plot_top_right_coordinate + '</label><input type="text" name="top_right_coordinate[]"  required="" placeholder="' + plot_top_right_coordinate + '" class="form-control"></div></div><div class="col-sm-4"><div class="form-group"><label for="top_left_coordinate">' + plot_top_left_coordinate + '</label><input type="text" name="top_left_coordinate[]"  required="" placeholder="' + plot_top_left_coordinate + '" class="form-control"> </div></div>  </div><hr> <h6 style="text-align:center">' + x + ' : ' + plot_all_side_measurement + '</h6><div class="row"><div class="col-sm-3"><div class="form-group"><label for="left_measurement">' + left_measurement + '</label><input type="text" name="left_measurement[]"  required="" placeholder="' + left_measurement + '" class="form-control"></div> </div><div class="col-sm-3"><div class="form-group"><label for="right_measurement">' + right_measurement + '</label><input type="text" name="right_measurement[]" required="" placeholder="' + right_measurement + '" class="form-control"></div></div><div class="col-sm-3"><div class="form-group"><label for="top_measurement">' + top_measurement + '</label><input type="text" name="top_measurement[]"  required="" placeholder="' + top_measurement + '" class="form-control"></div> </div><div class="col-sm-3"> <div class="form-group"><label for="bottom_measurement">' + bottom_measurement + '</label><input type="text" name="bottom_measurement[]"  required="" placeholder="' + bottom_measurement + '" class="form-control"></div></div></div><a href="javascript:void(0);" class="remove_field btn btn-danger" style="float:right;">' + rem_plot_form + '</a></div>');
                    }
                    var name = '';
                    $('.parent_category').append('<option disabled selected>' + property_nature + '</option>');
                    $.each(response.data, function(index, value_data) {
                        name = value_data.name
                        if (locale == 'ar') {
                            name = value_data.ar_name;
                        }
                        $('.parent_category').append('<option value=' + value_data.id + '>' + name + '</option>');
                    });
                }
            })
        });

        //when user click on remove button
        $(wrapper).on("click", ".remove_field", function(e) {
            e.preventDefault();
            $(this).parent('div').remove(); //remove inout field
            x--; //inout field decrement
        })
    });
</script>
@endsection

