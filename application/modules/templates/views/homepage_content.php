<?php
  echo Modules::run('homepage_blocks/_draw_blocks')
?>
<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">
      <?= Modules::run('blog/_draw_feed_hp')?>
      
   </div>
    <div class="col-md-4">
      <h2>Recent Viewed Items List</h2>
      <a href="http://localhost/shoppingcart/musical/instrument/fender-fa-100-dreadnought-acoustic-guitar-pack-natural">CLICK Here</a>
      <a href="<?= base_url()?>youraccount/start">CLICK Here</a>
    </div>
  </div>
</div> <!-- /container -->