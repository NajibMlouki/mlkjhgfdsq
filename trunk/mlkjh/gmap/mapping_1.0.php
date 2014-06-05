<?php
  include '../inc/functions.php';
 echo  ' console.log(" PHP  mapping_1.0.php JS FILE STARTING !!"); ';
?>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.
//******************** Start CONFIG ************************
var map;
var pos;
var marker;
var markerTab=new Array();
var markers=new Array();
var imgMarkers=new Array();
var infoWindowList  =new Array();
var htmlBadge =new Array();
var mapZoom=7;
var html = "<table>" +
                 "<tr><td>Address:</td> <td><textarea id='address' rows='4' cols='50'>Type your address here ...</textarea></td> </tr>" + 
                 "<tr><td>Visibilitée:</td> <td><select id='type'>" +
                 "<option value='public' SELECTED>Public</option>" +
                 "<option value='Medecins'>Medecins</option>" +
                 "<option value='coleagues'>Coleagues</option>" +
                 "<option value='moi'>Moi seulement</option>" +
                 "</select> </td></tr>" +
                 "<tr><td><input type='button' class='button' value='Enregistrer & Fermer' onclick='saveData(infoWindow)'/></td><td><input type='button' class='button' value='Quitter' onclick='closeInfoBull(infoWindow)'/></td></tr></table>";
<?php
      echo  " console.log(' PHP  mapping_1.0.php JS FILE searchAction:".$_SESSION['searchAction']." !!'); ";
      //if(isset($_GET['searchAction'])&& $_GET['searchAction'] ){
      if($_SESSION['searchAction']=="True"){
            new logTracing(" mapping_1.0.php JS FILE SearchAction:".$_SESSION['searchAction']); 
            $sh= new SearchMap();   
            $res = $sh->searchMap($_SESSION['key_words']);
            $REPOSITORY='..';
            if($sh->nbRows>0){
            $b=0; 
                  $AVATAR=$DEFAULT_DR_AVATAR_MAN;
                  $MARKERIMG=$DEFAULT_DR_MARKER_IMG_MAN;
                  while($tab = mysql_fetch_assoc($sh->result3)){
                      //  include '../Template/search/gmap_badge_tpl.php';
                      
                      if($tab['avatar_flag']==1){
                            $AVATAR= $tab['avatar'];
                      } else{
                            if($tab['sex']==1){
                                  $AVATAR= $DEFAULT_DR_AVATAR_MAN;
                                  
                            } else{
                                  $AVATAR= $DEFAULT_DR_AVATAR_WOMEN;
                                  
                            }
                      }
                      
                      if($tab['sex']==1){
                            $MARKERIMG=$DEFAULT_DR_MARKER_IMG_MAN; 
                      } else{
                            $MARKERIMG=$DEFAULT_DR_MARKER_IMG_WOMEN;
                      }
                      $LI_STYLE_WIDTH="width: 245px;"; // bkp width:240 px;
                      if(empty($tab['mail']) && empty($tab['phones']) ){
                          $LI_STYLE_HEIGHT="height: 145px;";
                      }else if(empty($tab['mail']) or empty($tab['phones']) ){
                           $LI_STYLE_HEIGHT="height: 154px;";
                      }else{
                          $LI_STYLE_HEIGHT="height: 165px;";
                      }
                            
                       echo" htmlBadge[$b] ='<div class=\"marketing grid\" id=\"advisor\">'+         
                          '<div class=\"row\" style=\"padding: 0px 0;\">'+     
                            '<div class=\"advisorgrid\">'+                         
                              '<ul class=\"noscrollbar\">'+                            
                                '<li style=\" ".$LI_STYLE_HEIGHT.$LI_STYLE_WIDTH."\" class=\"noscrollbar\">'+                
                                  '<a href=\"pub/peter-alperin-md.html\">'+                              
                                    '<img alt=\" ".$tab['name']." \" src=\"../img/mab/".$AVATAR."\"  > </a>'+ 
                                    '<h2><a href=\"pub/peter-alperin-md.html\"> ".$tab['name']."  </a></h2>'+ 
                                    '<h3>   ".$tab['speciality']."  </h3>'+ 
                                    '<h4>  ".$tab['regions']."  </h4>'+                
                                   '<p>  ".$tab['address']."  </p>'+
                                   '<p>  ".$tab['mail']."  </p>'+
                                   '<p> <b> ".$tab['phones']." </b> </p>'+          
                                  '<br>'+                
                                  '<p>'+               
                                   '<a href=\"#\" class=\"button blue small\" >Voir Profile</a>'+
                                   '&nbsp;&nbsp;&nbsp;&nbsp;'+
                                   '<a href=\"#\" class=\"button blue small\" >Rendez-vous</a>'+            
                                  '</p>'+               
                                '</li>'+                       
                              '</ul>'+                    
                            '</div>'+ 
                          '</div>'+       
                        '</div>'; 
                      ";
                      
                      echo " imgMarkers[$b] = new google.maps.MarkerImage('markers/".$MARKERIMG."', null, null, null, new google.maps.Size(60,80)); 
                      ";
                      echo "  markers[".$b."]= { 
                                    link: '<a href=\"http://www.ship.edu\">Shippensburg University</a>', 
                                    lat: ".$tab['lat'].",
                                    lng: ".$tab['lng'].", 
                                    icon: imgMarkers[".$b."],
                                    map: map,
                                    title:' Marker 1',
                                    content:htmlBadge[".$b."]
                                };
                             ";
                   
                      
                       
                      $b++;
                  }
                  
                  
                  
                  
                    
            }
      }    
              
         
