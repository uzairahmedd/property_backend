"use strict";


var lat=$('#lat').val();
var long=$('#long').val();
var zoom=$('#zoom').val();
var pin =$('#pin').val();
var current_lat= parseFloat(lat);
var current_long= parseFloat(long);
var current_zoom= parseFloat(zoom);

/*----------------------------
        Properties Data Get
    -------------------------------*/
var base_url = $('#base_url').val();
var url=base_url+'get_properties';
var all_data=[];
get_properties(url)
function get_properties(url){
	 $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: $('.search_form').serialize(),
        beforeSend: function(){
            before_render_list('#item_lists',12)
        },
        success: function(response){ 
             $('.property_placeholder').remove();
            if(response.data.length == 0){
               $('.show-pagination-info').hide();
               $('#item_lists').html('<div class="col-12 no-more"><h3 class="text-center">No more listing avaiable</h3></div>');

            }
            else{
                $('.show-pagination-info').show();
                $('.no-more').remove();
                render_list('#item_lists',response.data);
            }
          
           all_data=response.data;

           basicmap()
           if(response.from == null){
              var from=0;
           }
          else{
              var from=response.from;
           }

          if(response.total == null){
              var total=0;
           }
          else{
              var total=response.total;
           }

          $('#from').html(from);
          $('#to').html(response.to);
          $('#total').html(total);
          if(response.links.length > 3) {
            render_pagination('.pagination',response.links);
          }

        }
    })
}

/*----------------------------
        Render Pagination
    -------------------------------*/
function render_pagination(target,data){
    $('.page-item').remove();
    $.each(data, function(key,value){
        if(value.label === '&laquo; Previous'){
            if(value.url === null){
                var is_disabled="disabled"; 
                var is_active=null;
            }
            else{
                var is_active='page-link-no'+key;
                var is_disabled='onClick="PaginationClicked('+key+')"';
            }
            var html='<li  class="page-item"><a '+is_disabled+' class="page-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="fas fa-long-arrow-alt-left"></i></a></li>';
        }
        else if(value.label === 'Next &raquo;'){
            if(value.url === null){
                var is_disabled="disabled"; 
                var is_active=null;
            }
            else{
                var is_active='page-link-no'+key;
                var is_disabled='onClick="PaginationClicked('+key+')"';
            }
            var html='<li class="page-item"><a '+is_disabled+'  class="page-link '+is_active+'" href="javascript:void(0)" data-url="'+value.url+'"><i class="fas fa-long-arrow-alt-right"></i></a></li>';
        }
        else{
            if(value.active==true){
                var is_active="active";
                var is_disabled="disabled";
                var url=null;

            }
            else{
                var is_active='page-link-no'+key;
                var is_disabled='onClick="PaginationClicked('+key+')"';
                var url=value.url;
            }
            var html='<li class="page-item"><a class="page-link '+is_active+'" '+is_disabled+' href="javascript:void(0)" data-url="'+url+'">'+value.label+'</a></li>';
        }
        if(value.url !== null){
            $(target).append(html);
        }
        
    });
}

/*----------------------------
        Pagination Click
    -------------------------------*/
function PaginationClicked(key){
     var url =$('.page-link-no'+key).data('url');
     get_properties(url);
}


/*-------------------------------
        Google Map Initialize
    ----------------------------------*/
function basicmap()
{
        // Map options

        var options = {
            zoom: current_zoom,
            center: { lat: current_lat, lng: current_long },
            styles: [{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"simplified"}]}]
        }

        // New map
        var map = new google.maps.Map(document.getElementById('contact-map'), options);
        // Array of markers
        var markers = [];

        var asset_url = $('#base_url').val();
       
        $.each(all_data, function(index, value){
           
        	let v =  {
        		coords: { lat: parseFloat(value.latitude.value), lng: parseFloat(value.longitude.value) },
        		iconImage: pin,
        		content: '<a href="'+asset_url+'property/'+value.slug+'" class="single-modal-property-link"><div class="single-modal-property"><img class="img-fluid" src="'+value.post_preview.media.url+'"/><div class="property-modal-title"><h3>'+value.title+'</h3></div><div class="property-modal-location"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512" class="iconify" data-icon="ion:location-sharp" data-inline="false" style="transform: rotate(360deg);"><path d="M256 32C167.67 32 96 96.51 96 176c0 128 160 304 160 304s160-176 160-304c0-79.49-71.67-144-160-144zm0 224a64 64 0 1 1 64-64a64.07 64.07 0 0 1-64 64z" fill="currentColor"></path></svg> <span>'+value.post_city.value+'</span></div><div class="property-modal-prices"> <span>'+amount_format(value.min_price.price)+'</span> <span>-</span> <span>'+amount_format(value.max_price.price)+'</span> </div><div class="properties-modal-bottom-area"><div class="user-modal-info">  <img src="'+value.user.avatar+'" alt=""> <span> '+value.user.name+'</span> </div></div></div></a>'
        	}

        	markers.push(v);

        });


        // Loop through markers
        for (var i = 0; i < markers.length; i++) {
            // Add marker
            addMarker(markers[i]);
        }

        function addMarker(props) {
            var marker = new google.maps.Marker({
                position: props.coords,
                map: map,

            });

            // Check for customicon
            if (props.iconImage) {
                // Set icon image
                marker.setIcon(props.iconImage);
            }

            // Check content
            if (props.content) {
                var infoWindow = new google.maps.InfoWindow({
                    content: '<div class="scrollFix">'+props.content+'</div>',
                });



                marker.addListener('mouseover', function() {
                    infoWindow.open(map, marker);
                });

            }
        }
        

    }

   