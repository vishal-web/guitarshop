<!DOCTYPE html>
<html lang="en"<?php 
if (isset($use_angularjs) == TRUE) {
  echo ' ng-app="myApp"';
}
?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>favicon.ico">

    <title>Online GuitarSHOP</title>
 
    <link href="<?= base_url() ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="<?= base_url() ?>css/jumbotron.css" rel="stylesheet">
    <?php
      if (isset($use_featherlight)) { ?>
    <link href="<?= base_url() ?>css/featherlight.min.css" type="text/css" rel="stylesheet" />
    <?php } ?>
    <script src="<?= base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>

    <?php 
      if (isset($use_angularjs) == TRUE) {
    ?>
    <script src="https://code.angularjs.org/1.4.0/angular.min.js"></script>
    <?php }?>
  </head>
  <body>
    <div class="container-fluid shoptop">
      <div class="container">
        <div class="row">
          <?= Modules::run('templates/_draw_page_top')?>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url()?>"><span style="color: #f6f6f7">Home</span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
            echo Modules::run('store_categories/_draw_top_nav');
          ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container" style="background-color:#fff;min-height: 450px;">
      <!-- Example row of columns -->

      <?php

      echo Modules::run('sliders/_attempt_draw_slider');

      if ($customer_id>0) {
        include('customer_pannel_top.php');
      }

      if (isset($page_content)) {
        echo nl2br($page_content);  
        if (!isset($page_url)) {
          $page_url = 'homepage';
        }
        if ($page_url=="") {
          require_once('homepage_content.php');
        }elseif ($page_url=="contact-us") {
          echo Modules::run('contact-us/_draw_form');
        }
      }elseif (isset($view_file)) {
        $this->load->view($view_module.'/'.$view_file);
      }

      ?>  
    </div>
    <div class="container rounded_bdr" style="background-color:#fff;">
      <hr>
      <footer>
        <?= Modules::run('btm_nav/_draw_btm_nav')?>
        <p>&copy; <?=Date('Y')?> Company, Inc.</p>
      </footer>
    </div>
    <script src="<?= base_url()?>dist/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url() ?>assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?= base_url() ?>dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url() ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    <?php
    if (isset($use_featherlight)) { ?>
    <script src="<?= base_url()?>js/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <?php } ?>
  </body>
</html>
<style type="text/css">
  .carousel-inner>.item>img {
    width: 100%;
    height: 290px !important;
  }
</style>