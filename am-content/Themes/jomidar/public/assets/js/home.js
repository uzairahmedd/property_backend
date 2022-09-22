(function ($) {
    "use strict";

    /*------------------------------
			Mailchimp Data Send
		-----------------------------------*/
    $('#mailchimp_form').on('submit',function(e){
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
                $('#footer_right_btn_title').html('Please Wait...');
            },
            success: function(response){
                $('#footer_right_btn_title').html('Subscribed');
            },
            error: function(xhr, status, error)
            {
                $('#footer_right_btn_title').html('Subscribe');
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

    /*------------------------------------
			Slider Property Type Active
		----------------------------------------*/
    $('.slider-menu-area ul li').on('click',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

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

})(jQuery);

/*--------------------------
        Agents Data Get
    -----------------------------*/
getAgents();
function getAgents()
{
    var url = $('#agent_url').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function()
        {
            for (var i = 2; i >= 0; i--) {
                $('#agents_data').append('<div class="col-lg-4"><div class="single-agent placeholder"><div class="agent-img text-center"></div><div class="agent-content text-center"> <a href="#"><h2></h2></a><p></p><div class="agent-number-info"><div class="btn"></div></div><div class="agent-number-info"><div class="phone-number"></div><div class="agent-email"><p></p></div></div><div class="agent-social-links"> <nav><ul><li></li><li></li><li></li><li></li><li></li></ul> </nav></div></div></div></div>');
            }
        },
        success: function(response){
            $('#agents_data').html('');
            var asset_url = $('#base_url').val();
            $.each(response.agents, function(index, value){
                var data = JSON.parse(value.usermeta.content);
                $('#agents_data').append('<div class="col-lg-4"><div class="single-agent"><div class="agent-img text-center"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'"> <img src="'+value.avatar+'" alt=""> </a></div><div class="agent-content text-center"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'"><h2>'+value.name+'</h2></a><div class="agent-number-info"> <a href="'+asset_url+'agent/'+value.slug+'/show'+'">View Profile</a></div><div class="agent-number-info"> <span>'+data.phone+'</span><div class="agent-email"><p>'+value.email+'</p></div></div><div class="agent-social-links"><nav><ul><li><a href="'+data.facebook+'"><span class="iconify" data-icon="ri:facebook-fill" data-inline="false"></span></a></li><li><a href="'+data.twitter+'"><span class="iconify" data-icon="ri:twitter-fill" data-inline="false"></span></a></li><li><a href="'+data.youtube+'"><span class="iconify" data-icon="ri:youtube-fill" data-inline="false"></span></a></li><li><a href="'+data.linkedin+'"><span class="iconify" data-icon="ri:linkedin-box-fill" data-inline="false"></span></a></li><li><a href="'+data.pinterest+'"><span class="iconify" data-icon="ri:pinterest-fill" data-inline="false"></span></a></li></ul> </nav></div></div></div></div>');
            });
        }
    })
}

/*-----------------------------
        Properties Data Get
    --------------------------------*/
featured_properties();
function featured_properties()
{
    var url = $('#f_properties_url').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function(){
            before_render_list_col_4('#latest_data',3);
        },
        success: function(response){
            var asset_url = $('#base_url').val();
            render_list_col_4('#latest_data',response.data);

        }
    })
}

/*-----------------------------
    Properties Data Get
--------------------------------*/
recent_properties();
function recent_properties()
{
    var url = $('#recent_property_url').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        success: function(response){
            var asset_url = $('#base_url').val();
            $.each(response, function(index, value){
                if(value.post_preview != null)
                {
                    var image = value.post_preview.media.url;
                }else{
                    var image = base_url+'/uploads/default.png';
                }
                $('#recent_properties').append('<div class="col-lg-6 mb-30"><div class="single-recent-property"><div class="row"><div class="col-lg-4"><div class="recent-property-img"> <a href="'+asset_url+'property/'+value.slug+'"><img src="'+image+'" alt=""></a></div></div><div class="col-lg-8 pl-0"><div class="recent-property-area"><div class="property-title"><a href="'+asset_url+'property/'+value.slug+'"><h3>'+value.title+'</h3></a><p><i class="fas fa-map-marker-alt"></i> '+value.post_city.value+'</p> <span>For '+value.property_status_type.category.name+'</span><div class="price-area"><h3>'+amount_format(value.min_price.price)+' - '+amount_format(value.max_price.price)+'</h3></div></div></div></div></div></div></div>');
            });
        }
    })
}

/*--------------------------
        Cities Data Get
    -----------------------------*/
find_cities();
function find_cities()
{
    var url = $('#city_url').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function()
        {
            for (var i = 5; i >= 0; i--) {
                $('#city_append').append('<div class="col-lg-4 mb-30"> <a href="#"><div class="single-place placeholder"><div class="place-img"></div></div> </a></div>');
            }
        },
        success: function(response){
            $('#city_append').html('');
            var asset_url = $('#base_url').val();
            var base_url = $('#base_url').val();
            $.each(response.cities, function(index, value){
                if($('#city_append').hasClass('city-demo-two')){
                    var image = '<img src="'+value.preview.content+'" alt="">';
                    if(index == 0)
                    {
                        var column = '<div class="col-lg-8">';
                    }else{
                        var column = '<div class="col-lg-4">';
                    }
                }else{
                    var image = '<div class="place-img"> <img src="'+value.preview.content+'" alt=""></div>';
                    var column = '<div class="col-lg-4 mb-30">';
                }
                if($('#city_append').hasClass('city-demo-two')){
                    if(index != 5)
                    {
                        $('#city_append').append(' '+column+' <a href="'+base_url+'state/'+value.slug+'"><div class="single-place">'+image+'<div class="place-content"><h3>'+value.name+'</h3><p>'+value.posts_count+' Property</p></div></div> </a></div>');
                    }
                }else{
                    $('#city_append').append(' '+column+' <a href="'+base_url+'state/'+value.slug+'"><div class="single-place">'+image+'<div class="place-content"><h3>'+value.name+'</h3><p>'+value.posts_count+' Property</p></div></div> </a></div>');
                }

            });
        }
    })
}

/*--------------------------
        Blogs Data Get
    -----------------------------*/
get_blogs();
function get_blogs()
{
    var url = $('#blog_url').val();
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        beforeSend: function()
        {
            for (var i = 2; i >= 0; i--) {
                $('#blog_append').append('<div class="col-lg-4"><div class="single-blog placeholder"><div class="blog-img"></div><div class="blog-content"><h3></h3><div class="blog-des"><p></p></div></div><div class="blog-bottom-area"><div class="blog-user-img"></div> <span></span><p></p></div></div></div>');
            }
        },
        success: function(response){
            $('#blog_append').html('');
            var asset_url = $('#base_url').val();
            $.each(response.blogs, function(index, value){
                $('#blog_append').append('<div class="col-lg-4"><div class="single-blog"><div class="blog-img"> <a href="'+asset_url+'blog/'+value.slug+'"> <img class="img-fluid" src="'+value.image+'" alt="blog"> </a></div><div class="blog-content"> <a href="'+asset_url+'blog/'+value.slug+'"><h3>'+value.title+'</h3> </a><div class="blog-des"><p>'+value.content+'</p></div></div><div class="blog-bottom-area"> <a href="'+asset_url+'blog/'+value.slug+'"> <img src="'+value.avatar+'" alt=""> <span>'+value.name+'</span> </a><p>'+value.created_at+'</p></div></div></div>');
            });
        }
    })
}



