<?php include("cabecalho.php"); 
	  require_once("../db/LivroDAO.php");
	  require_once("../control/carregarLivros.php");
      if(Login::isLogado()){
        if(Login::tipoUserLogado() == "ADMIN"){

?>
	<main  class="container">
      <div class="col-md-7">
        <form  enctype="multipart/form-data" class="form-vertical" action="../control/execLivro.php" method="post" 
               role="CadastroDeLivros" name="formLivro" id="formLivro">
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
		<div class=" col-md-8 form-group">
          <label for="txtAutor">Autor(es)</label>
          <input type="text" id="txtAutor" name="txtAutor" class="form-control">
          <label for="txtEditora">Editora</label>
          <input type="text" id="txtEditora" name="txtEditora" class="form-control">
          <label for="txtNacionalidade">Nacionalidade</label>
          <input type="text" id="txtNacionalidade" name="txtNacionalidade" class="form-control"> 
          <label for="imgLivro">Foto</label>
          <input type="file" id="imgLivro" name="imgLivro">
          <br/> 
          <input type="button" value="Cadastrar" class="btn btn-success" id="btnOk" name="btnOk">
          <input type="reset" value="Cancelar" class="btn btn-danger"> 
        </div>
        <div class="col-md-4" id="divFoto" name="divFoto">
       		<img class="img-responsive" id='foto' src = "http://placehold.it/200x250&text=Sem%20Foto">
        </div>
        <input type="hidden" id="tipoOperacao" name="tipoOperacao" value="I">
        <input type="hidden" id="enderecoFoto" name="enderecoFoto">
      </form>
      </div>
      
      <div class="col-md-5">
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

	    $('#btnNovo').click(function(){
		    location.reload();

   	    });

		$('#btnAlterar').click(function(){
			//Reativo todos os campos para permitir a edição
		    DisabledCampos(false); //Passo como nulo para ativar os campos
		    $('#btnOk').val('Alterar');    
		    $('#txtNome').focus();
		    $('#tipoOperacao').val('A');

		});

	    $('#btnRemover').click(function(){
		    $('#tipoOperacao').val('E');
		    salvarDados(); 
		    
	    });
		$('#btnOk').click(function(){
			salvarDados();
		    
		});

		function DisabledCampos(opcao){
			$('#txtNome').prop('disabled',opcao);
		    $('#selectGeneros').prop('disabled',opcao);
		    $('#txtISBN').prop('disabled',opcao);
		    $('#rPermiteAluguel').prop('disabled',opcao);
		    $('#txtAutor').prop('disabled',opcao);
		    $('#txtEditora').prop('disabled',opcao);
		    $('#txtNacionalidade').prop('disabled',opcao);
		    $('#imgLivro').prop('disabled',opcao);
		    $('#btnOk').prop('disabled',opcao);
		}

		//Função que envia os dados pro formulário de cadastro
		function salvarDados(){
			$('#txtId').prop('disabled','');
			$('#formLivro').ajaxForm({
	          url : '../control/execLivro.php',
	          type : 'post',
	          success:function(data){
	          	location.reload();
	          }
	       }).submit();

		}

  		$('#selectLivros').change(function(){
		    var id = $('#selectLivros').val();
		    $.post('../control/buscarLivro.php',{idLivro : id},function(data){
		      if(data !=''){
		        var arrayValores = data.split(','); //Transformo a string em um array
		        //Aqui preencho e desabilito todos os campos
		        $('#txtId').val(arrayValores[0]);
		        $('#txtNome').val(arrayValores[1]);
		        $('#selectGeneros').val(arrayValores[2]);
		        if(arrayValores[3] == '') //Se não existe foto, carrego a imagem padrão
		        	$('#foto').prop('src','http://placehold.it/200x250&text=Sem%20Foto'); 
		        else{
		        	//Mudo o endereço para carregar a foto e também mudo o valor do input file que carrega as imagens
		       		$('#foto').prop('src','../img/livros/' + arrayValores[3]); 
		        	$('#enderecoFoto').val(arrayValores[3]);
		        }	
		       
		        $('#txtISBN').val(arrayValores[4]);
		        if(arrayValores[5] == 'S')
		          $('#rPermiteAluguel').filter('[value=S]').prop('checked',true);
		      	else
		      	  $('#rPermiteAluguel').filter('[value=N]').prop('checked',true);	
		        $('#txtAutor').val(arrayValores[6]);
		        $('#txtNacionalidade').val(arrayValores[7]);
		        $('#txtEditora').val(arrayValores[8]);

				DisabledCampos(true);		        		        
		      }
		    })
		  
  		});

		$('#imgLivro').change(function(){
	      $('#divFoto').html('Enviando...');
    	
	      $('#formLivro').ajaxForm({
	          url : '../control/uploadImagens.php',
	          type : 'post',
	          target:'#divFoto',
	          success: function(data){
	          	//Salvo o endereço no campo Hidden, pois ele que será usado para armazenar o local da imagem no banco
	          	$('#enderecoFoto').val($('#imgLivro').val());
	          }
	       }).submit(); 
      
		 });

	});

</script>

