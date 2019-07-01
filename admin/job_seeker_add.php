<?php
include 'inc/header.php';
require_once 'inc/sidebar_menu.php';
require_once 'inc/checklogin.php';
include_once 'class/Database.php';
include_once 'class/JobSeeker.php';
include_once 'class/User.php';
include_once 'class/Category.php';

unset($_SESSION['front_end']);
$act="Add";
$job_seeker=new JobSeeker();
$user=new User();
if(isset($_GET['id']) && $_GET['id']!=null){
        /*Update*/
        $act = "Update";
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect('job_seeker_view.php', 'error', 'Invalid Job Seeker id.');
        }
        $job_seeker_detail = $job_seeker->getJobSeekerById($id);

        if($job_seeker_detail){
          $user_detail=$user->getUserById($job_seeker_detail[0]->user_id);
          // debug($user_detail,true);
        }
        if(!$job_seeker_detail){
            redirect('job_seeker_view.php', 'error', 'Profile not found or has been deleted.');
        }

        // debug($job_seeker_detail);
    }
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Job Portal Nepal</h1>
          <p>Job Seeker</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="tile">
              <h3 class="tile-title"> Job Seeker <?php echo $act; ?></h3>
              <div class="tile-body">
                <form method="post" action="process/job_seeker_add.php" enctype="multipart/form-data">
                  <?php flash(); ?>
                  <div class="form-row">
                  <label for="full_name">Full Name <font color=red>*</font></label>
                  <input type="text" name='full_name' required class="form-control input-sm" id="full_name" placeholder="e.g. Ram Kumar Sharma" value='<?php echo @$user_detail[0]->full_name; ?>'>
                </div>
                <div class="form-row">
                   <?php if($act=='Add'){
                    ?>
                  <div class="form-group col-md-6">
                    <label for="rg_email">Email <font color=red>*</font></label>
                        <div class="input-group mb-1 mr-sm-1 input-sm">
                        <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                      </div>
                    <input type="email" name='rg_email' required class="form-control input-sm" id="rg_email" placeholder="e.g. user@example.com">
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="rg_password">Password <font color=red>*</font></label>
                    <input type="password" required  name='rg_password' class="form-control" id="rg_password" placeholder="Password">
                  </div>
              </div>
                <div class='form-row'>
                  <div class='form-group col-md-6'>
                    <label for="rg_password">Retype Password <font color=red>*</font></label>
                    <input type="password" required name='retype_password' class="form-control" id="retype_password" placeholder="Re-Type Password">
                  </div>
                  <?php } ?>
                  <div class='form-group col-md-6'>
                      <label for="phone">Phone <font color=red>*</font></label>
                      <input type="number" required name='phone' class="form-control" id="phone" value='<?php echo @$job_seeker_detail[0]->phone ?>'>
                  </div>
              </div>
                <div class="form-group">
                  <label for="permanent_address">Permanent Address <font color=red>*</font></label>
                  <input type="text" name='permanent_address' class="form-control" id="permanent_address" placeholder="1234 Main St" value='<?php echo @$job_seeker_detail[0]->permanent_address ?>'>
                </div>
                <div class="form-group">
                  <label for="current_address">Current Address <font color=red>*</font></label>
                  <input type="text" name='current_address' class="form-control" id="current_address" placeholder="City, Street" value='<?php echo @$job_seeker_detail[0]->current_address ?>'>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="number" name='postal_code' class="form-control" id="postal_code" value='<?php echo @$job_seeker_detail[0]->postal_code ?>'>
                </div>
                <div class="form-group">
                <?php  @$s=strtotime(@$job_seeker_detail[0]->dob);
                          @$dob=date('Y-m-d',$s);
                         ?>
                  <label for="dob">Date of Birth <font color=red>*</font></label>
                  <input type="date" name='dob' required class="form-control" id="dob" value="<?php echo @$dob; ?>">
                  </div>
                  <div class="form-group">
                	<?php
                		$category=new Category();
                  	$job_categories=$category->getAllCategories();  
                  	@$job_cat=$job_seeker_detail[0]->job_category;
                  	?>
                    <label for="job_category">Job Category</label>
                    <select id="job_category" name='job_category' class="form-control">
                      <option <?php echo @(empty($job_cat))?'selected':''; ?> >--Choose One Category--</option>
                      <?php
                        foreach($job_categories as $job_category){
                      ?>
                      <option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <?php @$gender=$job_seeker_detail[0]->gender; ?>
                    <label for="gender">Gender <font color=red>*</font></label>
                    <div style="font-weight: normal; font-size: 15px;">
                      <input type="radio"  name="gender" value='Male' <?php echo ($gender=="Male")?'checked':''; ?>>Male
                      <input type="radio" name="gender" value='Female' <?php echo ($gender=="Female")?'checked':''; ?>>Female
                      <input type="radio" name="gender" value='Other' <?php echo ($gender=="Other")?'checked':''; ?>>Other
                    </div>
                  </div>
                  <div class="form-group">
                    <?php @$marital_status=$job_seeker_detail[0]->marital_status; ?>
                    <label for="marital_status">Marital Status</label>
                    <select name="marital_status" class='form-control'>
                      <option value="Unmarried" <?php echo @($marital_status=='Unmarried')?'selected':'' ?>>Unmarried</option>
                      <option value="Married" <?php echo @($marital_status=='Married')?'selected':'' ?>>Married</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="">Profile Image</label>
                        <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                        <input type="file" class="custom-file-input" onchange='readURL(this)' accept="image/*" name='rg_image' id="rg_image">
                         <p class='notice' style="font-size:12px;">Note: Image size should not be greater than 100 Kb.</p>
                        </div>
                      </div>
                       <?php if($act=='Update'){
                        ?>
                        <div class='form-group'>
                          <div>
                          <img src="<?php USER_IMAGES_PATH.$user_detail[0]->user_image;?>" id='blah' class=' img_tag img img-thumnnail img-responsive' width="100px" height="100px;">
                        </div>
                          <a href='' class='btn-link'><i class='fa fa-trash'></i></a>
                        </div>
                      <?php
                      }else{ ?> 
                      <!-- <div class='form-group' id='seeker_img_block' >
                            <img src='#' id='blah' style='padding:0; margin:0;' class='img_tag img img-responsive img-thumbnail' width='100px' height='100px'>
                      </div> -->
                    <?php 
                      }
                    ?>

                    </div>
                  </div>
               
                 <input type="text" name="job_seeker_id" value="<?php echo @$id;?>" hidden >
                <div class='form-group'>
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary" style='margin-left: 15px;' name='submit' value="<?php echo ($act=='Add')?'add':'edit'; ?>"><?php echo ($act=="Add")?'Register':'Update'; ?></button>
                </div>

              </form>
               
            </div>
          </div>
        </div>
      </div>
    </main>
    
<?php
  include 'inc/footer.php';
?>