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
        <header class="row">
        </header>

<!-- Mensagem de sucesso (ALTERAÇÃO SALVA)  -->

       <?php 
            if (isset($_GET['sucesso'])) 
            {
              $sucesso = $_GET['sucesso'];

              if($sucesso == 1)
              {
                ?>

               <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> UHUL! </strong> Você tem uma nova senha!
              </div>
          <?php 
              } 
            }
          ?>


<!-- // Mensagem de sucesso (ALTERAÇÃO SALVA) -->

<!-- Mensagem de erro (Senha atual não está certa) -->
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 1)
              {
                ?>

               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! Calma lá! </strong> Você digitou a senha atual errada!
              </div>
          <?php 
              } 
            }
          ?>
<!--  //Mensagem de erro  (Senha atual não está certa) -->       

                <section id=senha-configurações>
                  <div class="container">
                     <div class="page-senha" class="row">
                     <h1>Trocar Senha</h1>
                     </div>
          
                  <div class="senha-formulario" class="row">
                  <div class="col-md-6 col-md-push-3">
                <form method = "post" action = "change_user_password.php">


                    <!-- Configurações de senha --> 

                     <div class="form-group">

                     <label for="old_password"> Senha atual</label>
                     <input type="password" required="required" class="form-control" id="old_password" name = "old_password" minlength="6" placeholder="******">

                    <label for="senha">Nova Senha</label>
                    <br>
                    <input type="password" required="required" class="form-control" minlength="6" id="password" name = "password" placeholder="******">
                     
                    <input type="button" id="showPassword" value="Mostrar Senha" class="btn btn-senha"></p>

                    <button type="submit" class="btn btn-marrom btn-alterações">Salvar alterações</a></button>
                    </div>
                  </form>
            </div>  
          </div>

    <aside role="complementary" class="col-md-3 col-md-push-3"></aside>
    <nav class="col-md-3 col-md-pull-9"></nav>
      </div>
      </div>
    </section>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>

    <script type="text/javascript">
    $(document).ready(function(){
    $('#showPassword').on('click', function(){
    var passwordField = $('#password').val();
    var passwordFieldType = $('#password').attr('type');
    if(passwordFieldType == 'password')
    {
        $('#password').attr('type', 'text');
        $(this).val('Ocultar senha');
    } else {
        $('#password').attr('type', 'password');
        $(this).val('Mostrar Senha');
    }
  });
});
    </script>

</html>
