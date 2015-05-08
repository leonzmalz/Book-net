<?php
	require_once("../db/UsuarioDAO.php");
	require_once("../db/PessoaFisicaDAO.php");
	require_once("../db/PessoaJuridicaDAO.php");
	include("../view/cabecalho.php");
	

	$tipoPessoa  = $_POST['selectTipoPessoa'];

    if ($tipoPessoa == 'fisica'){
    	$pessoa  = new PessoaFisica($_POST['txtUser'],$_POST['txtSenha']);
    	$pessoa->setNome($_POST['txtNome']);      
    	$pessoa->setCPF($_POST['txtCPF']);
    	$pessoa->setIdentidade($_POST['txtIdentidade']);
    	$pessoa->setDataNascimento($_POST['txtDataNascimento']);
    }else{
		$pessoa  = new PessoaJuridica($_POST['txtUser'],$_POST['txtSenha']);
    	$pessoa->setRazaoSocial($_POST['txtRazaoSocial']);
    	$pessoa->setCnpj( $_POST['txtCNPJ']);
    }

    if(UsuarioDAO::InsereValores($pessoa->getUsuario())){
    	$pessoa->setEndereco($_POST['txtEndereco'].', '.$_POST['txtBairro'].', '.$_POST['txtCidade'].', '.$_POST['selectEstado'].', '.$_POST['txtCEP']);
	    $pessoa->setTelefone($_POST['txtTelefone']);
	    $pessoa->setCelular($_POST['txtCelular']);
	    $pessoa->setEmail($_POST['txtEmail']);
	 	$pessoa->setHomePage($_POST['txtHomePage']);

	 	if($tipoPessoa == 'fisica')
	 		$inseriu = PessoaFisicaDAO::InsereValores($pessoa);
	 	else
            $inseriu = PessoaJuridicaDAO::InsereValores($pessoa);
	 	
	 	if($inseriu){
	 		?> <p class="alert alert-success">Usuário criado</p> <?php
	 	}
	 	else{
	 		?> <p class="alert alert-danger">Erro ao criar pessoa</p> <?php
	 	}

    }else{
    	?> <p class="alert alert-danger">Erro ao criar usuário</p> <?php
    	
    }

 	include("../view/rodape.php");
    
?>