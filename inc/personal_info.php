<style>
  .padding-0{
    padding-left:0;
    padding-right:0;
  }
</style>

<div class="container-fluid padding-0">
    <h3 >Edit Profile</h3>
  	<hr>
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
    <?php flash(); ?>
    <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_add.php' enctype="multipart/form-data">
      <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
        <img src="<?php echo (isset($_SESSION['user_image']) && file_exists(USER_IMAGE_PATH.$_SESSION['user_image']))?USER_IMAGE_URL.$_SESSION['user_image']:USER_IMAGE_URL.'User-Circle.png'; ?>" width='120px' height='120px' id='blah' style='border-radius:50%' >
        <h6>Upload a different photo...</h6>
        <input type='file' name='rg_image' onchange="readURL(this)" >
      </div>
      <!-- edit form column -->
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 personal-info">
        <?php flash(); ?>
          <!-- <p class='alert alert-info'>This is an <strong>.alert</strong>. Use this to show important messages to the user.</p> -->
        
            <div class="form-group row">
                <label class="col-lg-4 ">Full Name:</label>
                <div class="col-lg-8 col-md-8">
                <input class="form-control" name='full_name' type="text" placeholder="e.g. Ram Kumar Sharma">
                </div>
            </div>
            <div class='form-group row'>
                <label for="phone" class='col-lg-4 '>Phone: <font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <input type="number" required name='phone' class="form-control" id="phone" value='<?php echo @$job_seeker_detail[0]->phone ?>'>
                </div>
            </div>
                <div class="form-group">
                    <label for="permanent_address" class='col-lg-4 '>Permanent Address: <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8'>
                        <input type="text" name='permanent_address' class="form-control" id="permanent_address" placeholder="1234 Main St" value='<?php echo @$job_seeker_detail[0]->permanent_address ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="current_address" class='col-lg-4 '>Current Address: <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <input type="text" name='current_address' class="form-control" id="current_address" placeholder="City, Street" value='<?php echo @$job_seeker_detail[0]->current_address ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_code"class='col-lg-4 '>Postal Code:</label>
                    <div class='col-sm-8 col-md-8 col-lg-8'>
                        <input type="number" name='postal_code' class="form-control" id="postal_code" value='<?php echo @$job_seeker_detail[0]->postal_code ?>'>
                    </div>
                </div>
                <div class="form-group">
                <?php  @$s=strtotime(@$job_seeker_detail[0]->dob);
                          @$dob=date('Y-m-d',$s);
                         ?>
                    <label for="dob"class='col-lg-4 '>Date of Birth: <font color=red>*</font></label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <input type="date" name='dob' required class="form-control" id="dob" value="<?php echo @$dob; ?>">
                    </div>
                </div>
                    
                   
                  <div class="form-group">
                    <?php @$gender=$job_seeker_detail[0]->gender; ?>
                    <label for="gender" class='col-lg-4 '>Gender: <font color=red>*</font></label>
                    <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                      <input type="radio"  name="gender" value='Male' <?php echo ($gender=="Male")?'checked':''; ?>>Male
                      <input type="radio" name="gender" value='Female' <?php echo ($gender=="Female")?'checked':''; ?>>Female
                      <input type="radio" name="gender" value='Other' <?php echo ($gender=="Other")?'checked':''; ?>>Other
                    </div>
                  </div>
                <div class="form-group">
                    <?php @$marital_status=$job_seeker_detail[0]->marital_status; ?>
                    <label for="marital_status"class='col-lg-4 '>Marital Status:</label>
                    <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                        <select name="marital_status" class='form-control'>
                        <option value="Unmarried" <?php echo @($marital_status=='Unmarried')?'selected':'' ?>>Unmarried</option>
                        <option value="Married" <?php echo @($marital_status=='Married')?'selected':'' ?>>Married</option>
                        </select>
                    </div>
                </div>
                <br><br><br>
          <div class="form-group">
            <label class="col-md-4 "></label>
            <div class="col-md-8">
              <button type='submit' name='btn_personal_info' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
              <span></span>
              <input type="reset" class="btn btn-danger" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>