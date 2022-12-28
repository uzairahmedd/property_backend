// Property Step Js Start
$(document).ready(function (event) {
    $('.inter_val').click(function (e) {
        $(".inter_val").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val.selected").text();
        $("#interface_val").val(function() {
            return this.value +' ' + drop_text;
        });
        e.preventDefault();
    });
});

$(document).ready(function (event) {
    $('.inter_val2').click(function (e) {
        $(".inter_val2").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val2.selected").text();
        $("#interface_val2").val(function() {
            return this.value +' ' +drop_text;
        });
        e.preventDefault();
    });
});

$(document).ready(function (event) {
    $('.inter_val3').click(function (e) {
        $(".inter_val3").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".inter_val3.selected").text();
        $("#interface_val3").val(function() {
            return this.value +' ' + drop_text;

        });
        e.preventDefault();
    });
});
// Property Step Js End


$(document).ready(function(){
    $("#ready").click(function(){
        $('#year_calender input').removeClass("hidden");
    });
    $("#not_ready").click(function(){
        $('#year_calender input').addClass("hidden");
    });
        $("#yearpicker").yearpicker({
            year: 2017,
            startYear: 2012,
            endYear: 2030
        });
});

function generate_input(n)
{
    $('.street_detailss').html('');
    var i;
    for(i=1; i<=n; i++) {
        $('.street_detailss').append('<div class="col-12 street_detail d-flex justify-content-end mt-3" id="street_detail">\n' +
            '                        <div class="col-lg-6 d-flex flex-column">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black">Select Facing</label>\n' +
            '                            <select class="form-select form-control w-100 select-face" name="interface[]" aria-label="Default select example">\n' +
            '                                <option value="" disabled selected>Select facing</option>\n' +
            '                                <option value="1">East</option>\n' +
            '                                <option value="2">West</option>\n' +
            '                                <option value="3">North</option>\n' +
            '                                <option value="4">South</option>\n' +
            '                            </select>\n' +
            '                        </div>\n' +
            '                        <div class="col-lg-6 d-flex flex-column meter">\n' +
            '                            <label for="" class="d-flex justify-content-end theme-text-black">Street 1 Width</label>\n' +
            '                            <input type="text" name="meter[]" class="form-control d-flex justify-content-start align-items-start w-100">\n' +
            '                            <span class="meters_span">Meters</span>\n' +
            '                        </div>\n' +
            '                    </div>');
    }

}

function  dropdown_btn(elem){
    var count=$(elem).val();
    generate_input(count);
}

//to get property type
function property_type(elem){
    $('#property_type_radio').html('');
    var id = $(elem).val();
    var term_id = $(elem).attr('term-id');
    var baseurl = $('#base_url').val();
    var url = baseurl + 'agent/get_property_type';
    $.ajax({
        url: url,
        type: 'get',
        data: {'id':id,'term_id':term_id},
        success: function (response) {
            $('#property_type_radio').html('');
            $.each(response.category_data, function (index, value) {
                $.each(value.parent, function (index, value_data) {
                    var checked='';
                    var name=value_data.name;
                    if(locale == 'ar'){
                        name=value_data.ar_name;
                    }
                    if(response.post_category != null){
                    if(value_data.id == response.post_category.category_id && value.id == response.post_category.term_id){
                      checked='checked';
                    }}
                    $('#property_type_radio').append('<div class="radio-container radio-edit-two property_radio"><input type="radio" name="category" '+checked+' data-name="'+value_data.name+'" value="'+value_data.id+'"><span class="checmark font-16 font-medium">'+name+'</span> </div>');
                });
            });

        }
    });
}

$(document).ready(function () {
    var parts = $(location).attr("href").split('/');
    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
    if (lastSegment == 'property-list') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#property_list').addClass("sidebar-active");
    } else if (lastSegment == 'favorite-property-list') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#favorite').addClass("sidebar-active");
    }else if (lastSegment == 'account') {
        $('#sidebar_url a').removeClass("sidebar-active");
        $('#setting').addClass("sidebar-active");
    }
});


$(document).ready(function () {
    $(document).on('change', '.property_radio', function(e) {
        e.preventDefault();
        var text = $("input:radio[name=category]:checked").data('name');
        if(text === 'Building' || text === 'building')
        {
            console.log('built');
            $('#land_size').removeClass('hiden');
        }
        else if(text === 'Chalet' || text === 'chalet')
        {
            $('#land_size').removeClass('hiden');
        }else if(text === 'Residential land' || text === 'Residential Land' || text === 'residential land' || text === 'residential Land')
        {
            $('#land_size').addClass('hiden');
        } else if(text === 'Duplex' || text === 'duplex')
        {
            $('#land_size').removeClass('hiden');
        }
        else if(text === 'Villa' || text === 'villa')
        {
            $('#land_size').removeClass('hiden');
        }
        else if(text === 'Apartment' || text === 'apartment')
        {
            $('#land_size').addClass('hiden');
        }else if(text === 'Rest House' || text === 'rest house' || text === 'Rest house' || text === 'rest House')
        {
            $('#land_size').removeClass('hiden');
        }
    });
});






