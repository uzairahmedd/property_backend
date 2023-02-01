mapboxgl.accessToken = 'pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
mapboxgl.setRTLTextPlugin(
    'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
    null,
    true // Lazy load the plugin
);
if ($('#coordinates_selected').val() != '') {
    map_initialiaze();
}
//for display
$('#map_modal').on('hidden.bs.modal', function(e) {
    map_initialiaze();
})

$("#save_coordinates").click(function() {
    $('#location').val('');
    var coordinates = $('.mapboxgl-ctrl-geocoder--input').val();
    $('#location').val(coordinates);
    $("#map_modal").modal("hide");
})

$("#location").click(function() {
    $("#map_modal").modal("show");
    const map = new mapboxgl.Map({
        container: 'map', // Container ID
        style: 'mapbox://styles/mapbox/streets-v12', // Map style to use
        center: [46.738586, 24.774265], // Starting position [lng, lat]
        zoom: 12 // Starting zoom level
    });
    const marker = new mapboxgl.Marker({
            draggable: true,
        }) // Initialize a new marker
        .setLngLat([46.738586, 24.774265]) // Marker [lng, lat] coordinates
        .addTo(map); // Add the marker to the map
    function onDragEnd() {
        const lngLat = marker.getLngLat();
        $('.mapboxgl-ctrl-geocoder--input').val('');
        $('#coordinates_selected').val('');
        $('#coordinates_selected').val(lngLat['lng'] + ',' + lngLat['lat']);
        $('.mapboxgl-ctrl-geocoder--input').val(lngLat['lng'] + ',' + lngLat['lat']);
    }
    marker.on('dragend', onDragEnd);
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
        // Listen for the `result` event from the Geocoder // `result` event is triggered when a user makes a selection
        //  Add a marker at the result's coordinates
        geocoder.on('result', (event) => {
            map.getSource('single-point').setData(event.result.geometry);
            var marker = new mapboxgl.Marker({
                    draggable: true,
                    color: "#1da1f2"
                })
                .setLngLat(event.result.center)
                .addTo(map)
            $('.mapboxgl-ctrl-geocoder--input').val(event.result.center[0] + ',' + event.result.center[1]);
            $('#coordinates_selected').val('');
            $('#coordinates_selected').val(event.result.center[0] + ',' + event.result.center[1]);
            marker.on('dragend', function(e) {
                var lngLat = e.target.getLngLat();
                $('.mapboxgl-ctrl-geocoder--input').val('');
                $('#coordinates_selected').val('');
                $('#coordinates_selected').val(lngLat['lng'] + ',' + lngLat['lat']);
                $('.mapboxgl-ctrl-geocoder--input').val(lngLat['lng'] + ',' + lngLat['lat']);
            })
        });
    });
});

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