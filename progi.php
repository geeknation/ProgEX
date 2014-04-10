<?php

include "_archix/dbconn.inc.php";
include "_archix/Exercise.php";
include "_archix/User.php";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Upload your programming assignments to be done.</title>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBFp0uN_kqPSRFvcJNbjZDWi64eYLwD1is&sensor=false"></script>

		<style type="text/css">
			#map-canvas {
			
				height: auto;
			}

		</style>
	</head>
	<body>

		<div>
			<?php
			$newkey = 'AIzaSyDbimQ9nDAzirm34TsfcB7nbG8MW4CPqCs';
			//$filename = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&sensor=false&key=AIzaSyBFp0uN_kqPSRFvcJNbjZDWi64eYLwD1is";
			//$content = file_get_contents($filename);
			?>
		</div>

		<div id="map-canvas">

		</div>
		<span>Enter your location</span>:
		<input type="text" id="userlocation"/>
		<script type="text/javascript">
			function initialize() {
				var mapOptions = {
					center : (1.2833, 36.8167),
					zoom : 8
				};
				var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			}

			//var autocomplete = new google.maps.places.Autocomplete(document.getElementById("userlocation"));

			/*
			 function getCenter(map) {
			 var myLatLng = "";
			 google.maps.event.addDomListener(map, 'load', function(event) {
			 myLatLng = event.latLng;
			 var lat = myLatLng.lat();
			 var lng = myLatLng.lng();
			 });
			 window.alert(myLatLng);
			 return myLatLng;
			 }*/
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<?php
			
			$user=new User();
			
			$userId="c96303be4bf2a1c19c9b6c5de4c41eb4";
			$user->getEmail($userId);
		?>
	</body>
</html>

