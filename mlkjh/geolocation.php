<?php
include "inc/functions.php";

if (!isset($_SESSION['login'])) {
	header ('Location: signin.php');
	exit();
}
?>

<!DOCTYPE html>


<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">


<title>Mon Profil Doctunisie</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">



<link rel="stylesheet" href="./css/shim.css">

<link href="./css" media="screen" rel="stylesheet" type="text/css">
<link href="./css/common-48b47f12185172f2d1859c37be61963a.css" media="all" rel="stylesheet" type="text/css">
<!--[if lt IE 9]><link href="./css/standard_ie-c8073322d755e2f8867daa792ef89278.css" media="all" rel="stylesheet" type="text/css" /><![endif]-->

<script src="./js/application-ccb73cc251cb0b24f6438e07e16dc455.js" type="text/javascript"></script>
<script src="./js/application-2d39b9d84ac29fbd53e6f0447918910e.js" type="text/javascript"></script>



<link href="./css/profile-6730ed749bfaf808fb49a52c8315f243.css" media="screen" rel="stylesheet" type="text/css">

<style type="text/css">
.fancybox-margin{margin-right:0px;}
</style>
     <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <!--
    Include the maps javascript with sensor=true because this code is using a
    sensor (a GPS locator) to determine the user's location.
    See: https://developers.google.com/maps/documentation/javascript/tutorial#Loading_the_Maps_API
    -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>

    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.
//******************** Start CONFIG ************************
var map;
var pos;
var marker;

var html = "<table>" +
                 "<tr><td>Address:</td> <td><textarea id='address' rows='4' cols='50'>Type your address here ...</textarea></td> </tr>" + 
                 "<tr><td>Visibilitée:</td> <td><select id='type'>" +
                 "<option value='public' SELECTED>Public</option>" +
                 "<option value='Medecins'>Medecins</option>" +
                 "<option value='coleagues'>Coleagues</option>" +
                 "<option value='moi'>Moi seulement</option>" +
                 "</select> </td></tr>" +
                 "<tr><td></td><td><input type='button' value='Save & Close' onclick='saveData(infoWindow)'/></td></tr></table>"; 
var content1= "<b>Doctunisie Map: (Vous etes ici)</b></br> Veillez justifier votre postion sur le map."+html;
var content2= "<b>Doctunisie Map: </b></br> Veillez justifier votre postion sur le map."+html;
var title1= 'Clicker pour voir plus de details.';
var Tunis =new google.maps.LatLng(36.805435,10.176773);
var Sfax = new google.maps.LatLng(34.885929,10.085449);
var MapCenter;
var HomeCenter;
var HomeZoom = 7;
var zoomHome = {
   zoom: 7
  };
//var image = new google.maps.MarkerImage("http://www.creare.co.uk/wp-content/uploads/2013/08/marker.png", null, null, null, new google.maps.Size(40,52)); 
var image = new google.maps.MarkerImage("gmap/icons/mark45.png", null, null, null, new google.maps.Size(100,110));
var zoomTunis = {
   zoom: 7
  };
var mapOptions = {
    zoom: 12
  };
var infoWindowOptions ={
         map: map,
         position: pos,
  			 content: content1
      };
var markerOptions ={ 
    			position: pos, 
    			icon:image, 
    			map: map, 
    			title:title1  
		   };
var markerOptions2 ={ 
    		 map: map,
         position: pos,
  			 content:content2  
		   };                   
var infoWindow = new google.maps.InfoWindow(infoWindowOptions);
var infoWindow2 = new google.maps.InfoWindow(markerOptions2);
  
   //******************** Start APPLICATION ************************ 
function initialize() {
var TILE_SIZE = 256;
  
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 
 
     
        
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    HomeCenter =  pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
     
      marker = new google.maps.Marker({ 
    			position: pos, 
    			icon:image, 
    			map: map, 
    			title: title1
		   });                                 
      
      map.setCenter(pos);
   
     //rendre le marqueur "déplaçable"
	marker.setDraggable(true);
	
	    
   //********** HERE **********
    var mapEvents = new addMapEvents(map,marker,infoWindow,MapCenter,HomeCenter,HomeZoom);  
      
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  
  
  
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed. </br> Move the marker to your right position.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.</br> Move the marker to your right position.';
  }

  //HomeZoom=4;
  MapCenter=Sfax;
  map = new google.maps.Map(document.getElementById('map-canvas'),zoomTunis);
  
  var options = {
    map: map,
    position: Tunis,
    content: content
  };
   marker = new google.maps.Marker({ 
    			position: Tunis, 
    			icon:image, 
    			map: map, 
    			title: title1
		   });
  //rendre le marqueur "déplaçable"
	marker.setDraggable(true);
	
  var infoWindow3 = new google.maps.InfoWindow(options);
  map.setCenter(MapCenter);
  
  
  //********** HERE **********
    var mapEvents = new addMapEvents(map,marker,infoWindow2,MapCenter,HomeCenter,HomeZoom); 
    
}

google.maps.event.addDomListener(window, 'load', initialize);




