//for reset button of category
var parent_cat = $('#parent_category').val();
var parent_cat_name = $('#parent_category').data('name');
localStorage.setItem('parent_category', parent_cat);
localStorage.setItem('name_parent_category', parent_cat_name);

//for reset button of rent and sale
var status_cat = $('#status').val();
var status_name = $('#status').data('name');
localStorage.setItem('status', status_cat);
localStorage.setItem('name_status', status_name);

//state dropdown
$(document).ready(function () {
    $('#home_select').hierarchySelect({
        hierarchy: false,
        search: true,
        initialValueSet: true,
        width: '100%',
        height:'130px',
        onChange: function (value) {
            $('#state').val(value);
            $('.home_fade').removeClass('add_overlay');
        }
    });
});



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
    $('.cities-form-control').click(function () {
        $('.home_fade').addClass('add_overlay');
    });
    $('.overlay').click(function (event) {
        $('.home_fade').removeClass('add_overlay');
        // $("#select_style_ul").css('display', 'none');
        $(".hierarchy-select .dropdown-menu").removeClass("show");
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

    $('.complete-resident-drop').click(function (e) {
        // $('#select_style_ul').css('display','none');
        $(".hierarchy-select .dropdown-menu").removeClass("show");
        $('.new-rent-dropdown').removeClass('show');
        e.stopPropagation();
    });
    $('.complete-rent-drop').click(function (e) {
        // $('#select_style_ul').css('display','none');
        $(".hierarchy-select .dropdown-menu").removeClass("show");
        $(".resident-dropdown").removeClass("show");
        e.stopPropagation();
    });



    $('.resident-pan').on('click', function (event) {
        $(".resident-pan").removeClass('selected');
        $(this).addClass('selected');
        var drop_text = $(".resident-pan.selected").text();
        var val = $(this).val();
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
    $(".resident-dropdown").removeClass("show");
    $(".new-rent-dropdown").removeClass("show");

    e.preventDefault();
});

$('.reset_status').click(function (e) {
    $('.home_fade').removeClass('add_overlay');
    $(".new-rent-dropdown").removeClass("show");
    var name = localStorage.getItem('name_status');
    $('#dropdownMenuLink-home').text(name);
    var status = localStorage.getItem('status');
    $('#status').val(status);
    $('.nav-sale').removeClass('active');
    $('.nav-rent').addClass('active');
    e.preventDefault();
});


$('.reset_category').click(function (e) {
    $('.home_fade').removeClass('add_overlay');
    $(".resident-dropdown").removeClass("show");
    $('#category').val('');
    var val = localStorage.getItem('parent_category');
    $('#parent_category').val(val);
    var drop_text = localStorage.getItem('name_parent_category');
    $("#dropdownMenuLink1").html(drop_text);
    e.preventDefault();
});

$('#nav-tab-main a').click(function (e) {
    var val = $(this).attr('data-id');
    $('#parent_category').val(val);
});
