<?php include("cabecalho.php");
      require_once("../db/GeneroDAO.php");
      require_once("../control/carregarGeneros.php"); 
      if(Login::isLogado()){
        if(Login::tipoUserLogado() == "ADMIN"){
          
?>
    <main  class="container">
      <div class="col-md-6">
        <form class="form-vertical" action="../control/execGenero.php" method="post" role="CadastroDeGeneros" name="formGenero" id="formGenero">
        <legend>Novo Gênero</legend>
        <div class="col-md-3 form-group">
          <label for="txtId">Id</label>
          <input type="text" id="txtId" name="txtId" class="form-control" disabled> 
        
        </div>
        <div class="col-md-10 form-group">
          <label for="txtNome">Nome</label>
          <input type="text" id="txtNome" name="txtNome" class="form-control" required> 
        </div>
        <input type="hidden" id="tipoOperacao" name="tipoOperacao" value="I">

        <div class="col-md-5">
          <input type="submit" value="Cadastrar" class="btn btn-success" id="btnOk" name="btnOk">
          <input type="reset" value="Cancelar" class="btn btn-danger">
        </div>
      </form>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <legend>Lista de Gêneros</legend>
        <select size="15" id="selectGeneros" name="selectGeneros" class="form-control">
          <?php exibirGeneros(); ?>
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

<script type="text/javascript" src="..js/tooltip.js"></script>
<script>

$(function(){

 $('#selectGeneros').change(function() {
    var id = $('#selectGeneros').val(); 
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
	