<?php include("cabecalho.php"); 
	  require_once("../db/LivroDAO.php");
	  require_once("../control/carregarLivros.php");
      if(Login::isLogado()){
        if(Login::tipoUserLogado() == "ADMIN"){
        	if(isset($_SESSION['execLivro'])){ 
        		if($_SESSION['execLivro'] == true){
?>
        <div class="alert alert-success alert-dismissible alertas" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Transação realizada</strong>
        </div>
    <?php
			    }else{
	?>
		<div class="alert alert-danger alert-dismissible alertas" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <strong>Erro ao realizar transação</strong>
        </div>
	<?php		}
     		
        unset($_SESSION['execLivro']);
        }
    ?>    
	<main  class="container">
      <div class="col-md-6">
        <form class="form-vertical" action="../control/execLivro.php" method="post" role="CadastroDeLivros" name="formGenero" id="formGenero">
        <legend>Novo Livro</legend>
        <div class="col-md-2 form-group">
          <label for="txtId">Id</label>
          <input type="text" id="txtId" name="txtId" class="form-control" disabled> 
        </div>
        <div class=" col-md-10 form-group">
          <label for="txtNome">Nome</label>
          <input type="text" id="txtNome" name="txtNome" class="form-control" required> 
        </div>
		<div class="col-md-4 form-group">
		  <label for="selectGeneros">Gênero</label>
		  <select  id="selectGeneros" name="selectGeneros" class="form-control">
                <?php exibirGeneros(); ?>
          </select>
		</div>
		<div class=" col-md-3 form-group">
          <label for="txtISBN">ISBN</label>
          <input type="text" id="txtISBN" name="txtISBN" class="form-control"> 
        </div>
        <div class="col-md-5 form-group">
			<label for="selectGeneros">Permite Aluguel</label>
			<div class="radio">
		  <label>
		    <input type="radio" name="rPermiteAluguel" id="rPermiteAluguel" value="S">
		     Sim
		  </label>
		  <label>
		    <input type="radio" name="rPermiteAluguel" id="rPermiteAluguel" value="N" checked>
		     Não
		  </label>
		</div>
		</div>
		<div class=" col-md-12 form-group">
          <label for="txtAutor">Autor(es)</label>
          <input type="text" id="txtAutor" name="txtAutor" class="form-control"> 
        </div>
        <div class=" col-md-5 form-group">
          <label for="txtNacionalidade">Nacionalidade</label>
          <input type="text" id="txtNacionalidade" name="txtNacionalidade" class="form-control"> 
        </div>
        <div class=" col-md-7 form-group">
          <label for="txtEditora">Editora</label>
          <input type="text" id="txtEditora" name="txtEditora" class="form-control"> 
        </div>
		<div class="col-md-12">
              <label for="imgFoto">Foto</label>
              <input type="file" id="imgFoto" name="imgFoto">
        </div>
        <input type="hidden" id="tipoOperacao" name="tipoOperacao" value="I">
		
        <div class="col-md-12">
          <br/>
          <input type="submit" value="Cadastrar" class="btn btn-success" id="btnOk" name="btnOk">
          <input type="reset" value="Cancelar" class="btn btn-danger">
        </div>
      </form>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <legend>Lista de Livros</legend>
        <select size="20" id="selectLivros" name="selectLivros" class="form-control">
         <?php exibirLivros(); ?>
         </select>
         <br>
            <button id="btnNovo"    name = "btnNovo" class="btn btn-success" >Novo</button>
            <button id="btnAlterar" name = "btnAlterar" class="btn btn-warning" >Alterar</button>
            <button id="btnRemover" name = "btnRemover" class="btn btn-danger">Remover</button>
            
         
      </div>
    
    </main>

<?php 
    }else{ #Se não é admin logado ?>
      <div class="alert alert-danger alert-dismissible alertas" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Usuário sem permissão</strong> 
      </div>
   <?php }

}else{ #Se não existe usuário logado ?>
     <div class="alert alert-danger alert-dismissible alertas" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Não existe usuário logado</strong> 
     </div>

<?php }  
     

include("rodape.php"); ?>

<script>
	
	$(function(){
		$('#imgProduto').change(function(){
	       $('#divFoto').html('Enviando...');
	       /* Efetua o Upload sem dar refresh na pagina */           
	       $('#form').ajaxForm({
	          target:'#divFoto' // o callback será no elemento com o id #divFoto
	       }).submit();
	    });

	    $('#selectLivros').change(function() {
	    var id = $('#selectLivros').val(); 
	    var text = $('#selectGeneros option:selected').text(); 
	    $('#txtNome').val(text);
	    $('#txtId').val(id);
	    $('#txtId').prop('disabled','true');
	    $('#txtNome').prop('disabled','true');

		  });
		  $('#btnNovo').click(function(){
		    window.location.reload(true);

		  });

		  $('#btnAlterar').click(function(){
		    $('#txtNome').prop('disabled','');
		    $('#btnOk').val('Alterar');    
		    $('#txtNome').focus();
		    $('#tipoOperacao').val('A');
		  });

		  $('#btnRemover').click(function(){
		    $('#tipoOperacao').val('E');
		    $('#formGenero').submit();  
		    
		  });
		  $('#formGenero').submit(function(){
		    $('#txtId').prop('disabled','');
		    $('#txtNome').prop('disabled','');
  		});

	});

</script>

