<?php
   require_once("login.php");
   require_once("../db/GeneroDAO.php");
   require_once("../model/Genero.php");
   include("../view/cabecalho.php");

   if (Login::isLogado()){
      $nome          = $_POST['txtNome'];
      $id            = $_POST['txtId'];
      $tipoOperacao  = $_POST['tipoOperacao'];   //I - incluir || A - alterar || E - excluir


      $Genero = new Genero;
      
      $Genero->setNome($nome);
      $Genero->setId($id);

      if($tipoOperacao == 'I')
         $_SESSION['msg'] = GeneroDAO::InsereValores($Genero); 
      else if ($tipoOperacao == 'A')
         $_SESSION['msg'] = GeneroDAO::AtualizaValores($Genero);
      else if($tipoOperacao == 'E')
         $_SESSION['msg'] = GeneroDAO::ExcluiValores($Genero);
      header("Location:../view/cadastrarGenero.php");

   }else{
      ?> <p class="alert alert-danger alertas">Não há usuário logado</p> <?php
   }
   
   
   
   include("../view/rodape.php");
   

?>