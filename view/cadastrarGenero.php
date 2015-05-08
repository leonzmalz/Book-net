<?php include("cabecalho.php");
      require_once("../db/GeneroDAO.php"); 

      function reload_lista(){
        $generos = GeneroDAO::getValores();

        foreach($generos as $registro){
          echo "<option value ='".$registro->getId()."''>".$registro->getNome()."</option>";
        }
    }


?>
    <main  class="container">
      <div class="col-md-6">
        <form class="form-vertical" action="../control/execGenero.php" method="post" role="CadastroDeCategorias" name="formGenero" id="formGenero">
        <legend>Novo Gênero</legend>
        <div class="col-md-3 form-group">
          <label for="txtId">Id</label>
          <input type="text" id="txtId" name="txtId" class="form-control"> 
        
        </div>
        <div class=" col-md-10 form-group">
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
          <?php reload_lista(); ?>
         </select>
         <br>
            <button id="btnNovo"    name = "btnNovo" class="btn btn-success" >Nova Categoria</button>
            <button id="btnAlterar" name = "btnAlterar" class="btn btn-warning" >Alterar</button>
            <button id="btnRemover" name = "btnRemover" class="btn btn-danger">Remover</button>
            
         
      </div>
    
    </main>

<?php include("rodape.php"); ?>

<script type="text/javascript" src="..js/tooltip.js"></script>
<script>

$(function(){

 $('#selectGeneros').change(function() {
      var id = $('#selectGeneros').val(); 
      var text = $('#selectGeneros option:selected').text(); 
      $('#txtNome').val(text);
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
    $('#txtNome').prop('disabled','');
    $('#txtId').prop('disabled','');
    $('#formGenero').submit();  
    
  });




});
  

</script>
	