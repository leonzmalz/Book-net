<?php
	session_start();
	require_once("login.php");

	$usuario = new Usuario;

	$usuario->setUser($_POST['txtUser']);
	$usuario->setSenha($_POST['txtSenha'],false);


	if(Login::logar($usuario)){
		$_SESSION['logou'] = true;
		header('Location:../view/logado.php');
	}
	else{
		header('Location:../index.php');
	}
	
	


?>