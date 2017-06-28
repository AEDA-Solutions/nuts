<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 500px;
        width: 50%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        //var unb = {lat: -15.765079, lng: -47.869921};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center:  {lat: -15.765079, lng: -47.869921}
        });
        var markerg = new google.maps.Marker({
          position: {lat: -15.765079, lng: -47.869921},
          map: map,
        });

         var markert = new google.maps.Marker({
          position: {lat: -15.7452, lng: -47.8768},
          map: map,
        });

          var markery = new google.maps.Marker({
          position: {lat: -15.7452, lng: -47.8552},
          map: map,
        });

           var markeru = new google.maps.Marker({
          position: {lat: -15.7758, lng: -47.8768},
          map: map,
        });

            var markeri = new google.maps.Marker({
          position: {lat: -15.7758, lng: -47.8552},
          map: map,
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBY-kgo3bLMVjPIggjmtyF-4WetPt9p0vc	&callback=initMap">
    </script>
  </body>
</html>	