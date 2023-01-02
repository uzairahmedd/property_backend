// Property Step Js Start
$(document).ready(function (event) {
    $('.inter_val').click(function (e) {
        $(".inter_val").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val.selected").text();
        $("#interface_val").val(function () {
            return this.value + ' ' + drop_text;
        });
        e.preventDefault();
    });
});

$(document).ready(function (event) {
    $('.inter_val2').click(function (e) {
        $(".inter_val2").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val2.selected").text();
        $("#interface_val2").val(function () {
            return this.value + ' ' + drop_text;
        });
        e.preventDefault();
    });
});

$(document).ready(function (event) {
    $('.inter_val3').click(function (e) {
        $(".inter_val3").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val3.selected").text();
        $("#interface_val3").val(function () {
            return this.value + ' ' + drop_text;

        });
        e.preventDefault();
    });
});
// Property Step Js End
$(document).ready(function () {
    var parts = $(location).attr("href").split('/');
    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
    if (lastSegment == 'property-list') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#property_list').addClass("sidebar-active");
    } else if (lastSegment == 'favorite-property-list') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#favorite').addClass("sidebar-active");
    } else if (lastSegment == 'account') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#setting').addClass("sidebar-active");
    }
});




//district against cities
$(function () {
    $("#cities").on("change", function (e) {
        e.preventDefault();
        var city_id = $(this).val();
        get_already_select_district(city_id, null);
    });
});

// for edit district
if ($('#cities').val() != null) {
    var city_id = $('#cities').val();
    var district_id = $('#district_id').val();
    get_already_select_district(city_id, district_id);

}

function get_already_select_district(city_id, district_id = null) {
    var select_district = $('#please_select_district').text();
    var baseurl = $('#base_url').val();
    var url = baseurl + 'agent/get_district';
    $.ajax({
        type: 'get',
        url: url,
        data: { 'id': city_id },
        success: function (response) {
            $('#district').html('');
            $('#district').append('<option disabled selected> ' + select_district + ' </option>');
            var name = '';
            $.each(response, function (index, value) {
                var select = '';
                name = value.name;
                if (locale == 'ar') {
                    name = value.ar_name;
                }
                if (district_id != null && district_id == value.id) {
                    select = 'selected';
                }
                console.log(name);
                $('#district').append('<option ' + select + ' value=' + value.id + '>' + name + '</option>');
            });

        }
    });
}


//for furniching
$("input[name=furnishing][value=3]").prop('checked', true);

if ($("input[name=furnishing][value=3]").data('val') != '' && $("input[name=furnishing][value=3]").data('val') == '3') {
    $("input[name=furnishing][value=3]").prop('checked', true);
}
else if ($("input[name=furnishing][value=2]").data('val') != '' && $("input[name=furnishing][value=2]").data('val') == '2') {
    $("input[name=furnishing][value=2]").prop('checked', true);
}
else if ($("input[name=furnishing][value=1]").data('val') != '' && $("input[name=furnishing][value=1]").data('val') == '1') {
    $("input[name=furnishing][value=1]").prop('checked', true);
}






