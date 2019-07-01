<style>
   body{
    /* background-color:#E6E6FA !important; */
        /* background: linear-gradient(
        to bottom,
        white,
         #5d9634, 
         white 90%,
        lightblue 1%, 
         #5d9634 20%,
        #538c2b 10%, 
        white
         #538c2b 
        ); */
        /* The rectangle in which to repeat. 
        It can be fully wide in this case */
        /* background-size: 100% 60px; */



        /* background-image: url("assets/images/back1.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; */
    }
  .login_btn {
  /*background-color: #3498DB;*/
  color: white;
  padding: 8px;
  margin-right: 10px;
  font-size: 12px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  }
  #navbar_row{
    style='margin-right: 10px;'
  }
  #collapsibleNavbar{
    overflow: hidden;
  }
  #welcome_msg{
    margin-top: 10px;
  }
  .dropbtn {
    background-image: url("<?php echo (isset($_SESSION['user_image']) && !empty($_SESSION['user_image']))?USER_IMAGE_URL.$_SESSION['user_image']:USER_IMAGE_URL.'User_Circle.png'; ?>");
    /*""*/
    /*https://cdn4.iconfinder.com/data/icons/ios-edge-glyph-12/25/User-Circle-512.png*/
    /*background-size: cover;*/
    background-size:cover;
    background-repeat: no-repeat;
    background-position: center;
    font-size: 16px;
    border:2px;
    width: 50px;
    height: 50px;
    border-width: 5px;
    border-color: black;
    border-radius: 50%;
    cursor: pointer;
  }
  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }
  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    right:40px;
    display: none;
    position: absolute;
    /*background-color: #f1f1f1;*/
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  .show {display:block;}

  .head_section{
       background-image: url("assets/images/back1.jpg");
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; 
  }
</style>

<header class="main-head head_section" id='navbar'>
    <!-- <div class='float-center'> -->
         <div style="float:left;" >
               <a href="index.php"> <img src=" <?php echo ASSETS_IMAGES_URL.'logo.png'; ?>"></a>
            </div>
            <div class=" column-right">
              <div class="header-forms">
                <div id="header-form-wrapper">
                  <div>
                  <?php 
                      if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
                          ?>
                          <div class="row" id="navbar_row">
                          <p class="text-center" id='welcome_msg'>
                          <?php echo 'Welcome <i>'.$_SESSION['name'].'</i>';?>
                          </p>
                            <div class="dropdown">
                            <button onclick="myFunction1()" class="dropbtn" title="<?php echo $_SESSION['name'];?>"></button>
                            <div id="myDropdown" class="dropdown-content">
                              <a href="view_profile.php" title="" class='btn-primary'>View Profile</a>
                              <a href="edit_profile.php" class='btn-primary'>Edit Profile</a>
                              <a href="inc/logout.php" class='btn-primary'>Logout</a>
                            </div>
                            </div>
                             <script>
                              function myFunction1() {
                                document.getElementById("myDropdown").classList.toggle("show");
                              }
                              // Close the dropdown menu if the user clicks outside of it
                              window.onclick = function(event) {
                                if (!event.target.matches('.dropbtn')) {
                                  var dropdowns = document.getElementsByClassName("dropdown-content");
                                  var i;
                                  for (i = 0; i < dropdowns.length; i++) {
                                    var openDropdown = dropdowns[i];
                                    if (openDropdown.classList.contains('show')) {
                                      openDropdown.classList.remove('show');
                                    }
                                  }
                                }
                              }
                            </script>
                          </div>
                          <?php
                      }else{
                      ?>
                        <div class='row'>
                            <div class="dropdown" id='dropdown1'>
                            <button onclick="myFunction()" class="dropbtn1 btn btn-primary">Register Now</button>
                              <div id="myDropdown" class="dropdown-content1">
                                <a href="job_seeker_register.php"  class='btn btn-primary' >Register As Job Seeker</a>
                                <a href="job_provider_register.php" class='btn btn-primary'>Register As Employer</a>
                               
                              </div>
                            </div>
                            <style>
                            
                            .dropbtn1 {
                            /* color: white; */
                            padding: 12px;
                            margin-right: 10px;
                            font-size: 12px;
                            font-weight: bold;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                            }
                            /* Dropdown button on hover & focus */
                            /* .dropbtn1:hover, .dropbtn1:focus { */
                            /*background-color: #2980B9;*/
                            /* } */
                            /* The container <div> - needed to position the dropdown content */
                            #dropdown1 {
                            position: relative;
                            display: inline-block;
                            }
                            /* Dropdown Content (Hidden by Default) */
                            .dropdown-content1 {
                            width: 100px;
                            display: none;
                            position: absolute;
                            background-color: #f1f1f1;
                            min-width: 160px;
                            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                            z-index: 1;
                            }
                            /* Links inside the dropdown */
                            .dropdown-content1 a {
                            color: white;
                            width:100%;
                            padding: 10px 14px;
                            text-decoration: none;
                            font-size: 12px;
                            display:lnline-block;
                            }
                           
                            .show1 {display:inline-block;}
                            </style>
                            <script>
                              function myFunction() {
                                document.getElementById("myDropdown").classList.toggle("show1");
                              }
                              // Close the dropdown menu if the user clicks outside of it
                              window.onclick = function(event) {
                                if (!event.target.matches('.dropbtn1')) {
                                  var dropdowns = document.getElementsByClassName("dropdown-content1");
                                  var i;
                                  for (i = 0; i < dropdowns.length; i++) {
                                    var openDropdown = dropdowns[i];
                                    if (openDropdown.classList.contains('show1')) {
                                      openDropdown.classList.remove('show1');
                                    }
                                  }
                                }
                              }
                              </script>
                           
                                  <a href='' data-toggle='modal' class='btn btn-primary login_btn login-btn' style="margin-right: 25px;"  data-target='#loginExampleModalCenter'>Login</a> 
                                  
                                <!-- Forgot Password Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Reset Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class='container-fluid'>
                                          <form  class='form-group' method='post' action='admin/process/forgot_password.php' accept-charset="utf-8">
                                            <div class='form-group'>
                                              <p>Enter email of your account to reset password.
                                              New password will be send to your email</p>
                                            </div>
                                            <div class="form-group">
                                              <input type="email" name="fg_email" autofocus required id="fg_email" class="form-control" placeholder="Email">
                                              </div>
                                              <div class='form-group'>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Send</button>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      <!-- modal body end -->
                                    </div>
                                  </div>
                                </div>
                                <!-- Login Modal -->
                                <div class="modal fade" id="loginExampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="LoginExampleModalLongTitle">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class='container-fluid'>
                                          <form  class='form-group' method='post' action='admin/process/login.php' accept-charset="utf-8">
                                            <div class="form-group">
                                              <input type="email" name="email" autofocus  required id="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                              <input type="password" name="password"  required id="password" class="form-control" placeholder="Password">
                                            </div>
                                           <div class='form-group'>
                                            <button type='submit'  class="btn btn-success">Login</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          </div>
                                          <a href="#" data-toggle="modal" data-target="#exampleModalCenter" title="Click if you've forgotten your password" class="jn-sprite forgotpassword" data-dismiss="modal">Forgot Password</a>
                                        </form>
                                      </div>
                                      </div>
                                    
                                    </div>
                                  </div>
                                </div>
                                <div class="clear"></div>
                              </div>
                        
                        <?php
                        }
                     ?>
                </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
