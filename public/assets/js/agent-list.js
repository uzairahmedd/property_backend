(function ($) {
    "use strict";
    
    /*------------------------------
            Agents Load More Data
        --------------------------------*/
    $('#agent_load_more').on('click',function(){
        $('#agent_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> Please Wait...');
        page++;
        getAgents();
    });

})(jQuery);

/*-------------------------
        Agents Data Get
    ----------------------------*/
var page = 1;
getAgents();
function getAgents()
{
    var url = $('#agent_list_data_url').val();
    $.ajax({
        type: 'get',
        url: url+'?page='+page,
        dataType: 'json',
        success: function(response){ 
            var asset_url = $('#base_url').val();
            if(response.error)
            {
                $('.agent-load-more').html('<p>No Data Found</p>');
            }else{
                $('#agent_load_more').html('<span class="iconify" data-icon="ri:arrow-down-circle-line" data-inline="false"></span> See More Agents');
                $.each(response.data, function(index, value){ 
                    var data = JSON.parse(value.usermeta.content);
                    $('#agents_data').append('<div class="col-lg-4 mb-30"><div class="single-agent"><div class="agent-img text-center"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'"> <img src="'+value.avatar+'" alt=""> </a></div><div class="agent-content text-center"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'"><h2>'+value.name+'</h2></a><div class="agent-number-info"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'">View Profile</a></div><div class="agent-number-info"> <span>'+data.phone+'</span><div class="agent-email"><p>'+value.email+'</p></div></div><div class="agent-social-links"><nav><ul><li><a href="'+data.facebook+'"><span class="iconify" data-icon="ri:facebook-fill" data-inline="false"></span></a></li><li><a href="'+data.twitter+'"><span class="iconify" data-icon="ri:twitter-fill" data-inline="false"></span></a></li><li><a href="'+data.youtube+'"><span class="iconify" data-icon="ri:youtube-fill" data-inline="false"></span></a></li><li><a href="'+data.linkedin+'"><span class="iconify" data-icon="ri:linkedin-box-fill" data-inline="false"></span></a></li><li><a href="'+data.pinterest+'"><span class="iconify" data-icon="ri:pinterest-fill" data-inline="false"></span></a></li></ul> </nav></div></div></div></div>');
                });
            }
        }
    })
}

