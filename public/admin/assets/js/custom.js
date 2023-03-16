(function ($) {
    "use strict";
    $(".cancel").on('click', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Do It!'
        }).then((result) => {
            if (result.value == true) {
                window.location.href = link;
            }
        })
    });

})

//     //for year picker
//     var year = '2022'
//     if ($('#yearpicker').val != '') {
//         year = $('#yearpicker').val();
//     }
//     $("#yearpicker").yearpicker({
//         year: year,
//         startYear: 1975,
//         endYear: 2023
//     });
//
//     // Hide and Show Ready Calender
//
//     $("#ready").click(function () {
//         $('#year_calender input').removeClass("hidden");
//     });
//     $("#not_ready").click(function () {
//         $('#year_calender input').addClass("hidden");
//     });
//
//     // Hide Step 3 in Admin Panel
//     if (pro_type_name == 'land' || pro_type_name == 'Farm' || pro_type_name == 'Warehouse') {
//         $(".step_3").addClass('hide');
//     }
//     // Disable Last Finish Step
//     $(".step_7").addClass('disabled');
//
//     $("#next_btn6").click(function () {
//         $('#myTab li:nth-child(7) a').tab('show');
//         $(".step_7").removeClass('disabled');
//     });
//
//     // // property edit next steps Js
//     //
//     // $("#next_btn1").click(function () {
//     //     $('#myTab li:nth-child(2) a').tab('show');
//     // });
//     //
//     // if (pro_type_name == 'land' || pro_type_name == 'Farm' || pro_type_name == 'Warehouse') {
//     //     $("#next_btn2").click(function () {
//     //         $('#myTab li:nth-child(4) a').tab('show');
//     //     });
//     // }
//     // else
//     // {
//     //     $("#next_btn2").click(function () {
//     //         $('#myTab li:nth-child(3) a').tab('show');
//     //     });
//     // }
//     //
//     // $("#next_btn3").click(function () {
//     //     $('#myTab li:nth-child(4) a').tab('show');
//     // });
//     //
//     // $("#next_btn4").click(function () {
//     //     $('#myTab li:nth-child(5) a').tab('show');
//     // });
//     //
//     // $("#next_btn5").click(function () {
//     //     $('#myTab li:nth-child(6) a').tab('show');
//     // });
//     //
//     //
//     // $("#p-btn1").click(function () {
//     //     $('#myTab li:nth-child(1) a').tab('show');
//     // });
//     //
//     // $("#p-btn2").click(function () {
//     //     $('#myTab li:nth-child(2) a').tab('show');
//     // });
//     //
//     // $("#p-btn3").click(function () {
//     //     $('#myTab li:nth-child(3) a').tab('show');
//     // });
//     //
//     // $("#p-btn4").click(function () {
//     //     $('#myTab li:nth-child(4) a').tab('show');
//     // });
//     //
//     // $("#p-btn5").click(function () {
//     //     $('#myTab li:nth-child(5) a').tab('show');
//     // });
//
//
// })(jQuery);
//
//
// // var land_size_value;
// // var built_up_value;
// // //for by default electricity
// // $("input[name=electricity_facility][value=0]").prop('selected', true);
// // $("input[name=water_facility][value=0]").prop('selected', true);
// //
// // //for old electricity
// // if ($("input[name=electricity_facility][value=0]").data('val') != '' && $("input[name=electricity_facility][value=0]").data('val') == '0') {
// //     $("input[name=electricity_facility][value=0]").prop('selected', true);
// // }
// // else if ($("input[name=electricity_facility][value=1]").data('val') != '' && $("input[name=electricity_facility][value=0]").data('val') == '1') {
// //     $("input[name=electricity_facility][value=1]").prop('selected', true);
// // }
// // //for old water
// // if ($("input[name=water_facility][value=0]").data('val') != '' && $("input[name=water_facility][value=0]").data('val') == '0') {
// //     $("input[name=water_facility][value=0]").prop('selected', true);
// // }
// // else if ($("input[name=water_facility][value=1]").data('val') != '' && $("input[name=water_facility][value=0]").data('val') == '1') {
// //     $("input[name=water_facility][value=1]").prop('selected', true);
// // }
//
//
// //for street and Interface dropdowns
// if (interface != '' || meter != '') {
//     var old_count = $('.street_sdropdown').data('streets');
//     var interface_array = interface.split(',');
//     var meter_array = meter.split(',');
//     generate_input(old_count, interface_array, meter_array);
// }
//
// if ($('.street_sdropdown').data('streets') != '') {
//     var old_count = $('.street_sdropdown').data('streets');
//     generate_input(old_count, interface_array, meter_array);
// }
//
// function generate_input(n, interface_array = null, meter_array = null) {
//     $('.street_detailss').html('');
//     var select_facing = '';
//     var property_nature = '';
//     var west = '';
//     var east = '';
//     var north = '';
//     var south = '';
//     var width = '';
//     var street = '';
//     var meter = '';
//     var mtr = '';
//     var i;
//     var count = '';
//     for (i = 0; i < n; i++) {
//         var count = i + 1;
//         var check = '';
//         var West_check = '';
//         var North_check = '';
//         var South_check = '';
//         var meter_value = '';
//
//         if (interface_array != null && interface_array[i] == 'East') {
//             check = 'selected';
//         }
//         if (interface_array != null && interface_array[i] == 'West') {
//             West_check = 'selected';
//         }
//         if (interface_array != null && interface_array[i] == 'North') {
//             North_check = 'selected';
//         }
//         if (interface_array != null && interface_array[i] == 'South') {
//             South_check = 'selected';
//         }
//         if (meter_array != null) {
//             meter_value = meter_array[i];
//         }
//         select_facing = $('#select_facing').text();
//         property_nature = $('#property_nature').text();
//         east = $('#east').text();
//         west = $('#west').text();
//         north = $('#north').text();
//         south = $('#south').text();
//         meter = $('#meter').text();
//         width = $('#width').text();
//         mtr = '(m)';
//         street = 'Street';
//         $('.street_detailss').append('<div class="row street_detail d-flex justify-content-end mb-2">\n' +
//             '                        <div class="col-sm-6 d-flex flex-column">\n' +
//             '                            <label for="" class="d-flex justify-content-start theme-text-black">' + select_facing + '</label>\n' +
//             '                            <select class="form-select form-control w-100 select-face" name="interface[]" aria-label="Default select example">\n' +
//             '                                <option value="" disabled selected>' + select_facing + '</option>\n' +
//             '                                <option value="East" ' + check + '>' + east + '</option>\n' +
//             '                                <option value="West" ' + West_check + '>' + west + '</option>\n' +
//             '                                <option value="North" ' + North_check + '>' + north + '</option>\n' +
//             '                                <option value="South" ' + South_check + '>' + south + '</option>\n' +
//             '                            </select>\n' +
//             '                        </div>\n' +
//             '                        <div class="col-sm-6 d-flex flex-column meter">\n' +
//             '                            <label for="" class="d-flex justify-content-start theme-text-black"> ' + street + '  ' + count + ' ' + width + ' ' + mtr + '</label>\n' +
//             '                            <input type="text" value="' + meter_value + '" name="meter[]" class="form-control d-flex justify-content-start align-items-start w-100">\n' +
//             '                        </div>\n' +
//             '                    </div>');
//     }
//
// }
//
// function dropdown_btn(elem) {
//     var count = $(elem).val();
//     generate_input(count);
// }
//
//
// // Property Nature JS start from
// var land_size_value;
// var built_up_value;
//
// $("#ready").click(function () {
//     $('#year_calender input').removeClass("hidden");
// });
// $("#not_ready").click(function () {
//     $('#year_calender input').addClass("hidden");
// });
//
// if ($('.type_categpry').data('val') != '') {
//     var parent_cate = $("#parent_category_change  option:selected").val();
//     var selected_cat = $('.type_categpry').data('val');
//     property_type(parent_cate, selected_cat);
// }
//
// //for by default
// function property_type_triger(elem) {
//     var parent_cate = $(elem).find(':selected').val();
//     property_type(parent_cate);
// }
//
// function land_triger(elem) {
//     //for non property age inputs
//     $('input[name="ready"]').removeAttr("disabled", "disabled");
//     //end for non property age inputs
//     var land_area = $(elem).find(':selected').data('landarea');
//     var build_area = $(elem).find(':selected').data('build');
//     var name = $(elem).find(':selected').data('name');
//     //for age of property
//     var age = $(elem).find(':selected').data("age");
//     if (age == '1') {
//         $('.built-up-year').removeClass('hide');
//     } else if (age == '0') {
//         $('.built-up-year').addClass('hide');
//     }
//
//     if (name == 'land' || name == 'Farm' || name == 'Warehouse') {
//         $(".step_3").addClass('hide');
//     } else {
//         $(".step_3").removeClass('hide');
//     }
//
//     land_built_area_new(name, land_area, build_area);
// }
//
// function land_built_area_new(name = '', land_check, build_check, land_size_value = '', built_up_value = '') {
//     var built_up_areaa = $('#built_up_areaa').text();
//     var land_areaa = $('#land_areaa').text();
//     var area_in_square_m = $('#area_in_square_m').text();
//     var target_id = '#land_size';
//     if (name == 'land' || name == 'Farm') {
//         $('input[name="ready"]').attr("disabled", "disabled");
//         $('#land_size').html('');
//         target_id = '#built_up_area';
//     }
//     if (build_check == 1) {
//         $('#built_up_area').html('');
//         $('#built_up_area').html('<label for="built_area" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
//             '<input type="text" id="built_area"  value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
//     } else if (build_check == 0) {
//         $('#built_up_area').html('');
//     }
//
//     if (land_check == 1) {
//         $(target_id).html('');
//         $(target_id).html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
//             '  <input type="text" id="land_size_area"  value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
//     } else if (land_check == 0) {
//         $(target_id).html('');
//     }
//
//
// }
//
// //to get property type
// function property_type(parent_cate, selected_cat = null) {
//     $('#property_type_select').html('');
//     var select_property_type = $('#select_property_type').text();
//     var baseurl = $('#base_url').val();
//     var url = baseurl + '/admin/real-state/get_property_type';
//     $.ajax({
//         url: url,
//         type: 'get',
//         data: {
//             'id': parent_cate,
//         },
//         success: function (response) {
//             $('#property_type_select').append('<option disabled selected>'+select_property_type+'</option>');
//             $.each(response, function (index, value) {
//                 $.each(value.category_parent, function (index, value_data) {
//                     var selected = '';
//                     var name = value_data.name;
//                     if (locale == 'ar') {
//                         name = value_data.ar_name;
//                     }
//                     if (value_data.id == selected_cat && selected_cat != null) {
//                         selected = 'selected';
//                     }
//
//                     $('#property_type_select').append('<option class="type_categpry" name="selected" ' + selected + '   value="' + value_data.id + '" data-name="' + value_data.name + '" data-age="' + value_data.property_age + '" data-landarea="' + value_data.land_area + '" data-build="' + value_data.buildup_area + '">' + name + '</option>');
//
//                 });
//             });
//             if ($('#land_size_area').val() != '') {
//                 land_size_value = $('#land_size_area').val();
//             }
//             if ($('#built_area').val() != '') {
//                 built_up_value = $('#built_area').val();
//             }
//             //for land and built up area
//             var build = $("#property_type_select  option:selected").data('build');
//             var land = $("#property_type_select  option:selected").data('landarea');
//             var name = $("#property_type_select  option:selected").data('name');
//
//             land_built_area_new(name, land, build, land_size_value, built_up_value);
//             //for property age by default on selection
//             var age = $("#property_type_select  option:selected").data('age');
//             if (age == '1') {
//                 $('.built-up-year').removeClass('hide');
//             } else if (age == '0') {
//                 $('.built-up-year').addClass('hide');
//             }
//         }
//     });
// }
//
//
// $(document).ready(function () {
//     //by default
//     // setTimeout(function () {
//     if ($('#land_size_area').val() != '') {
//         land_size_value = $('#land_size_area').val();
//     }
//     if ($('#built_area').val() != '') {
//         built_up_value = $('#built_area').val();
//     }
//     var build = $("#property_type  option:selected").data('build');
//     var land = $("#property_type  option:selected").data('landarea');
//     var name = $("#property_type  option:selected").data('name');
//     land_built_area_new(name, land, build, land_size_value, built_up_value);
//     // }, 1500);
//
// });
//
//
// //ready not ready
// if ($('#ready').data('isready') == '') {
//     $('#year_calender input').addClass("hidden");
// }
// if ($('#ready').data('isready') != '') {
//     $('#ready').prop('checked', true);
//     $('#year_calender input').removeClass("hidden");
// }
//
//
// // Step 5 Checkbox JS
//
// // Property Step Js Start
//
// $(document).ready(function (event) {
//     //on by default
//     if ($('#tick_div').find('.checkbox-div input:checkbox').is(':checked')) {
//         $('#tick_div').find('.checkbox-div input:checked ').parent().addClass('bg-checkbox');
//     } else {
//         $('#tick_div').find('.checkbox-div input:checked ').parent().removeClass('bg-checkbox');
//     }
//
//     var $tbl = $('#tick_div');
//     var $bodychk = $tbl.find('.checkbox-div input:checkbox');
//
//     $(function () {
//         $bodychk.on('change', function () {
//             if ($(this).is(':checked')) {
//                 $(this).closest('checkbox-section').addClass('bg-checkbox');
//             } else {
//                 $(this).closest('checkbox-section').removeClass('bg-checkbox');
//             }
//         });
//     });
// });
//
//
// /*----------------------------
//         Admin Step 2 JS
//     -------------------------------*/
// $(".step_3").on('click', function (e) {
//     e.preventDefault();
//     var id = $('#feature_id').val();
//     var base_url = $('#base_url').val();
//     var url = base_url + '/admin/real-state/get_data/' + id;
//     get_properties(url)
//
//     function get_properties(url) {
//         $.ajax({
//             type: 'get',
//             url: url,
//             dataType: 'json',
//             success: function (response) {
//                 $('#bedroom_features').html('');
//                 $('#bathroom_features').html('');
//                 $('#guest_room_features').html('');
//                 $('#living_room_features').html('');
//                 $('#parking_features').html('');
//                 $('#elevator_features').html('');
//                 $('#appartment_features').html('');
//                 $('#opening_features').html('');
//                 $('#office_features').html('');
//                 $.each(response.data.get_data, function (index, value) {
//                     console.log(response);
//                     var name = value.name;
//                     if (locale == 'ar') {
//                         name = value.ar_name;
//                     }
//                     if (value.name == 'Bedroom') {
//                         $('#bedroom_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="bedroom_select" name="Bedroom" class="form-control"></select>');
//                         for (var i = 1; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#bedroom_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Bathroom') {
//                         $('#bathroom_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="bathroom_select" name="Bathroom" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#bathroom_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Guest-room') {
//                         $('#guest_room_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="guest_room_select" name="Guest-room" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#guest_room_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Living-room') {
//                         $('#living_room_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="living_room_select" name="Living-room" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#living_room_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Parking') {
//                         $('#parking_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="parking_room_select" name="Parking" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#parking_room_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Elevator') {
//                         $('#elevator_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="elevator_room_select" name="Elevator" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#elevator_room_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Appartments') {
//                         $('#appartment_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '<input type="text" value="'+value.post_category_option.value+'" name="Appartments" class="form-control d-flex justify-content-start align-items-start w-100">\n');
//                     }
//
//                     if (value.name == 'Openings') {
//                         $('#opening_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="opening_select" name="Openings" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#opening_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                     if (value.name == 'Office') {
//                         $('#office_features').html('<label>' + name + '</label>\n' +
//                             '<input type="hidden" name="get_data['+value.name+']" value="'+value.id+'">'+
//                             '                    <select id="office_select" name="Office" class="form-control"></select>');
//                         for (var i = 0; i <= 9; i++) {
//                             var selected = '';
//                             if (value.post_category_option != null && value.post_category_option.value == i) {
//                                 selected = 'selected';
//                             }
//                             $('#office_select').append('<option value="' + i + '" ' + selected + '>' + i + '</option>');
//
//                         }
//                     }
//
//                 })
//
//             }
//         })
//     }
// });
//
//
//
//
//
// /*----------------------------
//         Admin Step 5 Features JS
//     -------------------------------*/
// $(".step_5").on('click', function (e) {
//     e.preventDefault();
//     var id = $('#all_feature_id').val();
//     var base_url = $('#base_url').val();
//     var url = base_url + '/admin/real-state/all_features/' + id;
//     get_properties(url)
//     function get_properties(url) {
//         $.ajax({
//             type: 'get',
//             url: url,
//             dataType: 'json',
//             success: function (response) {
//                 $('#features_check').html('');
//
//                 var check = '';
//                 var feature = response.data.property_data.category.features_section;
//                 if( feature == 1) {
//                     $.each(response.data.categories_data, function (index, value) {
//                         var name = value.name;
//                         if (locale == 'ar') {
//                             name = value.ar_name;
//                         }
//                         // $('#features_check').append('<checkbox-section class="div-check features-check checkbox-div d-flex flex-row justify-content-start align-items-center"></checkbox-section>');
//                         if (jQuery.inArray(value.id, response.data.post_features) != -1) {
//                             check = 'checked';
//                         }
//                         $('#features_check').append('<input name="features[]" type="checkbox" value="' + value.id + '" ' + check + '>' +
//                             '<label class="m-0 px-2">' + name + '</label>\n');
//                     })
//                 }
//
//             }
//         })
//     }
// });
//
// // Upload Images
// var loadFile = function(event) {
//     var output = document.getElementById('first_image');
//     output.src = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//         URL.revokeObjectURL(output.src) // free memory
//     }
// };
// var loadFile1 = function(event) {
//     var output = document.getElementById('second_image');
//     output.src = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//         URL.revokeObjectURL(output.src) // free memory
//     }
// };
// var loadFile2 = function(event) {
//     var output = document.getElementById('third_image');
//     output.src = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//         URL.revokeObjectURL(output.src) // free memory
//     }
// };
// var loadFile3 = function(event) {
//     var output = document.getElementById('forth_image');
//     output.src = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//         URL.revokeObjectURL(output.src) // free memory
//     }
// };
// var loadFile4 = function(event) {
//     var output = document.getElementById('five_image');
//     output.src = URL.createObjectURL(event.target.files[0]);
//     output.onload = function() {
//         URL.revokeObjectURL(output.src) // free memory
//     }
// };
//
//
// // /*---------------------
// //        	Image Remove
// //     --------------------------*/
// // var m_id='';
// // function remove_image(param,key) {
// //     m_id=key;
// //     Swal.fire({
// //         title: 'Are you sure?',
// //         text: "You won't be able to revert this!",
// //         icon: 'warning',
// //         showCancelButton: true,
// //         confirmButtonColor: '#3085d6',
// //         cancelButtonColor: '#d33',
// //         confirmButtonText: 'Yes, Do It!'
// //     }).then((result) => {
// //         if (result.value == true) {
// //             $('#m_area'+m_id).remove();
// //             $('#media_id').val(param);
// //             $('#basicform').submit();
// //         }
// //     })
// }







