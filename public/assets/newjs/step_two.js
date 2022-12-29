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
if ($('#street').data('streets') != '') {
    var old_count = $('#street').data('streets');
    var interface_array = interface.split(',');
    var meter_array = meter.split(',');
    generate_input(old_count, interface_array, meter_array);
}
function generate_input(n, interface_array = null, meter_array = null) {
    $('.street_detailss').html('');
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
        $('.street_detailss').append('<div class="col-12 street_detail d-flex justify-content-end mt-3" id="street_detail">\n' +
            '                        <div class="col-lg-6 d-flex flex-column">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black">Select Facing</label>\n' +
            '                            <select class="form-select form-control w-100 select-face" name="interface[]" aria-label="Default select example">\n' +
            '                                <option value="" disabled selected>Select facing</option>\n' +
            '                                <option value="East" ' + check + '>East</option>\n' +
            '                                <option value="West" ' + West_check + '>West</option>\n' +
            '                                <option value="North" ' + North_check + '>North</option>\n' +
            '                                <option value="South" ' + South_check + '>South</option>\n' +
            '                            </select>\n' +
            '                        </div>\n' +
            '                        <div class="col-lg-6 d-flex flex-column meter">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black">Street ' + count + ' Width</label>\n' +
            '                            <input type="text" value="' + meter_value + '" name="meter[]" class="form-control d-flex justify-content-start align-items-start w-100">\n' +
            '                            <span class="meters_span">Meters</span>\n' +
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

//to get property type
function property_type(elem) {
    $('#property_type_radio').html('');
    var id = $(elem).val();
    var term_id = $(elem).attr('term-id');
    var baseurl = $('#base_url').val();
    var url = baseurl + 'agent/get_property_type';
    $.ajax({
        url: url,
        type: 'get',
        data: { 'id': id, 'term_id': term_id },
        success: function (response) {
            $('#property_type_radio').html('');
            $.each(response.category_data, function (index, value) {
                $.each(value.parent, function (index, value_data) {
                    var checked = '';
                    var name = value_data.name;
                    if (locale == 'ar') {
                        name = value_data.ar_name;
                    }
                    if (response.post_category != null) {
                        if (value_data.id == response.post_category.category_id && value.id == response.post_category.term_id) {
                            checked = 'checked';
                        }
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
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');
        }

        else if (text === 'Chalet' || text === 'chalet') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        } else if (text === 'Residential land' || text === 'Residential Land' || text === 'residential land' || text === 'residential Land') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        } else if (text === 'Duplex' || text === 'duplex') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        }
        else if (text === 'Villa' || text === 'villa') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        }
        else if (text === 'Apartment' || text === 'apartment') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        } else if (text === 'Rest House' || text === 'rest house' || text === 'Rest house' || text === 'rest House') {
            $('#land_size').html('');
            $('#built_up_area').html('');
            $('#land_size').html('<label for="land_size_area" class="theme-text-seondary-black">land area</label>\n' +
                '  <input type="number" id="land_size_area" step="any" value="' + land_size_value + '" name="landarea" placeholder="Area in Square Meter" class="form-control theme-border">');
            $('#built_up_area').html('<label for="builtarea" class="theme-text-seondary-black">Built-up-area</label>\n' +
                '  <input type="number" id="builtarea" step="any" value="' + built_up_value + '" name="builtarea" placeholder="Area in Square Meter" class="form-control theme-border">');

        }
    };
});