<!doctype html>
<html class="no-js">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->


    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/lib/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/lib/font-awesome/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/main.min.css">

    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/lib/fullcalendar/fullcalendar.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="<?php echo $this->webroot; ?>assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php echo $this->webroot; ?>assets/css/less/theme.less">
    <script src="<?php echo $this->webroot; ?>assets/lib/less/less-1.7.1.min.js"></script>

    <!--Modernizr 2.8.2-->
    <script src="<?php echo $this->webroot; ?>assets/lib/modernizr/modernizr.min.js"></script>
  </head>
  <body class="  ">
    <div class="bg-dark dk" id="wrap">
      <div id="top">

        
        <header class="head">
          <div class="search-bar">
            <form class="main-search" action="">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Live Search ...">
                <span class="input-group-btn">
            <button class="btn btn-primary btn-sm text-muted" type="button">
                <i class="fa fa-search"></i>
            </button>
        </span> 
              </div>
            </form><!-- /.main-search -->
          </div><!-- /.search-bar -->
          <div class="main-bar">
            <h3>
              <i class="fa fa-book"></i>&nbsp; Lista de cadastrados</h3>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->
      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span> 
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php echo $this->webroot; ?>assets/img/user.gif">
              <span class="label label-danger user-label">16</span> 
            </a> 
            <div class="media-body">
              <h5 class="media-heading">Archie</h5>
              <ul class="list-unstyled user-info">
                <li> <a href="">Administrator</a>  </li>
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small> 
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="active">
            <a href="<?php echo BASE ?>/users">
              <i class="fa fa-book"></i><span class="link-title">&nbsp;Lista</span> 
            </a> 
          </li>
          <!-- <li class="">
            <a href="javascript:;">
              <i class="fa fa-building "></i>
              <span class="link-title">Layouts</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li class="">
                <a href="fixed-header.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed Header</a> 
              </li>
              <li class="">
                <a href="fixed-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed Menu</a> 
              </li>
              <li class="">
                <a href="fixed-header-menu.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed Header & Menu</a> 
              </li>
              <li class="">
                <a href="sm.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Mini Sidebar</a> 
              </li>
              <li class="">
                <a href="fixed-header-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed Header & Mini Menu</a> 
              </li>
              <li class="">
                <a href="fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed & Mini Menu</a> 
              </li>
              <li class="">
                <a href="fixed-header-fixed-mini-sidebar.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Fixed Header and Fixed Mini Menu</a> 
              </li>
              <li class="">
                <a href="boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Boxed Layout</a> 
              </li>
              <li class="">
                <a href="fixed-header-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Boxed Layout & Fixed Header</a> 
              </li>
              <li class="">
                <a href="fixed-menu-boxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Boxed Layout & Fixed Menu</a> 
              </li>
              <li class="">
                <a href="fxhmoxed.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Boxed and Fixed Header & Menu</a> 
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span class="link-title">Components</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li class="">
                <a href="icon.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Icon</a> 
              </li>
              <li class="">
                <a href="button.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Button</a> 
              </li>
              <li class="">
                <a href="progress.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Progress</a> 
              </li>
              <li class="">
                <a href="pricing.html">
                  <i class="fa fa-credit-card"></i>&nbsp;Pricing Table</a> 
              </li>
              <li class="">
                <a href="bgimage.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Bg Image</a> 
              </li>
              <li class="">
                <a href="bgcolor.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Bg Color</a> 
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-pencil"></i>
              <span class="link-title">
            Forms
	  </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li class="">
                <a href="form-general.html">
                  <i class="fa fa-angle-right"></i>&nbsp;General</a> 
              </li>
              <li class="">
                <a href="form-validation.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Validation</a> 
              </li>
              <li class="">
                <a href="form-wysiwyg.html">
                  <i class="fa fa-angle-right"></i>&nbsp;WYSIWYG</a> 
              </li>
              <li class="">
                <a href="form-wizard.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Wizard &amp; File Upload</a> 
              </li>
            </ul>
          </li>
          <li>
            <a href="table.html">
              <i class="fa fa-table"></i>
              <span class="link-title">Tables</span> 
            </a> 
          </li>
          <li>
            <a href="file.html">
              <i class="fa fa-file"></i>
              <span class="link-title">
      File Manager
          </span> 
            </a> 
          </li>
          <li>
            <a href="typography.html">
              <i class="fa fa-font"></i>
              <span class="link-title">
            Typography
          </span>  
            </a> 
          </li>
          <li>
            <a href="maps.html">
              <i class="fa fa-map-marker"></i><span class="link-title">
            Maps
          </span> 
            </a> 
          </li>
          <li>
            <a href="chart.html">
              <i class="fa fa fa-bar-chart-o"></i>
              <span class="link-title">
            Charts
          </span> 
            </a> 
          </li>
          <li>
            <a href="calendar.html">
              <i class="fa fa-calendar"></i>
              <span class="link-title">
            Calendar
          </span> 
            </a> 
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-exclamation-triangle"></i>
              <span class="link-title">
              Error Pages
            </span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="403.html">
                  <i class="fa fa-angle-right"></i>&nbsp;403</a> 
              </li>
              <li>
                <a href="404.html">
                  <i class="fa fa-angle-right"></i>&nbsp;404</a> 
              </li>
              <li>
                <a href="405.html">
                  <i class="fa fa-angle-right"></i>&nbsp;405</a> 
              </li>
              <li>
                <a href="500.html">
                  <i class="fa fa-angle-right"></i>&nbsp;500</a> 
              </li>
              <li>
                <a href="503.html">
                  <i class="fa fa-angle-right"></i>&nbsp;503</a> 
              </li>
              <li>
                <a href="offline.html">
                  <i class="fa fa-angle-right"></i>&nbsp;offline</a> 
              </li>
              <li>
                <a href="countdown.html">
                  <i class="fa fa-angle-right"></i>&nbsp;Under Construction</a> 
              </li>
            </ul>
          </li>
          <li>
            <a href="grid.html">
              <i class="fa fa-columns"></i>
              <span class="link-title">
    Grid
    </span> 
            </a> 
          </li>
          <li>
            <a href="blank.html">
              <i class="fa fa-square-o"></i>
              <span class="link-title">
    Blank Page
    </span> 
            </a> 
          </li>
          <li class="nav-divider"></li>
          <li>
            <a href="login.html">
              <i class="fa fa-sign-in"></i>
              <span class="link-title">
    Login Page
    </span> 
            </a> 
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-code"></i>
              <span class="link-title">
    	Unlimited Level Menu 
    	</span> 
              <span class="fa arrow"></span> 
            </a> 
            <ul>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a> 
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li>
                    <a href="javascript:;">Level 2  <span class="fa arrow"></span>  </a> 
                    <ul>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li>
                        <a href="javascript:;">Level 3  <span class="fa arrow"></span>  </a> 
                        <ul>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li>
                            <a href="javascript:;">Level 4  <span class="fa arrow"></span>  </a> 
                            <ul>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li> <a href="javascript:;">Level 4</a>  </li>
                    </ul>
                  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
              <li> <a href="javascript:;">Level 1</a>  </li>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a> 
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
            </ul>
          </li>-->
        </ul><!-- /#menu -->
      </div><!-- /#left -->
      <div id="content">
        <div class="outer">
          <div class="inner bg-light lter">
            <?php echo $this->fetch('content'); ?>
          </div><!-- /.inner -->
        </div><!-- /.outer -->
      </div><!-- /#content -->
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
            </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
            </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
            </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
            </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p>2014 &copy; Metis Bootstrap Admin Template</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <!--jQuery 2.1.1 -->
    <script src="<?php echo $this->webroot; ?>assets/lib/jquery/jquery.min.js"></script>

    <!--Bootstrap -->
    <script src="<?php echo $this->webroot; ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <!-- Screenfull -->
    <script src="<?php echo $this->webroot; ?>assets/lib/screenfull/screenfull.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/moment/moment.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/flot/jquery.flot.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/lib/flot/jquery.flot.resize.js"></script>

    <!-- Metis core scripts -->
    <script src="<?php echo $this->webroot; ?>assets/js/core.min.js"></script>

    <!-- Metis demo scripts -->
    <script src="<?php echo $this->webroot; ?>assets/js/app.min.js"></script>
    <script>
      $(function() {
        Metis.dashboard();
      });
    </script>
    <script src="<?php echo $this->webroot; ?>assets/js/style-switcher.min.js"></script>
  </body>
</html>