(function ($) {
    "use strict";
    
     /*----------------------------
       		Ckeditor Active
       	------------------------------*/
    CKEDITOR.replace( 'content' );

    /*----------------------------
       		Form  Submit
        ------------------------------*/
    $('.post_form').on('submit',function(){
        var html=$('.update_btn').html();
        $('.update_btn').attr('disabled','');
        $('.update_btn').html('Please wait....');
        $('.update_btn').html(html);
    });

    /*-------------------------------------
       		Property Contact Form Change
        ----------------------------------------*/
    $('#contact').on('change',()=>{
        var contact_val=$('#contact').val();
        if(contact_val == 'email'){
            $('#email').show();
            $('#phone').hide();
            $('#affiliate_banner').hide();
            $('#affiliate_url').hide();
        }
        if(contact_val == 'phone'){
            $('#email').hide();
            $('#phone').show();
            $('#affiliate_banner').hide();
            $('#affiliate_url').hide();
        }
        if(contact_val == 'phone'){
            $('#email').hide();
            $('#phone').show();
            $('#affiliate_banner').hide();
            $('#affiliate_url').hide();
        }
        if(contact_val == 'affiliate_banner_ads'){
            $('#email').hide();
            $('#phone').hide();
            $('#affiliate_banner').show();
            $('#affiliate_url').show();
        }
        if(contact_val == 'affiliate_button'){
            $('#email').hide();
            $('#phone').hide();
            $('#affiliate_banner').hide();
            $('#affiliate_url').show();
        }

    });

    /*-------------------------
       		State Data Change 
        -------------------------------*/
    $('#state').on('change',()=>{
        $('#id2').val($('#state').val());
        $('#basicform3').submit();
    });

    /*--------------------------------------
       		Sweetalert Active with Cancel
        ----------------------------------------*/
    $(".cancel").on('click',function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Do It!'
        }).then((result) => {
            if (result.value == true) {
                window.location.href = link;
            }
        })
    });

    /*-------------------------------
       		Facilities Data Append
        ------------------------------------*/
    var i=50;  
    $('.add_more').on('click',()=>{
        i++;  
        var selectbox = $('.f_row').html();
        var html='<tr id="table_row'+i+'"> <td> '+selectbox+' </td><td> <input type="number" name="facilities_input[]" placeholder="Distance (Km)" class="form-control col-12" step="any"> </td><td> <button type="button"  class="btn btn-danger mt-1 float-left" onclick="remove_row('+i+')"><i class="fas fa-trash"></i></button> </td></tr>'

        $('.facilities_area').append(html)
    });

    /*-------------------------------
       		Ajax Form Submit
        ------------------------------------*/
    if ($('#state').val() != null) {
        var state=$('#state').val();
        $('#id2').val(state)
        $('#basicform3').submit();
    }

})(jQuery);

/*-------------------------------
       	Facilities column Remove
    ------------------------------------*/
function remove_row(id) {

    $('#table_row'+id+'').remove();  
}

/*---------------------
       	Image Remove
    --------------------------*/
var m_id='';
function remove_image(param,key) {
    m_id=key;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Do It!'
    }).then((result) => {
        if (result.value == true) {
            $('#m_area'+m_id).remove();
            $('#media_id').val(param);
            $('#basicform').submit();
        }
    })
}

/*-----------------------------------
        Data Append After Success
    ----------------------------------------*/
function success1(res) {
    $('.states').show();
    $('.res').remove();
    $.each(res,function(index,value){
        $('#state').append("<option value='"+value.id+"' class='res'>"+value.name+"</option>");
    });

    var city_id=$('#city_id').val();
    $('#city').val(city_id);
} 

/*-----------------------------------
        Data Append After Success
    ----------------------------------------*/
function success3(res) {
    $('.city').show();
    $('.res1').remove();
    $.each(res,function(index,value){
        $('#city').append("<option value='"+value.id+"' class='res1'>"+value.name+"</option>");
    })

    var city_id=$('#city_id').val();
    $('#city').val(city_id);
}

/*-------------------------------
        Google Map Initialize
    -----------------------------------*/
function initialize() {

    var mapOptions, map, marker, searchBox, city,
    infoWindow = '',
    addressEl = document.querySelector('#location_input'),
    latEl = document.querySelector( '#latitude' ),
    longEl = document.querySelector( '#longitude' ),
    element = document.getElementById( 'map-canvas' );


    mapOptions = {
        // How far the maps zooms in.
        zoom: 13,
        // Current Lat and Long position of the pin/
        center: new google.maps.LatLng( $('#latitude').val(), $('#longitude').val()),
        
        disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
        scrollWheel: true, // If set to false disables the scrolling on the map.
        draggable: true, // If set to false , you cannot move the map around.
        // mapTypeId: google.maps.MapTypeId.HYBRID, // If set to HYBRID its between sat and ROADMAP, Can be set to SATELLITE as well.
        maxZoom: 21, // Wont allow you to zoom more than this
    };

    /**
    * Creates the map using google function google.maps.Map() by passing the id of canvas and
    * mapOptions object that we just created above as its parameters.
    *
    */
    // Create an object map with the constructor function Map()
    map = new google.maps.Map( element, mapOptions ); // Till this like of code it loads up the map.

    /**
    * Creates the marker on the map
    *
    */
    marker = new google.maps.Marker({
        position: mapOptions.center,
        map: map,
        draggable: true
    });

    /**
    * Creates a search box
    */
    searchBox = new google.maps.places.SearchBox( addressEl );

    /**
    * When the place is changed on search box, it takes the marker to the searched location.
    */
    google.maps.event.addListener( searchBox, 'places_changed', function () {
        var places = searchBox.getPlaces(),
        bounds = new google.maps.LatLngBounds(),
        i, place, lat, long, resultArray,
        addresss = places[0].formatted_address;

        for( i = 0; place = places[i]; i++ ) {
            bounds.extend( place.geometry.location );
        marker.setPosition( place.geometry.location );  // Set marker position new.
    }

    map.fitBounds( bounds );  // Fit to the bound
    map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.


    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();
    latEl.value = lat;
    longEl.value = long;

    resultArray =  places[0].address_components;



    // Closes the previous info window if it already exists
    if ( infoWindow ) {
        infoWindow.close();
    }
    /**
    * Creates the info Window at the top of the marker
    */
    infoWindow = new google.maps.InfoWindow({
        content: addresss
    });

    infoWindow.open( map, marker );

    $('#map-canvas').show();

    });

    /**
    * Finds the new position of the marker when the marker is dragged.
    */
    google.maps.event.addListener( marker, "dragend", function ( event ) {
        var lat, long, address, resultArray, citi;

            lat = marker.getPosition().lat();
            long = marker.getPosition().lng();

            var geocoder = new google.maps.Geocoder();
            geocoder.geocode( { latLng: marker.getPosition() }, function ( result, status ) {
            if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                address = result[0].formatted_address;
                resultArray =  result[0].address_components;


                addressEl.value = address;
                latEl.value = lat;
                longEl.value = long;

            } else {
                alert( 'Geocode was not successful for the following reason: ' + status );
            }

            // Closes the previous info window if it already exists
            if ( infoWindow ) {
                infoWindow.close();
            }

            /**
            * Creates the info Window at the top of the marker
            */
            infoWindow = new google.maps.InfoWindow({
                content: address
            });

            infoWindow.open( map, marker );
        });
    });
}

/*-------------------------------
        Sweetalert Message Show
    -----------------------------------*/
function Sweet(icon,title,time=3000){
  
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    Toast.fire({
        icon: icon,
        title: title,
    })
}