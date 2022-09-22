(function ($) {
    "use strict";


	/*-------------------------------
			Multi Currency Active
		-----------------------------------*/
	$('.currency_option').on('change',function(){
		$('.change_currency_form').submit();
	});

	/*-------------------------------
			Multi Language Active
		-----------------------------------*/
	$('#lang_select').on('change',function(e){
		e.preventDefault();
		var lang_name = $('#lang_select').val();
		var url = $("#lang_select_url").val();
		$.ajax({
			url: url,
			data: {locale: lang_name},
			type: "GET",
			dataType: "HTML",
			success: function(response) {
				location.reload();
			}
		});
	});

	/*--------------------------
		Selectric Active
	----------------------------*/
	$('.selectric').selectric();

})(jQuery);

/*---------------------
        Data Render
    -------------------------*/
function render_list(target,data,aditional_class=''){
	$(target).html('');
	$('.list_renderd').remove();
	var base_url = $('#base_url').val();
	var asset_url=base_url;
	$('.preloader').remove();
	$.each(data, function(index, value){

		favourite_check(value.id);

		if(value.post_preview != null)
		{
			var image = value.post_preview.media.url;
		}else{
			var image = base_url+'/uploads/default.png';
		}

		if(value.user.avatar != null){
			var avatar = value.user.avatar;
		}
		else{
			var avatar='https://ui-avatars.com/api/?background=random&rounded=true&name='+value.user.name
		}
		var asset_url = $('#base_url').val();
		var title=str_limit(value.title,20,true);
		var location = str_limit(value.post_city.value,35,true);
		$(target).append('<div class="col-lg-6 list_renderd '+aditional_class+'"><div class="single-properties"><div class="single-property-img"> <a href="'+asset_url+'property/'+value.slug+'"><img src="'+image+'" alt=""></a></div><div class="property-title"> <a href="'+asset_url+'property/'+value.slug+'"><h3>'+title+'</h3></a></div><div class="property-location"> <span class="iconify" data-icon="ion:location-sharp" data-inline="false"></span> <span>'+location+'</span></div><div class="property-prices"> <span>'+amount_format(value.min_price.price)+'</span> <span>-</span> <span>'+amount_format(value.max_price.price)+'</span> </div><div class="properties-options icon_area'+index+'"></div><div class="properties-bottom-area"><div class="user-info"> <a href="'+asset_url+'agent/'+value.user.slug+'/show'+'"> <img src="'+avatar+'" alt=""> <span> '+value.user.name+'</span> </a></div><div class="properties-wishlist-com-price-section"><div class="wishlish-area" onclick="favourite_property('+value.id+')" id="favourite_btn'+value.id+'"> <a href="javascript:void(0)"><span class="iconify" data-icon="ri:heart-3-line" data-inline="false"></span></a></div><div class="compare-area"> <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="iconify" data-icon="eva:share-fill" data-inline="false"></span></a><div class="share-dropdown"><div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="entypo-social:facebook-with-circle" data-inline="false"></span> <span>Facebook</span></a> <a class="dropdown-item" href="https://twitter.com/intent/tweet?text='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span>Twitter</span></a> <a class="dropdown-item" href="https://pinterest.com/pin/create/button/?url='+asset_url+'property/'+value.slug+'&description='+value.title+'" target="_blank"><span class="iconify" data-icon="cib:pinterest-p" data-inline="false"></span> Pinterest</span></a> <a class="dropdown-item" href="https://api.whatsapp.com/send?text='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> Whatsapp</span></a> <a class="dropdown-item" href="mailto:email@email.com?subject='+value.title+'&body='+asset_url+'property/'+value.slug+'"><span class="iconify" data-icon="fa-regular:envelope" data-inline="false"></span> Gmail</span></a></div></div></div></div></div></div></div>');

		$.each(value.featured_option, function(i,v){
			if(v.featured_category != null){
				if(v.featured_category.preview != null){
					var img='<img src="'+small(v.featured_category.preview.content)+'" alt="">';
				}
				else{
					var img='';
				}
			    var name=v.featured_category.name;

			var html='<div class="single-additional-option text-center"><div class="properties-additional-icon">'+img+'</div><div class="properties-additional-title"> <span>'+name+' '+v.value+'</span></div></div>';
			$('.icon_area'+index).append(html);
			}

		});

	});
}

/*------------------------------
        Project Data Render
    ---------------------------------*/
function render_project(target,data){
	$('.list_renderd').remove();
	var base_url = $('#base_url').val();
	var asset_url=base_url;
	$('.preloader').remove();
	$.each(data, function(index, value){

		if(value.post_preview != null)
		{
			var image = value.post_preview.media.url;
		}else{
			var image = base_url+'/uploads/default.png';
		}


		var title=str_limit(value.title,20,true);
		var location = str_limit(value.post_city.value,35,true);
		$(target).append('<div class="col-lg-6 list_renderd"><div class="single-properties"><div class="single-property-img"> <a href="'+asset_url+'project/'+value.slug+'"><img src="'+image+'" alt=""></a></div><div class="property-title"> <a href="'+asset_url+'project/'+value.slug+'"><h3>'+title+'</h3></a></div><div class="property-location"> <span class="iconify" data-icon="ion:location-sharp" data-inline="false"></span> <span>'+location+'</span></div><div class="property-prices"> </div></div></div></div>');



	});
}

/*-----------------------------------------------
        Placeholder Active Before Data Append
    --------------------------------------------------*/
function before_render_list(target,data){
	var data = data - 1;
	for (var i = data; i >= 0; i--) {
		$(target).append('<div class="col-lg-6 mb-30 property_placeholder"><div class="single-properties placeholder"><div class="single-property-img"></div><div class="property-title"> <a href="#"><h3></h3></a></div><div class="property-location"></div><div class="property-prices"></div><div class="properties-options"></div><div class="properties-bottom-area"><div class="user-info"></div><div class="properties-wishlist-com-price-section"><div class="wishlish-area"></div><div class="wishlish-area"></div></div></div></div></div>');
	}
}

/*-----------------------------------------------
        Placeholder Active Before Data Append
    --------------------------------------------------*/
function before_render_list_col_4(target,data){
	var data = data - 1;
	for (var i = data; i >= 0; i--) {
		$(target).append('<div class="col-lg-4 mb-30 property_placeholder"><div class="single-properties placeholder"><div class="single-property-img"></div><div class="property-title"> <a href="#"><h3></h3></a></div><div class="property-location"></div><div class="property-prices"></div><div class="properties-options"></div><div class="properties-bottom-area"><div class="user-info"></div><div class="properties-wishlist-com-price-section"><div class="wishlish-area"></div><div class="wishlish-area"></div></div></div></div></div>');
	}
}

/*--------------------
        Data Render
    ----------------------*/
function render_list_col_4(target,data){
	$(target).html('');
	$('.list_renderd').remove();
	var base_url = $('#base_url').val();
	var asset_url=base_url;
	$('.preloader').remove();
	$.each(data, function(index, value){

		favourite_check(value.id);

		if(value.post_preview != null)
		{
			var image = value.post_preview.media.url;
		}else{
			var image = base_url+'/uploads/default.png';
		}

		if(value.user.avatar != null){
			var avatar = value.user.avatar;
		}
		else{
			var avatar='https://ui-avatars.com/api/?background=random&rounded=true&name='+value.user.name
		}
		var asset_url = $('#base_url').val();
		var title=str_limit(value.title,20,true);
		var location = str_limit(value.post_city.value,35,true);
		$(target).append('<div class="col-lg-4 list_renderd"><div class="single-properties"><div class="single-property-img"> <a href="'+asset_url+'property/'+value.slug+'"><img src="'+image+'" alt=""></a></div><div class="property-title"> <a href="'+asset_url+'property/'+value.slug+'"><h3>'+title+'</h3></a></div><div class="property-location"> <span class="iconify" data-icon="ion:location-sharp" data-inline="false"></span> <span>'+location+'</span></div><div class="property-prices"> <span>'+amount_format(value.min_price.price)+'</span> <span>-</span> <span>'+amount_format(value.max_price.price)+'</span> </div><div class="properties-options icon_area'+index+'"></div><div class="properties-bottom-area"><div class="user-info"> <a href="'+asset_url+'agent/'+value.user.slug+'/show'+'"> <img src="'+avatar+'" alt=""> <span> '+value.user.name+'</span> </a></div><div class="properties-wishlist-com-price-section"><div class="wishlish-area" onclick="favourite_property('+value.id+')" id="favourite_btn'+value.id+'"> <a href="javascript:void(0)"><span class="iconify" data-icon="ri:heart-3-line" data-inline="false"></span></a></div><div class="compare-area"> <a href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="iconify" data-icon="eva:share-fill" data-inline="false"></span></a><div class="share-dropdown"><div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="https://www.facebook.com/sharer.php?u='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="entypo-social:facebook-with-circle" data-inline="false"></span> <span>Facebook</span></a> <a class="dropdown-item" href="https://twitter.com/intent/tweet?text='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="ant-design:twitter-outlined" data-inline="false"></span>Twitter</span></a> <a class="dropdown-item" href="https://pinterest.com/pin/create/button/?url='+asset_url+'property/'+value.slug+'&description='+value.title+'" target="_blank"><span class="iconify" data-icon="cib:pinterest-p" data-inline="false"></span> Pinterest</span></a> <a class="dropdown-item" href="https://api.whatsapp.com/send?text='+asset_url+'property/'+value.slug+'" target="_blank"><span class="iconify" data-icon="bx:bxl-whatsapp" data-inline="false"></span> Whatsapp</span></a> <a class="dropdown-item" href="mailto:email@email.com?subject='+value.title+'&body='+asset_url+'property/'+value.slug+'"><span class="iconify" data-icon="fa-regular:envelope" data-inline="false"></span> Gmail</span></a></div></div></div></div></div></div></div>');

		$.each(value.featured_option, function(i,v){
			if(v.featured_category != null){
				if(v.featured_category.preview != null){
					var img='<img src="'+small(v.featured_category.preview.content)+'" alt="">';
				}
				else{
					var img='';
				}
			    var name=v.featured_category.name;

			var html='<div class="single-additional-option text-center"><div class="properties-additional-icon">'+img+'</div><div class="properties-additional-title"> <span>'+name+' '+v.value+'</span></div></div>';
			$('.icon_area'+index).append(html);

			console.log(asset_url+'property/'+value.slug)
			}

		});

	});
}

/*---------------------------
        Favourite Property
    ------------------------------*/
function favourite_property(id)
{
    var url = $('#favourite_property_url').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: url,
        data: {id: id},
        dataType: 'json',
        beforeSend: function() {
           if($('#favourite_btn'+id).hasClass('active'))
           {
                $('#favourite_btn'+id).removeClass('active');
           }else{
                $('#favourite_btn'+id).addClass('active');
           }
        },
        success: function(response){
			if(response.error)
			{
				$('#favourite_btn'+id).removeClass('active');
				$('#login').modal('show');
			}
        },
        error: function(xhr, status, error)
        {
            $('.errorarea').show();
            $.each(xhr.responseJSON.errors, function (key, item)
            {
                Sweet('error',item)
                $("#errors").html("<li class='text-danger'>"+item+"</li>")
            });
            errosresponse(xhr, status, error);
        }
    })
}

