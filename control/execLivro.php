<?php
   require_once("login.php");
   require_once("../db/LivroDAO.php");
   require_once("../model/Livro.php");
   require_once('../util/removeAcentos.php');
   include("../view/cabecalho.php");


   if (Login::isLogado()){
      $tipoOperacao   = $_POST['tipoOperacao'];   //I - incluir || A - alterar || E - excluir

      $Livro = new Livro;
      $Livro->setId($_POST['txtId']);
      $Livro->setNome($_POST['txtNome']);
      $Livro->getGenero()->setId($_POST['selectGeneros']);
      $Livro->setISBN($_POST['txtISBN']);
      $Livro->setPermiteAluguel($_POST['rPermiteAluguel']);
      $Livro->setAutor($_POST['txtAutor']);
      $Livro->setEditora($_POST['txtEditora']);
      $Livro->setNacionalidade($_POST['txtNacionalidade']);
      $Livro->setFoto(remove_acentos($_POST['enderecoFoto']));

      if($tipoOperacao == 'I')
         $_SESSION['msg'] = LivroDAO::InsereValores($Livro); 
      else if ($tipoOperacao == 'A')
         $_SESSION['msg'] = LivroDAO::AtualizaValores($Livro);
      else if($tipoOperacao == 'E')
         $_SESSION['msg'] = LivroDAO::ExcluiValores($Livro);


   }else{
      ?> <p class="alert alert-danger alertas">Não há usuário logado</p> <?php
   }
   

   
   include("../view/rodape.php");
   

?>