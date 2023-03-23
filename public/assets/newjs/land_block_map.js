//load map on lamnd block
var term_id = $('#term_id').val();
Load_land_block_map(term_id);

function Load_land_block_map(term_id) {
    var baseurl = $('#base_url').val();
    var url = baseurl + 'Land_block_data/' + term_id;
    $.ajax({
        url: url,
        type: 'GET',
        success: function (response) {
            if (response.status == 'success') {


                var array = response.data.property.post_district.value.split(',');
                mapboxgl.accessToken = 'pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
                mapboxgl.setRTLTextPlugin(
                    'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
                    null,
                    true // Lazy load the plugin
                );

                const map = new mapboxgl.Map({
                    container: 'map',
                    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                    style: 'mapbox://styles/mapbox/satellite-streets-v12',
                    center: [array[0], array[1]],
                    zoom: 1.5
                });


                let hoveredStateId = null;

                //api data for lands
                var feature = {
                    "type": "FeatureCollection",
                    "features": response.data.map
                };


                map.on('load', () => {

                    map.addSource('maine', {
                        'type': 'geojson',
                        'generateId': true,
                        'data': feature
                    });

                    // When the user clicks we'll update the
                    // feature state for the feature under the mouse.

                    map.on('click', function (e) {
                        var features = map.queryRenderedFeatures(e.point, {
                            layers: ['land-fills']
                        });
                        if (!features.length) {
                            return;
                        }
                        if (typeof map.getLayer('click-color') !== "undefined") {
                            map.removeLayer('click-color')
                            map.removeSource('click-color');
                        }
                        var feature = features[0];
                        var land_type = features[0].properties.name + ' Land';
                        if (locale == 'ar') {
                            land_type = features[0].properties.name + ' أرض';
                        }
                        //put values on click
                        $('#piece_no').text(features[0].properties.plot_num);
                        $('#price_piece').text(features[0].properties.price);
                        $('#type').text(land_type);
                        $('#planned_number').text(features[0].properties.planned_number);
                        $('#area_land').text(features[0].properties.total_area);
                        $('#left_area').text(features[0].properties.left_measurement);
                        $('#right_area').text(features[0].properties.right_measurement);
                        $('#top_area').text(features[0].properties.top_measurement);
                        $('#bottom_area').text(features[0].properties.bottom_measurement);
                        //I think you could add the vector tile feature to the map, but I'm more familiar with JSON
                        map.addSource('click-color', {
                            "type": "geojson",
                            "data": feature.toJSON()
                        });
                        map.addLayer({
                            "id": "click-color",
                            "type": "fill",
                            "source": "click-color",
                            "layout": {},
                            "paint": {
                                "fill-color": "white",
                                'fill-opacity': [
                                    'case',
                                    ['boolean', ['feature-state', 'hover'], false],
                                    0.1,
                                    0.5
                                ]
                            }
                        }, 'points-measuements');
                    });

                    //click effect of color of commercial
                    map.on('click', function (e) {
                        var features = map.queryRenderedFeatures(e.point, {
                            layers: ['commercial-land-fills']
                        });
                        if (!features.length) {
                            return;
                        }
                        if (typeof map.getLayer('click-color') !== "undefined") {
                            map.removeLayer('click-color')
                            map.removeSource('click-color');
                        }
                        var feature = features[0];
                        $('#piece_no').text(features[0].properties.plot_num);
                        $('#price_piece').text(features[0].properties.price);
                        //I think you could add the vector tile feature to the map, but I'm more familiar with JSON
                        map.addSource('click-color', {
                            "type": "geojson",
                            "data": feature.toJSON()
                        });
                        map.addLayer({
                            "id": "click-color",
                            "type": "fill",
                            "source": "click-color",
                            "layout": {},
                            "paint": {
                                "fill-color": "white",
                                'fill-opacity': [
                                    'case',
                                    ['boolean', ['feature-state', 'hover'], false],
                                    0.1,
                                    0.5
                                ]
                            }
                        }, 'points-measuements');
                    });
                    // Change the cursor to a pointer when
                    // the mouse is over the states layer.
                    map.on('mouseenter', 'land-fills', () => {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    // Change the cursor back to a pointer
                    // when it leaves the states layer.
                    map.on('mouseleave', 'land-fills', () => {
                        map.getCanvas().style.cursor = '';
                    });

                    map.on('mouseenter', 'commercial-land-fills', () => {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    // Change the cursor back to a pointer
                    // when it leaves the states layer.
                    map.on('mouseleave', 'commercial-land-fills', () => {
                        map.getCanvas().style.cursor = '';
                    });


                    //for polygon colors of residential
                    map.addLayer({
                        'id': 'land-fills',
                        'type': 'fill',
                        'source': 'maine',
                        'layout': {},
                        'paint': {
                            'fill-color': '#fffd8d', //292071
                            'fill-opacity': [
                                'case',
                                ['boolean', ['feature-state', 'hover'], false],
                                0.3,
                                0.5
                            ]
                        }
                    });
                    //for commercial land
                    map.addLayer({
                        'id': 'commercial-land-fills',
                        'type': 'fill',
                        'source': 'maine',
                        'layout': {},
                        'paint': {
                            'fill-color': 'red', //292071
                            'fill-opacity': [
                                'case',
                                ['boolean', ['feature-state', 'hover'], false],
                                0.3,
                                0.5
                            ]
                        },
                        'filter': ['==', ['get', 'type'], 'Commercial']
                    });
                    //for borders
                    map.addLayer({
                        'id': 'state-borders',
                        'type': 'line',
                        'source': 'maine',
                        'layout': {},
                        'paint': {
                            'line-color': 'white',
                            'line-width': 1
                        }
                    });




                    // When the user moves their mouse over the state-fill layer, we'll update the
                    // feature state for the feature under the mouse.
                    map.on('mousemove', 'land-fills', (e) => {
                        if (e.features.length > 0) {
                            if (hoveredStateId !== null) {
                                map.setFeatureState({
                                    source: 'maine',
                                    id: hoveredStateId
                                }, {
                                    hover: false
                                });
                            }
                            hoveredStateId = e.features[0].id;
                            map.setFeatureState({
                                source: 'maine',
                                id: hoveredStateId
                            }, {
                                hover: true
                            });
                        }
                    });


                    map.on('mousemove', 'commercial-land-fills', (e) => {
                        if (e.features.length > 0) {
                            if (hoveredStateId !== null) {
                                map.setFeatureState({
                                    source: 'maine',
                                    id: hoveredStateId
                                }, {
                                    hover: false
                                });
                            }
                            hoveredStateId = e.features[0].id;
                            map.setFeatureState({
                                source: 'maine',
                                id: hoveredStateId
                            }, {
                                hover: true
                            });
                        }
                    });

                    // When the mouse leaves the state-fill layer, update the feature state of the
                    // previously hovered feature.
                    map.on('mouseleave', 'land-fills', () => {
                        if (hoveredStateId !== null) {
                            map.setFeatureState({
                                source: 'maine',
                                id: hoveredStateId
                            }, {
                                hover: false
                            });
                        }
                        hoveredStateId = null;
                    });

                    map.on('mouseleave', 'commercial-land-fills', () => {
                        if (hoveredStateId !== null) {
                            map.setFeatureState({
                                source: 'maine',
                                id: hoveredStateId
                            }, {
                                hover: false
                            });
                        }
                        hoveredStateId = null;
                    });

                    // symbol label layer
                    map.addLayer({
                        'id': 'points-measuements',
                        'type': 'symbol',
                        'source': 'maine',
                        "minzoom": 15,
                        paint: {
                            "text-color": "#ffffff"
                        },
                        layout: {
                            'text-field': ['get', 'plot_num'],
                            "text-font": ["Arial Unicode MS Bold"],
                            'text-size': 11,
                        },
                        'filter': ['==', '$type', 'Point']
                    });


                    //  // symbol label layer
                    //  map.addLayer({
                    //     'id': 'points-measuementss',
                    //     "type": "line",
                    //     "source": {
                    //         "type": "geojson",
                    //         "data": {
                    //             "type": "Feature",
                    //             "properties": {},
                    //             "geometry": {
                    //                 "type": "LineString",
                    //                 "coordinates":[46.593199696435704,25.003672997776633],
                    //             }
                    //         }
                    //     },
                    //     // 'source': 'maine',
                    //     // "minzoom": 14,
                    //     layout: {
                    //         'line-join': 'round',
                    //         'line-cap': 'round',
                    //       },
                    //             "paint": {
                    //                 "line-color": "white",
                    //                 "line-width": 8,
                    //                 "line-dasharray": [0.2, 2]
                    //             }
                    // });

                    map.flyTo({ center: [array[0], array[1]], zoom: 14, duration: 5000 })
                    on_load_map(array[0], array[1])

                });

                //add conrtols on map
                map.addControl(new mapboxgl.NavigationControl());
            }
            else if (response.status == 'error') {
                $('#map').prepend('<img src=' + baseurl + 'assets/images/error.jpg />')
            }
        }
    });
}



function on_load_map(long, lat) {
    var long = long;
    var lat = lat;
    var url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + long + ',' + lat + '.json?country=sa&access_token=pk.eyJ1IjoicmFrYW5vbmxpbmUiLCJhIjoiY2xjeGpsMmdxMG05ajN2cXJocm5mazV3diJ9.puFe2Kj4KfE5v9Ky20ohYg';
    $.ajax({
        type: 'get',
        url: url,
        success: function (response) {
            $('#full_address').text(response.features[0].place_name);

        }
    });
}
