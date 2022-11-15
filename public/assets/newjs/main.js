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
        event.stopPropagation();
    });
});
$("input[type='radio']").click(function (event) {
    if ($("input[type='radio']").is(":checked")) {
        // console.log('aldsfasdf');
        var radio_val = $("input[type='radio']:checked").val();
        $('#dropdownMenuLink').text(radio_val);
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
        event.stopPropagation();
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
// $(document).ready(function (e) {
//     $('select').on('change', function () {
//         $('.overlay').css('opacity', 0);
//         $('.overlay').css('display', 'none');
//         e.stopPropagation();
//     });
// });


$(document).ready(function () {
    $('.complete-resident-drop').on('click', function (event) {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        event.stopPropagation();
    });
    $('.resident-pan').on('click', function (event) {
                $(".resident-pan").removeClass('selected');
            $(this).addClass('selected');
            var drop_text = $( ".resident-pan.selected" ).text();
            $("#dropdownMenuLink1").html($(this).html());
            // $('#rent-t-icon img').css('margin-top','10px');
            $('.resident-pan.selected').css({"margin-bottom": "0px", "margin-top":"10px", "border":"none", "padding":"0px 20px 0 35px;"});
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

    // $('#rent-drop-toggles').click(function()
    // {
    //     $('ul.rent-dropdown').addClass('show');
    // })

});







