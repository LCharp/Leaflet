
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Leaflet</title>
    <meta name="author" content="Lucas" />
    <link rel="stylesheet" href="lib/leaflet/leaflet.css"	/>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>


<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h4>Carte interactive des vignobles</4>
                </div>
            </div>
            <div class="row" style="margin-top:2%;">
                <div class="col-4">
                    <h5>Le Minervois</h2>
                        <p>Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus</p>
                        <div class="row">
                            <button id="centre" type="button" data-lat=" 43.3" data-lng="2.5667" class="btn btn-primary">Zoom Minervois</button>
                        </div>
                        <div class="row">
                            <button id="ville" data-lat=" 43.212161" data-lng=" 2.353663"  type="button" class="btn btn-primary" style="margin-top:3px;">Charger les communes</button>
                        </div>
                        <div class="row">
                            <button id="plantes" data-lat="43.10937998980208" data-lng=" 2.9817152023315434" type="button" class="btn btn-primary" style="margin-top:3px;margin-right:5px;">Charger les plantes</button>
                            <button type="button" class="btn btn-primary"  style="margin-top:3px;margin-right:5px;">Coucou</button>
                            <button type="button" class="btn btn-primary"  style="margin-top:3px;margin-right:5px;">Coucou</button>
                        </div>

                    </div>
                    <div class="col-4">
                        <h5>Le Bordelais</h2>
                            <p>Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus</p>
                            <button id="centre" data-lng="-0.57918" data-lat="44.837789"  type="button" class="btn btn-primary">Zoom Bordeaux</button>
                        </div>
                        <div class="col-4">
                            <h5>Le Champagne</h2>
                                <p>Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus</p>
                                <button id="centre" data-lng="4.3667" data-lat="48.95" type="button" class="btn btn-primary">Zoom Champagne</button>
                            </div>
                        </div>
                        <div class="row" style="margin-top:2%;">
                            <div id="map"style ="height: 600px; width: 100%; margin-left:0px;"></div>
                        </div>
                    </div>
                </div>


                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="lib/jquery/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="lib/leaflet/leaflet.js"></script>
                <script src="lib/leaflet/leaflet-color-markers.js"></script>
                <script src="map4.js"></script>
                <script src="geojson/com11.geojson"></script>
                <script src="geojson/plantes.geojson"></script>
                <script>

                var map = createMap("map");

                //On créer un controle de layer :

                //On crée la var du layer on peut n'en créer qu'un seule :
                var osmLayer = createLayer("https://{s}.tile.openstreetmap.org", {}),
                topoLayer = createLayer("https://{s}.tile.opentopomap.org", {})


                //On créer une variable qui récupère les layers sous forme de tableau
                var base_map = {
                    "<span style='color: gray'>OSM</span>": osmLayer,
                    "<span style='color: purple'>Topo</span>":  topoLayer
                };

                //On ajouter le layer à la carte
                //layer par défaut
                addOnMap(map,osmLayer);

                //on passe le controleur de couche avec la variable des layers dans la carte
                addOnMap(map,L.control.layers(base_map));


                var marker = addMarker(map, 44.203142,0.616363,"Coucou !");

                //appel de la fonction qui affiche les coordonées au click sur la carte

                map.on ('click', onclick);

                //Function qui recentre la carte
                $(document).on("click", "button#centre", function(){
                    var lat_list = $(this).attr("data-lat");
                    var lng_list = $(this).attr("data-lng");

                    map.flyTo(new L.LatLng(lat_list,lng_list));
                    //map.setView([lat_list,lng_list], 20);

                    marker.setLatLng([lat_list,lng_list]);

                    console.log(lat_list);

                });

                $(document).on("click", "button#ville", function(){
                    var lat_list = $(this).attr("data-lat");
                    var lng_list = $(this).attr("data-lng");

                    map.flyTo(new L.LatLng(lat_list,lng_list),9);
                    //map.setView([lat_list,lng_list], 2);

                    marker.setLatLng([lat_list,lng_list]);

                    console.log(lat_list);

                });

                $(document).on("click", "button#ville", function(){
                    L.geoJSON(geojsonFeature, {
                        style: function(feature) {
                            switch (feature.properties.CODEARR) {
                                case '111': return {color: "#FFC309"};
                                case '112': return {color: "#09B1FF"};
                                case '113': return {color: "#8B09FF"};
                            }
                        },
                        onEachFeature: onEachFeature

                    }).addTo(map);

                });
                
                $(document).on("click", "button#plantes", function(){
                    L.geoJSON(plantes).addTo(map);
                });

                $(document).on("click", "button#plantes", function(){
                    var lat_list = $(this).attr("data-lat");
                    var lng_list = $(this).attr("data-lng");

                    map.flyTo(new L.LatLng(lat_list,lng_list),10);
                    //map.setView([lat_list,lng_list], 20);

                    marker.setLatLng([lat_list,lng_list]);

                    console.log(lat_list);

                });



                function onEachFeature(feature, layer) {
                    var popupContent="<p>Commune de "+feature.properties.NOM+" c'est une "+feature.properties.STATUT+", surface: "+feature.properties.SUPHA+" hectare et population : "+feature.properties.POP+" habitants</p>";
                    if (feature.properties && feature.properties.popupContent) {
                        popupContent+=feature.properties.popupContent;
                    }
                    layer.bindPopup(popupContent);
                }


            </script>
        </body>
        </html>
