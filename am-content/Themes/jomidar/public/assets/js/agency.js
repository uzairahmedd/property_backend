(function ($) {
    "use strict";

    /*------------------------------
            Sweetalert Initialize
        ----------------------------------*/
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

    /*------------------------------
            Reviews Data Load More
        ---------------------------------*/
    $('#review_load_more').on('click',function(){
        $('#review_load_more').html('Please Wait...');
        reviewpage++;
        get_review();
    });

})(jQuery);

/*--------------------------
       Property Load More
    ------------------------------*/
$('#property_load_more').on('click',function(){
    $('#property_load_more').html('Please Wait...');
    propertypage++;
    get_property();
});

/*------------------------
       Agency Data Get
    ----------------------------*/
getAgents();
function getAgents()
{
    var url = $('#agency_agent_list').val();
    var slug = $('#agency_slug').val();
    $.ajax({
        type: 'get',
        url: url,
        data: {slug: slug},
        dataType: 'json',
        success: function(response){ 
            var asset_url = $('#asset_url').val();
            $.each(response, function(index, value){ 
                var data = JSON.parse(value.user.usermeta.content);
                $('#agents_data').append('<div class="col-lg-4"><div class="single-agent"><div class="agent-img text-center"> <a href="'+asset_url+'agent/'+value.user.slug+'/show'+'"> <img src="'+value.user.avatar+'" alt=""> </a></div><div class="agent-content text-center"> <a href="'+asset_url+'agent/'+value.user.slug+'/show'+'"><h2>'+value.user.name+'</h2></a><div class="agent-number-info"> <a href="'+asset_url+'agent/'+value.user.slug+'/show'+'">View Profile</a></div><div class="agent-number-info"> <span>'+data.phone+'</span><div class="agent-email"><p>'+value.user.email+'</p></div></div><div class="agent-social-links"><nav><ul><li><a href="'+data.facebook+'"><span class="iconify" data-icon="ri:facebook-fill" data-inline="false"></span></a></li><li><a href="'+data.twitter+'"><span class="iconify" data-icon="ri:twitter-fill" data-inline="false"></span></a></li><li><a href="'+data.youtube+'"><span class="iconify" data-icon="ri:youtube-fill" data-inline="false"></span></a></li><li><a href="'+data.linkedin+'"><span class="iconify" data-icon="ri:linkedin-box-fill" data-inline="false"></span></a></li><li><a href="'+data.pinterest+'"><span class="iconify" data-icon="ri:pinterest-fill" data-inline="false"></span></a></li></ul> </nav></div></div></div></div>');
            });
        }
    })
}

/*---------------------------
       Properties Data Get
    ------------------------------*/
var propertypage = 1;
get_property();
function get_property()
{
    var url = $('#agency_property_list').val();
    var slug = $('#agency_slug').val();
    $.ajax({
        type: 'get',
        url: url+'?page=' + propertypage,
        data: {slug: slug},
        dataType: 'json',
        beforeSend: function()
        {
            before_render_list_col_4('#property_append',3);
        },
        success: function(response){ 
            var asset_url = $('#base_url').val();
            if(response.error)
            {
                $('.property_placeholder').remove();
                $('.property-see-more').html('<p>No Data Found</p>');
            }else{
                $('#property_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Property');
                
                render_list_col_4('#property_append',response.data);
            }
        }
    })
}


/*-------------------------
       Reviews Data Get
    ----------------------------*/
var reviewpage = 1;
get_review();
function get_review()
{
    var url = $('#agency_review_url').val();
    var slug = $('#agency_slug').val();
    $.ajax({
        type: 'get',
        url: url+'?page=' + reviewpage,
        data: {slug: slug},
        dataType: 'json',
        success: function(response){ 
            var asset_url = $('#base_url').val();
            $('#review_count').text(response.review_count+' Reviews');
            if(response.error)
            {
                $('.review-see-more').html('<p>No Data Found</p>');
            }else{
                $('#review_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Reviews');
                $.each(response.review_list.data, function(index, value){ 
                    if(value.rating == 1)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 2)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 3)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 4)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
                    }else if(value.rating == 5)
                    {
                        var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li> <li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li></ul> </nav></div>';
                    }
                    $('#reviews_data_load').append('<div class="property-review-single"><div class="review-author-img"><img src="https://ui-avatars.com/api/?name='+value.name+'&size=90&background=274ABB&color=fff" alt=""></div><div class="review-another-info"><h3>'+value.name+'</h3> <span>'+value.created_at.substr(0,10)+'</span>'+rating+'<div class="review-content"><p>'+value.review+'</p></div></div></div>');
                });
            }
        }
    })
}

