// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.
//******************** Start CONFIG ************************
var map;
var pos;
var marker;
var markerTab=new Array();
var markers=new Array();
var infoWindowList  =new Array();
var htmlBadge =new Array();
var actualZoom=14;
var html = "<table>" +
                 "<tr><td>Address:</td> <td><textarea id='address' rows='4' cols='50'>Type your address here ...</textarea></td> </tr>" + 
                 "<tr><td>Visibilitée:</td> <td><select id='type'>" +
                 "<option value='public' SELECTED>Public</option>" +
                 "<option value='Medecins'>Medecins</option>" +
                 "<option value='coleagues'>Coleagues</option>" +
                 "<option value='moi'>Moi seulement</option>" +
                 "</select> </td></tr>" +
                 "<tr><td><input type='button' class='button' value='Enregistrer & Fermer' onclick='saveData(infoWindow)'/></td><td><input type='button' class='button' value='Quitter' onclick='closeInfoBull(infoWindow)'/></td></tr></table>";
 htmlBadge[1] ='<div class="marketing grid noscrollbar" id="advisor">'+         
      '<div class="row noscrollbar" style="padding: 0px 0;">'+    
        '<div class="advisorgrid">'+                        
          '<ul class="noscrollbar">'+                           
            '<li style="height: 145px; width: 240px;" class="noscrollbar">'+               
              '<a href="pub/peter-alperin-md.html">'+                             
                '<img alt="ABBOUZ NACEF " src="../img/mab/ABBOUZ NACEF.png"></a><h2>'+            
                '<a href="pub/peter-alperin-md.html">ABBOUZ NACEF </a></h2>    <h3> MEDECINE GENERALE </h3>    <h4>Bizerte Ghezala </h4> '+              
              '<p>33, RUE ASDRUBAL </p><br>'+               
              '<p><a href="#" class="button blue small" style="">Voir Profil</a></p>'+              
            '</li>'+                      
          '</ul>'+                   
        '</div>'+
      '</div>'+      
    '</div>';
htmlBadge[2] ='<div class="marketing grid noscrollbar" id="advisor">'+         
      '<div class="row noscrollbar" style="padding: 0px 0;">'+    
        '<div class="advisorgrid">'+                        
          '<ul class="noscrollbar">'+                           
            '<li style="height: 145px; width: 240px;" class="noscrollbar">'+               
              '<a href="pub/peter-alperin-md.html">'+                             
                '<img alt="ABBOUZ NACEF " src="../img/mab/elise_brett-d2c2a033bc55a54be1f5132e681efdb1.png"></a><h2>'+            
                '<a href="pub/peter-alperin-md.html">ELISE BRETT </a></h2>    <h3> MEDECINE GENERALE </h3>    <h4>Bizerte Ghezala </h4> '+              
              '<p>33, RUE ASDRUBAL</p><br>'+               
              '<p><a href="#" class="button blue small" style="">Voir Profil</a></p>'+              
            '</li>'+                      
          '</ul>'+                   
        '</div>'+
      '</div>'+      
    '</div>';
htmlBadge[3] ='<div class="marketing grid noscrollbar" id="advisor">'+         
      '<div class="row noscrollbar" style="padding: 0px 0;">'+    
        '<div class="advisorgrid">'+                        
          '<ul class="noscrollbar">'+                           
            '<li style="height: 145px; width: 240px;" class="noscrollbar">'+               
              '<a href="pub/peter-alperin-md.html">'+                             
                '<img alt="ABBOUZ NACEF " src="../img/mab/nancy_shadick-94b9a45aab4337d5283c6d3d91673b39.jpg"></a><h2>'+            
                '<a href="pub/peter-alperin-md.html">NANCY SHADICK </a></h2>    <h3> MEDECINE GENERALE </h3>    <h4>Bizerte Ghezala </h4> '+              
              '<p>33, RUE ASDRUBAL</p><br>'+               
              '<p><a href="#" class="button blue small" style="">Voir Profil</a></p>'+              
            '</li>'+                      
          '</ul>'+                   
        '</div>'+
      '</div>'+      
    '</div>';
