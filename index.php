<?php
session_start();
require_once("control/Login.php");
require_once("control/carregarGeneros.php");
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Book.Net</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="carousel/engine0/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" >
    
</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand " href="#">Book.Net</a> 
        </div>
        <div class="collapse navbar-collapse">
          <form class="navbar-form navbar-left " role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar Livro" id="inputBusca">
            </div>
            </form>
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <button class="btn btn-danger dropdown-toggle botao-nav" data-toggle="dropdown">Categorias<span class="caret" role="button" aria-expanded="false"></span></button>
                <ul class="dropdown-menu" role="menu">
                    <?php exibirGenerosLista(); ?>
               </ul>
              </li>
          </ul>
           
          <ul class="nav navbar-nav navbar-right">
          <?php
               if (!Login::isLogado()) { 

          ?>
            <li><a href="view/cadastrarUsuario.php">Cadastre-se</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="caret"></span></a>
            <div class="dropdown-menu menuLogin" role="menu">
              <form role="form" class="form-horizontal" method="post" action="control/execLogin.php">
              <div class="form-group">
                  <label for="txtUser">Login</label>
                  <input type="text" id="txtUser" name="txtUser" class="form-control" required=""/>
              </div>
              <div class="form-group">
                  <label for="txtsenha">Senha</label>
                  <input type="password" id="txtsenha" name="txtSenha" class="form-control" required=""/>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Entrar</button>
              </div>
              
              </form>
             </div>
            </li>
            <?php
              }else{

            ?>

             <li><a class="btn btn" href="control/execLogoff.php"> <?php echo Login::userLogado() ?> - Logoff</a></li>  
            <?php   
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <main  class="container">
    <?php if(isset($_SESSION['erro_login'])){ ?>
        <div class="alert alert-danger alert-dismissible alertas" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong><?php echo($_SESSION['erro_login']); ?></strong>
        </div>
    <?php 
          unset($_SESSION['erro_login']);
          } ?>    
    <div class="row">
      <div id="carousel" class="col-md-12">
      	<div id="wowslider-container0">
        	<div class="ws_images">
              <ul>
            		<li><img src="carousel/data0/images/carousel.jpg" alt="carrousel1" title="Alugue um livro agora na Book.Net" id="wows0_0"/></li>
            		<li><img src="carousel/data0/images/carousel2.jpg" alt="carousel2" title="Os melhores livros com os menores preços" id="wows0_1"/></li>
            		<li><img src="carousel/data0/images/carousel3.jpg" alt="carousel3" title="Uma enorme variedade de livros esperando por você" id="wows0_2"/></li>
       
            	</ul>
          </div>
        	<div class="ws_bullets">
            <div>
          		<a href="#" title="carousel"><span><img src="carousel/data0/tooltips/carousel.jpg" alt="carousel"/>1</span></a>
          		<a href="#" title="carousel2"><span><img src="carousel/data0/tooltips/carousel2.jpg" alt="carousel2"/>2</span></a>
          		<a href="#" title="carousel3"><span><img src="carousel/data0/tooltips/carousel3.jpg" alt="carousel3"/>3</span></a>
          	</div>
          </div>
        	<div class="ws_shadow"></div>
            
        </div>
       
     </div>
     <div class="row">
      <div class="container">
        <div class="col-md-12">
          <h1>Livros em Promoção</h1>
       <div class="well-none">
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
                  <div class="item active">
                      <div class="row">
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro1.png"  class="img-responsive" alt="Promoção 1">
                              <div class="caption">
                                <h3>Dominando o Android</h3>
                                <p>R$ 110,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>

                          </div>
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro2.jpg"  class="img-responsive " alt="Promoção 2">
                              <div class="caption">
                                <h3>Quebre a Cabeça! Padrões de Projetos</h3>
                                <p>R$ 200,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro3.jpg" class="img-responsive" alt="Promoção 3">
                              <div class="caption">
                                <h3>Pizza do Faustão</h3>
                                <p>R$ 30,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                    <div class="row">
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro4.jpg"  class="img-responsive" alt="Promoção 1">
                              <div class="caption">
                                <h3>O Fascinante império de Steve Jobs</h3>
                                <p>R$ 60,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>

                          </div>
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro5.jpg"  class="img-responsive " alt="Promoção 2">
                              <div class="caption">
                                <h3>A música do silêncio</h3>
                                <p>R$ 20,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3 col-xs-6 col-md-4">
                            <div class="thumbnail tumbnail-promocao">
                              <img src="img/livros/livro6.jpg" class="img-responsive" alt="Promoção 3">
                              <div class="caption">
                                <h3>Percy Jackson e o ladrão de raios</h3>
                                <p>R$ 25,00</p>
                                <p><a href="#" class="btn btn-danger" role="button">Comprar</a></p>
                              </div>
                            </div>
                          </div>
                          
                      </div>
                      
                  </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-4 seta-carousel"></i></a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-4 seta-carousel"></i></a>
          </div>
          <!--/myCarousel-->
        </div>
        <!--/well-->
        </div>
      </div>

       
     </div>

    </main>

     <hr>
    <footer>
        <div class="row">
            <div class="col-md-3">
                <p>Copyright &copy; Book.Net 2015</p>
            </div>
        </div>
    </footer>

 
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="carousel/engine0/wowslider.js"></script>
    <script type="text/javascript" src="carousel/engine0/script.js"></script>


    </body>

</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	