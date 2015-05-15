<?php
    session_start();
	require_once("login.php");

	Login::deslogar();
	header("Location:../index.php");
?>