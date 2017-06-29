<?php

require_once('NetController.php');
$Uc = new NetController();
$user_data = $Uc->get_last_data();
$nearby_data = $Uc->get_nearby_data($user_data['latitude'],$user_data['longitude']);

function validate_data($d){
  if(isset($d)){
    echo $d;
  }

  else{
    
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NUTS</title>
    <script language="javascript" src="upload.js"> </script>
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
           

            <li class="divisor" role="separator"></li>
            <li><a href="index.php">Sair</a></li>
          </ul>

        </div>
        </div> <!-- /container --> 
    </nav>  <!-- /nav -->
    
    <!-- modal de avaliação-->
<form class="modal fade" id="janela" method = "post" action ="validate_user.php">


        <div class="modal-dialog modal-sm">
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

<header>
  <div class="row">
    
  </div>
</header>
  <!-- TABELAS -->
  <section id=tabelas>
   <div class="container">

   <div class="tabelas-titulos">
     <div class="row">
       <h1>Análise Avançada da sua Rede</h1>
       <h4>DADOS COMPLETOS DA SUA REDE ATUAL</h4>
     </div>
   </div>

    <div class="row">

      <!-- TABELA LOCAL -->
        <div class="col-md-6 col-md-push-3">
        <div class="tabela-local">
        <div class="table-responsive"> 
              <table class="table table-inverse table-hover">
        <thead>
      <tr>
      <th>Dados</th>
      <th></th>
      </tr>
        </thead>

        <tbody>
          <tr>
          <th scope="row">Latitude</th>
          <td> <?= $user_data['latitude']?></td>
          </tr>
                   
          <tr>
          <th scope="row">Longitude</th>
          <td><?= $user_data['longitude']?> </td>
          </tr>
                    
          <tr>
          <th scope="row">Ping</th>
          <td> <?= $user_data['ping']?> ms</td>
          </tr>

          <tr>
          <th scope="row">Perda de pacote</th>
          <td> <?= $user_data['packetloss']?> </td>
          </tr>

           <tr>
           <th scope="row">Velocidade de download</th>
           <td> <?= $user_data['download_speed']?> Mbps</td>
           </tr>

           <tr>
           <th scope="row">Velocidade de upload</th>
           <td> <?= $user_data['upload_speed']?> Kbps</td>
           </tr>

           <tr>
           <th scope="row">Jitter</th>
           <td> <?= $user_data['jitter']?> ms
           </tr>

            </tbody>
          </table>
          </div>
        </div>
        </div>

        </div> <!--row -->
   </div> <!--container -->

   <aside role="complementary" class="col-md-3 col-md-push-3"></aside>
   <nav class="col-md-3 col-md-pull-9"></nav>

  </section> <!--section tabelas -->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
            </body>
</html>