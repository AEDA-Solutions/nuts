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
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="analise.php"> Análise de Rede</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="sign_up.php">Registre-se</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janelalogin">Login</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->
         
         <!-- MENSAGEM DE ERRO MATRICULA NÃO ENCONTRADA  -->
  <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 1)
              {
                ?>
                <div class="alert alert-danger" role="alert">
                <strong>ERRO!</strong> <a href="#" class="alert-link"> Essa matrícula não foi encontrada</a> Digite-a corretamente ou faça nosso cadastro!
                </div>
          <?php 
              } 
            }
          ?>

<!-- MENSAGEM DE ERRO MATRICULA NÃO ENCONTRADA  -->
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
               <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
                <strong>ERRO!</strong> <a href="#" class="alert-link"> Essa matrícula não foi encontrada</a> Digite-a corretamente ou faça nosso cadastro!
                </div>
                </div>
          <?php 
              } 
            }
          ?>

<!-- /MENSAGEM DE ERRO MATRICULA NÃO ENCONTRADA  -->

<!-- MENSAGEM DE ERRO SENHA ERRADA  -->
  <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 6)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
                <strong>ERRO!</strong> <a href="#" class="alert-link"> Matrícula encontrada,</a> mas senha foi digitada errada, tente novamente
                </div>
                </div>
          <?php 
              } 
            }
          ?>

<!-- /MENSAGEM DE ERRO SENHA ERRADA -->

          <!-- Login  --> 
          <form class="modal fade" id="janelalogin" method = "post" action = "validate_user.php">


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

              <a href="sign_up.php" type="button" class=" btn btn-login btn-white">Cadastrar</a> 
              
              <button type="button" class=" btn btn-cancelar btn-darkviolet" data-dismiss="modal">Cancelar</button>      

              <button type="submit" class="btn btn-login btn-white">Login</a>
                         
            </div>

          </div>
        </div>
      </form>

      


<body>
  <div class="capa">
      <div class="texto-capa">
        <h1>Teste sua velocidade </h1>

          <div align="center"> <iframe name="Teste de Velocidade da Internet" height="160" width="160" scrolling="no" frameborder="0" longdesc="" src="http://www.minhaconexao.com.br/mini-velocimetro/velocimetro.php?model=2&width=160&height=160"></iframe><br /><font size="2" face="Arial"><a  rel="nofollow" target="_blank" style="text-decoration:none"></a></font></div>

      </div>
  </div>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
