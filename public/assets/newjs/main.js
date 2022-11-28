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
        // pause: hover,
        interval: 1000000000
    });
});


$(document).ready(function () {
    $('#select-drop-btn').change(function () {
        $(window).css('opacity', 0.2);
    });
});

// jquery for dropdown button start
$(document).ready(function (event) {
    $('.complete-rent-drop').click(function (e) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
    });
});
$("#radio02-01").click(function (event) {
    if ($("#radio02-01").is(":checked")) {
        var radio_val = $(".sale_label").text();
        $('#dropdownMenuLink-home').text(radio_val);
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    }
});


$("#radio02-02").click(function (event) {
    if ($("#radio02-02").is(":checked")) {
        var radio_val = $(".rent_label_list").text();
        $('#dropdownMenuLink-home').text(radio_val);
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    }
});

$("#radio03-03").click(function (event) {
    if ($("#radio03-03").is(":checked")) {
        var radio_val = $(".project_label").text();
        $('#dropdownMenuLink-home').text(radio_val);
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
    }
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
        // event.stopPropagation();
    });
});
// jquery for dropdown button End


// jquery for selection dropdown start
$(document).ready(function () {
    $('.rent-select').click(function () {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        $('.overlay').css('z-index', '999');
    });
});
//


$(document).ready(function () {
    $('.complete-resident-drop').on('click', function (event) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
    });

    $('.resident-tabs .resident-link').click(function(e){
        e.stopPropagation();
    });

    $('.rent-tabs .rent-link').click(function(e){
        e.stopPropagation();
    });

    $('.resident-pan').on('click', function (event) {
        $(".resident-pan").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".resident-pan.selected").text();
        $("#dropdownMenuLink1").html(drop_text);
        // $('#rent-t-icon img').css('margin-top','10px');
        $('.resident-pan.selected').css({ "margin-bottom": "0px", "margin-top": "10px", "border": "none", "padding": "0px 20px 0 35px;" });
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
        // $('#rent-t-icon img').css('margin-top','10px');
        $('.resident-pan.selected').css({ "margin-bottom": "0px", "margin-top": "10px", "border": "none", "padding": "0px 20px 0 35px;" });
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



// jquery for dropdown button start
$(document).ready(function (event) {
    $('.complete-rent-drop').click(function (e) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
    });
});
$("#rent-propertylist-drop").click(function (event) {
    if ($("#rent-propertylist-drop input[type='radio']").is(":checked")) {
        // var radio_val = $("#rent-propertylist-drop input[type='radio']:checked").val();
        // $('#dropdownMenuLink3').text(radio_val);
        // $('.overlay').css('opacity', 0);
        // $('.overlay').css('display', 'none');
        // $(".rent-dropdown").removeClass("show");
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
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
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





// $(document).ready(function (event) {
//
//     $(".prop-checkbox").click(function (event) {
//         if($("input[type='checkbox'].checked"))
//         {
//            $('.prop-checkbox').addClass('active-bg-color');
//         }
//     });
// });


// Property Type Dropdown Selection Start
$(document).ready(function (event) {
    $('.property-type-drop').click(function (e) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
    });

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
    $('.room-type-drop').click(function (e) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        // event.stopPropagation();
    });

    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $(".room-type-drop").removeClass("show");
        event.stopPropagation();
    });

});
// Room Dropdown End

// Range Dropdown Js
const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
let priceGap = 1000;

priceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        let minPrice = parseInt(priceInput[0].value),
            maxPrice = parseInt(priceInput[1].value);

        if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
            if (e.target.className === "input-min") {
                rangeInput[0].value = minPrice;
                range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
            } else {
                rangeInput[1].value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            }
        }
    });
});

rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < priceGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap;
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
        }
    });
});


// $("#myButton").each(function(){
//     var id= $(this).data('value');
//     console.log(id);
//     home_favourite_property_check(id);
// });


/*---------------------------
        Favourite Check
    ------------------------------*/
    function home_favourite_property_check(id)
    {
        var url = $("#favourite_check_url").val();
        $.ajax({
            url: url,
            data: { id: id },
            type: "GET",
            dataType: "HTML",
            success: function(response) {
                console.log(response);
                if(response == 'ok')
                {
                    $('.heart'+id).removeClass('fa-regular');
                    $('.heart'+id).addClass('fa-solid');
                }else{
                    $('.heart'+id).removeClass('fa-solid');
                    $('.heart'+id).addClass('fa-regular');

                }
            }
        });
    }


