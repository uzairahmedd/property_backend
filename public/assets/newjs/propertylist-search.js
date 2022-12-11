"use strict";


/****************************************************************
 * Selector plug that made select tag in to custome select style *
 *****************************************************************/
(function ($) {
    $.fn.selectstyle = function (option) {
        var defaults = {
            width: 250,
            height: 300,
            theme: 'light'
        },
            setting = $.extend({}, defaults, option);
        this.each(function () {
            var $this = $(this),
                parent = $(this).parent(),
                html = '',
                html_op = '',
                search = $this.attr('data-search'),
                name = $this.attr('name'),
                style = $this.attr('style'),
                placeholder = $this.attr('placeholder'),
                id = $this.attr('id');
            setting.width = (parseInt($this.attr('width') == null ? $this.width() : $this.attr('width')) + 10) + 'px';
            setting.theme = $this.attr('theme') != null ? $this.attr('theme') : setting.theme;

            $this.find('option').each(function (e) {
                var $this_a = $(this),
                    val = $this_a.val(),
                    // span_val = $(this).find('span').text();
                    image = $this_a.attr('data-image'),
                    text = $this_a.html();
                if (val == null) {
                    val = text;
                }
                html_op += '<li data-title="' + text + '" value="' + val + '"';
                if ($this_a.attr('font-family') != null) {
                    html_op += ' style="font-family' + $this_a.attr('font-family') + '"';
                }
                html_op += '>';
                if (image != null) {
                    html_op += '<div class="ssli_image"><img src="' + image + '"></div>';
                }
                html_op += '<div class="ssli_text" style="">' + text + '</div></li>';
            });
            $this.hide();

            html =
                '<div class="selectstyle ss_dib ' + setting.theme + '" style="width:' + parseInt(setting.width) + 'px;">' +
                '<div id="select_style" class="ss_button" style="width:' + parseInt(setting.width) + 'px;' + style + '">' +
                '<div class="ss_dib ss_text" id="select_style_text" style="margin-right:10px;width:' + (parseInt(setting.width) - 20) + 'px;position:relative;">' + placeholder + '</div>' +
                '<div class="ss_dib ss_image"></div>' +
                '</div>';
            if (search == "true") {
                html += '<ul id="select_style_ul" sid="' + id + '" class="ss_ulsearch" style="max-height:' + setting.height + 'px;width:' + (parseInt(setting.width) + 20) + 'px; overflow-x: hidden; z-index: 3;"><div class="search" id="ss_search"><input type="text" placeholder="يبحث"></div><ul style="max-height:' + (parseInt(setting.height) - 53) + 'px;width:' + (parseInt(setting.width) + 20) + 'px; overflow-y: auto;" class="ss_ul">' + html_op + '</ul></ul>';
            } else {

                html += '<ul id="select_style_ul" sid="' + id + '" style="max-height:' + setting.height + 'px;width:' + (parseInt(setting.width) + 20) + 'px; " class="ss_ul">' + html_op + '</ul>';
            }

            html += '</div>';
            $(html).insertAfter($this);

        });

        $("body").delegate("div#ss_search input", "keyup", function (e) {
            var val = $(this).val(), flag = false;
            $('#nosearch').remove();
            $(this).parent().parent().find('li').each(function (index, el) {
                if ($(el).text().indexOf(val) > -1) {
                    $(el).show();
                    flag = true;
                } else {
                    $(el).hide();
                }
            });
            if (!flag) {
                $(this).parent().parent().append('<div class="nosearch" id="nosearch">Nothing Found</div>')
            }
            ;
        });
        $("body").delegate("div#select_style", "click", function (e) {
            $('ul#select_style_ul').hide();
            var ul = $(this).parent('div').find('ul#select_style_ul');
            ul.show();
            // var height = ul.height();
            // var offset = $(this).offset();
            // if (offset.top + height > $(window).height()) {
            //     ul.css({
            //         // marginTop: -(((offset.top+height) - $(window).height()) + 100)
            //     });
            // }
        });


        $("body").delegate("ul#select_style_ul li", "click", function (e) {
            $('#fade').removeClass('add_overlay');
            var txt = $(this).data('title'),
                vl = $(this).attr('value');
            $(this).parents('ul#select_style_ul').hide();
            //for property list page
            $('#property_states_dropdown option').removeAttr('selected', 'selected');
            $('#property_states_dropdown option[value=' + vl + ']').attr('selected', 'selected');
            $(this).parents('ul#select_style_ul').parent('div').find('div#select_style_text').html(txt);
            $('#state').val(vl);
            //call get_properties
            var base_url = $('#base_url').val();
            var url = base_url + 'get_properties_data';
            get_properties(url);

        });

    }
})(jQuery);


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





