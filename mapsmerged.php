<!DOCTYPE html>
<?
require("getlocation2.php");

//connection to the database
$conn = mysqli_connect('localhost' ,$username,$password,$database);
if(!$conn){
	die("Connection Failed;" .mysqli_connect_error() );
	
}
?>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
 <title>Your Direcctions</title>
 <style type="text/css">
 body { font: normal 10pt Helvetica, Arial; }
 #map { width: 350px; height: 300px; border: 0px; padding: 0px; }
 </style>
 <script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
 <script type="text/javascript">
 //var icon the icon used is the google maps icon
 var icon= new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/micons/blue.png",
 new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 //lat and lng of the points
 function addMarker(lat,lng,name){
 var pt = new google.maps.LatLng(lat, lng);
 bounds.extend(pt);
 var marker = new google.maps.Marker({
 position: pt,
 icon: icon,
 map: map
 });
 //maximum width of the info window which is 300px
  var popup = new google.maps.InfoWindow({
 content: info,
 maxWidth: 300
 });
 google.maps.event.addListener(marker, "click", function() {
 if (currentPopup != null) {
 currentPopup.close();
 currentPopup = null;
 }
 popup.open(map, marker);
 currentPopup = popup;
 });
 google.maps.event.addListener(popup, "closeclick", function() {
 map.panTo(center);
 currentPopup = null;
 });
 function initMap() {
 map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(0, 0),
 zoom: 14,
 mapTypeId: google.maps.MapTypeId.ROADMAP,
 mapTypeControl: false,
 mapTypeControlOptions: {
 style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 },
 navigationControl: true,
 navigationControlOptions: {
 style: google.maps.NavigationControlStyle.SMALL
 }
 });

}
<?
if(isset($_POST['submit'])){
	
	$sacco=($_POST['sacconame']);
	
	$xml='<?xml version="1.0" encoding="UTF-8"?>';
	
	$stmt=$conn->prepare("SELECT  `name`, `lat`, `lng` FROM `markers` WHERE `name`=?");
	$stmt->bind_param('s',$sacco);
    $stmt->execute();
	$results= $stmt->get_result();
	while($row = $results->fetch_array(MYSQLI_ASSOC)){
	  $name=$row['name'];
	  $lat=$row['lat'];
	  $lng=$row['lng'];
	  
	echo ("addMarker($lat, $lon,'<b>$name</b><br/>);\n");
?>
center = bounds.getCenter();
 map.fitBounds(bounds);
 
 }
 </script>
 </head>
 <body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
 <div id="map"></div>


</html>