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
        $('input[name="otp[]"]').val('');
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
                    $("#otp1").focus();
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


// RTL LTR
$(document).ready(function () {
// localStorage.clear();
    let baseUrl=$('#base_url').val();

    $("#lang").click(function () {
        if ($('#lang').text() == 'English') {
            var url = 'lang/change/' + "?lang=" + 'en';
            $('#lang').text('عربي');
            $.ajax({
                type: "get",
                url: baseUrl + url,
                success: function (data) {
                    //for success
                    if (data.status == 'success') {
                        self.location.reload();
                    }
                }
            });

        } else if ($('#lang').text() == 'عربي') {
            var url = 'lang/change/' + "?lang=" + 'ar';
            $('#lang').text('English');
            $.ajax({
                type: "get",
                url: baseUrl + url,
                success: function (data) {
                    //for success
                    if (data.status == 'success') {
                        self.location.reload();
                    }
                }
            });
        }
    });
});

// Scroll To Top
function scrollToTop() {

    window.scrollTo({top: 0, behavior: 'smooth'});

}