htmlBadge[4] ='<div class="marketing grid noscrollbar" id="advisor">'+         
      '<div class="row noscrollbar" style="padding: 0px 0;">'+    
        '<div class="advisorgrid">'+                        
          '<ul class="noscrollbar">'+                           
            '<li style="height: 145px; width: 240px;" class="noscrollbar">'+               
              '<a href="pub/peter-alperin-md.html">'+                             
                '<img alt="ABBOUZ NACEF " src="../img/mab/mark_price-2e871812045c01153b2dd0a9f1f8ef45.jpg"></a><h2>'+            
                '<a href="pub/peter-alperin-md.html">MARK PRICE </a></h2>    <h3> MEDECINE GENERALE </h3>    <h4>Bizerte Ghezala </h4> '+              
              '<p>33, RUE ASDRUBAL</p><br>'+               
              '<p><a href="#" class="button blue small" style="">Voir Profil</a></p>'+              
            '</li>'+                      
          '</ul>'+                   
        '</div>'+
      '</div>'+      
    '</div>';
htmlBadge[5] ='<div class="marketing grid noscrollbar" id="advisor">'+         
      '<div class="row noscrollbar" style="padding: 0px 0;">'+    
        '<div class="advisorgrid">'+                        
          '<ul class="noscrollbar">'+                           
            '<li style="height: 145px; width: 240px;" class="noscrollbar">'+               
              '<a href="pub/peter-alperin-md.html">'+                             
                '<img alt="ABBOUZ NACEF " src="../img/mab/jordan_shlain-ff3e8b7e181ee907eea8373cee8fd50a.png"></a><h2>'+            
                '<a href="pub/peter-alperin-md.html">JORDAN SHLAIN </a></h2>    <h3> MEDECINE GENERALE </h3>    <h4>Bizerte Ghezala </h4> '+              
              '<p>33, RUE ASDRUBAL</p><br>'+               
              '<p><a href="#" class="button blue small" style="">Voir Profil</a></p>'+              
            '</li>'+                      
          '</ul>'+                   
        '</div>'+
      '</div>'+      
    '</div>';                
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
  var map = new google.maps.Map(document.getElementById('map-canvas'), {zoom: 14});
 
 
     
        
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
    HomeCenter = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);
     
      /*marker = new google.maps.Marker({ 
    			position: HomeCenter, 
    			icon:image, 
    			map: map, 
    			title: title1
		   }); 
       //rendre le marqueur "déplaçable"
	    marker.setDraggable(true);                                
    */
      map.setCenter(HomeCenter);
   
     
	
	    
   //********** HERE **********
   // var mapEvents = new addMapEvents(map,marker,infoWindow,MapCenter,HomeCenter,zoomHome,content);
    
    //****** addMultiMarkers *****
   var multiMarkers = new addMultiMarkers(content,map);  
      
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

  
  
  //********** HERE **********
    //var mapEvents = new addMapEvents(map,marker,infoWindow2,MapCenter,HomeCenter,HomeZoom,content); 
  
  //****** addMultiMarkers *****
   var multiMarkers = new addMultiMarkers(content,map);  
    
}

google.maps.event.addDomListener(window, 'load', initialize);




//********** FUNCTIONS LIBRARY **********************

//************  addMultiMarkers ***********

    function addMultiMarkers(content,map) {
        //HomeZoom=4;
        //MapCenter=Tunis;
        //map = new google.maps.Map(document.getElementById('map-canvas'),zoomHome);
        //map.setCenter(MapCenter);
        var options = {
              map: map,
              position: HomeCenter,
              content: content
        };
        var infoWindowOptions ={
            content: content1
         };
         infoWindow = new google.maps.InfoWindow(infoWindowOptions);
         markers = [
            { 
                link: '<a href="http://www.ship.edu">Shippensburg University</a>', 
                lat: 36.816090, lng: 10.177041, 
                icon: image,
                map: map,
                title:' Marker 1',
                content:htmlBadge[1]
            },
            { 
                link: '<a href="http://www.ship.edu">Shippensburg University</a>', 
                lat: 36.832275, lng: 10.106222, 
                icon: image,
                 map: map,
                title:' Marker 2',
                content:htmlBadge[2]
            },
            { 
                link: '<a href="http://www.ship.edu">Shippensburg University</a>', 
                lat: 36.855579, lng: 10.129654, 
                icon: image,
                 map: map,
                title:' Marker 3',
                content:htmlBadge[3]
            },
            { 
                link: '<a href="http://www.ship.edu">Shippensburg University</a>', 
                lat: 36.830902, lng: 10.162784, 
                icon: image,
                 map: map,
                title:' Marker 4',
                content:htmlBadge[4]
            },
            { 
                link: '<a href="http://www.ship.edu">Shippensburg University</a>', 
                lat: 36.812214, lng: 10.088026, 
                icon: image,
                map: map,
                title:' Marker 5',
                content:htmlBadge[5]
            }
        ];
        var infoWindow3 = new google.maps.InfoWindow(options);
        var infoWindow =null;
        //markerTab
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