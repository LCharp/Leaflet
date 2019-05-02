
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Leaflet</title>
		<meta name="author" content="Lucas" />
		<!-- Date: 2019-01-23 -->

		<!-- Insertion code CSS de LEAFLET -->

		<link rel="stylesheet" href="lib/leaflet/leaflet.css"	/>

		<!-- Include du Javascript de LEAFLET -->


	</head>

	<body>
		 <center><div id="map"style ="height: 600px; width: 800px;"></center>
		<script src="lib/leaflet/leaflet.js"></script>
    <script src="lib/leaflet/leaflet-color-markers.js"></script>
		<script src="map2.js"></script>
		<script>
			//On crée la map
			var map = createMap("map");

			//On créer un controle de layer :




			//On crée la var du layer on peut n'en créer qu'un seule :
			var osmLayer = createLayer("https://{s}.tile.openstreetmap.org", {}),
			topoLayer = createLayer("https://{s}.tile.opentopomap.org", {}),
			thunderforest = createLayer("https://{s}.tile.thunderforest.com/spinal-map",{}),
			pioneer = createLayer("https://{s}.tile.thunderforest.com/pioneer",{}),
			watercolor = createLayer("https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor",{})

			//On créer une variable qui récupère les layers sous forme de tableau
			var base_map = {
						"<span style='color: gray'>OSM</span>": osmLayer,
						"<span style='color: purple'>Topo</span>":  topoLayer,
						"<span style='color: green'>Thunder</span>":  thunderforest,
						"<span style='color: blue'>Pioneer</span>":  pioneer,
						"<span style='color: orange'>Watercolor</span>":   watercolor

			};


			//On ajouter le layer à la carte
			//layer par défaut
			addOnMap(map,osmLayer);

			//on passe le controleur de couche avec la variable des layers dans la carte
			addOnMap(map,L.control.layers(base_map));


			var marker = addMarkerBlue(map, 46.791745, 1.695929,"C'est chez moi");
      var marker = addMarkerRed(map, 47.904573, 1.919619,"C'etait chez moi");
      var marker = addMarkerGreen(map, 43.212272, 2.352228,"C'est chez moi actuellement");



		</script>
		 </div><br />

	</body>
</html>
