<?php
  require_once 'inc/header.php';
  require_once 'inc/sidebar_menu.php';
  require_once 'inc/checklogin.php';
  unset($_SESSION['front_end']);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>
            <i class="fa fa-dashboard"></i> 
            Job Portal Nepal
          </h1>
          <p>Find Your Ideal Job</p>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>User</h4>
              
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-calendar-check-o fa-3x"></i>
            <div class="info">
              <h4>Date</h4>
              <p><b><?php echo date('Y-m-d D');?></b></p>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-group fa-3x"></i>
            <div class="info">
              <h4>Jobs </h4>
              <p>
                <b>
               
                </b>
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
         
          <a href='#' style='text-decoration: none;'>

          <div class="widget-small info coloured-icon"><i class="icon fa fa-group fa-3x"></i>
            <div class="info">
              <h4>Career </h4>
              <p>

              </p>
            </div>
          </div>
        </a>
        </div>
      </div>
    </main>
    <?php 
    include 'inc/footer.php';
    ?>