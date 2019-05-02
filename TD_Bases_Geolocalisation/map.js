//-Script ici car qd navigateur lit, c'est de haut en bas et mettre le script ici car peut bloquer, permet de mieux identifier les bugs

//on passe les dÃ©finition de la carte en variable directement qu'on peut mettre en paramÃ¨tre dans var mymap :
			var config = {};
			config.zoom =13;
			config.lat=46.8167;
			config.lng =1.7;


//ligne qui permet d'identifier le conteneur html// L.map = leaflet.map // dans lequel sera charge la carte/ setView dÃ©fini la vue de la carte / on dÃ©finit la longitude, lattitude et zoom de la carte.
//13 c'est le zoom.

//On peut faire une fonction qui crÃ©er la carte :

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

	//fonction pour crÃ©er un marker avec un popup
/**
 *@function addMarker
 * @param map, lat, lng, popupContent
 * @return marker
 */
		 	function addMarker (map, lat, lng, popupContent){
				var marker = L.marker([lat,lng]);
				marker.addTo(map);
				if (typeof popupContent !== "undefined"){
					marker.bindPopup(popupContent);
				}

				return marker;
			};
