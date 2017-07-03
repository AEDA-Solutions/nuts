<?php
require_once('NetController.php');  
$NC = new NetController();
$user_data = $NC->get_last_data();
$best_data = $NC->getBestData();
//$nearby_data = $NC->get_nearby_data($user_data['latitude'],$user_data['longitude']);
?>

<!DOCTYPE html>
<html lang="en">
  <head class="page-header">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NUTS</title>
    <link rel="icon" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="Chart.min.js"></script>

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
            <li><a href="index.php">Home</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="sign_up.php">Registre-se</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janela">Login</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->
         
          <!-- Login  --> 
          <form class="modal fade" id="janela" method = "post" action = "validate_user.php">


          <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 1)
              {
                ?>
                <div class="alert alert-danger" role="alert">
                <strong>ERRO!</strong> <a href="#" class="alert-link"> Essa matrícula não existe</a> Digite-a corretamente ou faça nosso cadastro!
                </div>
          <?php 
              } 
            }
          ?>



        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <h4 class="modal-tittle" style="color: #FF6347">LOGIN</h4>             
            </div>

             <div class="modal-body">
              
            <div class="form-group">
            <input type="text" name = "reg" class="form-control" id="reg" placeholder="Matrícula">
            </div>

            <div class="form-group">
            <input type="password" class="form-control" name = "password" id="password" placeholder="Senha">
            </div>
           
            </div>

             <div class="modal-footer">

              <a href="sign_up.php" type="button" class=" btn btn-login btn-white">Cadastrar</a>

              <button type="submit" class="btn btn-login btn-white">Login</a> 
              
              <button type="button" class=" btn btn-cancelar btn-darkviolet" data-dismiss="modal">Cancelar</button>      

              
                         
            </div>

          </div>
        </div>
      </form>

      <!-- Mensagem de erro matricula  -->  
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 1)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! </strong> Essa matrícula não está cadastrada!
              </div>

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro -->

          <section id="grafico">
          <div class="container">
          <div class="row">
          <canvas id="chartl" widht="400" height="100"></canvas>

          <script>
            var ctx = document.getElementById("chartl");
            var data = {
              labels: ["Upload (Mbps)", "Download (Mbps)"],
              datasets: [{
                label: 'Localização Atual',
                data: [<?= $user_data['upload_speed']?>,<?= $user_data['download_speed']?>],
                backgroundColor: [
                  'rgba(255,127,80,0.7)',
                  'rgba(255,127,80,0.7)',
                ],
                borderColor: [
                  'rgba(255,127,80,1)'
                ],
                borderWidth: 1

              },
              {
                label: 'Localização com melhor qualidade',
                data: [<?= $best_data['upload_speed']?>,<?= $best_data['download_speed']?>] , //no campo 125 vai ficar a velocidade de upload do melhor lugar próximo do usuário,e no campo 100 a velocidade de donwload do melhor lugar
                backgroundColor: [
                  'rgba(0,128,128,0.7)',
                  'rgba(0,128,128,0.7)',
                ],
                borderColor: [
                  'rgba(0,128,128,1)'
                ],
                borderWidth: 1
              } 
              ] 
            };

            var options = {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero:true
                  }
                }]
              }


            }; 

            var chartl = new Chart(ctx, {
              type:'bar',
              data: data,
              options: options
            });
          </script>
          </div>
          <br>
          <h4>Para achar o local mais próximo com a melhor internet, faça seu login!</h4>
          <a href="#" class="btn btn-avançado btn-border" data-toggle="modal" data-target="#janela">Login</a>

          </div>
          </section>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

