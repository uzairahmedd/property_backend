mapboxgl.accessToken = 'pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
mapboxgl.setRTLTextPlugin(
    'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
    null,
    true // Lazy load the plugin
);
if ($('#coordinates_selected').val() != '') {
    var coordinates = $('#coordinates_selected').val();
    var array = coordinates.split(',');
    on_load_map(array[0],array[1]);
    map_initialiaze();
}
//for display
$('#map_modal').on('hidden.bs.modal', function (e) {
    map_initialiaze();
})

$("#save_coordinates").click(function () {
    $('#location').val('');
    var place_name=$('.mapboxgl-ctrl-geocoder--input').val();
    $('#location').val(place_name);
    $("#map_modal").modal("hide");
})

//when user click on location inout filed
$("#location").click(function () {
    var city = $('#city_val').val();
    var district = $('#district_val').val();
    if (city == '') {
        Sweet('error', 'Please provide city!');
        return false;
    }
    if (district == '') {
        Sweet('error', 'Please provide district!');
        return false;
    }
    $("#map_modal").modal("show");
    //get city and dostrict
    var city = $('#city_val :selected').text();
    var district = $('#district_val :selected').text();
    const mapboxClient = mapboxSdk({
        accessToken: mapboxgl.accessToken
    });
    //open defaut map using city name and district name
    mapboxClient.geocoding
        .forwardGeocode({
            query: district+', '+city,
            countries: ['sa'],
            autocomplete: true,
            limit: 1,
        })
        .send()
        .then((response) => {
            if (
                !response ||
                !response.body ||
                !response.body.features ||
                !response.body.features.length
            ) {
                console.error('Invalid response:');
                console.error(response);
                return;
            }
            const feature = response.body.features[0];

            const map = new mapboxgl.Map({
                container: 'map',
                // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                style: 'mapbox://styles/mapbox/streets-v12',
                center: feature.center,
                zoom: 12
            });
            // console.log(feature.center);
            // Create a marker and add it to the map.
            new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
            var placeholder = 'Search location in KSA';
            if (locale == 'ar') {
                placeholder = 'موقع البحث في المملكة العربية السعودية';
            }

            const geocoder = new MapboxGeocoder({
                // Initialize the geocoder
                accessToken: mapboxgl.accessToken, // Set the access token
                mapboxgl: mapboxgl, // Set the mapbox-gl instance
                marker: true, // Do not use the default marker style
                placeholder: placeholder, // Placeholder text for the search bar
            });
            // Add the geocoder to the map
            map.addControl(geocoder);
            // After the map style has loaded on the page,
            // add a source layer and default styling for a single point
            map.on('load', () => {
                map.resize();
                map.addSource('single-point', {
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': []
                    }
                });
                map.addLayer({
                    'id': 'point',
                    'source': 'single-point',
                    'type': 'circle',
                    'paint': {
                        'circle-radius': 10,
                        'circle-color': '#1da1f2'
                    }
                });
            });
            //drag marker on without search
            const marker = new mapboxgl.Marker({
                draggable: true,
            }) // Initialize a new marker
                .setLngLat(feature.center) // Marker [lng, lat] coordinates
                .addTo(map); // Add the marker to the map
            function onDragEnd() {
                const lngLat = marker.getLngLat();
                $('.mapboxgl-ctrl-geocoder--input').val('');
                $('#coordinates_selected').val('');
                $('#coordinates_selected').val(lngLat['lng'] + ',' + lngLat['lat']);
                reverse(lngLat['lng'],lngLat['lat']);
                // $('.mapboxgl-ctrl-geocoder--input').val(lngLat['lng'] + ',' + lngLat['lat']);
            }
            marker.on('dragend', onDragEnd);

            //afetr searching results with drag marker
            geocoder.on('result', (event) => {
                map.getSource('single-point').setData(event.result.geometry);
                var marker = new mapboxgl.Marker({
                    draggable: true,
                    color: "#1da1f2"
                })
                    .setLngLat(event.result.center)
                    .addTo(map)   
                // $('.mapboxgl-ctrl-geocoder--input').val(event.result.center[0] + ',' + event.result.center[1]);
                $('#coordinates_selected').val('');
                $('#coordinates_selected').val(event.result.center[0] + ',' + event.result.center[1]);
                marker.on('dragend', function (e) {
                    var lngLat = e.target.getLngLat();
                    $('.mapboxgl-ctrl-geocoder--input').val('');
                    $('#coordinates_selected').val('');
                    $('#coordinates_selected').val(lngLat['lng'] + ',' + lngLat['lat']);
                    reverse(lngLat['lng'],lngLat['lat']);
                    // $('.mapboxgl-ctrl-geocoder--input').val(event.result.place_name);
                    // $('.mapboxgl-ctrl-geocoder--input').val(lngLat['lng'] + ',' + lngLat['lat']);
                })
            });
        });
});

// reverse();
function reverse(long,lat){
    var long=long;
    var lat=lat;
    var url='https://api.mapbox.com/geocoding/v5/mapbox.places/'+long+','+lat+'.json?country=sa&access_token=pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            $('.mapboxgl-ctrl-geocoder--input').val(response.features[0].place_name);

        }
    });
   
}

function on_load_map(long,lat){
    var long=long;
    var lat=lat;
    var url='https://api.mapbox.com/geocoding/v5/mapbox.places/'+long+','+lat+'.json?country=sa&access_token=pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            $('#location').val(response.features[0].place_name);

        }
    });
   
}
function map_initialiaze() {
    mapboxgl.accessToken = 'pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
    if ($('#coordinates_selected').val() != '') {
        $('#map_display').css('border-radius', '10px');
        $('#map_display').css('border', '1px solid black');
        var coordinates = $('#coordinates_selected').val();
        var array = coordinates.split(',');
        const map = new mapboxgl.Map({
            container: 'map_display', // Container ID
            style: 'mapbox://styles/mapbox/streets-v12', // Map style to use
            center: [array[0], array[1]], // Starting position [lng, lat]
            zoom: 13, // Starting zoom level
            interactive: true,
        });

        const marker = new mapboxgl.Marker({
            draggable: true,
        }) // Initialize a new marker
            .setLngLat([array[0], array[1]]) // Marker [lng, lat] coordinates
            .addTo(map); // Add the marker to the map




        map.on("load", () => {
            map.addSource("mine", {
                type: "geojson",
                data: {
                    type: "FeatureCollection",
                    features: [{
                        type: "Feature",
                        geometry: {
                            type: "Point",
                            coordinates: [array[0], array[1]],
                        }
                    }]
                }
            });

            map.addLayer({
                id: "mylayer",
                source: "mine",
                type: "circle",
                paint: {
                    // Make circles larger as the user zooms from z12 to z22.
                    "circle-radius": 50,
                    // Color circles by ethnicity, using a `match` expression.
                    "circle-color": "#1da1f2",
                    "circle-stroke-color": "red",
                    "circle-opacity": 0.2,
                    "circle-stroke-opacity": 0.5,
                    "circle-stroke-width": 5
                }
            });
        });
    }
}