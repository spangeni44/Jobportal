<?php 
require_once 'inc/header.php';
require_once 'inc/navbar.php';
include 'admin/class/Database.php';
include 'admin/class/Category.php';	
$_SESSION['front_end']='Yes';
?>
<style>
  #register_content{
  background-color:white; 
  font-weight:bold;
  padding:10px; 
  margin-top: 10px;
  }
</style>
<div class='col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3'>
</div>
<div class='container col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7' id='register_content'>
    <form class='form' method='post' enctype="multipart/form-data" action='admin/process/job_seeker_add.php'>
        <?php flash(); ?>
        <div class="form-group">
            <label for="full_name">Full Name <font color=red>*</font></label>
            <input type="text" name='full_name' required class="form-control input-sm" id="full_name" placeholder="e.g. Ram Kumar Sharma">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="rg_email">Email <font color=red>*</font></label>
                <input type="email" name='rg_email' required class="form-control input-sm" id="rg_email" placeholder="e.g. user@example.com">
            </div>
            <div class="form-group col-md-6">
                <label for="rg_password">Password <font color=red>*</font></label>
                <input type="password" required name='rg_password' class="form-control" id="rg_password" placeholder="Password">
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label for="retype_password">Retype Password <font color=red>*</font></label>
                <input type="password" required name='retype_password' class="form-control" id="retype_password" placeholder="Re-Type Password">
            </div>
            <div class='form-group col-md-6'>
                    <label for="phone">Phone <font color=red>*</font></label>
                    <input type="number" required name='phone' class="form-control" id="phone">
            </div>
        </div>
        <div class='form-group'>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="submit" class="btn btn-primary"name='submit' value='add' style='margin-left: 15px;'>Register</button>
        </div>
    </form>
</div>
 <?php require_once 'inc/footer.php'; ?> 