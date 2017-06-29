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

  <body class="sing-up-page">
   
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




<!-- Mensagem de sucesso   -->

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
            <strong> UHUL! </strong> Tá tudo certinho!
              </div>
          <?php 
              } 
            }
          ?>


<!-- // Mensagem de sucesso  -->



          <!-- Mensagem de erro matricula já cadastrada -->
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 2)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! </strong> Essa matrícula já foi cadastrada! Tente outra!
              </div>

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro matricula já cadastrada -->

          <!-- Mensagem de erro email já cadastrado -->
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 3)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! </strong> Esse email já foi cadastro! Tente outro!
              </div>

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro email já cadastrado -->

          <!-- Mensagem de erro email e matricula já cadastrados -->
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 4)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! </strong> Esse email  e essa matrícula já foram cadastros! 
              </div>

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro email e matricula já cadastrados --> 


          <!-- Mensagem de erro no banco de dados -->
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 5)
              {
                ?>
                <div class="container">
                <div class="page-header">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> OPS! </strong> Tivemos algum problema.
              </div>

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro no banco de dados -->


  <div class="container">
        <div class="cadastro" class="row">
          <h1>Cadastre-se</h1>
          <hr>
        </div>
        
        <div class="cadastro-formulario" class="row">
          <div class="col-md-6 col-md-push-3">

            
            <form method = "post" action = "register_user.php">
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" pattern="[a-Z\s]+$" id="nome" name = "name" placeholder="Nome" required oninvalid="setCustomValidity('Por favor, preencha com o seu nome')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com o seu nome ">
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email"  required oninvalid="setCustomValidity('Por favor, preencha com um e-mail válido')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com seu e-mail"/>
            </div>

            <div class="form-group">
            <label>Curso</label>
        <select class="form-control" name = "course">
        <option>Administração</option>
        <option>Administração Pública</option>
        <option>Agronomia</option>
        <option>Arquitetura e Urbanismo</option>
        <option>Arquivologia</option>
        <option>Artes Cênicas</option>
        <option>Artes Plásticas</option>
        <option>Artes Visuais</option>
        <option>Biblioteconomia</option>   
        <option>Biotecnologia</option>
        <option>Ciência da Computação </option>
        <option>Ciência Política</option>
        <option>Ciências Ambientais</option>
        <option>Ciências Biológicas</option>
        <option>Ciências Contábeis</option>
        <option>Ciências Econômicas</option>
        <option>Ciências Farmacêuticas</option>
        <option>Ciências Naturais</option>
        <option>Ciências Sociais</option>
        <option>Computação</option>
        <option>Comunicação Organizacional</option>
        <option>Comunicação Social </option>
        <option>Design</option>
        <option>Direito </option>
        <option>Educação Física </option>
        <option>Educação do Campo</option>
        <option>Enfermagem e Obstetrícia</option>
        <option>Engenharia Aeroespacial</option>
        <option>Engenharia Ambiental </option>
        <option>Engenharia Automotiva</option>
        <option>Engenharia Civil</option>
        <option>Engenharia de Computação</option>
        <option>Engenharia de Energia</option>
        <option>Engenharia de Redes de Comunicação</option>
        <option>Engenharia de Produção</option>
        <option>Engenharia de Software</option>
        <option>Engenharia Elétrica</option>
        <option>Engenharia Eletrônica</option>
        <option>Engenharia Florestal</option>
        <option>Engenharia Mecânica</option>
        <option>Engenharia Mecatrônica</option>
        <option>Estatística</option>
        <option>Farmácia</option>
        <option>Filosofia</option>
        <option>Física</option>
        <option>Fisioterapia</option>
        <option>Fonoaudiologia</option>
        <option>Geofísica</option>
        <option>Geografia</option>
        <option>Geologia</option>
        <option>Gestão Ambiental</option>
        <option>Gestão de Políticas Públicas</option>
        <option>Gestão de Agronegócio</option>
        <option>Gestão em Saúde Coletiva</option>
        <option>História</option>
        <option>Letras</option>
        <option>Letras-Tradução</option>
        <option>Línguas EStrangeiras Aplicadas - MSI</option>
        <option>Matemática</option>
        <option>Medicina</option>
        <option>Medicina Veterinária</option>
        <option>Museologia</option>
        <option>Música</option>
        <option>Nutrição</option>
        <option>Odontologia</option>
        <option>Pedagogia</option>
        <option>Psicologia</option>
        <option>Química</option>
        <option>Química Tecnológica</option>
        <option>Relações Internacionais</option>
        <option>Saúde Coletiva</option>
        <option>Serviço Social</option>
        <option>Teoria Crítica e História da Arte</option>
        <option>Terapia Ocupacional</option>
        <option>Turismo</option>
      </select>
            </div>

            <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="reg" maxlength="9" pattern="[0-9]{2}[0-9]{7}" placeholder="123456789" name = "reg" required oninvalid="setCustomValidity('Por favor, preencha com uma matrícula válida')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com uma matrícula de 9 dígitos">
            </div>

            <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" minlength="6" id="senha" name = "password" placeholder="******" required oninvalid="setCustomValidity('Por favor, preencha com sua senha')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com a senha que você deseja. Ela precisa ter no mínimo 6 dígitos">
            </div>

            <br>

          <div class="botao">
            <button type="submit" class="btn btn-default btn-lg btn-white btn-cadastro">Cadastrar</button> 
          </div>

          </form>
        </div>
      </div>
  </div>
        
          <aside role="complementary" class="col-md-3 col-md-push-3">
            
          </aside>
          <nav class="col-md-3 col-md-pull-9">
           
          </nav>
        </div>
    
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
