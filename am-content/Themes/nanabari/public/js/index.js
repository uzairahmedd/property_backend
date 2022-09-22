"use strict";

var all_data=[];
var lat=$('#lat').val();
var long=$('#long').val();
var zoom=$('#zoom').val();
var pin =$('#pin').val();
var random_url =$('#random_property_url').val();
var base_url = $('#base_url').val();
var current_lat= parseFloat(lat);
var current_long= parseFloat(long);
var current_zoom= parseFloat(zoom);

radom_properties();
function radom_properties()
{


	$.ajax({
		type: 'get',
		url: random_url,
		dataType: 'json',

		success: function(response){ 

			all_data=response.data;
			basicmap();
		}
	})
}

function basicmap()
{
        // Map options

        var options = {
        	zoom: current_zoom,
        	center: { lat: current_lat, lng: current_long },
        	styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        }

        // New map
        var map = new google.maps.Map(document.getElementById('hero-map'), options);
        // Array of markers
        var markers = [];
        
        $.each(all_data, function(index, value){

        	let v =  {
        		coords: { lat: parseFloat(value.latitude.value), lng: parseFloat(value.longitude.value) },
        		iconImage: pin,
        		content: '<a href="'+base_url+'property/'+value.slug+'" class="single-modal-property-link"><div class="single-modal-property"><img class="img-fluid" src="'+value.post_preview.media.url+'"/><div class="property-modal-title"><h3>'+value.title+'</h3></div><div class="property-modal-location"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512" class="iconify" data-icon="ion:location-sharp" data-inline="false" style="transform: rotate(360deg);"><path d="M256 32C167.67 32 96 96.51 96 176c0 128 160 304 160 304s160-176 160-304c0-79.49-71.67-144-160-144zm0 224a64 64 0 1 1 64-64a64.07 64.07 0 0 1-64 64z" fill="currentColor"></path></svg> <span>'+value.post_city.value+'</span></div><div class="property-modal-prices"> <span>'+amount_format(value.min_price.price)+'</span> <span>-</span> <span>'+amount_format(value.max_price.price)+'</span> </div><div class="properties-modal-bottom-area"><div class="user-modal-info">  <img src="'+value.user.avatar+'" alt=""> <span> '+value.user.name+'</span> </div></div></div></a>'
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