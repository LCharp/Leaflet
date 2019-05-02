
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Leaflet</title>
	<meta name="author" content="Lucas" />
	<link rel="stylesheet" href="lib/leaflet/leaflet.css"	/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<center>
		<div id="map"style ="height: 600px; width: 800px; margin-top:15px;">
		</div>
		<center>
			<hr>
			<div>
				<select id="choix" >
					<option selected>--- Choisir une ville ---</option>
					<option data-coordlg="1.695929" data-coordlt="46.791745" value="Chateauroux" >Châteauroux</option>
					<option data-coordlg="1.919619"  data-coordlt="47.904573" value="Orleans"  >Orléans</option>
					<option data-coordlg="2.352228"  data-coordlt="43.212272" value="Carcassonne">Carcassonne</option>
				</select>


			</div>

			<TABLE class="table table-sm table-bordered" style="width: 50%; margin-top: 15px; ">
				<TR style="text-align: center; color:#4C4341">
					<TH COLSPAN=2 class="table-info">Bleu</TH>
					<TH COLSPAN=2  class="table-danger" >Rouge</TH>
					<TH COLSPAN=2  class="table-success">Vert</TH>
				</TR>
				<TR style="text-align: center;color:#4C4341">
					<TH >Lattitude</TH> <TH>Longitude</TH><TH>Lattitude</TH> <TH>Longitude</TH><TH>Lattitude</TH> <TH>Longitude</TH>

				</TR>
				<TR style="text-align: center;">
					<TD><span id="latble"></span></TD> <TD><span id="lngble"></span></TD><TD><span id="latred"></span></TD> <TD><span id="lngred"></span></TD><TD><span id="latgre"></span></TD> <TD><span id="lnggre"></span></TD>
				</TR>
			</TABLE>
			<div class="container">
				<div class="row">
					<div class="col">
						<p>Historique des markers :</p>
						<ul class="list-group" id="list"style="width: 50%; margin-top: 5px; margin-bottom: 5px;" >
						</ul>
					</div>
					<div class="col">
						<p>Historique des clics :
						<ul class="list-group" id="list2" style="width: 50%; margin-top: 5px; margin-bottom: 5px;" >
						</ul>
					</div>
					</div>
			</div>
	</center>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="lib/jquery/jquery.min.js"></script>
	<script src="lib/leaflet/leaflet.js"></script>
	<script src="lib/leaflet/leaflet-color-markers.js"></script>
	<script src="map3.js"></script>
	<script>

	function onLocationFound(e) {
		var radius = e.accuracy / 2;

		L.marker(e.latlng).addTo(map)
			.bindPopup("You are within " + radius + " meters from this point").openPopup();

		L.circle(e.latlng, radius).addTo(map);
	}

	$("#list").on("click","li", function(){
		var lat_list = $(this).attr("data-lat");
		var lng_list = $(this).attr("data-lng");
		map.flyTo(new L.LatLng(lat_list,lng_list));
		console.log(lat_list);
	});

	$("#list2").on("click","li", function(){
		var lat_list = $(this).attr("data-lat");
		var lng_list = $(this).attr("data-lng");
		map.flyTo(new L.LatLng(lat_list,lng_list));
		console.log(lat_list);
	});

	$(document).ready(function(){
	$("select#choix").change(function(){
			var selectedOption =$("select#choix option:selected");

			var lat_list = selectedOption.attr("data-coordlt");
			var lng_list = selectedOption.attr("data-coordlg");
			map.flyTo(new L.LatLng(lat_list,lng_list));
			console.log(lat_list);
			});
		});


		var map = createMap("map");

		var osmLayer = createLayer("https://{s}.tile.openstreetmap.org", {}),
		topoLayer = createLayer("https://{s}.tile.opentopomap.org", {})

		var base_map = {
			"<span style='color: gray'>OSM</span>": osmLayer,
			"<span style='color: purple'>Topo</span>":  topoLayer

		};

		addOnMap(map,osmLayer);

		addOnMap(map,L.control.layers(base_map));

		var marker = addMarkerBlue(map, 46.791745, 1.695929,"C'est chez moi");
		var marker = addMarkerRed(map, 47.904573, 1.919619,"C'etait chez moi");
		var marker = addMarkerGreen(map, 43.212272, 2.352228,"C'est chez moi actuellement");

		map.on ('click', onclick);
	</script>

</body>
</html>
