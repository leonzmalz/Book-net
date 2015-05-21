<?php 
    include("cabecalho.php"); 
	if(Login::isLogado()){

	?>
    <main class="container">

	<?php
	  	if(isset($_SESSION['logou'])){

			if($_SESSION['logou'] == true){ ?>
				<div class="alert alert-success alert-dismissible alertas" role="alert">
	  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  				<strong>Seja Bem Vindo <?php echo Login::userLogado(); ?></strong> 
				</div>
			<?php		
			}
						
			unset($_SESSION['logou']);

		} ?>
		<div class="btn-group-horizontal" role="group" aria-label="ButtonGroup">
	   	<?php 
	   		if(Login::tipoUserLogado() == "ADMIN"){ #Opções de administrador
		 		echo "<a href='cadastrarGenero.php' class='btn btn-danger'>Cadastrar Gênero</a>";
		 		echo "<a href='cadastrarLivro.php' class='btn btn-warning'>Cadastrar Livro</a>";
	 		}
	 		else{ #Opções de cliente
	 			echo "<a href='veriricarPedidos.php' class='btn btn-danger'>Verificar Pedidos</a>";
	 		}

		?>
		</div>


	</main>

<?php

}
include("rodape.php");

 ?>