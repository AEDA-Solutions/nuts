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
            <li><a href="perfil.php">Home</a></li>
            <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Análise de Rede<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="analise.php">Mapa</a></li>
                <li><a href="tabela.php">Avançado</a></li>
               <li><a href="#" class="btn" data-toggle="modal" data-target="#janelaloading">Avaliação</a></li>
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

<!-- MODAL DE LOADING -->

<form class="modal fade" id="janelaloading" method = "post" >


        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <h4 class="modal-tittle" style="color: #FF6347"></h4>
              <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">            
            </div>
            <img src="images/squille.gif" class="img-responsive">
             <div class="modal-body">
            </div>

            

          </div>
        </div>
      </form>

<!-- // MODAL DE LOADING -->
   <section id="analise-rede">
      <div class="container">
        <div class="row">

        
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