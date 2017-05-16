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

<form class="modal fade" id="janela">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <h4 class="modal-tittle" style="color: purple">LOGIN</h4>             
            </div>

             <div class="modal-body">
              
            <div class="form-group">
            <input type="text" class="form-control" id="matricula" placeholder="Matrícula">
            </div>

            <div class="form-group">
            <input type="password" class="form-control" id="senha" placeholder="Senha">
            </div>
           
            </div>

             <div class="modal-footer">
                <button type="button" class=" btn btn-cancelar btn-darkviolet" data-dismiss="modal">
              Cancelar</button>      

                <button type="submit" class=" btn btn-login btn-white">
              Logar</button>             
            </div>

          </div>
        </div>
      </form>
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
<script src = "get_location.js"></script>
<script type="text/javascript">
  window.onload = getLocation(function (x){
  if(x!=false){
    $("#latitude").val(x['latitude']);
    $("#longitude").val(x['longitude']);
    $("#form").submit();
  }
  else{}
    $("#form").submit();
});
</script>
