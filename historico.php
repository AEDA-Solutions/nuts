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
            </body>
</html>