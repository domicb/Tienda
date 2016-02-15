// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;
var geocoder;
var marker;
function initialize() {
  var mapOptions = {
    zoom: 15
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  marker = new google.maps.Marker({
      position:  new google.maps.LatLng(37.774807, -3.795573),
      map: map,
      title:"Esto es un marcador",
      animation: google.maps.Animation.DROP,
      draggable:true });

marker.info = new google.maps.InfoWindow({
  content: 'Coordenadas Iniciales '+marker.getPosition()
});


google.maps.event.addListener(marker, 'click', function() {
  marker.info.open(map, marker);
});


google.maps.event.addListener(marker, 'dragend', function() 
{
    geocodePosition(marker.getPosition());
});

function geocodePosition(pos) 
{
   geocoder = new google.maps.Geocoder();
   geocoder.geocode
    ({
        latLng: pos
    }, 
        function(results, status) 
        {
            if (status == google.maps.GeocoderStatus.OK) 
            {
               // $("#mapSearchInput").val(results[0].formatted_address);
                //$("#mapErrorMsg").hide(100);
                marker.info.setContent(results[0].formatted_address);  
                //map.setCenter(marker.getPosition());
                window.setTimeout(function() {
     				 map.panTo(marker.getPosition());
    			}, 500);
    			$("#latitude").val(marker.getPosition().lat());
    			$("#longitude").val(marker.getPosition().lng());
            } 
            else 
            {
                //$("#mapErrorMsg").html('Cannot determine address at this location.'+status).show(100);
                marker.info.setContent('Cannot determine address at this location.'+status);  
            }
        }
    );
}


geocoder = new google.maps.Geocoder();
   
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      /*var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      }); */

      	map.setCenter(pos);
    	marker.setPosition(map.getCenter());    
    	marker.info.setContent('Hola esta es un prueba '+marker.getPosition());
		$("#latitude").val(marker.getPosition().lat());
     	$("#longitude").val(marker.getPosition().lng());	
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
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);  
  
}



function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      /*var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });*/
       	marker.setPosition(map.getCenter());  
      	marker.info.setContent(results[0].formatted_address);
      	$("#latitude").val(marker.getPosition().lat());
    	$("#longitude").val(marker.getPosition().lng());
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
