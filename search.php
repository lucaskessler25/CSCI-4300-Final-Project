<!DOCTYPE html>
<html> 
<head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script>
    function initialize() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: new google.maps.LatLng(40.1957,-76.0134),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker;
        var location = {};
        var markers = document.getElementsByTagName("marker");

        for (var i = 0; i < markers.length; i++) {
            location = {
                name : markers[i].getAttribute("html"),
                address : markers[i].getAttribute("address"),
                city : markers[i].getAttribute("city"),
                state : markers[i].getAttribute("state"),
                zip : markers[i].getAttribute("zip"),
                pointlat : parseFloat(markers[i].getAttribute("lat")),
                pointlng : parseFloat(markers[i].getAttribute("lng")),
				id : parseFloat(markers[i].getAttribute("id"))
            };

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.pointlat, location.pointlng),
                map: map
            });
			
			google.maps.event.addListener(marker, 'mouseover', (function(marker,location) {
				return function() {
					infowindow.setContent(location.name);
					infowindow.open(map, marker);
				};
			})(marker, location));
			
            google.maps.event.addListener(marker, 'click', (function(marker,location) {
                return function() {
					window.location = "/profile.php?search=" + location.id;
                };
            })(marker, location));
        }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head> 
<body>
    <markers>
	<?php 
	$pdo = new PDO(
		"mysql:host=localhost;dbname=fieldtotable",
		'root',
		''
	);
	$sql = "SELECT * FROM markers";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        echo '<marker id="' . $row['ID'] . '" zip="' . $row['zip'] . '" state="' . $row['state'] .'" city="'. $row['city'] .'" address="' . $row['address'] . '" lng="' . $row['lng'] . '" lat="' . $row['lat'] . '" html="' . $row['name'] . '"></marker>';
	?>
    </markers>

    <div id="map" style="width: 600px; height: 600px;"></div>
</body>
</html>