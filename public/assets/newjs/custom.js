
/*-----------------------------
    Properties Data Get for rent properties
--------------------------------*/
// Rent_properties();
// Sell_properties();
// function Rent_properties()
// {
//     var url = $('#rent_properties').val();
//     var rent_status=$('#rent_status').val();
//     $.ajax({
//         type: 'get',
//         url: url,
//         data: {'status':rent_status},
//         dataType: 'json',
//         // beforeSend: function(){
//         //     before_render_list_col_4('#latest_data',3);
//         // },
//         success: function(response){
//             console.log(response);
//             render_list_carousal('#rent_feature',response);

//         }
//     })
// }


// function render_list_carousal(target,data){
//     console.log(data);
//     console.log('dsa');
//     var base_url = $('#base_url').val();
//     $(target).html('');
//     console.log(data.length);
//     $.each(data, function(index, value){
//         if(value.post_preview != null)
//         {
//             var image = value.post_preview.media.url;
//         }else{
//             var image = base_url+'/uploads/default.png';
//         }

//         var asset_url = $('#base_url').val();
//         var title=str_limit(value.title,20,true);
//         var location = str_limit(value.post_city.value,35,true);
//         $(target).append('<div class="listing"><div class="list" style="background: url(/assets/images/list.png);  background-size: cover; background-repeat: no-repeat;  border-radius: 8px;"> <div class="content d-flex justify-content-between"><div class="d-flex flex-column align-items-start theme-text-white"><div class="sale theme-bg-sky"><span class="font-medium">للبيع</span></div><div class="sale theme-bg-blue"><span class="font-medium">متاح</span> </div> </div><div class="fav-elipse d-flex align-items-center justify-content-center"><img src="{{theme_asset("assets/images/heart.svg")}}" alt=""></div></div><div class="price theme-text-white d-flex align-items-center justify-content-center"><span class="font-bold">'+value.min_price.price+' - '+value.max_price.price+' مليون ر.س</span></div></div><div class="mt-3"><a href="'+asset_url+'property/'+value.slug+'"><h3 class="font-medium theme-text-blue">'+title+'</h3> </a><div class="d-flex align-items-start justify-content-end pt-2"><p class="mb-0 theme-text-seondary-black me-2">'+location+'</p><img src="{{theme_asset("assets/images/location.png")}}" alt=""></div></div></div>');
//     });
// }

// function Sell_properties()
// {
//     var url = $('#sell_properties').val();
//     var sell_status=$('#sale_status').val();
//     console.log(rent_status);
//     $.ajax({
//         type: 'get',
//         url: url,
//         data: {'status':sell_status},
//         dataType: 'json',
//         // beforeSend: function(){
//         //     before_render_list_col_4('#latest_data',3);
//         // },
//         success: function(response){
//             console.log(response);
//             // var asset_url = $('#base_url').val();
//             // render_list_col_4('#latest_data',response.data);

//         }
//     })
// }


// /*----------------------
//         Content Limit
//     --------------------------*/
//     function str_limit(text, count, insertDots){
//         return text.slice(0, count) + (((text.length > count) && insertDots) ? "..." : "");
//      }


// jquery for selection dropdown End

