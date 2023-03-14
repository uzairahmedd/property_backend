var coordinates = $('#map_coordinates').val();
var array = coordinates.split(',');
mapboxgl.accessToken = 'pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
mapboxgl.setRTLTextPlugin(
    'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
    null,
    true // Lazy load the plugin
);
const map = new mapboxgl.Map({
    container: 'map', // Container ID
    style: 'mapbox://styles/mapbox/streets-v12', // Map style to use
    center: [array[0], array[1]], // Starting position [lng, lat]
    zoom: 13, // Starting zoom level
    interactive: true,
});

const marker = new mapboxgl.Marker({
    draggable: false,
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
            "circle-radius": 100,
            // Color circles by ethnicity, using a `match` expression.
            "circle-color": "#1da1f2",
            "circle-stroke-color": "red",
            "circle-opacity": 0.2,
            "circle-stroke-opacity": 0.5,
            "circle-stroke-width": 5
        }
    });
});