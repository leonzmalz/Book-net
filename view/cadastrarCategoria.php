<?php include("cabecalho.php"); ?>
    <main  class="container">
      <div class="col-md-6">
        <form class="form-horiziontal" action="" method="post" role="CadastroDeCategorias">
        <legend>Nova Categoria</legend>
        <div class=" col-md-8 form-group">
          <label for="txtCategoria">Nome</label>
          <input type="text" id="txtCategoria" class="form-control" required> 
        </div>
        <div class="col-md-5">
              <button type="submit" class="btn btn-success">Cadastrar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
         </div>  

      </form>
      </div>
    
    </main>

<?php include("rodape.php"); ?>

	