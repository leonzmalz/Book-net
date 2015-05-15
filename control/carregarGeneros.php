<?php
	require_once (realpath(dirname(__FILE__) . '/../db/GeneroDAO.php'));

	function exibirGeneros(){
		$generos = GeneroDAO::getGeneros();
		foreach($generos as $registro){
            echo "<option value ='".$registro->getId()."''>".$registro->getNome()."</option>";
        }	
	}

	function exibirGenerosLista(){
		$generos = GeneroDAO::getGeneros();
		foreach($generos as $registro){
            echo "<li><a href='#'>".$registro->getNome()."</a></li>";
        }	
	}
	
?>