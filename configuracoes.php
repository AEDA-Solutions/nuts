<!DOCTYPE html>

<?php
session_start();
require_once('UserController.php');
?>

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
            <li><a href="logout.php">Sair</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->
<!-- modal de avaliação-->
<form class="modal fade" id="janela" method = "post" action = "user_avaliation2.php">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
             <center> <h4 class="modal-tittle" style="color: #FF6347">COLABORE COM ESSA INICIATIVA!</h4> </center>
              <center>Para termos um mapa cada vez mais completo, precisamos da sua opinião. Avalie a situação da sua rede onde você está de 1 a 5 nozes para atualizarmos nosso banco de dados!</center>
              <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
              <input type="hidden" id="user_avaliation" name="user_avaliation" value=""/>
              
            </div>

            <div class="modal-body">
            <div class="estrelas">
              <link href="estilo.css" rel="stylesheet">


                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>
                <label> <img name="fb" class="apagada"/>  </label>

            </div>
            </div>

             <div class="modal-footer">

              

              <button type="submit" class="btn btn-login btn-white">Enviar avaliação</a>

            </div>

          </div>
        </div>
      </form>
<!-- /Modal de avaliação -->

<!-- modal de excluir conta -->
<form class="modal fade" id="janelaexcluir" method = "post" action="delete_user.php">


        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                <span>&times;</span>
              </button> 
              <center> <h4 class="modal-tittle" style="color: #FF6347">Você tem certeza? Sentiremos sua falta! </h4>  </center>           
            </div>

             <div class="modal-body">
              <center> Se quiser excluir sua conta, digite sua senha para confirmar. </center>
            <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="password" name = "password" minlength="6" placeholder="******" required oninvalid="setCustomValidity('Por favor, preencha com sua senha')" onchange="try{setCustomValidity('')}catch(e){}" / title="Preencha aqui com sua senha. Ela precisa ter no mínimo 6 dígitos">
            </div>

            </div>

             <div class="modal-footer">
              <button type="submit" class="btn btn-login btn-white">Excluir</a>

            </div>

          </div>
        </div>
      </form>
 <!--/Modal de excluir conta -->

    <div class="container">
    <header class="row">
        
      </header>

 <!-- Mensagem de sucesso 1 (ALTERAÇÕES SALVAS)  -->

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
            <strong> UHUL! </strong> As alterações foram salvas!
              </div>
          <?php 
              } 
            }
          ?>


          <!-- // Mensagem de sucesso 1 (ALTERAÇÕES SALVAS) -->


          <!-- Mensagem de sucesso 2 (SEM ALTERAÇÕES) -->
                       <?php 
            if (isset($_GET['sucesso'])) 
            {
              $sucesso = $_GET['sucesso'];

              if($sucesso == 2)
              {
                ?>
 

                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                    </button>
                    <strong> ORAS BOLAS! </strong> Nada foi alterado aqui!
                </div>


          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de sucesso 2 (SEM ALTERAÇÕES) -->

 <!-- Mensagem de erro email  -->


  
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
            <strong> EPA! </strong> Esse email já foi cadastro por outro usuário!

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro email -->



 <!-- Mensagem de erro senha (EXCLUIR CONTA)  -->


  
       <?php 
            if (isset($_GET['erro'])) 
            {
              $erro = $_GET['erro'];

              if($erro == 2)
              {
                ?>
                <div class="container">
                <div class="page-header" class="row">
                </div>
               <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
            </button>
            <strong> EPA! </strong> A senha está errada.

              </div>
          <?php 
              } 
            }
          ?>
          <!-- // Mensagem de erro senha (EXCLUIR CONTA) -->


          <section id=configurações>
          <div class="container">
            <div class="page-configurações" class="row">
              <h1>Configurações</h1>
            </div>
          
            <div class="configurações-formulario" class="row">
            <div class="col-md-6 col-md-push-3">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <form method = "post" action = "change_user_data.php" id="formID">

          <!-- Configurações de usuário --> 

            <div class="form-group">

           <label>Email</label>
           <input type="email" required="required" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" value = "<?= $_SESSION['email']?>" />
           
           <br>

           <div class="form-group">
            <label>Curso</label>
        <select class="form-control" name = "course">
        <?php
          session_start();
          $courses= array('Administração',
          'Administração Pública',
           'Agronomia',
         'Arquitetura e Urbanismo',
          'Arquivologia',
         'Artes Cênicas',
        'Artes Plásticas',
        'Artes Visuais',
        'Biblioteconomia',   
        'Biotecnologia',
        'Ciência da Computação',
        'Ciência Política',
        'Ciências Ambientais',
        'Ciências Biológicas',
        'Ciências Contábeis',
        'Ciências Econômicas',
        'Ciências Farmacêuticas',
        'Ciências Naturais',
        'Ciências Sociais',
        'Computação',
        'Comunicação Organizacional',
        'Comunicação Social',
        'Design',
        'Direito',
        'Educação Física',
        'Educação do Campo',
        'Enfermagem e Obstetrícia',
        'Engenharia Aeroespacial',
        'Engenharia Ambiental',
        'Engenharia Automotiva',
        'Engenharia Civil',
        'Engenharia de Computação',
        'Engenharia de Energia',
        'Engenharia de Redes e Comunicação',
        'Engenharia de Produção',
        'Engenharia de Software',
        'Engenharia Elétrica',
        'Engenharia Eletrônica',
        'Engenharia Florestal',
        'Engenharia Mecânica',
        'Engenharia Mecatrônica',
        'Estatística',
        'Farmácia',
        'Filosofia',
        'Física',
        'Fisioterapia',
        'Fonoaudiologia',
        'Geofísica',
        'Geografia',
        'Geologia',
        'Gestão Ambiental',
        'Gestão de Políticas Públicas',
        'Gestão de Agronegócio',
        'Gestão em Saúde Coletiva',
        'História',
        'Letras',
        'Letras-Tradução',
        'Línguas EStrangeiras Aplicadas - MSI',
        'Matemática',
        'Medicina',
        'Medicina Veterinária',
        'Museologia',
        'Música',
        'Nutrição',
        'Odontologia',
        'Pedagogia',
        'Psicologia',
        'Química',
        'Química Tecnológica',
        'Relações Internacionais',
        'Saúde Coletiva',
        'Serviço Social',
        'Teoria Crítica e História da Arte',
        'Terapia Ocupacional',
        'Turismo');
        foreach($courses AS $key => $value) {

        if($_SESSION['course'] == $value){
             $selected = "selected";

        }

       else{
         $selected = "";
        }
        echo "<option value= '{$value}' {$selected}>{$value}</option>";
      }
   ?>
      </select>
            </div>
                </div>
                <br>

             <button type="submit" class="btn btn-marrom btn-alterações">Salvar alterações</a></button> 
             <a href="#" type="button" class="btn btn-marrom btn-alterações" data-toggle="modal"  data-target="#janelaexcluir" >Excluir conta</a>   
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
  </section>
 


    
<script type="text/javascript">

  function seleciona(name, indice) {
   var imgs = document.querySelectorAll('img[name=' + name + ']');
  $("#user_avaliation").val(indice+1);
   for (var i=0; i < imgs.length; i++) {
       if (i <= indice)
           imgs[i].className = "destaque";
       else
           imgs[i].className = "apagada";
   }
}

window.onload = function() {
   var imgs = document.querySelectorAll('img[name=fb]');
  
   for (var i=0; i < imgs.length; i++) {
       (function(name, i) {
          imgs[i].addEventListener('click', function () {
              seleciona(name, i);
          });
       })(imgs[i].name, i);
   }
}

</script>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

            </body>
</html>