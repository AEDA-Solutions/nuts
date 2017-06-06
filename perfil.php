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

       <section id="nos">
     <div class="container">
       <div class="row">

          <!-- Texto Nos --> 
         <div class="col-md-6">
           <h2>Perfil do usuário</h2>
           <p> Bem vindo a sua página! Aqui você pode editar seus dados e ver seu histórico de analíses feitas pelo nosso site! Fique a vontade, sinta-se em casa! </p>
           <a href="historico.php" type="button" class=" btn btn-login btn-white">Histórico</a> 
           <br>    
           <br>     
           <a href="configuracoes.php" type="button" class=" btn btn-login btn-white">  Configurações </a> 
         </div>

         <!-- Imagem Perfil --> 
         <div class="col-md-6">
         <div class="row albuns">
           <img src="images/usuario.gif" class="img-responsive">
         </div>
         </div>

       </div>
     </div>
   </section>
      </div>
      </div>
      </section>

              


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
            </body>
</html>