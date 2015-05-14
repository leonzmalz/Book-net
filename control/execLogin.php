<?php
	require_once("login.php");

	$usuario = new Usuario;

	$usuario->setUsuario($_POST['txtUser']);
	$usuario->setSenha($_POST['txtSenha'],false);

	if(Login::logar($usuario)){
		$_SESSION['logou'] = true;
	}
	else{
		$_SESSION['logou'] = false;
	}
	header('Location:../view/logado.php');


?>