(function ($) {
    "use strict";

    /*----------------------------
            Login Form Submit
        -------------------------------*/
    $('#login_form').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.basicbtn').attr('disabled', '');
                $('.basicbtn').html('Please Wait...');
            },
            success: function (response) {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Login');
                location.reload();
            },
            error: function (xhr, status, error) {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Login');
                $.each(xhr.responseJSON.errors, function (key, item) {
                    $('#login_error_msg').html(item);
                });
            }
        })
    });

    /*----------------------------
            Register Form Submit
        -------------------------------*/
    $('#register_form').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('.basicbtn').attr('disabled', '');
                $('.basicbtn').html('Please Wait...');
            },
            success: function (data) {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Register');
                console.log(data);
                //for success page
                if (data.status == 'success') {
                    window.location.href = data.data['url'];
                }
                //for error page
                else if (data.status == 'error') {
                    if (data.data['name']) {
                        $('#reg_name_notification').text(data.data['name']);
                    }
                    if (data.data['phone']) {
                        $('#reg_mobile_notification').text(data.data['phone']);
                    }
                    if (data.data['email']) {
                        $('#reg_email_notification').text(data.data['email']);
                    }
                    if (data.data['password']) {
                        $('#reg_password_notification').text(data.data['password']);
                    }
                    if (data.data['term_condition']) {
                        $('#reg_terms_notification').text(data.data['term_condition']);
                    }
                    if (data.data['message']) {
                        $('#errors_msg').html('<span class="error">' + data.data['message'] + '</span>');
                    }
                    setTimeout(function () {
                        $('#reg_name_notification').text('');
                        $('#reg_mobile_notification').text('');
                        $('#reg_email_notification').text('');
                        $('#reg_password_notification').text('');
                        $('#reg_terms_notification').text('');
                        $('#errors_msg').html('<span class="error"></span>');
                    }, 5000);
                }
            }
        })
    });

    //otp verified
    $("#submit_otp").on("click", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#submit_otp").prop('disabled', true);
        $("#submit_otp i").addClass('fa fa-spinner fa-spin ');
        var baseurl = $('#base_url').val();
        var url = baseurl + 'verify_otp';
        $.ajax({
            url: url,
            type: 'post',
            data: $("#verify_otp").serialize(),
            success: function (response) {
                $("#submit_otp").prop('disabled', false);
                $("#submit_otp i").removeClass('fa fa-spinner fa-spin ');
                if (response.status == 'success') {

                    window.location.href = baseurl;

                }
                if (response.status == 'error') {
                    if (response.data['otp']) {
                        $('#otp_error').html('<span class="error">' + response.data['otp'] + '</span>');
                    }
                    setTimeout(function () {
                        $('#otp_error').html('');
                    }, 20000);
                }
            }
        });
    });


    //sending otp 
    $("#resend_otp").on("click", function (e) {
        e.preventDefault();
        $('#error_msg').addClass('d-none')
        $("#resend_otp").prop('disabled', true);
        $("#resend_otp i").addClass('fa fa-spinner fa-spin ');
        var mobile = $('#user_mbl').val();
        var baseurl = $('#base_url').val();
        var url = baseurl + 'resend_otp/' + mobile;
        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                console.log(response);
                $("#resend_otp").prop('disabled', false);
                $("#resend_otp i").removeClass('fa fa-spinner fa-spin ');

                if (response.header_code == 200) {
                    $("#otp4").focus();
                    timer.reset(response.time);
                    timer.mode(0);
                    timer.start(1000);
                    $('#otp_notification').text('OTP send successfully!');
                    $('#otp').val(response.otp);

                }
                if (response.header_code != 200) {
                    $('#otp_error').html('Something went wrong!');
                }
            }
        });
    });



    //update phone 
    $("#update_phone_btn").on("click", function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#update_phone_btn").prop('disabled', true);
        $("#update_phone_btn i").addClass('fa fa-spinner fa-spin ');
        var baseurl = $('#base_url').val();
        var url = baseurl + 'modify_phone';
        $.ajax({
            url: url,
            type: 'post',
            data: $("#update_phone").serialize(),
            success: function (response) {
                $("#update_phone_btn").prop('disabled', false);
                $("#update_phone_btn i").removeClass('fa fa-spinner fa-spin ');
                if (response.status == 'success') {

                    window.location.href = response.data['url'];

                }
                if (response.status == 'error') {
                    if (response.data['phone']) {
                        $('#phone_error').html('<span class="error">' + response.data['phone'] + '</span>');
                    }
                    setTimeout(function () {
                        $('#phone_error').html('');
                    }, 20000);
                }
            }
        });
    });

})(jQuery);