?>
                 
                 
//var contentBadge="<b>Doctunisie Map:</b></br>."+htmlBadge;                     
var content1= "<b>Doctunisie Map: (Vous etes ici)</b></br> Veillez justifier votre postion sur le map."+html;
var content2= "<b>Doctunisie Map: </b></br> Veillez justifier votre postion sur le map."+html;
var title1= 'Clicker pour voir plus de details.';
var Tunis =new google.maps.LatLng(36.805435,10.176773);
var Sfax = new google.maps.LatLng(34.885929,10.085449);
//var image = new google.maps.MarkerImage("http://www.creare.co.uk/wp-content/uploads/2013/08/marker.png", null, null, null, new google.maps.Size(40,52)); 
var image = new google.maps.MarkerImage("icons/doctorMarker.png", null, null, null, new google.maps.Size(60,80));

var MapCenter;
var HomeCenter;
var zoomHome = {
   zoom: 10
  };
var zoomTunis = {
   zoom: 12
  };
var mapOptions = {
    zoom: 10
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
  var content = 'The Geolocation service is OK. </br> Move the marker to your right position.';
   mapZoom=10;
   map = new google.maps.Map(document.getElementById('map-canvas'), {zoom: mapZoom});
 
 
     
        
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    HomeCenter = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
     
      
      map.setCenter(HomeCenter);
   
     
	
	    
   //********** HERE **********
   // var mapEvents = new addMapEvents(map,marker,infoWindow,MapCenter,HomeCenter,zoomHome,content);
    
    //****** addMultiMarkers *****
   var multiMarkers = new addMultiMarkers(content,map,Tunis);  
      
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
    var content = 'Sorry Geolocation Service Failed. </br> Move the marker to your right position.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.</br> Move the marker to your right position.';
  }
  mapZoom=7;
  map = new google.maps.Map(document.getElementById('map-canvas'), {zoom: mapZoom});
  map.setCenter(Sfax);
  
  //********** HERE **********
    //var mapEvents = new addMapEvents(map,marker,infoWindow2,MapCenter,HomeCenter,HomeZoom,content); 
  
  //****** addMultiMarkers *****
   var multiMarkers = new addMultiMarkers(content,map,Sfax);  
    
}

google.maps.event.addDomListener(window, 'load', initialize);




//********** FUNCTIONS LIBRARY **********************

//************  addMultiMarkers ***********

    function addMultiMarkers(content,map,pos) {
        
        var options = {
              map: map,
              position: pos,
              content: content
        };
       
       
        // markers array was here !!
         
        var infoWindow3 = new google.maps.InfoWindow(options);
        var infoWindow =null;
        for (var i = 0; i < markers.length; i++) { 
            var marker = new google.maps.Marker({
                  position: new google.maps.LatLng(markers[i].lat, markers[i].lng),
                  map: map,
                  icon: markers[i].icon
                 
            });
            
             addInfoWindow(marker, message,map, markers[i].content,infoWindow,i);
           
        }  
        
            
        
    } 
    
function addInfoWindow(marker, message,map,htmlBadgeL,infoWindow,i) {
            var info = message;

            infoWindowList[i] = new google.maps.InfoWindow({
                content: htmlBadgeL
            });

            google.maps.event.addListener(marker, 'click', function () {
                //closeAllInfoWindow(markers);
                infoWindowList[i].open(map, marker); 
            });
            
          
} 

function closeAllInfoWindow(markers){
    for(var i=0; i<markers.length; i++)
       infoWindowList[i].close();
}
        
 
//***********  placeMarker *****************   
function placeMarker(position, map) {
   var marker = new google.maps.Marker({ 
    			position: position, 
    			icon:image, 
    			map: map, 
    	});
  
  map.panTo(position);
}


function addMapEvents(map,marker,infoWindow,MapCenter,HomeCenter,zoomHome,content) {
   
   //HomeZoom=4;
  //MapCenter=Tunis;
  //map = new google.maps.Map(document.getElementById('map-canvas'),zoomHome);
  //map.setCenter(MapCenter);
  var options = {
    map: map,
    position: Tunis,
    content: content
  };
  
  var infoWindow3 = new google.maps.InfoWindow(options);
  
  marker = new google.maps.Marker({ 
    			position: Tunis, 
    			icon:image, 
    			map: map, 
    			title: title1
		   });
     
  //rendre le marqueur "déplaçable"
	 marker.setDraggable(true);
     
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
  var homeControl = new HomeControl(homeControlDiv, map, HomeCenter,zoomHome);

  homeControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
 //**************************************************************** 
}

function HomeControl(controlDiv, map, HomeCenter,zoomHome) {

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
    
    function closeInfoBull(infoWindow) {
        alert(' closeInfoBull !');
        infoWindow.close();
        document.getElementById("message").innerHTML = "InfoWindow Fermé.";
    }