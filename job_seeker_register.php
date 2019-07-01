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
        <div class="form-group">
            <label for="permanent_address">Permanent Address <font color=red>*</font></label>
            <input type="text" name='permanent_address' class="form-control" id="permanent_address" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="current_address">Current Address <font color=red>*</font></label>
            <input type="text" name='current_address' class="form-control" id="current_address" placeholder="City, Street">
        </div>
        <div class="form-group">
            <label for="phone">Date of Birth <font color=red>*</font></label>
            <input type="date" name='dob' required class="form-control" id="dob" max="<?php echo date('Y-m-d'); ?>" >
        </div>
        <div class='form-row'>
            <div class="form-group col-md-2">
                <label for="postal_code">Postal Code</label>
                <input type="text" name='postal_code' class="form-control" id="postal_code">
            </div>
            <div class="form-group col-md-10">
                <?php $category=new Category();
                $category_details=$category->getAllCategories();
                ?>
                <label for="job_category">Company Field <font color=red>*</font></label>
                <select id="job_category" name='job_category' class="form-control">
                    <option disabled selected value='0'>--Choose One Fields--</option>
                    <?php foreach($category_details as $category_detail){
                    ?>
                    <option value='<?php echo $category_detail->id;  ?>'><?php echo $category_detail->title; ?> </option>
                    <?php 
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class='form-row'>
            <div class="form-group col-md-4">
                <label for="gender">Gender <font color=red>*</font></label>
                <div style="font-weight: normal; font-size: 15px;">
                    <input type="radio" checked name="gender" value='Male'>Male
                    <input type="radio" name="gender" value='Female'>Female
                    <input type="radio" name="gender" value='Other'>Other
                </div>
            </div>
            <div class="form-group col-md-8">
                <label for="marital_status">Marital Status</label>
                <select name="marital_status" class='form-control'>
                    <option value="Unmarried" selected>Unmarried</option>
                    <option value="Married" >Married</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <label for="">Profile Image</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                        <input type="file" class="custom-file-input" accept="image/*" name='rg_image' id="rg_image">
                    <!-- <p class='alert' style="font-size:12px;">Note: Image size should not be greater than 100 Kb.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class='form-group'>
            <button type="reset" class="btn btn-danger">Clear</button>
            <button type="submit" class="btn btn-primary"name='submit' value='add' style='margin-left: 15px;'>Register</button>
        </div>
    </form>
</div>
 <?php require_once 'inc/footer.php'; ?> 