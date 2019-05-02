
	L.marker([46.791745, 1.695929]).addTo(map)
		.bindPopup("<b>C'est chez moi</b><br />I am a popup.").openPopup();

	L.circle([46.83, 1.6970], 500, {
		color: 'red',
		fillColor: '#f03',
		fillOpacity: 0.5
	}).addTo(map).bindPopup("I am a circle.");

	L.polygon([
		[46.81, 1.7],
		[46.82, 1.725],
		[46.8125, 1.7]
	]).addTo(map).bindPopup("I am a polygon.");


	var popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("You clicked the map at " + e.latlng.toString())
			.openOn(map);
	}

	map.on('click', onMapClick);