</header>
        <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-expand-md" style='overflow:auto;' >
            <div class="container" style='overflow:auto;'>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <?php $page_name=getCurrentPage();
                    ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="index.php" class="nav-link <?php echo ($page_name=='index')?' active':''; ?>"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                        <li class="nav-item"><a href="search_jobs.php" class="nav-link <?php echo ($page_name=='search_jobs')?' active':''; ?>">Find A Job</a></li>
                       <?php
                        if(isset($_SESSION, $_SESSION['name']) && !empty($_SESSION['name'])){
                          if($_SESSION['role']!='Admin'){
                          ?>
                        <li class="nav-item"><a href="edit_profile.php" class="nav-link <?php echo ($page_name=='edit_profile')?' active':''; ?>">Edit Profile</a></li>
                        <?php
                            }
                          } 
                        ?>
                        <li class="nav-item"><a href="help.php" class="nav-link <?php echo ($page_name=='help')?' active':''; ?>">Help</a></li>
                        <li class="nav-item"><a href="about_us.php" class="nav-link <?php echo ($page_name=='about_us')?' active':''; ?>">About Us</a></li>
                        <li class="nav-item"><a href="contact_us.php" class="nav-link <?php echo ($page_name=='contact_us')?' active':''; ?>">Contact Us</a></li>
                    </ul>
                   
                    <ul class='navbar-nav mr-right'>
                        <li class="nav-item"><a href='job_post.php' class="nav-link <?php echo ($page_name=='job_post')?'active':'';?>">Post A Job</a></li>
                        <?php
                          if(isset($_SESSION, $_SESSION['role']) && !empty($_SESSION['role'])){
                              if($_SESSION['role']=='Job Seeker'){
                                  ?>
                                <li class='nav-item'><a href='view_resume.php' class="nav-link <?php echo ($page_name=='view_resume')?'active':'';?>">Resume</a><li>
                                  <?php
                                }
                                if($_SESSION['role']=='Job Provider'){
                                ?> 
                                <li class='nav-item'><a href='employer_job_post_view.php' class="nav-link <?php echo ($page_name=='employer_job_post_view')?'active':'';?>">View Posted Jobs</a><li>
                    </ul>
                    <?php
                          }
                      }
                      ?>
            </div>
        </nav>
    </header>
   