//-Script ici car qd navigateur lit, c'est de haut en bas et mettre le script ici car peut bloquer, permet de mieux identifier les bugs

//on passe les dÃ©finition de la carte en variable directement qu'on peut mettre en paramÃ¨tre dans var mymap :
var config = {};
config.zoom =6;
config.lat=46.81;
config.lng =1.70;


var map;

/**
*@function createMap
* @param string html containerId
*  @retunr leaflet object map
*/

function createMap (containerId){

	var map = L.map(containerId).setView([config.lat,config.lng], config.zoom);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		zoomControl : false,
		maxZoom: 18,
		minZoom:9,
		id: 'mapbox.streets',
		accessToken: 'your.mapbox.access.token'
	}).addTo(map);
	return map;
}

//On peut faire une fonction qui crÃ©er les layers:

/**
*@function createLayer
* @param string url
* @param json options
* @return leaflet objet layer
*/

function createLayer (url, options){

	var layerOptions = {};
	if(typeof options.maxZoom !== "undefined"){
		layerOptions.maxZoom = options.maxZoom;

	}

	if(typeof options.attribution !== "undefined"){
		layerOptions.attribution = options.attribution;

	}

	var layer = L.tileLayer(url +"/{z}/{x}/{y}.png",layerOptions);



	return layer;
}

// On crÃ©er une fonction qui ajoute le layer  Ã  la carte :
/**
*@function addOnMap
* @param json options
* @return leaflet objet
*/

function addOnMap (map, object){
	object.addTo(map);
}

//fonction pour crÃ©er un marker avec un popup -+ qui si le marker est dÃ©^placÃ© renvoit les nouvelles coordonÃ©es
/**
*@function addMarker
* @param map, lat, lng, popupContent
* @return marker
*/
function addMarker (map, lat, lng, popupContent){
	var marker = L.marker([lat,lng],{"draggable":true});
	marker.addTo(map);

	if (typeof popupContent !== "undefined"){
		marker.bindPopup(popupContent);
	}



	marker.on("dragend", function markerDrag(evt){
		/*var new_coordo = evt.target.getLatLng();
		this.bindPopup(new_coordo.toString()).openPopup();
		console.log(evt);*/

		var lat = evt.target._latlng.lat;
		var lng = evt.target._latlng.lng;

		$("p span#lat").html(lat);
		$("p span#lng").html(lng);


		$("#list").append("<li data-lat="+lat+" data-lng="+lng+">"+lat+lng+"</li>");



	});
	return marker;
}




function onclick(e){

	var coordo_popup = e.latlng;
	/*var popup = L.popup()
	.setLatLng(e.latlng)
	.setContent(e.latlng.toString())
	.openOn(map);*/

	var lat = coordo_popup.lat;
	var lng = coordo_popup.lng;

	$("p span#lat").html(lat);
	$("p span#lng").html(lng);
	$("#list2").prepend("<li>"+lat+lng+"</li>");


	//alert (e.latlng);
	console.log(e);
}
