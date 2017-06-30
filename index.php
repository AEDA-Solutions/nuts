
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

    <!-- Custom CSS -->
    <link href="bootstrap/css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body  id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    <nav class="navbar navbar-inverse navbar-transparente">
      <div class="container">

      <!-- header -->
      <div class="navbar-header page-scroll">

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
            <li><a class="page-scroll" href="#page-top">Home</a></li>
            <li><a class="page-scroll" href="#nos">Sobre</a></li>
            <li><a class="page-scroll" href="#contato">Contato</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janelalogin">Análise de Rede</a></li>
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

        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <h4 class="modal-tittle" style="color:  #FF6347">LOGIN</h4>             
            </div>

             <div class="modal-body">
              
            <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name = "id"maxlength="9" pattern="[0-9]{2}[0-9]{7}" placeholder="123456789" required oninvalid="setCustomValidity('Por favor, preencha com uma matrícula válida')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com uma matrícula de 9 dígitos">
            </div> 

            <div class="form-group">
            <label for="matricula">Senha</label>
            <input type="password" class="form-control" id="password" name = "password" minlength="6" placeholder="******" required oninvalid="setCustomValidity('Por favor, preencha com sua senha')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com sua senha. Ela precisa ter no mínimo 6 dígitos">
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
      <!-- /Login  -->    


    <div class="capa">
      <div class="texto-capa">
        <h1>QUALIDADE PARA TODOS</h1>
        <a href="grafico.php" type="button" class="btn btn-custom btn-marrom btn-lg">Teste sua Velocidade</a>
      </div>
    </div>

   <!-- Conteudos -->
   <section id="nos" class=nos-section>
     <div class="container">
       <div class="row">

          <!-- Texto Nos --> 
         <div class="col-md-6">
           <h2>SOBRE NUTS</h2>
           <p>Nós da NUTS temos como principal objetivo promover um ambiente colaborativo de monitoramento da rede universitária. Somos um grupo de cinco estudantes do curso de Engenharia de Redes de Comunicação e um estudante de Engenharia Elétrica da Universidade de Brasília. 
           <p>No momento, estamos cursando a disciplina Algoritmos e Estruturas de Dados e nos foi dado como objetivo, a implementação de uma plataforma para que você, usuário, leigo ou avançado, consiga obter informações que nem sempre estão dispostas de maneira simplificada sobre sua rede.</p>
         </div>

         <!-- Imagem Nos --> 
         <div class="col-md-6">
         <div class="row albuns">
           <img src="images/nos.png" class="img-responsive">
         </div>
         </div>

       </div>
     </div>
   </section>

   <section id="recursos">
      <div class="container">
        <div class="row">
          
          <!-- Recursos -->
          <div class="col-md-4">
            <h2>Prático</h2>

            <h3>Buscar</h3> 
            <p>Já sabe o que irá acessar na internet? É só procurar e ver os locais de melhor rede para fazer isso!</p>

            <h3>Navegar</h3>
            <p>Veja os mapas e ache o local que tem mais gente utilizando a internet no momento.</p>

            <h3>Descobrir</h3>
            <p>Encontre lugares novos que ninguém conhece para fazer downloads e acessar a internet mais rápido!</p>
          </div>

          <!-- ImG Recursos -->
          <div class="col-md-8">
              <img src="images/nuts-conteúdos.png" class="img-responsive">
          </div>

          </div>


        </div>
      </div>     
   </section>

   <!-- Contato --> 
   <section id="contato">
     <div class="container">
      <div class="row">
        <!-- Texto Contato --> 
        <div class="col-md-3">
        <h3>Contato</h3>
          <p>
              equipenuts@gmail.com
          </p>
        <form>
        <!--
        <div class="col-md-9">
          <label class="sr-only" for="nome">Nome</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome" pattern="[a-z\s]+$" placeholder="Nome" required oninvalid="setCustomValidity('Por favor, preencha o nome')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com o seu nome ">
          <br>
          <label class="sr-only" for="email">Email</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" required oninvalid="setCustomValidity('Por favor, preencha com um e-mail válido')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com seu e-mail">

          <label for="Assunto"></label>
          <input type="text" class="form-control" id="assunto" placeholder="Assunto" required oninvalid="setCustomValidity('Por favor, preencha com um assunto')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com um assunto">

          <label for="Mensagem"></label>
          <textarea class="form-control" id="Mensagem" placeholder="Mensagem" required oninvalid="setCustomValidity('Por favor, preencha com um mensagem')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com uma mensagem"></textarea>
        
          <br>   
            <div class="botao-contato">
            <button type="submit" class="btn btn-default btn-lg btn-white btn-contato">Enviar</button>
            </div> 
        </div>
        -->
        </form>
        </div>


          <!-- Endereço --> 
         <div class="col-md-3">
         <h3>Endereço</h3>
            <p>
               Campus Universitário Darcy Ribeiro, Faculdade de Tecnologia Universidade de Brasília – UnB, Asa Norte, Brasília - DF
            </p>
         </div>

         <!-- Telefone --> 
         <div class="col-md-3">
            <h3>Telefone</h3>
            <p>
              (61) 9xxxx-xxxx
            </p>
         </div>

         <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Clique para retornar a topo da página!" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>

      </div>
     </div>
     </section>

     <footer>
       NUTS
     </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

      <!-- Scrolling Nav JavaScript -->
    <script src="bootstrap/js/jquery.easing.min.js"></script>
    <script src="bootstrap/js/scrolling-nav.js"></script>

  </body>
</html>          
