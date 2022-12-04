/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url = base_url + 'agent/user_favorite_properties';
get_favorite_properties(url)
function get_favorite_properties(url) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $('.results').text('');
            $('#user_property_list').html('');
            $('.loaderInner').fadeIn();
            $('#load_cover').fadeIn('slow');
        },
        complete: function () {
            $('.loaderInner').fadeOut();
            $('#load_cover').fadeOut('slow');
        },
        success: function (response) {
            $('.overlay').css('opacity', 0);
            $('.overlay').css('display', 'none');
            $('.results').text(response.data.length);
            if (response.data.length == 0) {
                $('.show-pagination-info').hide();

                $('#user_property_list').html('<div class="col-12 no-more"><h3 class="text-center">No data avaiable</h3></div>');

            } else {
                $('.show-pagination-info').show();
                $('.no-more').remove();
                user_properties_list('#favorite_properties_list', response.data);
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

            $('#user_from').html(from);
            $('#user_to').html(response.to);
            $('#user_total').html(total);
            if (response.links.length > 3) {
                user_render_pagination('.pagination', response.links);
            }
        }
    })
}




/*---------------------
        Data Render
    -------------------------*/
function user_properties_list(target, data) {
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
    $.each(data, function (index, value) {

        // user_favourite_property_check(value.id);
        if (value.post_preview != null) {
            image = value.post_preview.media.url;
        } else {
            image = base_url + '/uploads/default.png';
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



        title = str_limit(value.title, 20, true);
        location = value.post_city.value + '-' + value.post_city.category.name;
        $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div>' +
            '<ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li>' +
            '<li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="#"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex">' +
            '<div class="call d-flex justify-content-center align-items-center me-3"> <img src="/assets/images/mobile-icon.png" alt="" data-toggle="tooltip" title="edit"></div><div class="whatsapp d-flex justify-content-center align-items-center"><a href=""> <img  src="/assets/images/whatsapp-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + amount_format(value.price.price) + ' </span></h3></div> </div></div></div></div></div>');

        floor_name = value.area.type + " in sqm";
        sq_feet = value.area.content + " sqm";

        htmls = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + sq_feet + '</span></p><img src="/assets/images/area-icon.png" alt="" data-toggle="tooltip"  title="' + floor_name + '"></div>';
        $('.facilities_area' + index).append(htmls);
        //for facilities
        $.each(value.featured_option, function (i, v) {
            var imgg = '';
            var name = '';
            var quantity = '';
            if (v.featured_category != null && v.featured_category.name == 'Bathrooms') {
                imgg = '/assets/images/bath-icon.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            } else if (v.featured_category != null && v.featured_category.name == 'Bedrooms') {
                imgg = '/assets/images/bed-icon.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'Parking') {
                imgg = '/assets/images/parking.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'lounges') {
                imgg = '/assets/images/lunch.png';
                name = v.featured_category.name;
                quantity = v.value;
                html = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + quantity + '</span></p><img src="' + imgg + '" alt="" data-toggle="tooltip"  title="' + name + '"></div>';
                $('.facilities_area' + index).append(html);
            }
            else if (v.featured_category != null && v.featured_category.name == 'Boards') {
                imgg = '/assets/images/board-room.png';
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
function user_favourite_property_check(id) {
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
