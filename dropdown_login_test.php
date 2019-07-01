
<?php
  include_once 'inc/header.php';
  include_once 'inc/navbar.php';  
  include_once 'admin/class/Database.php';
  include_once 'admin/class/Category.php';
  include_once 'admin/class/JobPost.php';
  $category=new Category();
  $job_post=new JobPost();
?>


<div class="container row">
  <table style='border-bottom:5px; margin-bottom:5px;'>
    <tr>
      <td>
        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
        <h4  style='float-left; color:white; border-radius:0 !important; text-decoration:none !important;' class='btn btn-warning'>Jobs With Your Criteria </h4>
        <hr style='border=4px; padding:0; margin:0; color:blue;'>  
      </div>
      </td>
    </tr>
  </table>
  <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
  <!-- <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Jobs By Category</a></li>
    <li><a data-toggle="pill" href="#menu1">Jobs By Place</a></li>
    <li><a data-toggle="pill" href="#menu2">Jobs By Type</a></li>
    <li><a data-toggle="pill" href="#menu3">Jobs By Newspaper</a></li>
  </ul>
   -->
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#jobs_by_category">Jobs By Category</a></li>
      <li><a data-toggle="tab" href="#jobs_by_type">Jobs By Type</a></li>
      <li><a data-toggle="tab" href="#jobs_by_place">Jobs By Place</a></li>
      <li><a data-toggle="tab" href="#jobs_by_source">Jobs By Source</a></li>
    </ul>
  </div>
  <div class="tab-content container-fluid" style='background-color:white;'>
    <div id="jobs_by_category" class="tab-pane fade in active">
      <div class='row' style='padding-left:0; padding-right:0'>
        <?php
        $all_categories=$category->getAllCategories();
        foreach($all_categories as $row){
          ?>
          <div class='row col-xs-4 col-md-4 col-lg-4 col-xl-4'>
          <a href='' style='text-decoration:none !important;'><?php echo  $row->title.' ('.count($job_post->getTotalJobPostByCategory($row->id)).')'; ?></a>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
    <div id="jobs_by_type" class="tab-pane fade">
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
         <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Full Time ('.count($job_post->getTotalJobPostByType('Full Time')).')'; ?></a>
      </div>
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
         <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Part Time ('.count($job_post->getTotalJobPostByType('Part Time')).')'; ?></a>
      </div>
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
         <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Contract ('.count($job_post->getTotalJobPostByType('Contract')).')'; ?></a>
      </div>
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
         <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Freelance ('.count($job_post->getTotalJobPostByType('Freelance')).')'; ?></a>
      </div>
    </div>
    <div id="jobs_by_place" class="tab-pane fade">
      <h3></h3>
      <p>Some content in menu 2.</p>
    </div>
    <div id="jobs_by_source" class="tab-pane fade">
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
          <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'JobPortal Nepal Exclusive ('.count($job_post->getTotalJobPostBySource('JobPortal Nepal Exclusive')).')'; ?></a>
        </div>
      <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
          <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Newspapers ('.count($job_post->getTotalJobPostBySource('Newspaper')).')'; ?></a>
        </div>
        <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
          <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Company Website ('.count($job_post->getTotalJobPostBySource('Company Website')).')'; ?></a>
        </div>
        <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
          <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Social Media ('.count($job_post->getTotalJobPostBySource('Social Media')).')'; ?></a>
        </div>
        <div class='row col-xs-3 col-md-3 col-lg-3 col-xl-3'>
          <a data-toggle='tab' href='' style='text-decoration:none !important;'><?php echo 'Others ('.count($job_post->getTotalJobPostBySource('Others')).')'; ?></a>
        </div>
    </div>
  </div>
</div>

<?php include_once 'inc/footer.php'; ?>




 <!-- centered block -->
 <!-- <style>
    .centered_block {
        display: table;
        margin-right: auto;
        margin-left: auto;
        }
  </style> -->

 <!-- <ul class="nav pull-right">
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
    <div class="dropdown-menu">
      <form action="" id="form_login" style="margin: 0; padding: 3px 15px" accept-charset="utf-8" method="post">
        <fieldset class="control-group">
          <label for="form_email" class="control-label">Email address</label>
          <div class="controls">
            <div class="input-prepend" style="white-space: nowrap">
              <span class="add-on"><i class="icon-envelope"></i></span>
              <input type="email" name="email" id="form_email" autocomplete="on" class="span2">
            </div>
          </div>
        </fieldset>
        <fieldset class="control-group">
          <label for="form_password" class="control-label">Password</label>
          <div class="controls">
            <div class="input-prepend" style="white-space: nowrap">
              <span class="add-on"><i class="icon-lock"></i></span>
              <input type="password" name="password" id="form_password" class="span2">
            </div>
          </div>
        </fieldset>
        <label class="checkbox">
          <input type="checkbox" name="remember" value="true"> Remember me
        </label>
        <p class="navbar-text">
          <button type="submit" class="btn btn-primary">Login</button>
        </p>
      </form>
    </div>
  </li>
</ul>  -->

 <!-- File upload 
<div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div> 


 Form with location info 
<div class='container' style='font-weight: bold;'>
<form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="rg_email">Email</label>
      <input type="email" name='rg_email' class="form-control" id="rg_email" placeholder="e.g. user@example.com">
    </div>
    <div class="form-group col-md-6">
      <label for="rg_password">Password</label>
      <input type="password" name='rg_password' class="form-control" id="rg_password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="permanent_address">Permanent Address</label>
    <input type="text" name='permanent_address' class="form-control" id="permanent_address" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="current_address">Current Address</label>
    <input type="text" name='current_address' class="form-control" id="current_address" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" name='phone' class="form-control" id="phone">
  </div>
   <div class="form-group">
    <label for="phone">Date of Birth</label>
    <input type="date" name='dob' class="form-control" id="dob">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="city">City</label>
      <input type="text" name='city' class="form-control" placeholder="e.g. Kathmandu" id="city">
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" name='state' class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="zip">Zip</label>
      <input type="text" name='zip_code' class="form-control" id="zip_code">
    </div>
  </div>
  <div class="form-group">
      <label for="job_category">Job Category</label>
       <select id="job_category" name='job_category' class="form-control">
        <option selected>--Choose One Category--</option>
        <option>Information Technology</option>
        <option>Accounting</option>
        <option>Marketing</option>
        <option>Hospitality</option>
        <option>Health</option>
        <option>Civil Engineering</option>
        <option>Banking/Insurance/Finance</option>
      </select>
    </div>
    <div class="form-group">
      <label for="gender">Gender</label>
      <div style="font-weight: normal; font-size: 15px;">
        <input type="radio" name="gender" value='Male'>Male
        <input type="radio" name="gender" value='Female'>Female
        <input type="radio" name="gender" value='Other'>Other
      </div>
    </div>
    <div class="form-group">
      <label for="marital_status">Marital Status</label>
      <select name="marital_status" class='form-control'>
        <option value="Unmarried">Unmarried</option>
        <option value="Married">Married</option>
      </select>
    </div>
   <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> 
  <div class='form-group'>
  <button type="reset" class="btn btn-primary">Clear</button>
  <button type="submit" class="btn btn-primary" style='margin-left: 15px;'>Register</button>
</div>
</form>
</div> -->



<!-- dropdown button -->
<!-- 
<center><div class="dropdown" id='dropdown1' >
  <button onclick="myFunction()" class="dropbtn1">Register Now</button>
  <div id="myDropdown1" class="dropdown-content">
      <a href="job_seeker_register.php" class='btn btn-primary'>Register As Job Seeker</a>
      <a href="job_provider_register.php" class='btn btn-primary'>Register As Employer</a>
    <p class='alert alert-warning'>Register and find jobs or employee as you need</p>
  </div>
</div>
</center>
<style>
/* Dropdown Button */
.dropbtn1 {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 12px;
  border: none;
  cursor: pointer;
}
/* Dropdown button on hover & focus */
.dropbtn1:hover, .dropbtn1:focus {
  /*background-color: #2980B9;*/
}
/* The container <div> - needed to position the dropdown content */
#dropdown1 {
  position: relative;
  display: inline-block;
}
/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  width: 200px;
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 12px;
  display:block;
}
.dropdown-content p {
  font-size: 14px;
  font-family: 'Calibri';
  font-color:darkred;
  }
