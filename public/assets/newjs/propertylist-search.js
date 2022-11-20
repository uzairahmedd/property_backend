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
            var height = ul.height();
            var offset = $(this).offset();
            if (offset.top + height > $(window).height()) {
                ul.css({
                    // marginTop: -(((offset.top+height) - $(window).height()) + 100)
                });
            }
        });
        $("body").delegate("ul#select_style_ul li", "click", function (e) {
            var txt = $(this).data('title'),
                vl = $(this).attr('value'),
                sid = $(this).parent('ul').attr('sid');
            $(this).parents('ul#select_style_ul').hide();
            $(this).parents('ul#select_style_ul').parent('div').find('div#select_style_text').html(txt);
            $('#' + sid).children('option').filter(function () {
                return $(this).val() == vl
            }).prop('selected', true).change();
            $('.overlay').css('opacity', 0);
        });
        // $(document).delegate("body", "click", function(e) {
        //     // var clickedOn=$(e.target);
        //     // if(!clickedOn.parents().andSelf().is('ul#select_style_ul, div#select_style')){
        //     //     $('ul#select_style_ul').fadeOut(400);
        //     //     $('div#ss_search').children('input').val('').trigger('keyup');
        //     // }
        //     e.stopPropagation();
        // });
        // $("body").delegate("body", "click", function(e) {
        //
        //     e.stopPropagation();
        // });

        // $('.header img').click(function (event) {
        //     $("#select_style_ul").css("display","none");
        //     event.stopPropagation();
        // });
        //
        // $('.search-input-bar').click(function (event) {
        //     $('.overlay').css('opacity', 0.2);
        //     // $("#select_style_ul").css("display","block");
        //     // event.stopPropagation();
        // });


    }
})(jQuery);

$(document).ready(function (event) {

    $('.search-input-bar').click(function () {
        $('.overlay').css('opacity', 0.2);
        $('.overlay').css('display', 'block');
        $('.overlay').css('z-index', '1');
        $('.search-input-bar').css('z-index', '1');
    });

    $('.overlay').click(function (event) {
        $('.overlay').css('opacity', 0);
        $('.overlay').css('display', 'none');
        $("#select_style_ul").css('display', 'none');
        event.stopPropagation();
    });
});


// Rend or Sale Dropdown Js Start
/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url = base_url + 'get_properties';
get_properties(url)
function get_properties(url) {
    $.ajax({
        type: 'get',
        url: url,
        data: $('.search_form').serialize(),
        dataType: 'json',
        beforeSend: function () {
            $('#item_list').html();
        },
        success: function (response) {
            $('.property_placeholder').remove();
            if (response.data.length == 0) {
                //    $('.show-pagination-info').hide();
                   $('#item_list').html('<div class="col-12 no-more"><h3 class="text-center">No data avaiable</h3></div>');

            }
            else {
                // $('.show-pagination-info').show();
                // $('.no-more').remove();
                properties_list('#item_list', response.data);
            }


            //    if(response.from == null){
            //       var from=0;
            //    }
            //   else{
            //       var from=response.from;
            //    }

            //   if(response.total == null){
            //       var total=0;
            //    }
            //   else{
            //       var total=response.total;
            //    }

            //   $('#from').html(from);
            //   $('#to').html(response.to);
            //   $('#total').html(total);
            //   if(response.links.length > 3) {
            //     render_pagination('.pagination',response.links);
            //    }
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
    // $('.list_renderd').remove();
    var base_url = $('#base_url').val();
    var asset_url = base_url;
    // $('.preloader').remove();
    $.each(data, function (index, value) {
        favourite_check(value.id);
        if (value.post_preview != null) {
            var image = value.post_preview.media.url;
        } else {
            var image = base_url + 'uploads/default.png';
        }

        if (value.property_status_type != null) {
            var status = value.property_status_type.category.name;
        }
        if (value.user.usermeta != null) {
            var user_data = JSON.parse(value.user.usermeta.content);
            var phone = user_data.phone;
        }
        else {
            var phone = 'N/A';
        }

        // var asset_url = $('#base_url').val();
        var title = str_limit(value.title, 20, true);
        var location = value.post_city.value + '-' + value.post_city.category.name + '-' + value.post_state.category.name;
        $(target).append('<div class="col-lg-3 col-md-4 col-sm-12"> <div id="myCarousel' + value.id + '" class="carousel slide" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="' + asset_url + 'property/' + value.slug + '"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex justify-content-between facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"> <img src="assets/images/mobile-icon.png" alt="" data-toggle="tooltip" title="' + phone + '"></div><div class="whatsapp d-flex justify-content-center align-items-center"><a href="https://api.whatsapp.com/send?text=' + asset_url + 'property/' + value.slug + '" target="_blank"> <img  src="assets/images/whatsapp-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + amount_format(value.min_price.price) + ' - ' + amount_format(value.max_price.price) + ' </span></h3></div> </div></div></div></div>');
       
        //for facilities
        $.each(value.featured_option, function (i, v) {
            if (v.featured_category != null && v.featured_category.name == 'Bathrooms') {
                var imgg = 'assets/images/bath-icon.png';
                var name = v.featured_category.name;
                var quantity = v.value;
            }
            else if (v.featured_category != null && v.featured_category.name == 'Bedrooms') {
                var imgg = 'assets/images/bed-icon.png';
                var name = v.featured_category.name;
                var quantity = v.value;
            }


            var html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
            $('.facilities_area' + index).append(html);

        });

        //for floor plan
        $.each(value.floor_plans, function (i, v) {
            if (v.content != null) {
                var floor_content = JSON.parse(v.content);
                var floor_name = floor_content.name;

                var sq_feet = floor_content.square_ft;
            }

            var html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + sq_feet + '</span></p><img src="assets/images/area-icon.png" alt="" data-toggle="tooltip"  title="' + floor_name + '"></div>';
            $('.facilities_area' + index).append(html);

        });

    });
}



