<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Book.Net</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" media="screen" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" >
    

 	
</head>

<body>
    <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand " href="../index.html">Book.Net</a> 
        </div>
        <div class="collapse navbar-collapse">
          <form class="navbar-form navbar-left " role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Buscar Livro" id="inputBusca">
            </div>
            <button class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </form>
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <button class="btn btn-danger dropdown-toggle botao-categorias" data-toggle="dropdown">Categorias<span class="caret" role="button" aria-expanded="false"></span></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="buscarProduto.php">Ação</a></li>
                  <li><a href="#">Aventura</a></li>
                  <li><a href="#">Culinária</a></li>
                  <li><a href="#">Romance</a></li>
                  <li><a href="#">Suspense</a></li>
               </ul>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="cadastrarUsuario.php">Cadastre-se</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="caret"></span></a>
            <div class="dropdown-menu menuLogin" role="menu">
              <form role="form" class="form-horizontal" method="post" action="control/execLogin.php">
              <div class="form-group">
                  <label for="txtlogin">Login</label>
                  <input type="text" id="txtlogin" name="txtlogin" class="form-control" required=""/>
              </div>
              <div class="form-group">
                  <label for="txtsenha">Senha</label>
                  <input type="password" id="txtsenha" name="txtsenha" class="form-control" required=""/>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-success">Entrar</button>
              </div>
              
              </form>
             </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
