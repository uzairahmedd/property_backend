// Property Step Js Start
$(document).ready(function (event) {
    //on by default

    if ($('#tick_div').find('.checkbox-div input:checkbox').is(':checked')) {
        $('#tick_div').find('.checkbox-div input:checked ').parent().addClass('bg-checkbox');
    }
    else {
        $('#tick_div').find('.checkbox-div input:checked ').parent().removeClass('bg-checkbox');
    }

    var $tbl = $('#tick_div');
    var $bodychk = $tbl.find('.checkbox-div input:checkbox');

    $(function () {
        $bodychk.on('change', function () {
            if ($(this).is(':checked')) {
                $(this).closest('checkbox-section').addClass('bg-checkbox');
            }
            else {
                $(this).closest('checkbox-section').removeClass('bg-checkbox');
            }
        });
    });


});

//sidebar active
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


//distrcits slection
function get_already_select_district(city_id) {
    var select_district = $('#please_select_district').text();
    $("#district_val option").remove();
    $('#district_val').select2().append('<option value="" selected>' + select_district + '</option>');
    var baseurl = $('#base_url').val();
    var url = baseurl + 'agent/get_district';
    $.ajax({
        type: 'get',
        url: url,
        data: { 'id': city_id },
        success: function (response) {
            var name = '';
            var select = $('#get_district_val').val();
            $.each(response, function (index, value) {
                name = value.name;
                if (locale == 'ar') {
                    name = value.ar_name;
                }
                $("#district_val").select2().append('<option value="' + value.id + '">' + name + '</option>');
                if (value.id == select) {
                    $("#district_val").select2().val(select).trigger('change');
                }
            });

            var direction = 'rtl';
            if (locale == 'en') {
                direction = 'ltr';
            }
            $('#district_val').select2({
                dir: direction,
            });

        }
    });
}


//for furnishing
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

function tooltip(btn, tool) {
    var btn = document.getElementById(btn);  // El botón.
    var tool = document.getElementById(tool);  // El tooltip.
    var open = false;

    // Evito que se cierre el tooltip si hago click sobre el tooltip.
    tool.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Al hacer click en el botón.
    btn.addEventListener('click', function (event) {
        event.stopPropagation();
        // Si estaba Cerrado.
        if (!open) {
            tool.classList.add('abierto');
            open = true;
            // Cuando hago click en cualquier parte de la página.
            document.addEventListener('click', ocultar);

            // Si estaba abierto.
        } else {
            // Oculto el tooltip.
            tool.classList.remove('abierto');
            open = false;
            // Quito el evento que hace que al hacer click en cualquier parte del document se cierre el tooltip.
            document.removeEventListener('click', ocultar);
        }
    });

    // Función para ocultar el tooltip si hago click en cualquier parte del document.
    function ocultar() {
        // Oculto el tooltip.
        tool.classList.remove('abierto');
        open = false;
        // Quito el evento para que no gaste tantos recursos del computador.
        document.removeEventListener('click', ocultar);
    }

}



// for restarting the animation
window.addEventListener("DOMContentLoaded", () => {
    const replay = document.getElementById("replay");
    let resetTimeout = null;
    let btnTimeout = null;
    // prevent keyboard interaction while the button is hidden
    const tempHideBtn = btn => {
        if (btn) {
            const btnCS = window.getComputedStyle(btn);
            let btnAnimDur = btnCS.getPropertyValue("animation-duration");

            btnAnimDur = +btnAnimDur.split("s")[0] * 1e3;
            btn.disabled = true;

            clearTimeout(btnTimeout);
            btnTimeout = setTimeout(() => {
                btn.disabled = false;
            }, btnAnimDur);
        }
    };

    if (replay) {
        let spinnerEls = [
            "circle",
            "worm-a",
            "worm-b"
        ];
        spinnerEls = spinnerEls.map(e => document.querySelector(`.check-spinner__${e}`));
        // hide the button at start
        tempHideBtn(replay);

        replay.addEventListener("click", function () {
            // kill the animations
            spinnerEls.forEach(e => {
                e.style.animation = "none";
            });
            this.style.animation = "none";

            // restore them, hide the button again
            clearTimeout(resetTimeout);
            resetTimeout = setTimeout(() => {
                spinnerEls.forEach(e => {
                    e.removeAttribute("style");
                });
                this.removeAttribute("style");
                tempHideBtn(this);
            }, 0);
        });
    }
});

/*-------------------------------
     Sweetalert Message Show
 -----------------------------------*/
function Sweet(icon, title, time = 3000) {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: icon,
        title: title,
    })
}

//for total floors arabic to english digit fot total floors
$(document).on('keyup', 'input[name="total_floors"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});
//for total floors arabic to english digit for property floor
$(document).on('keyup', '#interface_val3', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});

