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


$(document).ready(function(){
    $('#cities').hierarchySelect({
        hierarchy: false,
        search: true,
        width: 'auto',
        initialValueSet: true,
        onChange: function (value) {
            get_already_select_district(value, null);
        }
    });
});


$(document).ready(function(){
    $('#district').hierarchySelect({
        hierarchy: false,
        width: 'auto',
        height: '160px'
    });
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
            $('#districts').html('');
            $('#districts').append('<option disabled selected> ' + select_district + ' </option>');
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
                $('#districts').append('<option ' + select + ' value=' + value.id + '>' + name + '</option>').trigger('chosen:updated');
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

function tooltip (btn, tool) {
    var btn = document.getElementById(btn);  // El botón.
    var tool = document.getElementById(tool);  // El tooltip.
    var open = false;

    // Evito que se cierre el tooltip si hago click sobre el tooltip.
    tool.addEventListener('click', function(event){
        event.stopPropagation();
    });

    // Al hacer click en el botón.
    btn.addEventListener('click', function(event){
        event.stopPropagation();
        // Si estaba Cerrado.
        if(!open){
            tool.classList.add('abierto');
            open = true;
            // Cuando hago click en cualquier parte de la página.
            document.addEventListener('click', ocultar);

            // Si estaba abierto.
        }else{
            // Oculto el tooltip.
            tool.classList.remove('abierto');
            open = false;
            // Quito el evento que hace que al hacer click en cualquier parte del document se cierre el tooltip.
            document.removeEventListener('click', ocultar);
        }
    });

    // Función para ocultar el tooltip si hago click en cualquier parte del document.
    function ocultar () {
        // Oculto el tooltip.
        tool.classList.remove('abierto');
        open = false;
        // Quito el evento para que no gaste tantos recursos del computador.
        document.removeEventListener('click', ocultar);

        console.log('Click en cualquier parte y oculto el Tooltip');
    }

}








