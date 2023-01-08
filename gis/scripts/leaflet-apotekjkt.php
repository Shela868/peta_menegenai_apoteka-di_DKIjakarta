<script type="text/javascript" src="assets/geojson/jkt-apotek.js"></script>
<script>
    var centerLatLng = [-6.17378417512639, 106.82722952589748];
    var mapOptions = {
        center: centerLatLng,
        zoom: 11
    }
    var map = L.map('map', mapOptions);

    var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
    tileLayer.addTo(map);

    var geojson;

    var geojsonMarkerOptions = {
        radius: 7,
        fillColor: "#ff7800",
        color: "#000",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    };

    function setCircleMarker(feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    }

    function getDescription(feature, layer) {
        if (feature.properties && feature.properties.NAMOBJ) {
            layer.bindPopup(feature.properties.NAMOBJ);
        }
    }

    var showMonasOnly = true;
    function filterMonas(feature, layer) {
        return (feature.properties && feature.properties.NAMOBJ && feature.properties.NAMOBJ == "Apotek Yeka Farma 21");
    }

    geojson = L.geoJSON(data, {
        pointToLayer: setCircleMarker,
        onEachFeature: getDescription
    }).addTo(map);

    function showMonas() {
        geojson.remove();

        if (showMonasOnly) {
            showMonasOnly = false;
            document.getElementById("showMonasBtn").innerHTML = "Show All";
            geojson = L.geoJSON(data, {
                pointToLayer: setCircleMarker,
                onEachFeature: getDescription,
                filter: filterMonas
            });
        } else {
            showMonasOnly = true;
            document.getElementById("showMonasBtn").innerHTML = "Show Monas Only";
            geojson = L.geoJSON(data, {
                pointToLayer: setCircleMarker,
                onEachFeature: getDescription
            });
        }

        geojson.addTo(map);
    }

</script>