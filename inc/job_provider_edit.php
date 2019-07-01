<?php
if(isset($_SESSION, $_SESSION['user_id']) && !empty($_SESSION['user_id'])){
        $job_seeker=new JobSeeker();
        // debug($_SESSION['user_id'], true);
        $job_seeker_detail=$job_seeker->getJobSeekerByUserId($_SESSION['user_id']);
      
    }
 ?>
 
<div class="container" style='background-color:lightblue;'>
    <h1>Edit Profile</h1>
  	<hr>
	<div class="row">
    <div class='col-sm-3 col-md-3 col-lg-3'>
       <img src="<?php echo (isset($_SESSION['user_image']) && file_exists(USER_IMAGE_PATH.$_SESSION['user_image']))?USER_IMAGE_URL.$_SESSION['user_image']:USER_IMAGE_URL.'User-Circle.png'; ?>" width='120px' height='120px' id='blah' style='border-radius:50%' >
      <h6>Upload a different photo...</h6>
      <input type='file' name='rg_image' onchange="readURL(this)"  class='form-control'>
    </div>
     
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <?php flash(); ?>
          <!-- <p class='alert alert-info'>This is an <strong>.alert</strong>. Use this to show important messages to the user.</p> -->
        
        <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_add.php'>
            <div class="form-group">
                <label class="col-lg-3 control-label">Full Name:</label>
                <div class="col-lg-8">
                <input class="form-control" name='full_name' type="text" placeholder="e.g. Ram Kumar Sharma">
                </div>
            </div>
            <div class='form-group'>
                <label for="phone" class='col-lg-3 control-label'>Phone <font color=red>*</font></label>
                <div class='col-lg-8'>
                    <input type="number" required name='phone' class="form-control" id="phone" value='<?php echo @$job_seeker_detail[0]->phone ?>'>
                </div>
            </div>
                <div class="form-group">
                    <label for="permanent_address" class='col-lg-3 control-label'>Permanent Address <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8'>
                        <input type="text" name='permanent_address' class="form-control" id="permanent_address" placeholder="1234 Main St" value='<?php echo @$job_seeker_detail[0]->permanent_address ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="current_address" class='col-lg-3 control-label'>Current Address <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <input type="text" name='current_address' class="form-control" id="current_address" placeholder="City, Street" value='<?php echo @$job_seeker_detail[0]->current_address ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_code"class='col-lg-3 control-label'>Postal Code</label>
                    <div class='col-sm-8 col-md-8 col-lg-8'>
                        <input type="number" name='postal_code' class="form-control" id="postal_code" value='<?php echo @$job_seeker_detail[0]->postal_code ?>'>
                    </div>
                </div>
                <div class="form-group">
                <?php  @$s=strtotime(@$job_seeker_detail[0]->dob);
                          @$dob=date('Y-m-d',$s);
                         ?>
                    <label for="dob"class='col-lg-3 control-label'>Date of Birth <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <input type="date" name='dob' required class="form-control" id="dob" value="<?php echo @$dob; ?>">
                    </div>
                </div>
                    
                    <div class="form-group">
                	<?php
                		$category=new Category();
                        @$job_categories=$category->getAllCategories();
                        @$job_cat=$job_seeker_detail[0]->job_category;
                  		?>
                    <label for="job_category"class='col-lg-3 control-label'>Job Category</label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                     <select id="job_category" name='job_category' class="form-control">
                      <option <?php echo @(empty($job_cat))?'selected':''; ?> >--Choose One Field--</option>
                     <?php
                      foreach($job_categories as $job_category){
                      	?>
                      	<option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                      	<?php } ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <?php @$gender=$job_seeker_detail[0]->gender; ?>
                    <label for="gender" class='col-lg-3 control-label'>Gender <font color=red>*</font></label>
                    <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                      <input type="radio"  name="gender" value='Male' <?php echo ($gender=="Male")?'checked':''; ?>>Male
                      <input type="radio" name="gender" value='Female' <?php echo ($gender=="Female")?'checked':''; ?>>Female
                      <input type="radio" name="gender" value='Other' <?php echo ($gender=="Other")?'checked':''; ?>>Other
                    </div>
                  </div>
                <div class="form-group">
                    <?php @$marital_status=$job_seeker_detail[0]->marital_status; ?>
                    <label for="marital_status"class='col-lg-3 control-label'>Marital Status</label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <select name="marital_status" class='form-control'>
                        <option value="Unmarried" <?php echo @($marital_status=='Unmarried')?'selected':'' ?>>Unmarried</option>
                        <option value="Married" <?php echo @($marital_status=='Married')?'selected':'' ?>>Married</option>
                        </select>
                    </div>
                </div>
                <br><br><br>






          
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="janeuser">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name='password' >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" name='retype_password'>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <button type='submit' name='update' class="btn btn-primary">Save Changes</button>
              <span></span>
              <input type="reset" class="btn btn-danger" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>