//for appartments
$(document).on('keyup', 'input[name="Appartments"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});
//for openings
$(document).on('keyup', 'input[name="Openings"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});
//for offices
$(document).on('keyup', 'input[name="Office"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});
//for total floors arabic to english digit for length
$(document).on('keyup', 'input[name="length"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});
//for total floors arabic to english digit for width
$(document).on('keyup', 'input[name="depth"]', function (e) {
    var val = toEnglishNumber($(this).val())
    $(this).val(val)
});


//form submit validations of third step
$("#additional_detail_btn").click(function () {
    event.preventDefault();
    //for property total floors
    if ($('input[name="total_floors"]').val() == '' || $('input[name="total_floors"]').val() == 'undefined') {
        Sweet('error', 'Please provide total floors!');
        return false;
    }
    //for property  floors
    if ($('#interface_val3').val() == '' || $('#interface_val3').val() == 'undefined') {
        Sweet('error', 'Please provide property floor!');
        return false;
    }
    $("#additional_form").submit();
});

//form submit validations of fifth step of features from
$("#features_btn").click(function () {
    event.preventDefault();
    //for property total floors
    if ($('#length_field').val() == '' || $('#length_field').val() == 'undefined') {
        Sweet('error', 'Please provide Property length!');
        return false;
    }
    //for property  floors
    if ($('#depth_field').val() == '' || $('#depth_field').val() == 'undefined') {
        Sweet('error', 'Please provide property width!');
        return false;
    }
    $("#features_form").submit();
});


/// ******* ADress Add Driver ******//
// var isGoogleAPIEnable = 1;
// var googleURL = 'https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyD8jBzTek9k4TI77XXdBaE9_-FDT0lNFaY&callback=CreateMapAD';
// var locationpickerURL = "/assets/js/locationpicker.jquery.min.js";
// var latLong = {
//     latitude: 24.774265,
//     longitude: 46.738586
// };

// function CreateMapAD() {
//     if (isGoogleAPIEnable == 1) {
//         $('#GoogleMap').locationpicker({
//             location: latLong,
//             zoom: 10,
//             radius: 0,
//             inputBinding: {
//                 streetName: $('#hdnStreet'),
//                 city: $('#hdnCity'),
//                 zipcode: $('#hdnZipCode'),
//                 district: $('#hdnDistrict'),
//                 buildingNo: $('#hdnBuldingNumber'),
//                 locationNameInput: $('#us3-address'),
//                 additionalNo: $('#hdnAdditionalNumber')
//             },
//             enableAutocomplete: true,
//             componentsFilter: 'country:SA'
//         });
//     }
// }

// $('#us6-dialog').on('shown.bs.modal', function () {
//     if (isGoogleAPIEnable == 1) {
//         if ($('#GoogleMap').html() == '') {
//             $.getScript(googleURL)
//                 .done(function (script, textStatus) {
//                     $.getScript(locationpickerURL)
//                         .done(function (script, textStatus) {
//                             CreateMapAD();
//                             SetLocationAD();
//                             $('#GoogleMap').locationpicker('autosize');
//                         })
//                 })
//         }
//     }
// });

// var isManualEdit = false;

// function setNewAddress() {
//     isManualEdit = false;
//     var completeAddress = $('#hdnBuldingNumber').val()
//         + ($('#hdnStreet').val() != "" && $('#hdnStreet').val() != "None" ? ((', ') + $('#hdnStreet').val()) : "")
//         + ($('#hdnDistrict').val() != "" && $('#hdnDistrict').val() != "None" ? ((', ') + $('#hdnDistrict').val()) : "")
//         + ($('#hdnZipCode').val() != "" && $('#hdnZipCode').val() != "None" ? (', ' + $('#hdnZipCode').val()) : "")
//         + ($('#hdnAdditionalNumber').val() != "" && $('#hdnAdditionalNumber').val() != "None" ? (', ' + $('#hdnAdditionalNumber').val()) : "");

//     // $('#DriverHomeAddressCity').val($('#hdnCity').val());
//     $('#DriverHomeAddress').val(completeAddress);
//     $('#us6-dialog').modal('hide');
//     //alert(completeAddress);
// }

// function SetLocationAD() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(function (p) {
//             latLong = {
//                 latitude: p.coords.latitude,
//                 longitude: p.coords.longitude
//             };

//             CreateMapAD();
//         }, function (error) {
//             if (error.code == 1) {
//                 $('#ErrorMessageLocation').show();
//             }
//         }, {
//             enableHighAccuracy: true,
//             timeout: 10000
//         });
//     }
// }

function readURL(input) {
    var baseurl = $('#base_url').val();
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image_user').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#image_user').attr('src', baseurl + 'assets/images/avatar.png');
    }
}

$("#profile_pic").change(function () {
    var ext = $('#profile_pic').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, [ 'PNG','png', 'jpg', 'jpeg']) == -1) {
        Sweet('error', 'invalid image extension!');
        return false;
    }
    readURL(this);
    uploadUserProfileImage();
});

function uploadUserProfileImage() {
    let myForm = document.getElementById('user_save_profile_form');
    let formData = new FormData(myForm);
    var url = $('#user_save_profile_form').attr('action');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        data: formData,
        enctype: 'multipart/form-data',
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        url: url,
        success: function (response) {
            if (response.status == 'success') {
                Sweet('success', "Image uploaded successfully!");
                $('#image_user').attr('src',response.data.imageName);
            }
            if (response.status == 'error') {
                Sweet('error', response.data.image[0]);
            }
        }
    });
}

//profile pic upload page load
defaultImg();
function defaultImg()
{
    var baseurl = $('#base_url').val();
    $.ajax({
        type: 'get',
        url: baseurl + 'agent/profile/img',
        success: function (response) {
            if (response.status == 'success') {
                $('.image_user').attr('src', response.data.imageName);
            }
        }
    });
}










