
<!DOCTYPE html>
<html>
<head>

    <title>Quick Start - Leaflet</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="lib/leaflet/leaflet.css">


</head>
<body>

    <div id="mapid" style="width: 600px; height: 400px;"></div>

    <script src="lib/leaflet/leaflet.js"></script>
    <script src="map.js"></script>
    <script>
    //create map
    createMap("map");

    // create layer tile
    var osmLayer = createLayer("https://{s}.tile.openstreetmap.org", {});
    var otmLayer = createLayer("https://{s}.tile.opentopomap.org", {});



    // add control layer on the map
    var baseMaps = {
    		"OSM": osmLayer,
    		"OTM": otmLayer
		};

        // add layer on the map
        addOnMap(map,osmLayer);
        addOnMap(map,L.control.layers(baseMaps));
        //addBaseLayer(controlLayers,"OTM",otmLayer);
        L.marker([46.791745, 1.695929]).addTo(map)
    		.bindPopup("<b>C'est chez moi</b><br />I am a popup.").openPopup();
        //addMarker([46.791745, 1.695929],"Coucou");
</script>




</body>
</html>
