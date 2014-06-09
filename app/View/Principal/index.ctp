<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Dados para contato</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="nome">Nome Completo*</label>
  <div class="controls">
    <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="registro">CPF/CNPJ*</label>
  <div class="controls">
    <input id="registro" name="registro" type="text" placeholder="Digite seu cpf ou cnpj" class="input-xlarge">
    <p class="help-block">Digite cpf ou cnpj, ambos sem pontos e digitos.</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="telefone">Telefone*</label>
  <div class="controls">
    <input id="telefone" name="telefone" type="text" placeholder="( 55 +) 081 9999 - 9999" class="input-xlarge" required="">
    <p class="help-block">Digite seu telefone com o código do país e o DDD de sua cidade.</p>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">E-mail</label>
  <div class="controls">
    <input id="email" name="email" type="text" placeholder="Digite seu email" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="singlebutton"></label>
  <div class="controls">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Enviar</button>
  </div>
</div>

</fieldset>
</form>
