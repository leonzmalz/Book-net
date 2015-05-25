<?php
   require_once("../db/LivroDAO.php");
   
   $id = $_POST['idLivro'];

   $livro = LivroDAO::getLivroById($id);
   $genero = $livro->getGenero();

   $StringLivro = '';
   //Aqui transformo os atributos do objeto em uma string, para poder utilizar na chamada do evento no jquery
   $StringLivro = $livro->getId().",".
   				  $livro->getNome().",".
   				  $genero->getId().",".
   				  $livro->getFoto().",".
   				  $livro->getISBN().",".
   				  $livro->getPermiteAluguel().",".
   				  $livro->getAutor().",".
   				  $livro->getNacionalidade().",".
   				  $livro->getEditora();

   echo $StringLivro;
?>