
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php
            echo Modules::run('store_categories/_draw_top_nav');
          ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    <div class="container" style="min-height: 550px;">
      <!-- Example row of columns -->
      <?php
      if (isset($page_content)) {
        echo nl2br($page_content);  

        if ($page_url=="") {
          require_once('homepage_content.php');
        }elseif ($page_url=="contact-us") {
          echo Modules::run('contact-us/_draw_form');
        }
      }elseif (isset($view_file)) {
        $this->load->view($view_module.'/'.$view_file);
      }

      ?>  

      <hr>
    </div>
    <div class="container">
      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div>