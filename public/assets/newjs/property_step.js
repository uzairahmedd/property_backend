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
                    $('#property_type_radio').append('<div class="radio-container property_radio"><input type="radio" name="category" '+checked+' value="'+value_data.id+'"><span class="checmark font-16 font-medium">'+name+'</span> </div>');
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