/*---------------------------
        Favourite Check
    ------------------------------*/
function favourite_check(id)
{
	var url = $("#favourite_check_url").val();
	$.ajax({
		url: url,
		data: { id: id },
		type: "GET",
		dataType: "HTML",
		success: function(response) {
			if(response == 'ok')
			{
				$('#favourite_btn'+id).addClass('active');
			}else{
				$('#favourite_btn'+id).removeClass('active');
			}
		}
	});
}


/*----------------------
        Image Format
    --------------------------*/
function small(s,size="small") {
	var myarray= ['.jpeg','.jpg','.png','.gif','.ico','.webp'];
	var ext= s.substring(s.lastIndexOf("."));
	if(jQuery.inArray(ext, myarray) != -1) {
		var new_string = s.substring(0, s.lastIndexOf(".")) + size + s.substring(s.lastIndexOf("."));

	} else {
		var new_string = $('#base_url').val()+"/uploads/file.png";
	}

	return new_string;
}

/*-------------------------
		Review Data Get
	----------------------------*/
review();
function review() {
	var url = $("#review_url").val();
	$.ajax({
		url: url,
		type: "GET",
		dataType: "JSON",
		success: function(response) {
			$.each(response, function(index,value){

				if(value.featured == 1)
				{
					var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
				}
				else if(value.featured == 2)
				{
					var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
				}
				else if(value.featured == 3)
				{
					var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
				}
				else if(value.featured == 4)
				{
					var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li class="deactive"><span class="iconify" data-icon="ant-design:star-outlined" data-inline="false"></span></li></ul> </nav></div>';
				}else{
					var rating = '<div class="review-rating"> <nav><ul><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li><li><span class="iconify" data-icon="ant-design:star-filled" data-inline="false"></span></li></ul> </nav></div>';
				}

				$('#review_append').append('<div class="col-lg-4"><div class="single-review"><div class="review-author-img"> <img src="'+value.slug+'" alt=""></div><div class="review-author-name"><h6>'+value.name+'</h6></div>'+rating+'<div class="review-content"><p>'+value.excerpt.content+'</p></div></div></div>');
			});
		}
	});
}

/*----------------------
        Content Limit
    --------------------------*/
 function str_limit(text, count, insertDots){
    return text.slice(0, count) + (((text.length > count) && insertDots) ? "..." : "");
 }

 /*----------------------
        Amount Format
    --------------------------*/
function amount_format(amount){
	var currency_name = $('.currency_name').val();
	var currency_icon = $('.currency_icon').val();
	var currency_rate = $('.currency_rate').val();
	var currency_rate= parseFloat(currency_rate);
	var currency_position = $('.currency_position').val();

	var total=amount*currency_rate;
	var total=total.toLocaleString();

	if(currency_position == 'right'){
		return  total+currency_icon;
	}
	return  currency_icon+total;
}

