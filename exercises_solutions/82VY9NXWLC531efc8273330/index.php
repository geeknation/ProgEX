<?php

$url="http://maps.googleapis.com/maps/api/geocode/json?address=South C,Nairobi&key=AIzaSyCVhh7lEde0khX5vIWHRFHWY8UCo9eLDoE";

$urlnearby=

$data=file_get_contents($url);

print_r($data);
?>