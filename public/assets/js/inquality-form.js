(function ($) {
    "use strict";
    
    /*----------------------------
            Inquiryform Submit
        -------------------------------*/
    $('#inquiryform').on('submit',function(e){
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
                $('.basicbtn').text('Please Wait...');
            },
            success: function(response){ 
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').text('Send Message');
                if(response.error)
                {
                    
                    $('.alert-danger').show();
                    $('.alert-success').hide();
                    $('.alert-danger').html(response.error);
                }else{
                    
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.alert-success').html('Your message successfully send');


                    document.getElementById("inquiryform").reset();
                }
                
            },
            error: function(xhr, status, error) 
            {
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $.each(xhr.responseJSON.errors, function (key, item) 
                {
                    Sweet('error',item)
                    $("#errors").html("<li class='text-danger'>"+item+"</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

})(jQuery);