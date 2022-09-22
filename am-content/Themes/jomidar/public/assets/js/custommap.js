"use strict";

/*------------------------------
        Google Map Initialize
    ---------------------------------*/
let panorama;

function initialize() {
    var latitude = $('#latitude').val();
    var longitude = $('#longitude').val();
    panorama = new google.maps.StreetViewPanorama(
        document.getElementById("street-view"),
        {
        position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
        pov: { heading: 165, pitch: 0 },
        zoom: 1,
        }
    );
}