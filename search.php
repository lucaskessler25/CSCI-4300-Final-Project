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
                pointlng : parseFloat(markers[i].getAttribute("lng"))
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
					window.location = "/index.php?name=" + location.name;
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
		#test
        echo '<marker zip="17507" state="Pennsylvania" city="Bowmansville" address="1363 Bowmansville Rd." county="Lancaster" lng="-76.0134" lat="40.1957" html="Reading Equipment & Distribution (Bowmansville)"></marker>
        <marker zip="18071" state="Pennsylvania" city="Palmerton" address="1226 Little Gap Road" county="Carbon" lng="-75.617" lat="40.8083" html="SMF"></marker>
        <marker zip="18020" state="Pennsylvania" city="Bethlehem" address="2706 Brodhead Road" county="Northampton" lng="-75.3696" lat="40.6269" html="Versalift East, LLC (Specialty)"></marker>
        <marker zip="19720" state="Delaware" city="New Castle" address="203 Pigeon Point Road" county="New Castle" lng="-75.5954" lat="39.6733" html="Auto Port, Inc."></marker>'
	?>
    </markers>

    <div id="map" style="width: 500px; height: 400px;"></div>
</body>
</html>