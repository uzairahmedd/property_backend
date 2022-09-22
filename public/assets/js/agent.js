(function ($) {
    "use strict";
    
    /*------------------------------
            Sweetalert Initialize
        --------------------------------*/
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

    /*---------------------------------
            Property Load More Data
        -----------------------------------*/
    $('#property_load_more').on('click',function(){
        page++;
        $('#property_load_more').html('Please Wait...');
        agent_properties();
    });


    /*---------------------------------
            Reviews Load More Data 
        ------------------------------------*/
    $('#review_load_more').on('click',function(){
        $('#review_load_more').html('Please Wait...');
        reviewpage++;
        get_reviews();
    });

    /*-------------------------------------
            Inquiryform Ajax Form Submit 
        ----------------------------------------*/
    $('.inquiryform').on('submit',function(e){
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

/*-----------------------------------
        Agent Properties Data Get
    -------------------------------------*/
var page = 1; 
agent_properties();
function agent_properties()
{
    var url = $('#my_properties_url').val();
    $.ajax({
        type: 'get',
        url: url+'?page=' + page,
        dataType: 'json',
        beforeSend: function()
        {
            before_render_list('#agent_property_data',2);
        },
        success: function(response){ 
            var asset_url = $('#base_url').val();
            if(response.error)
            {
                $('.property_placeholder').remove();
                $('.agent-property-load-more').html('<p>'+response.error+'</p>');
                $('#property_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Property');
            }else{
                
                render_list('#agent_property_data',response.data);

                $('#property_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Property');
            }
           
        }
    })
}


/*-------------------------
        Reviews Data Get
    -----------------------------*/
var reviewpage = 1; 
get_reviews();
function get_reviews()
{
    var url = $('#reviews_data_url').val();
    var user_id = $('#property_agent_id').val();
    $.ajax({
        type: 'get',
        url: url+'?page=' + reviewpage,
        data: {user_id: user_id},
        dataType: 'json',
        success: function(response){ 
            if(response.error)
            {
                $('.review-see-more').html('<p>No Data Found</p>');
            }else{
                $('#review_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Reviews');
                $.each(response.data, function(index, value){ 
                    $('#reviews_data_load').append('<div class="property-review-single"><div class="review-another-info"><h3>'+value.name+'</h3> <span>'+value.created_at.substr(0,10)+'</span><div class="review-content"><p>'+value.review+'</p></div></div></div>');
                });
            }
        }
    })
}
