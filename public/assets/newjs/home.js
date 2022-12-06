$(document).ready(function () {
    $('.features').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 4000,
        responsive: {
            1000: {
                items: 3,
            }
        }});

    // $('#sale-property-carousel').trigger('refresh.owl.carousel');
});

/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url = base_url + 'home_properties';
get_home_properties(url)

function get_home_properties(url) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function () {
            $('.results').text('');
            $('#home_property_list').html('');
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
            $('.results').text(response.length);

                // console.log(response['sell_property']);
                // if (response['rent_property']) {
                //     rent_properties_list('#rent_property_list', response['rent_property']);
                // }
                if (response['sell_property'].length > 0)
                {
                    // console.log('else in');
                    sell_properties_list('.sale-property-carousel', response['sell_property']);
                }

        }
    })
}

/*---------------------
        Data Render
    -------------------------*/
// function rent_properties_list(target, data) {
//     return false;
//     $(target).html('');
//     $('.results').text();
//     $('.results').text(data.length);
//     var base_url = $('#base_url').val();
//     var asset_url = base_url;
//     var image = '';
//     var html = '';
//     var status = '';
//     var user_data = '';
//     var phone = '';
//     var title = '';
//     var location = '';
//     var floor_name = '';
//     var htmls = '';
//     var sq_feet = '';
//     $.each(data, function (index, value) {
//
//         // user_favourite_property_check(value.id);
//         if (value.post_preview != null) {
//             image = value.post_preview.media.url;
//         } else {
//             image = base_url + '/uploads/default.png';
//         }
//
//         if (value.property_status_type != null) {
//             status = value.property_status_type.category.name;
//         }
//         if (value.user.usermeta != null) {
//             user_data = JSON.parse(value.user.usermeta.content);
//             phone = user_data.phone;
//         } else {
//             phone = 'N/A';
//         }
//
//         title = str_limit(value.title, 20, true);
//         location = value.post_city.value + '-' + value.post_city.category.name;
//         $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="#"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"> <img src="/assets/images/edit-icon.png" alt="" data-toggle="tooltip" title="edit"></div><div class="del d-flex justify-content-center align-items-center"><a href=""> <img  src="/assets/images/delete-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + amount_format(value.price.price) + ' </span></h3></div> </div></div></div></div></div>');
//
//     });
//
// }


/*---------------------
        Data Render
    -------------------------*/
function sell_properties_list(target, data) {
    // console.log(data);
    // return false;
    $(target).html('');
    $('.results').text();
    // $('.results').text(data.length);
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
    var price = '';
    var slug = '';
    $.each(data, function (index, value) {
       price =  value.price.price;
       slug = value.slug;

        // user_favourite_property_check(value.id);
        if (value.post_preview != null) {
            image = value.post_preview.media.url;
        } else {
            image = base_url + '/uploads/default.png';
        }

        if (value.property_status_type != null) {
            status = value.property_status_type.category.name;
        }
        // if (value.user.usermeta != null) {
        //     user_data = JSON.parse(value.user.usermeta.content);
        //     phone = user_data.phone;
        // } else {
        //     phone = 'N/A';
        // }


        // title = str_limit(value.title, 20, true);
        location = value.post_city.value + '-' + value.post_city.category.name;
        // $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="#"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"> <img src="/assets/images/edit-icon.png" alt="" data-toggle="tooltip" title="edit"></div><div class="del d-flex justify-content-center align-items-center"><a href=""> <img  src="/assets/images/delete-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + amount_format(value.price.price) + ' </span></h3></div> </div></div></div></div></div>');
       console.log(location);
        $(target).append('<div class="listing">\n' +
            '\n' +
            '                            <div class="list" style="background-image: url('+image+');">\n' +
            '\n' +
            '                                <div class="content d-flex justify-content-between">\n' +
            '                                    <div class="d-flex flex-column align-items-start theme-text-white">\n' +
            '                                        <div class="sale theme-bg-sky">\n' +
            '                                            <span class="font-medium">للبيع</span>\n' +
            '                                        </div>\n' +
            '                                        <!--<div class="sale theme-bg-blue">\n' +
            '                                                <span class="font-medium">متاح</span>\n' +
            '                                            </div> -->\n' +
            '                                    </div>\n' +
            '                                    <div class="fav-elipse d-flex align-items-center justify-content-center"  onclick="favourite_property('+value.id+')">\n' +
            '                                        <i class="fa-regular fa-heart heart'+value.id+'"  title="Favorite property" data-toggle="tooltip"></i>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="price theme-text-white d-flex align-items-center justify-content-center">\n' +
            '                                    <span class="font-bold">'+price+'</span>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <a href="property-detail/'+slug+'">\n' +
            '                                <div class="mt-3">\n' +
            '                                    <h3 class="font-medium theme-text-blue">'+title+'</h3>\n' +
            '                                    <div class="d-flex align-items-start justify-content-end pt-2">\n' +
            '                                        <p class="mb-0 theme-text-seondary-black me-2">'+location+' </p>\n' +
            '                                        <img src="assets/images/location.png" alt="">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </a>\n' +
            '                        </div></div>');
    });
}