$(document).ready(function (event) {
    $('.list-complete-btn').click(function (e) {
        e.preventDefault();
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url);
    });


    $('#dropdownMenuLink-buy').click(function (e) {
        $('#fade').addClass('add_overlay');
    });

    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $(".list-rent-dropdown").removeClass("show");
    });

    $('.rent-link').click(function (event) {
        if ($(this).hasClass('active')) {
            let radio_text = $(this).text();
            $('#dropdownMenuLink-buy').text(radio_text);
            let radio_val = $(this).data('value');
            $('#status_list').val(radio_val);
            $('#fade').removeClass('add_overlay');
        }
        event.stopPropagation();
    });


    $('.reset-btn').click(function (e) {
        $('#fade').removeClass('add_overlay');
        e.preventDefault();
    });

    $('.reset-reset-btn').click(function (e) {
        alert('sa');
        $('#fade').removeClass('add_overlay');
        $('#max_price').val('23');
        $('#min_price').val('12');
        e.preventDefault();
    });


    //for nature reset btn
    $('.nature-reset-btn').click(function (e) {
        $('#fade').removeClass('add_overlay');
        $('#category').val('');
        $(".prop-checkbox input[type='checkbox']:checked").removeAttr('checked');
        $('#dropdownMenuLink-property-type').text('النوع');
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url)
        e.preventDefault();
    });

    //for nature reset btn
    $('.room-reset-btn').click(function (e) {
        $('#fade').removeClass('add_overlay');
        $('#room').val('');
        $(".property_radio input[type='checkbox']:checked").map(function () {
            return $(this).removeAttr('checked');
        }).get();
        $(".property_radio input[type='checkbox']:checked").removeAttr('checked');
        $('#dropdownMenuLink-room').text('عدد الغرف');
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url)
        e.preventDefault();
    });



    $('body').css('overflow-x', 'hidden');
    //for rent sale and project filter
    if (status_id != null && status_id != '') {
        var text = $('.rent-all input[value=' + status_id + ']').attr("data-title");
        $('#dropdownMenuLink-buy').text(text);
    }

    //for property nature
    if (category != null && category != '') {
        var text = $('.prop-checkbox input[value=' + category + ']').attr("data-name");
        $('#dropdownMenuLink-property-type').text('');
        $("#dropdownMenuLink-property-type").width($("#dropdownMenuLink-property-type").width() + 50);
        $('#dropdownMenuLink-property-type').text(text);
    }

    $('.search-input-bar').click(function () {
        $('#fade').addClass('add_overlay');
        $('.overlay').css('z-index', '1');
        $('.search-input-bar').css('z-index', '1');
    });

    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $("#select_style_ul").css('display', 'none');
        event.stopPropagation();
    });



    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $("ul.list-rent-dropdown").removeClass('show');
        $('.search-input-bar').css('z-index', 'unset');
        event.stopPropagation();
    });

    $('#dropdownMenuLink-property-type').click(function () {
        $('#fade').addClass('add_overlay');
        $('.overlay').css('z-index', '1');
        $('.search-input-bar').css('z-index', 'unset');
    });


    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $("ul.type-dropdown").removeClass('show');
        $('.search-input-bar').css('z-index', 'unset');
        event.stopPropagation();
    });

    $('.budget-btn').click(function () {
        $('#fade').addClass('add_overlay');
        $('.overlay').css('z-index', '1');
        $('.search-input-bar').css('z-index', 'unset');
    });

    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $("ul.budget-dropdown").removeClass('show');
        event.stopPropagation();
    });

    $('.room-btn').click(function () {
        $('#fade').addClass('add_overlay');
        $('.overlay').css('z-index', '1');
        $('.search-input-bar').css('z-index', 'unset');
    });

    $('.overlay').click(function (event) {
        $('#fade').removeClass('add_overlay');
        $("ul.room-dropdown").removeClass('show');
        event.stopPropagation();
    });

    $('.complete-btn').click(function (e1) {
        e1.preventDefault();
        $('#fade').removeClass('add_overlay');
        $(".new-rent-dropdown").removeClass("show");

    });

    $('.room-type-drop').click(function (e) {
        $('#fade').addClass('add_overlay');
        $("ul.list-rent-dropdown").removeAttr('style');
    });

    $("#room_studio").click(function (event) {
        if ($("#room_studio").is(":checked")) {
            var radio_val = $(".room_studio").text();
            var txt = $('#').text(radio_val);
            $('#fade').removeClass('add_overlay');
            event.stopPropagation();
        }
    });


    //for propery type dropdown
    $("#nature_btn").click(function (e) {
        $("#dropdownMenuLink-property-type").css('width', '100px');
        var shortname = $(".prop-checkbox input[type='checkbox']:checked").map(function () {
            return $(this).attr("data-name");
        }).get().join(', ');

        if (shortname == '') {
            shortname = 'النوع';
        }

        if (shortname.length > 15) {
            shortname = shortname.substring(0, 15) + " ...";
        }
        $('#dropdownMenuLink-property-type').text('');
        $("#dropdownMenuLink-property-type").width($("#dropdownMenuLink-property-type").width() + 100);
        $('#dropdownMenuLink-property-type').text(shortname);
        $('#fade').removeClass('add_overlay');
        $("ul.type-dropdown").removeClass('show');

        //for setting value
        var value = $(".prop-checkbox input[type='checkbox']:checked").map(function () {
            return $(this).val();
        }).get().join(',');
        $('#category').val(value);
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url)
        e.preventDefault();
        return false;
    });


    //for propery room dropdown
    $("#room_btn").click(function (e) {
        var shortname = $(".property_radio input[type='checkbox']:checked").map(function () {
            return $(this).val();
        }).get().join(',');

        $('#dropdownMenuLink-room').text('');
        $('#dropdownMenuLink-room').text(shortname);
        $('#fade').removeClass('add_overlay');
        $("ul.room-dropdown").removeClass('show');

        //for setting value
        $('#room').val(shortname);
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url)
        e.preventDefault();
        return false;
    });


    $("#price_btn").click(function (e) {

        $('#fade').removeClass('add_overlay');
        $("ul.budget-dropdown").removeClass('show');
        var base_url = $('#base_url').val();
        var url = base_url + 'get_properties_data';
        get_properties(url)
        e.preventDefault();
        return false;
    });

});






