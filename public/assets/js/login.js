(function ($) {
    "use strict";

    /*----------------------------
            Login Form Submit
        -------------------------------*/
    $('#loginform').on('submit',function(e){
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
            processData:false,
            beforeSend: function() {
                $('.basicbtn').attr('disabled','');
                $('.basicbtn').html('Please Wait...');
            },
            success: function(response){ 
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Login');
                location.reload();
            },
            error: function(xhr, status, error) 
            {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Login');
                $.each(xhr.responseJSON.errors, function (key, item) 
                {
                    $('#error_msg').html(item);
                });
            }
        })
    });

    /*----------------------------
            Register Form Submit
        -------------------------------*/
    $('#registerform').on('submit',function(e){
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
            processData:false,
            beforeSend: function() {
                $('.basicbtn').attr('disabled','');
                $('.basicbtn').html('Please Wait...');
            },
            success: function(response){ 
                if(response.errors)
                {
                    $('#error_msg').html(response.errors);
                    $('.basicbtn').removeAttr('disabled');
                    $('.basicbtn').html('Register');
                }else{
                    $('.basicbtn').removeAttr('disabled');
                    $('.basicbtn').html('Register');
                    location.reload();
                }
            },
            error: function(xhr, status, error) 
            {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Register');
                $.each(xhr.responseJSON.errors, function (key, item) 
                {
                    $('#error_msg').html(item);
                });
            }
        })
    });

    /*----------------------
            Modal Hide
        ------------------------*/
    $('.modal-close-btn').on('click',function(){
        $('#login').modal('hide');
    });

    /*----------------------------------------
            Login Btn Class Add and Remove
        -------------------------------------------*/
    $('#login_btn').on('click',function(e){
        e.preventDefault();
        $('.register-section').addClass('d-none');
        $('.login-section').removeClass('d-none');
    });

    /*----------------------------------------
            Register Btn Class Add and Remove
        -------------------------------------------*/
    $('#register_btn').on('click',function(e){
        e.preventDefault();
        $('.register-section').removeClass('d-none');
        $('.login-section').addClass('d-none');
    });

})(jQuery);