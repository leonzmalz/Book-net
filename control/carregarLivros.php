<?php
	require_once (realpath(dirname(__FILE__) . '/../db/LivroDAO.php'));

	function exibirLivros(){
		$livros = LivroDAO::getLivros();
		foreach($livors as $registro){
            echo "<option value ='".$registro->getId()."''>".$registro->getNome()."</option>";
        }	
	}
?>