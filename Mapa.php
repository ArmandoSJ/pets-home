<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/Estilos.css">
    <style>
     #map {
    width: 180%;
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
    function initMap(){
      // Map options
      var options = {
        zoom:15,
        center:{lat:20.5280,lng:-100.8113}
          
      }
        // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      var marker = new google.maps.Marker({
        position:{lat:20.527493,lng:-100.811680},
        map:map,
       // icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });
    
    var marker = new google.maps.Marker({
        position:{lat:20.521966,lng:-100.813676},
        map:map,
      });
             
        var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Putos todos</h1>'
                  
         });
             marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
     */ 
      /*       
      AgregaPosPos({cordenadas:{lat:20.527493,lng:-100.811680}});
       
      function AgregaPos(cordenadas){
        var marker = new google.maps.Marker({
            position:cordenadas,
            map:map,
            icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
        });
            
 
      }*/
               
         }
      </script>
      
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      
        
        
            
            
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center:{lat:20.5280,lng:-100.8113},
          zoom: 16
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

          var marker = new google.maps.Marker({
              position:pos,
              map:map
           });
           // map.setCenter(pos);
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
                              'Error: Your browser doesn\'t support geolocation.');
      }
    
        
      
      
    </script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzoXmN8L5jjBCZrKwBCuVg4CnNjwdnC0Y&callback=initMap">
    </script>
  </body>
</html>