/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url = base_url + 'get_properties_data';
get_properties(url)
function get_properties(url) {
    $('.propertly-list-banner').addClass('hide');
    $.ajax({
        type: 'get',
        url: url,
        data: $('.search_form').serialize(),
        dataType: 'json',
        beforeSend: function () {
            $('.results').text('');
            $('#item_list').html('');
            $('#second_item_list').html('');
            $('.loaderInner').fadeIn();
            $('#load_cover').fadeIn('slow');
        },
        complete: function () {
            $('.loaderInner').fadeOut();
            $('#load_cover').fadeOut('slow');
        },
        success: function (response) {
            $('#fade').removeClass('add_overlay');
            $('.results').text(response.data.length);
            $('.property_placeholder').remove();
            if (response.data.length == 0) {
                $('.show-pagination-info').hide();

                $('#item_list').html('<div class="col-12 no-more"><h3 class="text-center">No data avaiable</h3></div>');

            } else {
                $('.show-pagination-info').show();
                $('.no-more').remove();
                properties_list('#item_list', response.data);
            }


            if (response.from == null) {
                var from = 0;
            }
            else {
                var from = response.from;
            }

            if (response.total == null) {
                var total = 0;
            }
            else {
                var total = response.total;
            }

            $('#from').html(from);
            $('#to').html(response.to);
            $('#total').html(total);
            if (response.links.length > 3) {
                render_pagination('.pagination', response.links);
            }
        }
    })
}




/*---------------------
        Data Render
    -------------------------*/
