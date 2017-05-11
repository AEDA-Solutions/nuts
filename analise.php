<!DOCTYPE html>
<html lang="en">
  <head>
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

  <body>
    
    <nav class="navbar navbar-fixed-top navbar-inverse navbar-transparente">
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

        <a href="index.html" class="navbar-brand">
          <span class="img-logo">NUTS</span>
        </a>

      </div>
        <!-- nav -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="analise.php"> Análise de Rede</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="sign_up.php">Registre-se</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janela">Login</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->

     <div class="capa">
      <div class="texto-capa">
        <h1>Análise de rede</h1>
      </div>
    </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<form style = "display: hidden" action = "treat_location.php" method = "post" id = "form">
  <input type="hidden" id="latitude" name="latitude" value=""/>
    <input type="hidden" id="longitude" name="longitude" value=""/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>

window.onload = getLocation();


function getLocation() {
    if (navigator.geolocation) {
      //navegador suporta geolocalizacao
        navigator.geolocation.getCurrentPosition(send_position,error_handler,options);
    } 

    else { 
        $("#latitude").val(false);
    $("#longitude").val(false);
    }
}

var options = {

  //variavel que armazena os parametros para a func getCurrentPosition()
    enableHighAccuracy: true,
  timeout: 5000,
    maximumAge: 0
};

function error_handler(error){
  
  //funcao que trata possiveis erros da funcao getCurrentPosision()
  
    switch(error.code) {
        case error.PERMISSION_DENIED:
            //User denied the request for Geolocation."
            $("#latitude").val(false);
      $("#longitude").val(false);

            break;
        case error.POSITION_UNAVAILABLE:
            //Location information is unavailable."
            $("#latitude").val(false);
      $("#longitude").val(false);
            break;
        case error.TIMEOUT:
           //The request to get user location timed out."
            $("#latitude").val(false);
      $("#longitude").val(false);
            break;
        case error.UNKNOWN_ERROR:
            //An unknown error occurred."
            $("#latitude").val(false);
      $("#longitude").val(false);
            break;
    }
}

function send_position(position) {

  var lat= position.coords.latitude;
  var long = position.coords.longitude;

  $("#latitude").val(lat);
  $("#longitude").val(long);
    $("#form").submit();  

}

</script>
