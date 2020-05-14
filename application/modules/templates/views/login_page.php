<?php
    $first_bit = $this->uri->segment(1);
  $form_url=base_url().$first_bit.'/submit_login'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() ?>favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>
 
    <link href="<?= base_url() ?>dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">
    <link href="<?= base_url() ?>css/jumbotron.css" rel="stylesheet">
    <script src="<?= base_url() ?>assets/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body style="padding-top: 90px;">
    <div class="col-md-12">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">Sign In</h3>
          </div>
          <div class="panel-body">
              <form role="form" method="post" action="<?= $form_url?>">
                  <fieldset>
                    <?= validation_errors('<p style="color:red">','</p>')?>
                      <div class="form-group">
                          <input class="form-control" placeholder="Username" name="username"  value="<?=$username?>" type="text" autofocus="">
                      </div>
                      <div class="form-group">
                          <input class="form-control" placeholder="Password" name="pword" type="password" value="">
                      </div>
                      <div class="checkbox">
                        <?php
                        if($first_bit=="youraccount"){ ?>
                        <label>
                          <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                        <?php } ?>
                      </div>
                      <!-- Change this to a button or input when using this as a form -->
                      <button type="submit" name="submit" class="btn btn-sm btn-success" value="Submit">Sign In</button>
                  </fieldset>
              </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
