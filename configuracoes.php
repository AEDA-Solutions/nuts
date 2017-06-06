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

<section id="nos">
     <div class="container">
       <div class="row">
       <div class="col-sm-5">
          <form method = "post" action = "#">
            <div class="form-group">

          <!-- Configurações de perfil --> 
         <!--<div class="col-md-6"> -->
           <h2> Configurações </h2>

           <label>Email</label>
           <input type="email" required="required" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" />
           

           <div class="form-group">
            <label>Curso</label>
        <select class="form-control" name = "course">
        <option>Administração</option>
        <option>Agronomia</option>
        <option>Arquitetura e Urbanismo</option>
        <option>Arquivologia</option>
        <option>Artes Cênicas</option>
        <option>Artes Plásticas</option>
        <option>Biblioteconomia</option>
        <option>Ciência da Computação </option>
        <option>Ciência Política</option>
        <option>Ciências Ambientais</option>
        <option>Ciências Biológicas</option>
        <option>Ciências Contábeis</option>
        <option>Ciências Econômicas</option>
        <option>Ciências Farmacêuticas</option>
        <option>Ciências Naturais</option>
        <option>Ciências Sociais</option>
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
        <option>Serviço Social</option>
        <option>Terapia Ocupacional</option>
        <option>Turismo</option>
        <option>Visuais</option>
      </select>
            </div>
                </div>

        <div class="col-sm-1">
          
        </div>
          <br>     
          <button type="submit" class="btn btn-default btn-lg btn-white btn-alteracoes">Salvar alterações</a></button>
         </div>


         <!-- Imagem Esquilo Perfil --> 
         <div class="col-md-6">
         <div class="row albuns">
           <img src="images/squille.png" class="img-responsive">
         </div>
         </div>


      </form>
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