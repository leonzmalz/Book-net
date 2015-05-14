<?php include("cabecalho.php") 

	if(isset($_SESSION['logou'])){
		if($_SESSION['logou']== true)
			echo "<p class='alert alert-success alertas'>Seja bem vindo $_SESSION['user'] </p>";	
		else 
			echo "<p class='alert alert-danger alertas'> $_SESSION['erro_login'] </p>";
		unset($_SESSION['logou']);
	}
?>		

	

<?php 
include("rodape.php") ?>