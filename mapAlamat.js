mapboxgl.accessToken = 'pk.eyJ1IjoibWlrLXNlYSIsImEiOiJjazdyMW95M2owMDZhM2xucWFtYzcwcDNsIn0.9dq7O9jbbZmJs69KHcg_Aw';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [106.85,-6.21],
    zoom: 10
});

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl
});

geocoder.on('result',function(e){
    $("#alamat").text(e.result.place_name)
})
map.addControl(geocoder);