<?php
   require_once("../db/GeneroDAO.php");
   require_once("../model/Genero.php");
 
   include("../view/cabecalho.php");
   $nome          = $_POST['txtNome'];
   $id            = $_POST['txtId'];
   $tipoOperacao  = $_POST['tipoOperacao'];   //I - incluir || A - alterar || E - excluir


   $Genero = new Genero;
   
   $Genero->setNome($nome);
   $Genero->setId($id);

   if($tipoOperacao == 'I')
   	  $retorno = GeneroDAO::InsereValores($Genero);	
   else if ($tipoOperacao == 'A')
   	  $retorno = GeneroDAO::AtualizaValores($Genero);
   else if($tipoOperacao == 'E')
      $retorno = GeneroDAO::ExcluiValores($Genero);

   if($retorno){
      ?> <p class="alert alert-success alertas">Operação Realizada</p> <?php
   }else{
      ?> <p class="alert alert-danger alertas">Erro, não foi possível realizar a operação</p> <?php
   }

   
   include("../view/rodape.php");
   

?>