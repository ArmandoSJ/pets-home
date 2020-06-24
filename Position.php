<!DOCTYPE html>
<html lang="es">
<head>
   <title>Geolocation</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
   #map {
    width: 100%;
    height: 300px;
          
}
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    
    <script>
        /*
       var divMap= document.getElementById('map');
         navigator.geolocation.getCurrentPosition(fn_ok, fn_bad);
        
        function fn_ok(respueta){
            var lat = respueta.coords.latitude;
            var log = respueta.coords.longitude;
          var gLatLog = new google.maps.LatLng(lat,log);
             var options = {
        zoom:15,
        center:gLatLog
      }
    var gmap =new  google.maps.Map( divMap,options);  
        }
        */
   

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:20.5280, lng:-100.8113},
          zoom: 13
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

           // infoWindow.setPosition(pos);
            //infoWindow.setContent('Location found.');
              
              var marker = new google.maps.Marker({
               position:pos,
               map:map,
               title:"Tu estas aqui",
               icon:'http://maps.google.com/mapfiles/ms/icons/purple-dot.png'
      });
              
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Tu navegador no soporta  Geolocation.');
      }

      /*
        function fn_ok(respueta){
            var lat = respueta.coords.latitude;
            var log = respueta.coords.longitude;
            
            var LatLog = new google.maps.LatLng(lat,log);
            var option ={
                zoom:17,
                center:LatLog
            };
            var map = new google.maps.Map(document.getElementById('map'), option);
        }
      */
      
   </script>
  
    
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzoXmN8L5jjBCZrKwBCuVg4CnNjwdnC0Y&callback=initMap">
    </script>
    
</body>
</html>