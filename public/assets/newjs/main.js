$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        responsiveClass: true,
        margin: 20,
        dots: false,
        loop: true,
        responsive: {
            0: {
                items: 1,
                loop: true
                // nav:true
            },
            600: {
                items: 2,
                nav: false
            },
            992: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    })
});


// Multiimages Crousel

$(document).ready(function () {
    $("#myCarousel").carousel({
        interval: 1000000000
    });
});


// jquery for dropdown button start
$(document).ready(function (event) {
    $('#dropdownMenuLink-home').click(function (e) {
        $('.home_fade').addClass('add_overlay');
    });
});


$('.rent-link').click(function () {
    if ($(this).hasClass('active')) {
        let radio_text = $(this).text();
        $('#dropdownMenuLink-home').text(radio_text);
        let radio_val = $(this).data('value');
        $('#status').val(radio_val);
    }
});


$('.nav-sale').click(function () {
    if ($(this).hasClass('active')) {
        let radio_text = $(this).text();
        $('#dropdownMenuLink-buy').text(radio_text);
        let radio_val = $(this).data('value');
        $('#status_list').val(radio_val);

    }
});

$('.list-complete-btn').click(function (e) {

    e.preventDefault();
    var base_url = $('#base_url').val();
    var url = base_url + 'get_properties_data';
    get_properties(url);
});

$('.home-complete-btn').click(function (e) {
    $('.home_fade').removeClass('add_overlay');

    e.preventDefault();
});
$('.reset-btn').click(function (e) {
    $('.home_fade').removeClass('add_overlay');

    e.preventDefault();
});

$('#nav-tab-main a').click(function (e) {
    var val = $(this).attr('data-id');
    $('#parent_category').val(val);
});


$("#list_radio_01").click(function (event) {
    if ($("#list_radio_01").is(":checked")) {
        var radio_val = $(".sale_list").text();
        $('#dropdownMenuLink-buy').text(radio_val);
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    }
});


$("#list_radio_02").click(function (event) {
    if ($("#list_radio_02").is(":checked")) {
        var radio_val = $(".rent_list").text();
        $('#dropdownMenuLink-buy').text(radio_val);
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    }
});


$(document).ready(function () {
    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
    });
});
// jquery for dropdown button End


// jquery for selection dropdown start
$(document).ready(function () {
    $('.rent-select').click(function () {
        $('.overlay').css('z-index', '999');
    });
});
//


$(document).ready(function () {

    $('.resident-tabs .resident-link').click(function (e) {
        e.stopPropagation();
    });

    $('.rent-tabs .rent-link').click(function (e) {
        e.stopPropagation();
    });

    $('.resident-pan').on('click', function (event) {
        $(".resident-pan").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".resident-pan.selected").text();
        var val = $(this).val();
        $('#category').val(val);
        $("#dropdownMenuLink1").html(drop_text);
        $('.resident-pan.selected').css({
            "margin-bottom": "0px",
            "margin-top": "10px",
            "border": "none",
            "padding": "0px 20px 0 35px;"
        });
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".resident-dropdown").removeClass("show");
        event.stopPropagation();
    });

    $('.rent-pan').on('click', function (event) {
        $(".resident-pan").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".resident-pan.selected").text();
        $("#dropdownMenuLink1").html(drop_text);
        $('.resident-pan.selected').css({
            "margin-bottom": "0px",
            "margin-top": "10px",
            "border": "none",
            "padding": "0px 20px 0 35px;"
        });
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".resident-dropdown").removeClass("show");
        event.stopPropagation();
    });

    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".resident-dropdown").removeClass("show");
        event.stopPropagation();
    });


});


$("#rent-propertylist-drop").click(function (event) {
    if ($("#rent-propertylist-drop input[type='radio']").is(":checked")) {
        event.stopPropagation();
    }
});
$(document).ready(function (event) {
    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    });
});


// jquery for dropdown button End


// jquery for dropdown button start
$(document).ready(function (event) {
    $('.complete-rent-drop').click(function (e) {
        $("ul.rent-dropdown").removeAttr('style');
    });
});

$(document).ready(function (event) {
    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    });
});
// jquery for dropdown button End


// jquery for dropdown button start
$(document).ready(function (event) {
    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".new-rent-dropdown").removeClass("show");
        event.stopPropagation();
    });

    $('.overlay').click(function (e) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".new-rent-dropdown").removeClass("show");

    });

    $('.rent-all').click(function (e) {
        e.stopPropagation();
    });

    $('.complete-btn').click(function (e1) {
        e1.preventDefault();
        $('#fade').css('opacity', 0);
        $('#fade').css('display', 'none');
        $(".new-rent-dropdown").removeClass("show");

    });

});
// jquery for dropdown button End


// Property Type Dropdown Selection Start
$(document).ready(function (event) {
    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".type-dropdown").removeClass("show");
        event.stopPropagation();
    });

});
// Property Type Dropdown End

// Room Dropdown Selection Start
$(document).ready(function (event) {

    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".room-type-drop").removeClass("show");
        event.stopPropagation();
    });

});
// Room Dropdown End

// Range Dropdown Js
// const rangeInput = document.querySelectorAll(".range-input input"),
//     priceInput = document.querySelectorAll(".price-input input"),
//     range = document.querySelector(".slider .progress");
// let priceGap = 1000;

// priceInput.forEach((input) => {
//     input.addEventListener("input", (e) => {
//         let minPrice = parseInt(priceInput[0].value),
//             maxPrice = parseInt(priceInput[1].value);

//         if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
//             if (e.target.className === "input-min") {
//                 rangeInput[0].value = minPrice;
//                 range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
//             } else {
//                 rangeInput[1].value = maxPrice;
//                 range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
//             }
//         }
//     });
// });

// rangeInput.forEach((input) => {
//     input.addEventListener("input", (e) => {
//         let minVal = parseInt(rangeInput[0].value),
//             maxVal = parseInt(rangeInput[1].value);

//         if (maxVal - minVal < priceGap) {
//             if (e.target.className === "range-min") {
//                 rangeInput[0].value = maxVal - priceGap;
//             } else {
//                 rangeInput[1].value = minVal + priceGap;
//             }
//         } else {
//             priceInput[0].value = minVal;
//             priceInput[1].value = maxVal;
//             range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
//             range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
//         }
//     });
// });


/*---------------------------
        Favourite Check
    ------------------------------*/
function home_favourite_property_check(id) {
    var url = $("#favourite_check_url").val();
    $.ajax({
        url: url,
        data: {id: id},
        type: "GET",
        dataType: "HTML",
        success: function (response) {
            console.log(response);
            if (response == 'ok') {
                $('.heart' + id).removeClass('fa-regular');
                $('.heart' + id).addClass('fa-solid');
            } else {
                $('.heart' + id).removeClass('fa-solid');
                $('.heart' + id).addClass('fa-regular');

            }
        }
    });
}





