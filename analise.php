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
            <li><a href="index.php">Home</a></li>
            <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Análise de Rede<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="analise.php">Mapa</a></li>
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
<form class="modal fade" id="janela" method = "post" action ="validate_user.php">


        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <h4 class="modal-tittle" style="color: #FF6347">AVALIE SEU LOCAL!</h4>             
            </div>

             <div class="modal-body">
            </div>

             <div class="modal-footer">  

              <button type="submit" class="btn btn-login btn-white">Enviar avaliação</a>

            </div>

          </div>
        </div>
      </form>
<!-- /Modal de avaliação -->

    <div class="container">

   <section id="analise-rede">
      <div class="container">
        <div class="row">
          
          <!-- MAPA -->
          <div class="col-md-8">
            <div class="a-mapa">
              MAPAAAAA!!!!!!!!
            </div>
          </div>

          <!-- OPÇÕES DE ANALISE -->
          <div class="col-md-4"> 
          <div class="o-analise">
              <h3>A internet aqui é avaliada em:</h3>
              <h4>******************</h4>
              <h5>Isso significa que aqui você consegue: Instalar Apps, Baixar Vídeos e Assistir Netflix!</h5>
              <br>
              <br>
              <br>
              
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





        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<form style = "display: hidden" action = "treat_data.php" method = "post" id = "form">
  <input type="hidden" id="latitude" name="latitude" value=""/>
  <input type="hidden" id="longitude" name="longitude" value=""/>
  <input type="hidden" id="download_speed" name="download_speed" value=""/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="get_location.js"></script>
<script src="download_speed.js"></script>
<script type="text/javascript">

  window.onload = getLocation(function (x){
  if(x!=false){
    $("#latitude").val(x['latitude']);
    $("#longitude").val(x['longitude']);
    MeasureConnectionSpeed(function (download_speed){
      $("#download_speed").val(download_speed);
      $("#form").submit();
        });
    /*checkUploadSpeed(function (speed){
      $("#speed").val(speed);
      $("#form").submit();
    });*/
  }
  else{
    $("#form").submit();
  }
  
});
</script>