/* Change color of dropdown links on hover */
/*.dropdown-content a:hover {background-color: #ddd}*/
/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show1 {display:block;}
</style>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown1").classList.toggle("show1");
}
// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show1')) {
        openDropdown.classList.remove('show1');
      }
    }
  }
}
</script> -->

<!-- Button trigger modal -->
<!-- <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

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
          <p>Enter email of your account to reset password.
           New password will be send to your email</p>
        <form action="" method="post" class='form-control' accept-charset="utf-8">
          <div class="form-group">
                  <input type="text" name="email" required id="email" class="form-control" placeholder="Email">
          </div>
        </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</center> -->

<!-- <select class="mdb-select md-form colorful-select dropdown-primary" multiple searchable="Search here..">
  <option value="" disabled selected>Choose your country</option>
  <option value="1">USA</option>
  <option value="2">Germany</option>
  <option value="3">France</option>
  <option value="4">Poland</option>
  <option value="5">Japan</option>
</select>
<label>Label example</label>
<button class="btn-save btn btn-primary btn-sm">Save</button>
<script>
  // Material Select Initialization
  $(document).ready(function() {
  $('.mdb-select').materialSelect();
});
</script> -->
<!-- <style>
  #card{
    box-shadow: 1px 1px 1px 1px  lightblue;
  }
