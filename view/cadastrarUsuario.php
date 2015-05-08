<?php include("cabecalho.php"); ?>

    <main  class="container">
      <form  id="formCadastro" name="formCadastro" class="form-horizontal" role="CadastroDeUsuario" method="post" action="../control/execCadastroPessoa.php">
          <legend>Novo Usuário</legend>
          <div class="col-md-12 form-group">
            <div id="divEssencial">
              <div class="col-md-2">
                <label for="txtUser">Usuário</label>
                <input type="text" id="txtUser" name="txtUser" class="form-control" required>
              </div>
              <div class="col-md-2">
                <label for="txtSenha">Senha</label>
                <input type="password" id="txtSenha" name="txtSenha"  class="form-control"  required  onchange="form.txtConfirmaSenha.pattern = this.value;"> <!-- Validação de confirmação de senha -->
              </div>
              <div class="col-md-2">
                <label for="txtConfirmaSenha">Confirmar Senha</label>
                <input type="password" id="txtConfirmaSenha" name="txtConfirmaSenha" class="form-control"  onchange="this.setCustomValidity(this.validity.patternMismatch ? 'As senhas não conferem' : '')" required>
              </div>
              <div class="col-md-2">
                <label for="selectTipoPessoa">Tipo de Pessoa</label>
                <select class="form-control" id="selectTipoPessoa" name="selectTipoPessoa">
                  <option value="fisica">Física</option>
                  <option value="juridica">Jurídica</option>
                </select>

              </div>
            </div>
          </div>
         
          <div id="divClienteFisico" class="col-md-12 form-group">
            <div class="col-md-4">
              <label for="txtNome">Nome</label>
              <input type="text" class="form-control" id="txtNome" name="txtNome" required>
            </div>
            <div class="col-md-2">
              <label for="txtCPF">CPF</label>
              <input type="text" class="form-control" id="txtCPF" name="txtCPF" required>
            </div>
            <div class="col-md-2">
              <label for="txtIdentidade">Identidade</label>
              <input type="text" class="form-control" id="txtIdentidade" name="txtIdentidade">
            </div>
            <div class="col-md-2">
              <label for="txtDataNascimento">Data de Nasc.</label>
              <input type="date" class="form-control" id="txtDataNascimento" name="txtDataNascimento" required>
            </div>
             
          </div>
          <div id="divClienteJuridico" class="col-md-12 form-group">
            <div class="col-md-4">
              <label for="txtRazaoSocial">Razão Social</label>
              <input type="text" class="form-control" id="txtRazaoSocial" name="txtRazaoSocial">
            </div>
            <div class="col-md-2">
              <label for="txtCNPJ">CNPJ</label>
              <input type="text" class="form-control" id="txtCNPJ" name="txtCNPJ">
            </div>
            
          </div>
          <div class="col-md-12 form-group" id="divExtras">
            <div class="col-md-4">
              <label for="txtEndereco">Endereço</label>
              <input type="text" class="form-control" id="txtEndereco" name="txtEndereco">
            </div>
            <div class="col-md-2">
              <label for="txtBairro">Bairro</label>
              <input type="text" class="form-control" id="txtBairro" name="txtBairro">
            </div>
            <div class="col-md-2">
              <label for="txtCidade">Cidade</label>
              <input type="text" class="form-control" id="txtCidade" name="txtCidade">
            </div>
             <div class="col-md-1">
               <label for="selectEstado">Estado</label>
               <select class="form-control" id="selectEstado" name="selectEstado">
                  <option value="AL">AL</option><option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option><option value="ES">ES</option><option value="MA">MA</option>
                  <option value="MG">MG</option><option value="MT">MT</option><option value="MS">MS</option><option value="PA">PA</option><option value="PE">PE</option><option value="PI">PI</option>
                  <option value="PR">PR</option><option value="RO">RO</option><option value="RJ">RJ</option><option value="RS">RS</option><option value="SP">SP</option><option value="SE">SE</option>
                  <option>TO</option>
                </select>
            </div>
            <div class="col-md-2">
              <label for="txtCEP">CEP</label>
              <input type="text" class="form-control" id="txtCEP" name="txtCEP" >
            </div>
            <div class="col-md-4">
              <label for="txtEmail">Email</label> 
              <input type="email" class="form-control" id="txtEmail" name="txtEmail" > 
            </div>
            <div class="col-md-4">
              <label for="txtHomePage">HomePage</label>
              <input type="text" class="form-control" id="txtHomePage" name="txtHomePage">
            </div>
           
            <div class="col-md-2">
              <label for="txtTelefone">Telefone</label>
              <input type="text" class="form-control" id="txtTelefone" name="txtTelefone">
            </div>
            <div class="col-md-2">
              <label for="txtCelular">Celular</label>
              <input type="text" class="form-control" id="txtCelular" name="txtCelular">
            </div>
          </div>          
        <div class="col-md-5">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
      </form>
    </main>

<?php include("rodape.php"); ?>  

<script src="../js/tooltip.js"></script> 

<script>
  $(function(){
    $('#divClienteJuridico').hide(); //Esconde a div do cliente Jurídico
    $('#selectTipoPessoa').val('fisica');

    //De acordo com a opção de cliente selecionada, exibe as informações necessárias para aquela opção
    $('#selectTipoPessoa').change(function(){
      if ($('#selectTipoPessoa').val() == "fisica"){
        $('#divClienteJuridico').hide("slow");
        $('#divClienteFisico').show("slow");
            

      }else{
        $('#divClienteFisico').hide("slow");
        $('#divClienteJuridico').show("slow");
      }

      alteraRequired();

    });

    function alteraRequired(){ //Altera os campos obrigatórios de acordo com a opção selecionada
      if($('#selectTipoPessoa').val() === 'fisica'){
        $fisica = true;
        $juridica = false;
      }
      else{
        $juridica = true;
        $fisica = false;
      }
      
      $('#txtNome').attr("required",$fisica);
      $('#txtCPF').attr("required",$fisica);
      $('#txtDataNascimento').attr("required",$fisica);
      $('#txtRazaoSocial').attr("required",$juridica);
      $('#txtCNPJ').attr("required",$juridica);
    }




  });
</script> 
	