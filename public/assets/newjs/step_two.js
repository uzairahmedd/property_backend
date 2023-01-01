//for by default electricity
$("input[name=electricity_facility][value=0]").prop('checked', true);
$("input[name=water_facility][value=0]").prop('checked', true);

//for old electricity
if ($("input[name=electricity_facility][value=0]").data('val') != '' && $("input[name=electricity_facility][value=0]").data('val') == '0') {
    $("input[name=electricity_facility][value=0]").prop('checked', true);
}
else if ($("input[name=electricity_facility][value=1]").data('val') != '' && $("input[name=electricity_facility][value=0]").data('val') == '1') {
    $("input[name=electricity_facility][value=1]").prop('checked', true);
}
//for old water
if ($("input[name=water_facility][value=0]").data('val') != '' && $("input[name=water_facility][value=0]").data('val') == '0') {
    $("input[name=water_facility][value=0]").prop('checked', true);
}
else if ($("input[name=water_facility][value=1]").data('val') != '' && $("input[name=water_facility][value=0]").data('val') == '1') {
    $("input[name=water_facility][value=1]").prop('checked', true);
}

//ready not ready
if ($('#ready').data('isready') == '') {
    $('#year_calender input').addClass("hidden");
}
if ($('#ready').data('isready') != '') {
    $('#ready').prop('checked', true);
    $('#year_calender input').removeClass("hidden");
}

//for street dropdowns
if ($('.street_sdropdown').data('streets') != '') {
    var old_count = $('.street_sdropdown').data('streets');
    var interface_array = interface.split(',');
    var meter_array = meter.split(',');
    generate_input(old_count, interface_array, meter_array);
}
function generate_input(n, interface_array = null, meter_array = null) {
    $('.street_detailss').html('');
    var select_facing = '';
    var property_nature = '';
    var west = '';
    var east = '';
    var north = '';
    var south = '';
    var width = '';
    var street = '';
    var meter = '';
    var i;
    var count = '';
    for (i = 0; i < n; i++) {
        var count = i + 1;
        var check = '';
        var West_check = '';
        var North_check = '';
        var South_check = '';
        var meter_value = '';
        if (interface_array != null && interface_array[i] == 'East') {
            check = 'selected';
        }
        if (interface_array != null && interface_array[i] == 'West') {
            West_check = 'selected';
        }
        if (interface_array != null && interface_array[i] == 'North') {
            North_check = 'selected';
        }
        if (interface_array != null && interface_array[i] == 'South') {
            South_check = 'selected';
        }
        if (meter_array != null) {
            meter_value = meter_array[i];
        }
        select_facing = $('#select_facing').text();
        property_nature = $('#property_nature').text();
        east = $('#east').text();
        west = $('#west').text();
        north = $('#north').text();
        south = $('#south').text();
        meter = $('#meter').text();
        width = $('#width').text();
        street = $('#street').text();
        $('.street_detailss').append('<div class="col-12 street_detail d-flex justify-content-end mt-3" id="street_detail">\n' +
            '                        <div class="col-lg-6 d-flex flex-column">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black">' + select_facing + '</label>\n' +
            '                            <select class="form-select form-control w-100 select-face" name="interface[]" aria-label="Default select example">\n' +
            '                                <option value="" disabled selected>' + property_nature + '</option>\n' +
            '                                <option value="East" ' + check + '>' + east + '</option>\n' +
            '                                <option value="West" ' + West_check + '>' + west + '</option>\n' +
            '                                <option value="North" ' + North_check + '>' + north + '</option>\n' +
            '                                <option value="South" ' + South_check + '>' + south + '</option>\n' +
            '                            </select>\n' +
            '                        </div>\n' +
            '                        <div class="col-lg-6 d-flex flex-column meter">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black"> ' + street + '  ' + count + ' ' + width + '</label>\n' +
            '                            <input type="text" value="' + meter_value + '" name="meter[]" class="form-control d-flex justify-content-start align-items-start w-100">\n' +
            '                            <span class="meters_span">' + meter + '</span>\n' +
            '                        </div>\n' +
            '                    </div>');
    }

}

function dropdown_btn(elem) {
    var count = $(elem).val();
    generate_input(count);


}


$("#ready").click(function () {
    $('#year_calender input').removeClass("hidden");
});
$("#not_ready").click(function () {
    $('#year_calender input').addClass("hidden");
});



if ($('.type_categpry').data('val') != '') {
    var parent_cate = $('input[name="parent_category"]:checked').val();
    var selected_cat = $('.type_categpry').data('val');
    property_type(parent_cate, selected_cat);

}

//for by default
function property_type_triger(elem) {
    var parent_cate = $(elem).val();
    property_type(parent_cate);
};

//to get property type
function property_type(parent_cate, selected_cat = null) {
    $('#property_type_radio').html('');
    var baseurl = $('#base_url').val();
    var url = baseurl + 'agent/get_property_type';
    $.ajax({
        url: url,
        type: 'get',
        data: { 'id': parent_cate },
        success: function (response) {
            $('#property_type_radio').html('');
            $.each(response, function (index, value) {
                $.each(value.parent, function (index, value_data) {
                    var checked = '';
                    var name = value_data.name;
                    if (locale == 'ar') {
                        name = value_data.ar_name;
                    }
                    if (value_data.id == selected_cat && selected_cat != null) {
                        checked = 'checked';
                    }
                    $('#property_type_radio').append('<div class="radio-container radio-edit-two property_radio"><input type="radio" name="category" ' + checked + ' data-name="' + value_data.name + '" value="' + value_data.id + '"><span class="checmark font-16 font-medium">' + name + '</span> </div>');
                });
            });

        }
    });
}


$(document).ready(function () {
    //by default
    var land_size_value = '';
    var built_up_areaa = $('#built_up_areaa').text();
    var land_areaa = $('#land_areaa').text();
    var area_in_square_m = $('#area_in_square_m').text();
    var built_up_value = '';
    if ($('#land_size_area').val() != '') {
        land_size_value = $('#land_size_area').val();
    }
    if ($('#built_area').val() != '') {
        built_up_value = $('#built_area').val();
    }
    var decr = $("input:radio[name=category]:checked").data('name');
    land_built_area(decr, land_size_value, built_up_value);
    //on change
    $(document).on('change', '.property_radio', function (e) {
        e.preventDefault();
        var text = $("input:radio[name=category]:checked").data('name');
        land_built_area(text, land_size_value, built_up_value);
    });

    function land_built_area(text, land_size_value) {
        if (text === 'Building' || text === 'building') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
        }

        else if (text === 'Chalet' || text === 'chalet') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');

        } else if (text === 'Residential land' || text === 'Residential Land' || text === 'residential land' || text === 'residential Land') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#built_up_area').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');


        } else if (text === 'Duplex' || text === 'duplex') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');

        }
        else if (text === 'Villa' || text === 'villa') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');

        }
        else if (text === 'Apartment' || text === 'apartment') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');

        } else if (text === 'Rest House' || text === 'rest house' || text === 'Rest house' || text === 'rest House') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">' + land_areaa + '</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">' + built_up_areaa + '</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="' + area_in_square_m + '" class="form-control theme-border">');

        }
    };
});
