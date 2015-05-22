<?php
   require_once("login.php");
   require_once("../db/LivroDAO.php");
   require_once("../model/Livro.php");
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
      $Livro->setFoto($_POST['imgFoto']);

      if($tipoOperacao == 'I')
         $_SESSION['execLivro'] = LivroDAO::InsereValores($Livro); 
      else if ($tipoOperacao == 'A')
         $_SESSION['execLivro'] = LivroDAO::AtualizaValores($Livro);
      else if($tipoOperacao == 'E')
         $_SESSION['execLivro'] = LivroDAO::ExcluiValores($Livro);

      header("Location:../view/cadastrarLivro.php");

   }else{
      ?> <p class="alert alert-danger alertas">Não há usuário logado</p> <?php
   }
   

   
   include("../view/rodape.php");
   

?>