function properties_list(target, data) {
    $(target).html('');
    $('.results').text();
    $('.results').text(data.length);
    var base_url = $('#base_url').val();
    var asset_url = base_url;
    var image = '';
    var html = '';
    var status = '';
    var user_data = '';
    var phone = '';
    var title = '';
    var location = '';
    var floor_name = '';
    var htmls = '';
    var sq_feet = '';
    var price='';
    $.each(data, function (index, value) {

        favourite_property_check(value.id);
        if (value.post_preview != null) {
            image = value.post_preview.media.url;
        } else {
            image = base_url + 'uploads/default.png';
        }

        if (value.property_status_type != null) {
            status = value.property_status_type.category.name;
        }
        if (value.user.usermeta != null) {
            user_data = JSON.parse(value.user.usermeta.content);
            phone = user_data.phone;
        } else {
            phone = 'N/A';
        }

        if (index == '8') {
            $('.propertly-list-banner').removeClass('hide');
            $('.second_container').addClass('last-property-list');
            target = '#second_item_list';
        }
        
        if(value.price != null){
            price=value.price.price;
        }
        else{
            price='N/A';
        }

        title = str_limit(value.title, 20, true);
        location = value.post_city.value + '-' + value.post_city.category.name;
        $(target).append('<div class="col-lg-3 col-md-4 col-sm-12 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="' + asset_url + 'property-detail/' + value.slug + '"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"> <img src="assets/images/mobile-icon.png" alt="" data-toggle="tooltip" title="' + phone + '"></div><div class="whatsapp d-flex justify-content-center align-items-center"><a href="https://api.whatsapp.com/send?text=' + asset_url + 'property-detail/' + value.slug + '" target="_blank"> <img  src="assets/images/whatsapp-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + new_amount_format(price) + ' </span></h3></div> </div></div></div></div></div>');

        if(value.area != null){
            floor_name = value.area.type + " in sqm";
            sq_feet = value.area.content + " sqm";
        }
       

        htmls = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + sq_feet + '</span></p><img src="assets/images/area-icon.png" alt="" data-toggle="tooltip"  title="' + floor_name + '"></div>';
        $('.facilities_area' + index).append(htmls);
        //for facilities
        $.each(value.featured_option, function (i, v) {
            var imgg = '';
            var name = '';
            var quantity = '';
            if (v.featured_category != null && v.featured_category.name == 'Bathrooms') {
                imgg = 'assets/images/bath-icon.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            } else if (v.featured_category != null && v.featured_category.name == 'Bedrooms') {
                imgg = 'assets/images/bed-icon.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'Parking') {
                imgg = 'assets/images/parking.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'lounges') {
                imgg = 'assets/images/lunch.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'Boards') {
                imgg = 'assets/images/board-room.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }

        });


    });
}



/*---------------------------
        Favourite Check
    ------------------------------*/
function favourite_property_check(id) {
    var url = $("#favourite_check_url").val();
    $.ajax({
        url: url,
        data: { id: id },
        type: "GET",
        dataType: "HTML",
        success: function (response) {
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


/*-------------------------------------
        Properties Pagination Render
    -----------------------------------------*/
function render_pagination(target, data) {
    $('.page-item').remove();
    $.each(data, function (key, value) {
        if (value.label === '&laquo; Previous') {
            if (value.url === null) {
                var is_disabled = "disabled";
                var is_active = null;
            }
            else {
                var is_active = 'page-link-no' + key;
                var is_disabled = 'onClick="PaginationClicked(' + key + ')"';
            }
            var html = '<li  class="page-item"><a ' + is_disabled + ' class="page-link pagination-link ' + is_active + '" href="javascript:void(0)" data-url="' + value.url + '"><i class="fas fa-long-arrow-alt-left"></i></a></li>';
        }
        else if (value.label === 'Next &raquo;') {
            if (value.url === null) {
                var is_disabled = "disabled";
                var is_active = null;
            }
            else {
                var is_active = 'page-link-no' + key;
                var is_disabled = 'onClick="PaginationClicked(' + key + ')"';
            }
            var html = '<li class="page-item"><a ' + is_disabled + '  class="page-link pagination-link ' + is_active + '" href="javascript:void(0)" data-url="' + value.url + '"><i class="fas fa-long-arrow-alt-right paginate-arrow"></i></a></li>';
        }
        else {
            if (value.active == true) {
                var is_active = "active";
                var is_disabled = "disabled";
                var url = null;

            }
            else {
                var is_active = 'page-link-no' + key;
                var is_disabled = 'onClick="PaginationClicked(' + key + ')"';
                var url = value.url;
            }
            console.log(value.label);
            var html = '<li class="page-item"><a class="page-link pagination-link ' + is_active + '" ' + is_disabled + ' href="javascript:void(0)" data-url="' + url + '">' + value.label + '</a></li>';
        }
        if (value.url !== null) {
            $(target).append(html);
        }
    });
}

/*-------------------------------------
        Pagination Clicked Function
    -----------------------------------------*/
function PaginationClicked(key) {
    var url = $('.page-link-no' + key).data('url');
    get_properties(url);
}

