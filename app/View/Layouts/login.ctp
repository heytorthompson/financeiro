<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <?php 
    echo $this->Html->css('bootstrap.min.css');
    ?>

    <!-- Font Awesome -->
    <?php 
    echo $this->Html->css('font-awesome.min.css');
    ?>
    <!-- Metis core stylesheet -->
    <?php 
    echo $this->Html->css('main.min.css');
    ?>
    <?php 
    echo $this->Html->css('magic.css');
    ?>

  </head>
  <body class="login">
    <div class="container">
      <div class="tab-content">
       

      <?php echo $this->fetch('content'); ?>
      </div>
    </div><!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <?php 
      echo $this->Html->script('bootstrap.min.js'); 
      echo $this->Html->script('scripts.js'); 
    ?>
    <script>
      $('.list-inline li > a').click(function() {
        var activeForm = $(this).attr('href') + ' > form';
        //console.log(activeForm);
        $(activeForm).addClass('magictime swap');
        //set timer to 1 seconds, after that, unload the magic animation
        setTimeout(function() {
          $(activeForm).removeClass('magictime swap');
        }, 1000);
      });
    </script>
  </body>
</html>
