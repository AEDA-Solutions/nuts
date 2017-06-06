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
            <li><a href="index.php">Home</a></li>
            <li><a href="tabela.php"> Análise de Rede</a></li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Perfil <b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                <li><a href="historico.php">Histórico</a></li>
                                <li><a href="configuracoes.php">Configurações</a></li>
                            </ul>
            </li>    
            <li class="divisor" role="separator"></li>
            <li><a href="index.php">Sair</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->
    
      <section id="capa-indexusuario">
        <br>
        <br>
        <br>
        <br>
        <br>
        
      </section>

      <section id="cadastro">
    <div class="container">
      <div id="cadastro" class="cadastro">
      <h1>Análise da Rede</h1>
      <h4>Aqui estão os dados analisados da sua rede!</h4> 
      <hr>
      <div class="row">
       
        
        <table class="table table-inverse">
        <thead>
    <tr>
      <th>#</th>
      <th>Dados</th>

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
                      <td> <?= $user_data['ping']?></td>

                    </tr>

                    <tr>
                      <th scope="row">Perda de pacote</th>
                      <td> <?= $user_data['packetloss']?> </td>

                    </tr>

                    <tr>
                      <th scope="row">Velocidade download</th>
                      <td> <?= $user_data['download_speed']?></td>

                    </tr>

                    <tr>
                      <th scope="row">Velocidade upload</th>
                      <td></td>

                    </tr>
                  </tbody>
                </table>
                </div>

      <h1>Análise das suas proximidades</h1>
      <h4>Aqui estão os dados analisados das 10 redes mais próximas de você</h4> 
      <hr>
      <div class="row">

      <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Ping</th>
      <th>Perda de pacote</th>
      <th>Velocidade de Download</th>
      <th>Velocidade de Upload</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php validate_data($nearby_data[0]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[0]['longitude']);?></td>
      <td><?php validate_data($nearby_data[0]['ping']);?> </td>
      <td><?php validate_data($nearby_data[0]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[0]['download_speed']);?>  </td>
      <td> </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><?php validate_data($nearby_data[1]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[1]['longitude']);?></td>
      <td><?php validate_data($nearby_data[1]['ping']);?> </td>
      <td><?php validate_data($nearby_data[1]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[1]['download_speed']);?>  </td>
      <td> </td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><?php validate_data($nearby_data[2]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[2]['longitude']);?></td>
      <td><?php validate_data($nearby_data[2]['ping']);?> </td>
      <td><?php validate_data($nearby_data[2]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[2]['download_speed']);?>  </td>
      <td> </td>
    </tr>
    <tr>
          <th scope="row">4</th>
      <td><?php validate_data($nearby_data[3]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[3]['longitude']);?></td>
      <td><?php validate_data($nearby_data[3]['ping']);?> </td>
      <td><?php validate_data($nearby_data[3]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[3]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">5</th>
      <td><?php validate_data($nearby_data[4]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[4]['longitude']);?></td>
      <td><?php validate_data($nearby_data[4]['ping']);?> </td>
      <td><?php validate_data($nearby_data[4]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[4]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">6</th>
     <td><?php validate_data($nearby_data[5]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[5]['longitude']);?></td>
      <td><?php validate_data($nearby_data[5]['ping']);?> </td>
      <td><?php validate_data($nearby_data[5]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[5]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">7</th>
      <td><?php validate_data($nearby_data[6]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[6]['longitude']);?></td>
      <td><?php validate_data($nearby_data[6]['ping']);?> </td>
      <td><?php validate_data($nearby_data[6]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[6]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">8</th>
      <td><?php validate_data($nearby_data[7]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[7]['longitude']);?></td>
      <td><?php validate_data($nearby_data[7]['ping']);?> </td>
      <td><?php validate_data($nearby_data[7]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[7]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">9</th>
      <td><?php validate_data($nearby_data[8]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[8]['longitude']);?></td>
      <td><?php validate_data($nearby_data[8]['ping']);?> </td>
      <td><?php validate_data($nearby_data[8]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[8]['download_speed']);?>  </td>
      <td> </td>
      </tr>
       <tr>
          <th scope="row">10</th>
      <td><?php validate_data($nearby_data[9]['latitude']);?>  </td>
      <td><?php validate_data($nearby_data[9]['longitude']);?></td>
      <td><?php validate_data($nearby_data[9]['ping']);?> </td>
      <td><?php validate_data($nearby_data[9]['packetloss']);?>  </td>
      <td><?php validate_data($nearby_data[9]['download_speed']);?>  </td>
      <td> </td>
      </tr>
  </tbody>
</table>

        </div>
      </div>
      </div>
      </div>
      </section>


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