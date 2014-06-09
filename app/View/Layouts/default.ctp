<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>3 Carousel Layout (BS 3)</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
<div id="myCarousel" class="carousel slide">
  
  <div class="carousel-inner">
    <div class="item active">
    <img src="http://lorempixel.com/1500/600/abstract/2" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1>Changes to the Grid</h1>
          <p>Bootstrap 3 still features a 12-column grid, but many of the CSS class names have completely changed.</p>
          
        </div>
      </div>
    </div>
  
  </div>
  
</div>
<!-- /.carousel -->


<div class="container marketing" >
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