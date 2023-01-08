<script>
    var depokLatLng = [-6.40, 106.79];
    var mapOptions = {
        center: depokLatLng,
        zoom: 13
    }
    var map = L.map('map', mapOptions);

    var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
    tileLayer.addTo(map);

    var marker = L.marker(depokLatLng).addTo(map);
    marker.bindPopup("<b>Hello world!</b><br>Koordinat: " + marker.getLatLng());

    var marker1;
    var marker2;
    var polyline;
    var count = 0;
    function onClick(e) {
        if (count > 1) {
            alert("Anda sudah memilih dua lokasi!!");
        } else {
            if (count == 0) {
                marker1 = L.marker(e.latlng);
                marker1.bindPopup("Location: " + e.latlng).addTo(map);
                document.getElementById("point1").innerHTML = "Point 1: " + e.latlng;
            } else {
                marker2 = L.marker(e.latlng);
                marker2.bindPopup("Location: " + e.latlng).addTo(map);
                document.getElementById("point2").innerHTML = "Point 2: " + e.latlng;

                var dist = marker1.getLatLng().distanceTo(marker2.getLatLng());
                document.getElementById("distance").innerHTML = "Distance: " + dist + " m";

                var latlngs = [
                    marker1.getLatLng(),
                    marker2.getLatLng()
                ];

                polyline = L.polyline(latlngs, { color: 'red' }).addTo(map);
            }
            count++;
        }
    }
    map.on('click', onClick);

    function reset() {
        marker1.remove();
        marker2.remove();
        polyline.remove();
        document.getElementById("point1").innerHTML = "Point 1: ";
        document.getElementById("point2").innerHTML = "Point 2: ";
        document.getElementById("distance").innerHTML = "Distance: ";
        count = 0;
    }
</script>