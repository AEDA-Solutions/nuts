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
  $data = $NetController->get_user_data();
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
                <li><a href="tabela.php">Avançado</a></li>
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
<form class="modal fade" id="janela" method = "post" action="user_avaliation4.php">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <center> <h4 class="modal-tittle" style="color: #FF6347">COLABORE COM ESSA INICIATIVA!</h4> </center>
              <center>Para termos um mapa cada vez mais completo, precisamos da sua opinião. Avalie a situação da sua rede onde você está de 1 a 5 estrelas para atualizarmos nosso banco de dados!</center>
              <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
              <input type="hidden" id="user_avaliation" name="user_avaliation" value=""/>
            </div>

             <div class="modal-body">
             <div class="estrelas">
              <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
              <label for="cm_star-1"><i class="fa"></i></label>
              <input type="radio" id="cm_star-1" name="fb" value="1"/>
              <label for="cm_star-2"><i class="fa"></i></label>
              <input type="radio" id="cm_star-2" name="fb" value="2"/>
              <label for="cm_star-3"><i class="fa"></i></label>
              <input type="radio" id="cm_star-3" name="fb" value="3"/>
              <label for="cm_star-4"><i class="fa"></i></label>
              <input type="radio" id="cm_star-4" name="fb" value="4"/>
              <label for="cm_star-5"><i class="fa"></i></label>
              <input type="radio" id="cm_star-5" name="fb" value="5"/>
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
          <div class="col-md-10">
            <div class="a-mapa" id = "map">
              
            </div>
          </div>

          <!-- OPÇÕES DE ANALISE -->
          <div class="col-md-2"> 
          <div class="o-historico">
              <h4>Para ver suas últimas avaliações na NUTS passe o mouse no mapa!</h4>
              
          </div>    
          </div>

        </div>
      </div>     
   </section>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
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
    var weightArray =  <?php echo json_encode($weightArray);?>;
    

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
for (var key in data) {
          
          //heatMapData.push(dados);
          var conteudo  = "<div class='panel panel-primary' id='infowindow'>";  
  conteudo +=   "<button type='button' class='list-group-item list-group-item active' id='btn-info'><center>Analise feita nessa localização <img src='_images/teste.svg' id='gif_info'></center></button>"; 
  conteudo +=   "<table class='table table-striped table-bordered table-condensed'>";
  conteudo +=     "<tr> <td>Download</td> <td id='infodownload'></td>  <td>Mbps</td> </tr>";
  conteudo +=     "<tr> <td>Upload</td>   <td id='infojitter'>   - </td>  <td>ms</td> </tr>";
  conteudo +=     "<tr> <td>Ping</td>   <td id='infoping'>     - </td>  <td>ms</td>   </tr>";
  conteudo +=   "</table";
  conteudo += "</div>";

  var infowindow = new google.maps.InfoWindow({
          content: conteudo
        });

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[key]['latitude'],data[key]['longitude']),
          map: map, 
          title: 'Analise nesta localização'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        $('#infowindow').click(function(){
        $('#infodownload').html(10);
                $('#infojitter').html(data[key]['jitter']);
                $('#infoping').html(data[key]['ping']);
        });
      }
        
        //heatMapData.push({location: new google.maps.LatLng(-15., -47.8683), weight: 10});

        /*heatmap = new google.maps.visualization.HeatmapLayer({
          data: heatMapData,
          opacity: 0.8,   
          map: map,
          radius: getNewRadius(),
        });

        google.maps.event.addListener(map, 'zoom_changed', function () {
          heatmap.setOptions({radius:getNewRadius()});
          });*/
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