$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        responsiveClass: true,
        margin: 10,
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


// jquery for dropdown button start
$(document).ready(function (event) {
    $("#myCarousel").carousel({
        interval: 1000000000
    });
    // rent sale dorpdown
    $('#dropdownMenuLink-home').click(function (e) {
        $('.home_fade').addClass('add_overlay');
    });

        $('.overlay').click(function (event) {
       $('.home_fade').removeClass('add_overlay');
        $(".new-rent-dropdown").removeClass("show");
    });
    //city dropdown
    $('.search-input-bar').click(function () {
        $('.home_fade').addClass('add_overlay');
    });
    $('.overlay').click(function (event) {
        $('.home_fade').removeClass('add_overlay');
        $("#select_style_ul").css('display', 'none');
    });

    //for property nature
    $('#dropdownMenuLink1').click(function () {
        $('.home_fade').addClass('add_overlay');
    });

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
        var val=$(this).val();
        $('#category').val(val);
        $("#dropdownMenuLink1").html(drop_text);
        event.stopPropagation();
    });


    $('.overlay').click(function (event) {
        $('.home_fade').removeClass('add_overlay');
        $(".resident-dropdown").removeClass("show");
        event.stopPropagation();
    });

    $('.overlay').click(function (event) {
        $('.home_fade').removeClass('add_overlay');
        $(".rent-dropdown").removeClass("show");
        event.stopPropagation();
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

$('.complete-btn').click(function (e) {
    $('.home_fade').removeClass('add_overlay');

    e.preventDefault();
});
$('.reset-btn').click(function (e) {
    $('.home_fade').removeClass('add_overlay');

    e.preventDefault();
});

$('#nav-tab-main a').click(function (e) {
  var val=$(this).attr('data-id');
  $('#parent_category').val(val);
});






// $("#rent-propertylist-drop").click(function (event) {
//     if ($("#rent-propertylist-drop input[type='radio']").is(":checked")) {
//         event.stopPropagation();
//     }
// });

// jquery for dropdown button End


// jquery for dropdown button start
// $(document).ready(function (event) {
//     $('.complete-rent-drop').click(function (e) {
//         $("ul.rent-dropdown").removeAttr('style');
//     });
// });

// $(document).ready(function (event) {
//     $('.overlay').click(function (event) {
//         $('.overlay').css('opacity', 0);
//         $('.overlay').css('display', 'none');
//         $(".rent-dropdown").removeClass("show");
//         event.stopPropagation();
//     });
// });
// jquery for dropdown button End


// jquery for dropdown button start
// $(document).ready(function (event) {


//     $('.overlay').click(function (e) {
//         $('.overlay').css('opacity', 0);
//         $('.overlay').css('display', 'none');
//         $(".new-rent-dropdown").removeClass("show");

//     });

//     $('.rent-all').click(function (e) {
//         e.stopPropagation();
//     });

// });
// jquery for dropdown button End





// Property Type Dropdown Selection Start
// $(document).ready(function (event) {
//     $('.overlay').click(function (event) {
//         $('.overlay').css('opacity', 0);
//         $('.overlay').css('display', 'none');
//         $(".type-dropdown").removeClass("show");
//         event.stopPropagation();
//     });

// });
// Property Type Dropdown End

// Room Dropdown Selection Start
// $(document).ready(function (event) {

//     $('.overlay').click(function (event) {
//         $('.overlay').css('opacity', 0);
//         $('.overlay').css('display', 'none');
//         $(".room-type-drop").removeClass("show");
//         event.stopPropagation();
//     });

// });
// Room Dropdown End
