<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Tiago Elias</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		<?php 
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('styles.css');
		?>

		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
<!-- Carousel
================================================== -->
<header id="myCarousel">
  <div class="center">
	    <?php echo $this->Html->image('banner.png', array('alt' => 'CakePHP'))?>
	          <div>
		          <p id="um">Fundado em fevereiro de 2011, o escritório Tiago Elias - Advogados é fruto da união de profissionais altamente competentes, criativos e dinâmicos que se dedicam, com responsabilidade e disciplina, na prestação de serviços jurídicos da mais alta qualidade e com notórios padrões éticos. </p>
		<p id="dois">Nossos advogados  trabalham especialmente na assessoria jurídica de Empresas de Vendas Diretas de Produtos e/ou serviços; Empresas de Marketing Digital e nas demais Empresas que remuneram no sistema de multinível.</p>
		<p id="tres">Além disso, vivemos em um momento em que o Poder Judiciário, em diversas ações judiciais promovidas pelo Ministério Público, bloqueou a movimentação financeira de diversas Empresas do Ramo, e por consequência, diversas pessoas tiveram seus investimentos bloqueados. </p>

		<p id="botao"><i class="fa fa-envelope-o"></i> Contato</p>
	          	
	          </div>
	          
  	
  </div>

  
  
</header>
<!-- /.carousel -->


<div class="container marketing" >
	<div id="close">
		<span id="fechar-um"></span>
		<span id="fechar-dois"></span>
	</div>
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			</div>
        <div class="col-md-3"></div>
      </div>


  <!-- FOOTER -->
 <div id="footer">
      <div class="container">
        <p class="muted credit">.</p>
      </div>
</div>

</div><!-- /.container -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<?php 
			echo $this->Html->script('bootstrap.min.js'); 
			echo $this->Html->script('scripts.js'); 
		?>
	</body>
</html>