</style>

  
<div class='container'>
<?php $job_post=new JobPost();
      $all_job_posts=$job_post->getAllJobPosts();
      foreach($all_job_posts as $row){
?>
<!-- <div class="card" id='card' style="width: 13rem;">
<div class='row'>
    <div class='col-4'>
  <img class=" thumbnail thumbnail-responsive" width="100%" height="100%" src="<?php echo USER_IMAGE_URL.'pic.jpg'; ?>" alt="Card image cap">
  </div>
  <div class='col-8'>
  <div class="card-body"> 
    <p class=""><a href='' class='p_text'> Vianet</a></p>
    <p class=''><a href='' class='p_text'>Computer Operator</a></p>
  </div>
</div>
</div>
<?php } ?>
</div> -->
<!-- <div class='row'>
<?php $job_post=new JobPost();
      $all_job_posts=$job_post->getAllJobPosts();
      // foreach($all_job_posts as $row){
      for($i=0;$i<12;$i++){
        ?>
      
<div class="col-sm-3 my-8">
    <div class="card">
      <div class='row'>
        <div class='col-md-4'>
         <img class="card-img-left thumbnail thumbnail-responsive" width="100%" height="100%" src="<?php echo USER_IMAGE_URL.'pic.jpg'; ?>" alt="">
       </div>
       <div class='col-md-8'>
        <div class="card-body">
            <h3 class="card-title"><a href=''>Vianet</a></h3>
            <p class="card-text p_text" ><a href=''>IT Officer</a></p>
          </div>
        </div>        
    </div>
</div>
</div>
<?php } ?>
</div>
<style>
  .p_text{
    font-style: italic;
    font-size: 12px;
    /*font-size: 12px;*/
  }
 
</style>





<?php 
  $perpage = 5;

  if(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
  }else{
  $curpage = 1;
  }

    $readSql = "SELECT * FROM `job_posts` LIMIT 0, 5";
  
  $start = ($curpage * $perpage) - $perpage;
  // debug($start,true);
  
  $totalres=mysqli_num_rows($readSql);
  // $totalres = count($all_job_posts);
  
  $endpage = ceil($totalres/$perpage);
  $startpage = 1;
  $nextpage = $curpage + 1;
  $previouspage = $curpage - 1;
  // For First page pagination
  if($curpage != $startpage){ ?>
      <li class="page-item">
      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">First</span>
      </a>
      </li>
  <?php } 
  // For last page pagination
  if($curpage != $endpage){ ?>
      <li class="page-item">
      <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Last</span>
      </a>
      </li>
      <?php } 
  // For previous page pagination button
  if($curpage >= 2){ ?>
  <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
  <?php } 
  ?>
    <!-- for current page pagination button -->
  <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
  <!-- For next page pagination button -->
  <?php if($curpage != $endpage){ ?>
      <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
  <?php } ?>



<?php require_once 'inc/footer.php'; ?>
 -->




<!-- index file -->

                                                          <!-- $all_job_posts=$job_post->getAllJobPosts();
                                                          foreach($all_job_posts as $row){
                                                    //         $user_id=$row->added_by;
                                                    //         // debug($row,true);
                                                    //         $user_detail=$user->getUserById($user_id);
                                                    //         // debug($user_detail[0]->full_name,true);
                                                    // ?>
                                                          <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $row->position; ?></a></td>
                                                    //     <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $user_detail[0]->full_name; ?></a></td>
                                                    //     <td> <?php $time=!($row->employment_type=="Contract")?' Time':''; echo  $row->employment_type.$time; ?></td>
                                                    //     <td> <?php echo getDaysandHoursFromDate($row->deadline).' remaining'; ?></td>
                                                    //     </tr> -->
                                                    //     <?php
                                                    //         }
                                                    //     }
                                                    //     ?>  -->



<!-- View Profile page file -->

<!-- <?php 
	require_once 'inc/header.php';
    require_once 'inc/navbar.php';
    $_SESSION['front_end']='Yes';
?>
<div id="content">
	<div class='row'>
		<div class='col-2'>
		</div>
		<div class='col-8'>
			<h3 class='text-center'>This is view Profile Page.</h3>
		</div>
		<div class='col-2'>
		</div>
	</div>
</div>-->
<?php require_once 'inc/footer.php'; ?>
                                                        