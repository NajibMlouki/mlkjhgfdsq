<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 include './logger.php';
include './DB.php';
include './GMapEvent.php';
new logTracing("hhhhhhhhhhhh");
// Gets data from URL parameters
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];

$output= " File: addMarker.php,
    address  $address 
    lat $lat 
    lng $lng 
    type  $type ";

new logTracing($output);

$gmapEvent = new GMapEvent();
echo $gmapEvent->addMarker(52,$address,$lat,$lng,$type);

?>