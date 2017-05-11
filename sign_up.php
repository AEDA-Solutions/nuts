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
      </button>

        <a href="index.html" class="navbar-brand">
          <span class="img-logo">NUTS</span>
        </a>

      </div>
        <!-- nav -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="sign_up.php">Registre-se</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janela">Login</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->

          <form class="modal fade" id="janela">
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
                <button type="button" class=" btn btn-cancelar btn-darkviolet" data-dismiss="modal">
              Cancelar</button>      

                <button type="submit" class=" btn btn-login btn-white">
              Logar</button>             
            </div>

          </div>
        </div>
      </form>

      <section id="capa-cadastro">
        <br>
        <br>
        <br>
        <br>
        <br>
        
      </section>

    <section id="cadastro">
    <div class="container">
      <div id="cadastro" class="cadastro">
      <h1>Cadastre-se</h1>
      <hr> 
      <div class="row">
        <div class="col-sm-5">
          <form>
            <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome">
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required="required" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
            </div>

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
            
          </form>
        </div>

        <div class="col-sm-1">
          
        </div>

        <div class="col-sm-5">
            <div class="form-group">
            <label for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula">
            </div>

            <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha">
            </div>

      </div>


        </div>

      </div>

      <div class="botao">
        <button type="submit" class="btn btn-default btn-lg btn-white btn-cadastro">Cadastrar</button>
      </div>

      </div>

</section>
        
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
