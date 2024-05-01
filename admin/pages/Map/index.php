<?php
require '/xampp/htdocs/Banquet-house/connection/config.php';
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:../../../login/index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

</head>

<body>
    <div id="map"></div>
    <input type="hidden" id="latitude" name="latitude" value="">
    <input type="hidden" id="longitude" name="longitude" value="">
    <input type="text" id="address" name="address" placeholder="address" required>
    <input type="detail" id="detail" name="detail" placeholder="detail" required>
    <button type="submit" id="submit">Submit</button>


</body>
<style>
    #map {
        width: 100%;
        height: 500px;
    }
</style>
<script>
    var map = L.map('map').setView([27.6588, 85.3247], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 18
    }).addTo(map);

    var marker = L.marker([27.6588, 85.3247], {
        draggable: true
    }).addTo(map);
    marker.on('dragend', function(event) {
        var marker = event.target;
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat;
        document.getElementById('longitude').value = position.lng;
        updateAddress();
    });

    // Add search control
    var searchControl = L.Control.geocoder({
        placeholder: 'Search for an address...',
        defaultMarkGeocode: false,
        collapsed: false,
    }).addTo(map);

    function updateAddress() {
        var latlng = marker.getLatLng();
        var geocoder = L.Control.Geocoder.nominatim();
        geocoder.reverse(latlng, map.options.crs.scale(map.getZoom()), function(results) {
            var r = results[0];
            if (r) {
                document.getElementById('address').value = r.name + ', ' + r.city + ', ' + r.state + ', ' + r
                    .country;
            }
        });
    }

    // Handle geocode event
    searchControl.on('markgeocode', function(e) {
        marker.setLatLng(e.geocode.center);
        map.setView(e.geocode.center, 15);
        document.getElementById('latitude').value = e.geocode.center.lat;
        document.getElementById('longitude').value = e.geocode.center.lng;
        document.getElementById('address').value = e.geocode.name;
    });
</script>
<script>
    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();
        var latitude = document.getElementById('latitude').value;
        var longitude = document.getElementById('longitude').value;
        var address = document.getElementById('address').value;
        var detail = document.getElementById('detail').value;
        if (address === '' || detail === '') {
            alert('Please enter both address and detail');
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert(xhr.responseText);
                } else {
                    console.log('Error: ' + xhr.status);
                }
            }
        };
        xhr.open('POST', 'save_location.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        var data = 'latitude=' + encodeURIComponent(latitude) + '&longitude=' + encodeURIComponent(longitude) +
            '&address=' + encodeURIComponent(address) + '&detail=' + encodeURIComponent(detail);
        console.log(data);
        xhr.send(data);
    });
</script>


</html>