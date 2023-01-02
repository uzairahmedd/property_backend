/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url = base_url + 'agent/get_user_properties';
get_properties(url)
function get_properties(url) {
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
                user_properties_list('#user_property_list', response.data);
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
    var district = '';
    var city = '';
    $.each(data, function (index, value) {
        user_favourite_property_check(value.id);
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


        title = str_limit(value.title, 20, true);
        if (locale == 'ar') {
            title = str_limit(value.ar_title, 20, true);
        }

        district = value.post_district.category.name;
        city = value.post_new_city.category.name;
        if (locale == 'ar') {
            district = value.post_district.category.ar_name;
            city = value.post_new_city.category.ar_name;
        }
        location =  district + ', ' + city;
        $(target).append('<div class="col-lg-4 col-md-4 col-sm-6 single-property-list"> <div class="slide single-img-carousel"> <div id="myCarousel' + value.id + '" class="carousel" data-bs-ride="carousel"><div class="features"><div class="d-flex justify-content-between"><div class="content d-flex flex-column align-items-start theme-text-white"><div class="fav-elipse justify-content-center align-items-center theme-bg-blue"><span class="font-medium" onclick="favourite_property(' + value.id + ')"> <i title="favorite property" data-toggle="tooltip" class="fa-regular fa-heart heart' + value.id + '"></i></span></div><div class="sale theme-bg-sky"><span class="font-medium">' + status + '</span> </div></div> <div class="d-flex justify-content-center pt-3">  </div></div> </div><ol class="carousel-indicators"><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="0" class="active"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="1"></li><li data-bs-target="#myCarousel' + value.id + '" data-bs-slide-to="2"></li> </ol> <div class="carousel-inner"><div class="carousel-item active"><img src="' + image + '" class="" alt="Slide 1"></div><div class="carousel-item"> <img src="' + image + '" class="" alt="Slide 2"></div><div class="carousel-item"><img src="' + image + '" class="" alt="Slide 3"></div></div></div><div class="list-container"><div class="mt-3 mb-0"> <a target="_blank" href="' + asset_url + 'property-detail/' + value.slug + '"><h3 class="resident-text">' + title + '</h3><div class="location_property d-flex align-items-start justify-content-end mt-2"><p class="me-2">' + location + '</p><img src="/assets/images/location.png" alt=""></div></a> </div> <div class="amenities"> <div class="d-flex flex-wrap flex-row-reverse justify-content-right align-items-center facilicites-area facilities_area' + index + '"></div></div><div class="price-section mt-2"><div class="d-flex justify-content-between"><div class="social-btn d-flex"><div class="call d-flex justify-content-center align-items-center me-3"><a href="/agent/create_property/' + value.id + '"> <img src="/assets/images/edit-icon.png" alt="" data-toggle="tooltip" title="edit"></a></div><div class="del d-flex justify-content-center align-items-center"><a data-id="' + value.id + '"  onclick="property_del(this)"> <img  src="/assets/images/delete-icon.png" alt=""></a> </div></div> <div class="all-price d-flex justify-content-end align-items-center"> <h3 class="theme-text-secondary-color"><span>' + new_amount_format(value.price.price) + ' </span></h3></div> </div></div></div></div></div>');

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


/**
 * for sweet alert of delete hemayah color
 */
function property_del(elem) {
    var id = $(elem).attr('data-id');
    var base_url = $('#base_url').val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this!",
        showCancelButton: true,
        confirmButtonColor: '#094193',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        showLoaderOnConfirm: true,

        preConfirm: function () {
            return new Promise(function (resolve) {
                $.ajax({
                    type: "get",
                    url: base_url + 'agent/delete_property/' + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                })
                    .done(function (response) {

                        Sweet(response.status, response.messages)
                        var url = base_url + 'agent/get_user_properties';
                        get_properties(url)
                    })
                    .fail(function () {
                        Sweet('error', 'Something went wrong!');
                    });
            });
        },
        allowOutsideClick: false
    });

}
/*-------------------------------
        Sweetalert Message Show
    -----------------------------------*/
function Sweet(icon, title, time = 3000) {

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: icon,
        title: title,
    })
}
