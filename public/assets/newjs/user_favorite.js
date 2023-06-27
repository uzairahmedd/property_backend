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
            $('#favorite_properties_list').html('');
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

                $('#favorite_properties_list').html('<div class="col-12 no-more"><h3 class="text-center">No data avaiable</h3></div>');

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

            $('#user_favorite_from').html(from);
            $('#user_favorite_to').html(response.to);
            $('#user_favorite_total').html(total);
            if (response.links.length > 3) {
                favorite_render_pagination('.pagination', response.links);
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
    var image = '';
    var html = '';
    var status = '';
    var user_data = '';
    var title = '';
    var location = '';
    var floor_name = '';
    var htmls = '';
    var sq_feet = '';
    var price = '';
    var district = '';
    var city = '';
    var slug='';
    $.each(data, function (index, value) {

        user_favourite_property_check(value.id);
        if (value.post_preview != null) {
            image = value.post_preview.media.url;
        } else {
            image = base_url + 'uploads/default.png';
        }

        if (value.property_status_type != null && value.property_status_type.category.name=='Sale') {
            status = 'Buy';
            if (locale == 'ar') {
                status = value.property_status_type.category.ar_name;
            }
        }
        if (value.property_status_type != null && value.property_status_type.category.name=='Rent') {
            status = value.property_status_type.category.name;
            if (locale == 'ar') {
                status =value.property_status_type.category.ar_name;
            }
        }
        if (value.user.usermeta != null) {
            user_data = JSON.parse(value.user.usermeta.content);
            phone = user_data.phone.substring(1);
            phone = "966"+phone;
        } else {
            phone = 'N/A';
        }

        if (value.price != null) {
            price = new_amount_format(value.price.price);
        }else if(value.is_land_block == 1){
            price='Land Block';
            if (locale == 'ar') {
                price = 'قطعة أرض';
            }
        }
         else {
            price = 'N/A';
        }


        title = str_limit(value.title, 40, true);
        if (locale == 'ar') {
            title = str_limit(value.ar_title, 40, true);
        }

        district = value.post_district.district.name;
        city = value.post_new_city.city.name;
        if (locale == 'ar') {
            district = value.post_district.district.ar_name;
            city = value.post_new_city.city.ar_name;
        }
        location =  district + ', ' + city;
        slug= base_url + 'property-detail/' + value.slug ;
        if(value.is_land_block == 1){
            slug= base_url + 'land-block-detail/' + value.slug ;
        }
        $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div>' +
            '<ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li>' +
            '<li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a target="_blank" href="' +slug+ '"><h3 class="resident-text">' + title + '</h3><div class="location_property d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex">' +
            '<div class="dash-call d-flex justify-content-center align-items-center me-3"> <img src="/assets/images/mobile-icon.png" alt="" data-toggle="tooltip" title="' + phone + '"></div><div class="dash-whatsapp d-flex justify-content-center align-items-center"><a href="https://api.whatsapp.com/send?phone=' + phone + '" target="_blank"> <img  src="/assets/images/whatsapp-icon.png" alt="" data-toggle="tooltip" title="'+phone+'"></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + price + ' </span></h3></div> </div></div></div></div></div>');

        if(value.landarea != null){
        floor_name = value.landarea.type + " in SQM";
        sq_feet = value.landarea.content + " SQM";

        htmls = '<div class="area d-flex justify-content-center align-items-start"><p class="theme-text-seondary-black"><span>' + sq_feet + '</span></p><img src="/assets/images/area-icon.png" alt="" data-toggle="tooltip"  title="' + floor_name + '"></div>';
        $('.facilities_area' + index).append(htmls);
        }
        //for facilities
        $.each(value.option_data, function (i, v) {
            var imgg = '';
            var name = '';
            var quantity = '';
            if (v.value != 0) {
                imgg = v.category.preview.content;
                name = v.category.name;
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



/*-------------------------------------
        Properties Pagination Render
    -----------------------------------------*/
    function favorite_render_pagination(target, data) {
        $('.page-item').remove();
        $.each(data, function (key, value) {
            if (value.label === '&laquo; Previous') {
                if (value.url === null) {
                    var is_disabled = "disabled";
                    var is_active = null;
                }
                else {
                    var is_active = 'page-link-no' + key;
                    var is_disabled = 'onClick="user_favorite_PaginationClicked(' + key + ')"';
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
                    var is_disabled = 'onClick="user_favorite_PaginationClicked(' + key + ')"';
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
                    var is_disabled = 'onClick="user_favorite_PaginationClicked(' + key + ')"';
                    var url = value.url;
                }
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
    function user_favorite_PaginationClicked(key) {
        var url = $('.page-link-no' + key).data('url');
        get_favorite_properties(url);
    }
    
