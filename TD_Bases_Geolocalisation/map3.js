
var config = {};
config.zoom =6;
config.lat=46.81;
config.lng =1.70;

//Leaflet map object
var map;

/**
*@function createMap
* @param string html containerId
*  @retunr leaflet object map
*/
function createMap (containerId){
	var map = L.map(containerId).setView([config.lat,config.lng], config.zoom);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox.streets',
		accessToken: 'your.mapbox.access.token'
	}).addTo(map);
	return map;
}


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


/**
*@function addOnMap
* @param json options
* @return leaflet objet
*/
function addOnMap (map, object){
	object.addTo(map);
}


/**
*@function addMarker
* @param map, lat, lng, popupContent
* @return marker
*/
function addMarkerBlue (map, lat, lng, popupContent){
	var marker = L.marker([lat,lng],{"draggable":true});
	marker.addTo(map);
	if (typeof popupContent !== "undefined"){
		marker.bindPopup(popupContent);
	}
	marker.on("dragend", function markerDrag(evt){
		var new_coordo = evt.target.getLatLng();
		this.bindPopup(new_coordo.toString()).openPopup();
		console.log(evt);
		var lat = evt.target._latlng.lat;
					   var lng = evt.target._latlng.lng;

					   $("td span#latble").html(lat);
					   $("td span#lngble").html(lng);
					   $("#list").prepend('<li data-lat="'+lat+'" data-lng="'+lng+'" class="list-group-item list-group-item-info">'+lat+" <br/> "+lng+'</li>');
	});
	return marker;
}


/**
*@function addMarker
* @param map, lat, lng, popupContent
* @return marker
*/
function addMarkerGreen (map, lat, lng, popupContent){
	var marker = L.marker([lat,lng],{icon: greenIcon, "draggable":true});
	marker.addTo(map);
	if (typeof popupContent !== "undefined"){
		marker.bindPopup(popupContent);
	}
	marker.on("dragend", function markerDrag(evt){
		var new_coordo = evt.target.getLatLng();
		this.bindPopup(new_coordo.toString()).openPopup();
		console.log(evt);
		var lat = evt.target._latlng.lat;
					   var lng = evt.target._latlng.lng;

					   $("td span#latgre").html(lat);
					   $("td span#lnggre").html(lng);
					   $("#list").append('<li data-lat="'+lat+'" data-lng="'+lng+'" class="list-group-item list-group-item-success">'+lat+"<br/>  "+lng+'</li>');

	});
	return marker;
}


/**
*@function addMarker
* @param map, lat, lng, popupContent
* @return marker
*/
function addMarkerRed (map, lat, lng, popupContent){
	var marker = L.marker([lat,lng],{icon: redIcon, "draggable":true});
	marker.addTo(map);
	if (typeof popupContent !== "undefined"){
		marker.bindPopup(popupContent);
	}
	marker.on("dragend", function markerDrag(evt){
		var new_coordo = evt.target.getLatLng();
		this.bindPopup(new_coordo.toString()).openPopup();
		console.log(evt);
		var lat = evt.target._latlng.lat;
					   var lng = evt.target._latlng.lng;
					   $("td span#latred").html(lat);
					   $("td span#lngred").html(lng);
					   $("#list").prepend('<li data-lat="'+lat+'" data-lng="'+lng+'" class="list-group-item list-group-item-danger">'+lat+" <br/> "+lng+'</li>');
	});
	return marker;
}




function onclick(e){

	var coordo_popup = e.latlng;
	  var lat = coordo_popup.lat;
		var lng = coordo_popup.lng;
			   $("p span#lat").html(lat);
			   $("p span#lng").html(lng);
				 $("#list2").prepend('<li data-lat="'+lat+'" data-lng="'+lng+'" class="list-group-item list-group-item-light">'+""+lat+" <br/> "+lng+'<a></li>');
	console.log(e);
}