function rent_properties_list(target, data) {
    // console.log(data);
    // return false;
    $(target).html('');
    $('.results').text();
    // $('.results').text(data.length);
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
    var price = '';
    var slug = '';
    $.each(data, function (index, value) {
        price =  value.price.price;
        slug = value.slug;

        // user_favourite_property_check(value.id);
        if (value.post_preview != null) {
            image = value.post_preview.media.url;
        } else {
            image = base_url + '/uploads/default.png';
        }

        if (value.property_status_type != null) {
            status = value.property_status_type.category.name;
        }
        // if (value.user.usermeta != null) {
        //     user_data = JSON.parse(value.user.usermeta.content);
        //     phone = user_data.phone;
        // } else {
        //     phone = 'N/A';
        // }


        // title = str_limit(value.title, 20, true);
        location = value.post_city.value + '-' + value.post_city.category.name;
        // $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a href="#"><h3 class="resident-text">' + title + '</h3><div class="d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"> <img src="/assets/images/edit-icon.png" alt="" data-toggle="tooltip" title="edit"></div><div class="del d-flex justify-content-center align-items-center"><a href=""> <img  src="/assets/images/delete-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + amount_format(value.price.price) + ' </span></h3></div> </div></div></div></div></div>');
        console.log(location);
        $(target).append(' <div class="listing">\n' +
            '                            <div class="list" style="background-image: url('+image+');">\n' +
            '                                <div class="content d-flex justify-content-between">\n' +
            '                                    <div class="d-flex flex-column align-items-start theme-text-white">\n' +
            '                                        <div class="sale theme-bg-sky">\n' +
            '                                            <span class="font-medium">للايجار</span>\n' +
            '                                        </div>\n' +
            '                                        <!-- <div class="sale theme-bg-blue">\n' +
            '                                                <span class="font-medium">متاح</span>\n' +
            '                                            </div> -->\n' +
            '                                    </div>\n' +
            '                                    <div class="fav-elipse d-flex align-items-center justify-content-center" onclick="favourite_property('+value.id+')">\n' +
            '                                        <i class="fa-regular fa-heart heart'+value.id+'" title="Favorite property" data-toggle="tooltip"></i>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="price theme-text-white d-flex align-items-center justify-content-center">\n' +
            '                                    <span class="font-bold">'+price+'</span>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '                            <a href="property-detail/'+slug+'">\n' +
            '                                <div class="mt-3">\n' +
            '                                    <h3 class="font-medium theme-text-blue">'+title+'</h3>\n' +
            '                                    <div class="d-flex align-items-start justify-content-end pt-2">\n' +
            '                                        <p class="mb-0 theme-text-seondary-black me-2">'+location+'</p>\n' +
            '                                        <img src="/assets/images/location.png" alt="">\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </a>\n' +
            '                        </div>');
    });
}


/*---------------------------
        Favourite Check
    ------------------------------*/
function user_favourite_property_check(id) {
    var url = $("#favourite_check_url").val();
    $.ajax({
        url: url,
        data: {id: id},
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

