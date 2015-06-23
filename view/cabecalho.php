<?php
session_start();
require_once("../control/Login.php");
require_once("../control/carregarGeneros.php");
?>

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
            <a class="navbar-brand " href="../index.php">Book.Net</a> 
        </div>
                 
          <ul class="nav navbar-nav navbar-right">
          <li><a href="http://localhost:8080/BookNet/livros/buscarLivros.xhtml">Buscar Livro</a></li>
          <?php
               if (!Login::isLogado()) { 
          ?>
            <li><a href="cadastrarUsuario.php">Cadastre-se</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="caret"></span></a>
            <div class="dropdown-menu menuLogin" role="menu">
              <form role="form" class="form-horizontal" method="post" action="../control/execLogin.php">
              <div class="form-group">
                  <label for="txtUser">User</label>
                  <input type="text" id="txtUser" name="txtUser" class="form-control" required=""/>
              </div>
              <div class="form-group">
                  <label for="txtSenha">Senha</label>
                  <input type="password" id="txtSenha" name="txtSenha" class="form-control" required=""/>
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
              <li><a href="logado.php">Painel de Controle</a></li>
              <li><a href="../control/execLogoff.php"> <?php echo Login::userLogado() ?> - Logoff</a></li>

          <?php   
           }
          ?>

          </ul>
          
        </div>
      </div>
    </nav>
<?php 
    #Aqui faço o controle das mensagens de confirmação   
    if(isset($_SESSION['msg'])){ 
      if($_SESSION['msg'] == true){
?>
    <div class="alert alert-success alert-dismissible alertas" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Transação realizada</strong>
    </div>
  <?php
      }else{
  ?>
    <div class="alert alert-danger alert-dismissible alertas" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Erro ao realizar transação</strong>
    </div>
  <?php   }
      unset($_SESSION['msg']);
      }
  ?>        

