(function ($) {
    "use strict";

    /*----------------------------
        Agency Load More Data
    -----------------------------------*/
    $('#agency_load_more').on('click',function(){
        $('#agency_load_more').html('Please Wait...')
        page++;
        get_agency();
    });

})(jQuery);

/*------------------------
        Agency Data Get
    ----------------------------*/
var page = 1;
get_agency();
function get_agency()
{
    var url = $('#agency_list_data_url').val();
    $.ajax({
        type: 'get',
        url: url+'?page='+page,
        dataType: 'json',
        success: function(response){ 
            var asset_url = $('#base_url').val();
            if(response.error)
            {
                $('.agency-load-more').html('<p>No Data Found</p>');
            }else{
                $('#agency_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Agents');
                $.each(response.data, function(index, value){ 
                    var data = JSON.parse(value.categorymeta.content);
                    $('#agency_lists').append('<div class="col-lg-12 mb-30"><div class="single-agency"><div class="row align-items-center"><div class="col-lg-4"><div class="agency-img"> <a href="'+asset_url+'agency/'+value.slug+'/show'+'"><img class="img-fluid" src="'+value.preview.content+'" alt=""></a></div></div><div class="col-lg-8"><div class="agency-right-content"><div class="agency-name"><h4><a href="'+asset_url+'agency/'+value.slug+'/show'+'">'+value.name+'</a></h4></div><div class="agency-location"> <span class="iconify" data-icon="cil:location-pin" data-inline="false"></span> '+data.address+'</div><div class="agency-content-area"> <nav><ul class="p-0 m-0"><li><strong>Email: </strong>'+data.email+'</li><li><strong>Phone: </strong>'+data.phone+'</li><li><strong>License: </strong>'+data.license+'</li></ul> </nav></div><div class="agency-social-links"> <nav><ul class="p-0 m-0"><li><a href="'+data.facebook+'"><span class="iconify" data-icon="brandico:facebook" data-inline="false"></span></a></li><li><a href="'+data.twitter+'"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span></a></li><li><a href="'+data.instagram+'"><span class="iconify" data-icon="ant-design:instagram-outlined" data-inline="false"></span></a></li><li><a href="'+data.youtube+'"><span class="iconify" data-icon="bx:bxl-youtube" data-inline="false"></span></a></li><li><a href="'+data.linkedin+'"><span class="iconify" data-icon="ant-design:linkedin-filled" data-inline="false"></span></a></li><li><a href="'+data.pinterest+'"><span class="iconify" data-icon="bx:bxl-pinterest" data-inline="false"></span></a></li></ul> </nav></div></div></div></div></div></div>');
                });
            }
        }
    })
}





