<div id="login" class="tab-pane active">


<form action="/financeiro/logincms" class="form-signin" id="UserLoginForm" method="post" accept-charset="utf-8">

<div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>


<fieldset>
<?php if($this->Session->flash()){ 
?>
	<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Atenção!</strong>  Login ou Senha incorreto.
        </div>
<?php
}?>

        <div class="input text required">
        <input name="data[User][username]" class="form-control" placeholder="Login" maxlength="128" type="text" id="UserUsername" required="required"/>
        </div>
        <div class="input password required">
        <input name="data[User][password]" class="form-control" placeholder="Senha" type="password" id="UserPassword" required="required"/>
        </div>
</fieldset>
<div class="submit"><input  class="btn btn-lg btn-primary btn-block" type="submit" value="Login"/></div></form>
</div>
<?php
// echo $this->Html->link( "Add A New User",   array('action'=>'add') ); 
?>