//********** FUNCTIONS LIBRARY **********************
function placeMarker(position, map) {
   var marker = new google.maps.Marker({ 
    			position: position, 
    			icon:image, 
    			map: map, 
    	});
  
  map.panTo(position);
}


function addMapEvents(map,marker,infoWindow,MapCenter,HomeCenter,HomeZoom) {
//**************************************************   
      google.maps.event.addListener(marker, 'click', function() { 
  			infoWindow.open(map,marker); 
  		});
      
      //************** Move Marker Event
  google.maps.event.addListener(marker, 'dragend', function(e) {
     var zoomLevel = map.getZoom();
     map.setCenter(e.latLng);
		 infoWindow.setContent(content2+'</br> New Coord:'+e.latLng+'</br> Zoom: ' + zoomLevel);
	}); 
  
  //************ Add Marker On Click Event *****************
  google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);
  });
  
  //*********** Getting properties with event handlers
  google.maps.event.addListener(map, 'zoom_changed', function(e) {
    var zoomLevel = map.getZoom();
    map.setCenter(MapCenter);
    infoWindow.setContent(content2+'</br> Zoom: ' + zoomLevel);
  });
  
  //*****************Custom Control Button***********************
  // Create the DIV to hold the control and call the HomeControl() constructor passing in this DIV.
  var homeControlDiv = document.createElement('div');
  var homeControl = new HomeControl(homeControlDiv, map, HomeCenter,HomeZoom);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
 //**************************************************************** 
}

function HomeControl(controlDiv, map, HomeCenter,HomeZoom) {

  // Set CSS styles for the DIV containing the control
  // Setting padding to 5 px will offset the control
  // from the edge of the map
  controlDiv.style.padding = '5px';

  // Set CSS for the control border
  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = 'white';
  controlUI.style.borderStyle = 'solid';
  controlUI.style.borderWidth = '2px';
  controlUI.style.cursor = 'pointer';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click to set the map to Home';
  controlDiv.appendChild(controlUI);

  // Set CSS for the control interior
  var controlText = document.createElement('div');
  controlText.style.fontFamily = 'Arial,sans-serif';
  controlText.style.fontSize = '12px';
  controlText.style.paddingLeft = '4px';
  controlText.style.paddingRight = '4px';
  controlText.innerHTML = '<b>Home</b>';
  controlUI.appendChild(controlText);

  // Setup the click event listeners: simply set the map to
  // Chicago
  google.maps.event.addDomListener(controlUI, 'click', function() {
    map.setCenter(MapCenter);
    map.setZoom(HomeZoom);
  });

}

//******** AJAX LIBRARY *****************
    function saveData(infoWindow) {
      var address = escape(document.getElementById("address").value);
      var type = document.getElementById("type").value;
      var latlng = marker.getPosition();

      var url = "http://localhost/DocTunisie2/phpLib/addMarker.php?address=" + address +
                "&type=" + type + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();
       console.log(' url: '+url);         
      downloadUrl(url, function(data, responseCode) {
        console.log(' responseCode: '+responseCode);
        if (responseCode == 200 && data.length <= 1) {
          infoWindow.close();
          document.getElementById("message").innerHTML = "Location added.";
        }
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    </script>




</head>
<body>
<div class="wrap">
  <!-- The MenuBar Start -->
  <?php   
               if (!isset($_SESSION['login'])) { 
                  include 'Template\menuLoguin_tpl.php';
               }else{
                  include 'Template\mainMenu_tpl.php';
               } 
    
    ?>

  <!-- he menuBar End -->
  <div class="page">
    <div class="notice" data-sel-notice="" id="flash_notice" style="display:none">
      <div class="inner"> 
            <a href="/profile#" class="closer" 
                  onClick="document.getElementById(&#39;flash_notice&#39;).style.display = &#39;none&#39;; return false;" 
                  title="Dismiss"></a> <span id="flash_message"> </span> 
      </div>
    </div>
  <div class="content grid editpro theprofile" 
        data-roles="[]" 
        data-sel-myprofile="" 
        data-vendor-emails="[]" 
        id="myprofile">
      
      <div id="prohead" data-rendered="profile_unverified">
        <?php include 'Template/headerProfile_tpl.php'; ?>
        <div class="col-1-4">
          <div class="contactbar">
            <div id="cvs" class="actbtn"> </div>
          </div>
        </div>
        <?php 
        
         $showProfile ="here";
         $showColleague="";  
         $showCalendar ="";
         $showAppointments  ="";
         include 'Template\profile\menuProfile_tpl.php'; 
               
         ?>
        
      </div>
      <div class="profiler">
        
        <?php  include 'Template\rightMenuProfile_tpl.php'; ?>
        <div class="col-3-4 procv">
              
            <!-- Start Cntent -->
            
            <div id="map-canvas"></div>
            <div id="message"></div>
            
            <!-- End Content-->   
              
              
        </div>
      </div>
    </div>
</div>
  </div>
  <!-- FOOTER START -->
      <?php  include 'Template\footer_tpl.php'; ?>
  <!-- FOOTER END -->
  
  <!-- FeedBack start -->
      <?php  include 'Template\com\feedback_tpl.php'; ?>
  <!-- FeedBack End -->



</body>
</html>
