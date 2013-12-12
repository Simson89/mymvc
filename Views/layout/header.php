<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo URL ?>Public/css/bootstrap.css" rel="stylesheet">

    <!-- Le styles -->
    <link href="<?php echo URL ?>Public/css/bootstrap-responsive.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo URL ?>Public/js/custom.js" ></script>

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      
    .panel-body .btn:not(.btn-block) { width:120px;margin-bottom:10px; }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    
  </head>

  <body>
<?php Session::init(); ?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
               <?php
                        if(Session::get('loggedIn') == true){
                           // echo '<li><a href='.URL.'dashboard/logout>Logout</a></li>';
                           echo "<p class='navbar-text pull-right'>Logged in as <a href='#' class='navbar-link'>".Session::get('user')."</a> <a href='".URL."dashboard/logout'>(logout)</a></p>";
                        }
                        else {
                        echo "<form class='navbar-form pull-right' action=".URL."login/run method='post'>";
                        echo "<input class='span2' type='text' placeholder='Login' name='login'>";
                        echo "<input class='span2' type='password' placeholder='Password' name='password'>";
                        echo "<button type='submit' class='btn'>Sign in</button>";
                        echo '</form>';
                         
                        }
                    ?>
       
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        
      
