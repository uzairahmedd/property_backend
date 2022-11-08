
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
        $('#login_form').on('submit',function(e){
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
                        $('#login_error_msg').html(item);
                    });
                }
            })
        });
    
        /*----------------------------
                Register Form Submit
            -------------------------------*/
        $('#register_form').on('submit',function(e){
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
                        $('#errors_msg').html(response.errors);
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
                        $('#errors_msg').html(item);
                    });
                }
            })
        });
    
    })(jQuery);