<form class="form-horizontal" method="post" action="<?php echo BASE?>/Principal/addCliente" >
<fieldset>

<!-- Form Name -->
<legend>Dados para contato</legend>

<!-- Text input-->
<div class="form-group">
  <label class="control-label col-lg-2" for="nome">Nome*</label>
  <div class="controls col-lg-8">
    <input id="nome" name="nome" type="text" class="form-control" required="">
    
  </div>
</div>
<div class="form-group">
  <label class="control-label col-lg-2" for="nome">Sobrenome*</label>
  <div class="controls col-lg-8">
    <input id="sobreNome" name="sobreNome" type="text" class="form-control" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="control-label col-lg-2" for="registro">CPF/CNPJ*</label>
  <div class="controls col-lg-8">
    <input id="registro" name="registro" maxlength="20" type="text"  class="form-control">
    <p class="help-block">Digite cpf ou cnpj, ambos sem pontos e digitos.</p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="control-label col-lg-2" for="telefone">Telefone*</label>
  <div class="col-lg-2">
    <input id="ddd" name="ddd" type="text" maxlength="3"  placeholder="DD" class="form-control" required="">
  </div>
  <div class="col-lg-5">
    <input id="telefone" name="telefone" type="text" placeholder="9999-9999" maxlength="9" class="form-control" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="control-label col-lg-2" for="email">E-mail*</label>
  <div class="controls col-lg-8">
    <input id="email" name="email" type="text" class="form-control" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="control-label col-lg-2" >Endereço*</label>
  <div class="col-lg-8">
    <input id="logradouro" name="logradouro" type="text"   placeholder="Logradouro" class="form-control" required="">
  </div>
  <div class="col-lg-2">
    <input id="numero" name="numero" type="text" placeholder="Nº"  class="form-control" required="">
  </div>
  
</div>
<div class="form-group">
<div class="col-lg-8">
    <input id="complmento" name="complemento" type="text" placeholder="Complemento"  class="form-control" required="">
  </div>
<div class="col-lg-4">
  <input id="cep" name="cep" type="text" placeholder="CEP"  class="form-control" required="">
</div>
  </div>
<!-- Button -->
<div class="form-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>
