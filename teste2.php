<!DOCTYPE html>
<?php
  require_once("NetController.php");
  $NetController = new NetController();

?>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://www.google.com/jsapi"></script>

<?php
  require_once('NetController.php');
  $NetController = new NetController();
  $weightArray = $NetController->weightData(); // array com os pesos
  $data = $NetController->weightCordinates(); // array onde cada elemento é um array com latitude e longitude
  for($i = 0; $i < sizeof($weightArray); $i++){
    array_push($data[$i],$weightArray[$i]);
  } 

?>
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNixx9oyAv-BE-q2s39NBBHEjfFJYASeg&libraries=visualization,geometry&&callback=initMap">
    </script>
    <script>
    // **************** Funções para manter o raio de influencia em metros ou para manter o zoom *****************
    // funções encontradas em : http://jsbin.com/qomagupusu/edit?html
    var TILE_SIZE = 256;
    var map, heatmap;
    var heatMapData = new Array();
    var data = <?php echo json_encode($data);?>;

function bound(value, opt_min, opt_max){
  if (opt_min !== null) value = Math.max(value, opt_min);
  if (opt_max !== null) value = Math.min(value, opt_max);
  return value;
}
function degreesToRadians(deg){
  return deg * (Math.PI / 180);
}
function radiansToDegrees(rad){
  return rad / (Math.PI / 180);
}
function MercatorProjection() {
  this.pixelOrigin_ = new google.maps.Point(TILE_SIZE / 2,TILE_SIZE / 2);
  this.pixelsPerLonDegree_ = TILE_SIZE / 360;
  this.pixelsPerLonRadian_ = TILE_SIZE / (2 * Math.PI);
}
MercatorProjection.prototype.fromLatLngToPoint = function (latLng,opt_point){
  var me = this;
  var point = opt_point || new google.maps.Point(0, 0);
  var origin = me.pixelOrigin_;

  point.x = origin.x + latLng.lng() * me.pixelsPerLonDegree_;

  // NOTE(appleton): Truncating to 0.9999 effectively limits latitude to
  // 89.189.  This is about a third of a tile past the edge of the world
  // tile.
  var siny = bound(Math.sin(degreesToRadians(latLng.lat())), - 0.9999,0.9999);
  point.y = origin.y + 0.5 * Math.log((1 + siny) / (1 - siny)) * -me.pixelsPerLonRadian_;
  return point;
};
MercatorProjection.prototype.fromPointToLatLng = function (point){
  var me = this;
  var origin = me.pixelOrigin_;
  var lng = (point.x - origin.x) / me.pixelsPerLonDegree_;
  var latRadians = (point.y - origin.y) / -me.pixelsPerLonRadian_;
  var lat = radiansToDegrees(2 * Math.atan(Math.exp(latRadians)) - Math.PI / 2);
  return new google.maps.LatLng(lat, lng);
};

function getNewRadius() {
          
        var desiredRadiusPerPointInMeters = 150;
          var numTiles = 1 << map.getZoom();
          var center = map.getCenter();
          var moved = google.maps.geometry.spherical.computeOffset(center, 10000, 90); 
          var projection = new MercatorProjection();
          var initCoord = projection.fromLatLngToPoint(center);
          var endCoord = projection.fromLatLngToPoint(moved);
          var initPoint = new google.maps.Point(
            initCoord.x * numTiles,
            initCoord.y * numTiles);
           var endPoint = new google.maps.Point(
            endCoord.x * numTiles,
            endCoord.y * numTiles);
        var pixelsPerMeter = (Math.abs(initPoint.x-endPoint.x))/10000.0;
        var totalPixelSize = Math.floor(desiredRadiusPerPointInMeters*pixelsPerMeter);
        //console.log(totalPixelSize);
        return totalPixelSize;
         
      }



    // **************** Funções para manter o raio de influencia em metros ou para manter o zoom *****************

      function heatmapPlot(){
  /*$(document).ready( function(){
    $.ajax({
      url: 'get_net_data.php',
      method: 'post',
      dataType:"json",

      success: function(data){

        for (i = 0; i< data.length; i++) {
          dados = {location: new google.maps.LatLng(data[i][0][0], data[i][0][1]), weight: data[i][1]};
          heatMapData.push(dados);
         
        }
        


        heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatMapData,
          opacity: 0.6,   
          map: map,
          radius: getNewRadius(),
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
          heatmap.setOptions({radius:getNewRadius()});
          });

            },
         });
       });*/

for (i = 0; i< data.length; i++) {
          //alert(data[i][2]);
          //dados = {location: new google.maps.LatLng(data[i][0],1+ data[i][1])};//, weight: 20,};
          //heatMapData.push(dados);
          //alert(data[i][2]);
          var markerg = new google.maps.Marker({
          position: new google.maps.LatLng(data[i][0], data[i][1]), 
          map: map,
        });

         heatMapData.push({location: new google.maps.LatLng(-15.77, -47.86), weight: 5});
        }

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatMapData,
          opacity: 0.8,   
          map: map,
          radius: getNewRadius(),
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
          heatmap.setOptions({radius:getNewRadius()});
          });
     }
      function initMap() {
        //var unb = {lat: -15.765079, lng: -47.869921};
          map = new google.maps.Map(document.getElementById('map'), {
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



       /*heatmap = new google.maps.visualization.HeatmapLayer({
       data: heatMapData,
       radius : getNewRadius()     
      });
      heatmap.setMap(map);

      google.maps.event.addListener(map, 'zoom_changed', function () {
         heatmap.setOptions({radius:getNewRadius()});*/

         heatmapPlot();

         //alert(heatMapData.length());
    
}

    </script>
    
  </body>
</html>	