<!DOCTYPE html>
<html lang="en">
  <head>
 <style>
       #map {
        height: 500px;
        width: 100%;
       }
    </style>

  <?php
  require_once('NetController.php');
  $NetController = new NetController();
  $weightArray = $NetController->weightData(); // array com os pesos
  $data = $NetController->weightCordinates(); // array onde cada elemento é um array com latitude e longitude
?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NUTS</title>
    <link rel="icon" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

   <body class="user-page">

    <nav class="navbar navbar-fixed-top navbar-inverse-user navbar-transparente-user">
      <div class="container">

      <!-- header -->
      <div class="navbar-header">

      <!-- botao toggle -->
      <button type="button" class="navbar-toggle collapsed"
              data-toggle="collapse" data-target="#barra-navegacao">
              <span class="sr-only">alternar navegação</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

        <a href="index.php" class="navbar-brand">
          <span class="img-logo">NUTS</span>
        </a>

      </div>
        <!-- nav -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
           <ul class="nav navbar-nav navbar-right">
            <li><a href="perfil.php">Home</a></li>
            <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Análise de Rede<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="loading_map.php">Mapa</a></li>
                <li><a href="loading_table.php">Avançado</a></li>
               <li><a href="#" class="btn" data-toggle="modal" data-target="#janela">Avaliação</a></li>
              </ul>
            </li>       
            <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="historico.php">Histórico</a></li>
                <li><a href="configuracoes.php">Configurações</a></li>
                <li><a href="senha.php">Trocar senha</a></li>
              </ul>
            </li>                
           
            <li class="divisor-user" role="separator"></li>
            <li><a href="index.php">Sair</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->

<!-- modal de avaliação-->
<form class="modal fade" id="janela" method = "post" action="user_avaliation3.php" >
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <center> <h4 class="modal-tittle" style="color: #FF6347">COLABORE COM ESSA INICIATIVA!</h4> </center>
              <center>Para termos um mapa cada vez mais completo, precisamos da sua opinião. Avalie a situação da sua rede onde você está de 1 a 5 nozes para atualizarmos nosso banco de dados!</center>
              <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
              <input type="hidden" id="user_avaliation" name="user_avaliation" value=""/>
            </div>

             <div class="modal-body">
             <div class="estrelas">
              <link href="estilo.css" rel="stylesheet">


                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
              </div>
           
            </div>

             <div class="modal-footer">

              

              <button type="submit" class="btn btn-login btn-white">Enviar avaliação</a>

            </div>

          </div>
        </div>
      </form>
<!-- /Modal de avaliação -->

   <section id="analise-rede">
      <div class="container">
        <div class="row">
          
          <!-- MAPA -->
          <div class="col-md-8">
            <div class="a-mapa" id = "map">
            </div>
          </div>

          <!-- OPÇÕES DE ANALISE -->
          <div class="col-md-4"> 
          <div class="o-analise">
              <h4>Para mais Informações da Internet:</h4>
                <a href="tabela.php" type="button" class="btn btn-avançado btn-border">Avançado</a>
               <br> 
               <br>
              <h4>Avalie a Internet que você está utilizando agora:</h4>  
                <a href="#" class="btn btn-avançado btn-border" data-toggle="modal" data-target="#janela">Avaliação</a>
             

          </div>    
          </div>

        </div>
      </div>     
   </section>



    
<script type="text/javascript">

  function seleciona(name, indice) {
   var imgs = document.querySelectorAll('img[name=' + name + ']');
  $("#user_avaliation").val(indice+1);
   for (var i=0; i < imgs.length; i++) {
       if (i <= indice)
           imgs[i].className = "destaque";
       else
           imgs[i].className = "apagada";
   }
}

window.onload = function() {
   var imgs = document.querySelectorAll('img[name=fb]');
  
   for (var i=0; i < imgs.length; i++) {
       (function(name, i) {
          imgs[i].addEventListener('click', function () {
              seleciona(name, i);
          });
       })(imgs[i].name, i);
   }
}

</script>

  
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
    // **************** Funções para manter o raio de influencia em metros ou para manter o zoom *****************
    // funções encontradas em : http://jsbin.com/qomagupusu/edit?html
    var TILE_SIZE = 256;
    var map, heatmap;
    var heatMapData = new Array();
    var data = <?php echo json_encode($data);?>;
    var weightArray = <?php echo json_encode($weightArray);?>;
    var gradient = [
  'rgba(255, 0  , 0  , 0.00)', //Resto do mapa

  'rgba(255, 0  , 0  , 0.70)', //Vermelho
  'rgba(255, 45 , 0  , 0.70)',
  'rgba(255, 90 , 0  , 0.73)',
  'rgba(255, 150, 0  , 0.76)',
  'rgba(255, 195, 0  , 0.79)',
  'rgba(255, 225, 0  , 0.82)',

  'rgba(255, 255, 0  , 0.80)', //Amarelo

  'rgba(225, 255, 0  , 0.85)',
  'rgba(195, 255, 0  , 0.88)',
  'rgba(150 , 255, 0  ,0.91)',
  'rgba(90 , 255, 0  , 0.94)',
  'rgba(45 , 255, 0  , 0.97)',
  'rgba(0  , 255, 0  , 1.00)'  //Verde
];

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
          
        var desiredRadiusPerPointInMeters = 350;
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
for (i = 0; i< weightArray.length; i++) {
          dados = {location: new google.maps.LatLng(data[i][0],data[i][1]), weight: (i*10)*weightArray[i]};
          heatMapData.push(dados);
        }

        heatMapData.push({location: new google.maps.LatLng(-15., -47.8683), weight: 10});

        heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatMapData,
         // gradient : gradient,
          opacity: 0.8,   
          map: map,
          radius: getNewRadius(),
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
          heatmap.setOptions({radius:getNewRadius()});
          });
     }
      function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center:  {lat: -15.765079, lng: -47.869921},
          mapTypeControl: false,
          streetViewControl: false
        });
         heatmapPlot();
}

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNixx9oyAv-BE-q2s39NBBHEjfFJYASeg&libraries=visualization,geometry&&callback=initMap">
    </script> 
  </body>
</html>






