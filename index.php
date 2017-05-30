
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
            <li><a href="">Sobre</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="analise.php"> Análise de Rede</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="sign_up.php">Registre-se</a></li>
            <li><a href="#" class="btn" data-toggle="modal" data-target="#janela">Login</a></li>
          </ul>

        </div>
      </div> <!-- /container --> 
    </nav>  <!-- /nav -->
            <!-- Login  --> 
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
            <label for="matricula">Matrícula</label>
            <input type="text" required="required" class="form-control" id="matricula" maxlength="9" pattern="[0-9]{2}[0-9]{7}" placeholder="123456789">
            </div>

            <div class="form-group">
            <label for="matricula">Senha</label>
            <input type="password" required="required" class="form-control" id="senha" minlength="6" placeholder="******">
            </div>
           
            </div>

             <div class="modal-footer">

              <a href="sign_up.php" type="button" class=" btn btn-login btn-white">Cadastrar</a> 
              
              <button type="button" class=" btn btn-cancelar btn-darkviolet" data-dismiss="modal">Cancelar</button>      

              <a href="indexusuario.php" type="button" class="btn btn-login btn-white">Logar</a> 
                         
            </div>

          </div>
        </div>
      </form>
      <!-- /Login  -->
    <div class="capa">
      <div class="texto-capa">
        <h1>QUALIDADE PARA TODOS</h1>
        <a href="speed_test.php" type="button" class="btn btn-custom btn-marrom btn-lg">Teste sua Velocidade</a>
      </div>
    </div>

   <!-- Conteudos -->
   <section id="nos">
     <div class="container">
       <div class="row">

          <!-- Texto Nos --> 
         <div class="col-md-6">
           <h2>SOBRE NUTS</h2>
           <p>Nós da NUT temos como principal objetivo promover um ambiente colaborativo de monitoramento da rede universitária. Somos um grupo de seis estudantes do curso de Engenharia de Redes de Comunicação e um estudante de Engenharia Elétrica da Universidade de Brasília. 
           <p>No momento, estamos cursando a disciplina Algoritmo e Estrutura de Dados e nos foi dado como objetivo, a implementação de uma plataforma para que você, usuário, leigo ou avançado, consiga obter informações que nem sempre estão dispostas de maneira simplificada sobre sua rede.</p>
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

          <!-- ImG Recursos PAREI AQUIIII -->
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
         <div class="col-md-6">
           <h3>Contato</h3>
           <form class="form-inline">
             
           <div class="form-group">
             <label class="sr-only" for="nome">Nome</label>
             <input type="text" required="required" class="form-control mb-2 mr-sm-2 mb-sm-0" id="nome" placeholder="Nome">

             <label class="sr-only" for="email">Email</label>
              <input type="text"  required="required" class="form-control mb-2 mr-sm-2 mb-sm-0" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email">
             
             </div> 
              
              <div class="form-group">
             <label for="Assunto"></label>
             <input type="text" required="required" class="form-control" id="assunto" placeholder="Assunto">

             <label for="Mensagem"></label>
             <textarea required="required" class="form-control" id="Mensagem" rows="3" placeholder="Mensagem"></textarea>

             <br>
             
            <div class="botao-contato">
            <button type="submit" class="btn btn-default btn-lg btn-white btn-contato">Enviar</button>
            </div> 

           </div>

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
             <h3>Email</h3>
            <p>
              equipenuts@gmail.com
            </p>
         </div>

       </div>
     </div>
   </section>

       <!-- Endereço -->
       <section id="rodape">
       <div class="container">
         <div class="row">
           <footer>
             <p>
               NUTS 
             </p>
           </footer>
         </div>
       </div>
         
       </section>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>          
