(function ($) {
    "use strict";

    /*----------------------------
       		Sweetalert Initialize
       	------------------------------*/
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    /*----------------------------
       		Settings Form Submit
       	------------------------------*/
    $('#settingsform').on('submit',function(e){
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
                $('.basicbtn').html('Submit');
                if(response.errors)
                {
                    Toast.fire({
                        icon: 'error',
                        title: response.errors
                    })
                }else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Settings Updated'
                    })
                }
            },
            error: function(xhr, status, error) 
            {
                $('.basicbtn').removeAttr('disabled')
                $('.errorarea').show();
                $('.basicbtn').html('Submit');
                $.each(xhr.responseJSON.errors, function (key, item) 
                {
                    $("#errors").html("<li class='text-danger'>"+item+"</li>")
                });
                errosresponse(xhr, status, error);
            }
        })
    });

})(jQuery);