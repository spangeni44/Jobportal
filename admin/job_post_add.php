<?php
include 'inc/header.php';
require 'inc/sidebar_menu.php';
require_once 'inc/checklogin.php';
include_once 'class/Database.php';
include_once 'class/User.php';
include_once 'class/JobPost.php';
include_once 'class/Category.php';

unset($_SESSION['front_end']);
$act="Add";
$job_post=new JobPost();
$user=new User();
if(isset($_GET['id']) && $_GET['id']!=null){
        /*Update*/
        $act = "Update";
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect('job_post_view.php', 'error', 'Invalid Job id.');
        }
        $job_post_detail = $job_post->getJobPostById($id);


        if($job_post_detail){
          $user_detail=$user->getUserById($job_post_detail[0]->added_by);
          // debug($user_detail,true);
        }
        if(!$job_post_detail){
            redirect('job_post_view.php', 'error', 'Post not found or has been deleted.');
        }
        // debug($job_seeker_detail);
    }
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Job Portal Nepal</h1>
          <p>Job Post</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="tile">
              <h3 class="tile-title"> Job Post <?php echo $act; ?></h3>
              <div class="tile-body">
                <form method="post" action="process/job_post.php" enctype="multipart/form-data">
                  <?php flash();                   
                  ?>
                  <!-- <div class="form-row">
                  <label for="company_name">Compnay Name <font color=red>*</font></label>
                  <input type="text" name='company_name' required class="form-control input-sm" id="company_name" placeholder="e.g. Eastlink Technology" value='<?php echo @$user_detail[0]->full_name; ?>'>
                </div> -->
                <div class="form-row">
                  <div class='form-group col-md-6'>
                      <label for="position"> Vacant Position <font color=red>*</font></label>
                      <input type="text" required name='position' placeholder="e.g. IT Officer" class="form-control" id="position" value='<?php echo @$job_post_detail[0]->position ?>'>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="job_level">Job Level <font color=red>*</font></label>
                  <?php @$job_level=$job_post_detail[0]->job_level; ?>
                  <select name="job_level" class='form-control'>
                  	<option  <?php echo @(empty($job_level))?'selected':''; ?> > --Choose One -- </option>
                  	<option value="Entry" <?php echo @($job_level=="Entry")?'selected':''; ?> >Entry Level</option>
                  	<option value="Mid" <?php echo @($job_level=="Mid")?'selected':''; ?>>Mid Level</option>
                  	<option value="Senior" <?php echo @($job_level=="Senior")?'selected':''; ?>>Senior Level</option>
                  </select>
                </div>
              </div>
                <div class="form-group">
                	<?php
                		$category=new Category();
                  		$job_categories=$category->getAllCategories();  
                  		@$job_cat=$job_post_detail[0]->job_category;
                  		
                  		?>
                    <label for="job_category">Job Category</label>
                     <select id="job_category" name='job_category' class="form-control">
                      <option <?php echo @(empty($job_cat))?'selected':''; ?> >--Choose One Category--</option>
                     <?php 
                    
                     // debug($job_categories,true);
                      foreach($job_categories as $job_category){
                      	?>
                      	<option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                      	<?php } ?>
                    </select>
                  </div>
                <div class="form-group">
                	<?php @$education_level=$job_post_detail[0]->education_level; ?>
                  <label for="education_level">Eduction Level <font color=red>*</font></label>
                  <select name="education_level" class='form-control'>
                  	<option   <?php echo @(empty($education_level))?'selected':''; ?> > --Choose Education Level-- </option>
                  	<option value="SEE"  <?php echo @($education_level=="SEE")?'selected':''; ?>>SEE</option>
                  	<option value="Intermediate" <?php echo @($education_level=="Intermediate")?'selected':''; ?>>Intermediate</option>
                  	<option value="Bachelor"<?php echo @($education_level=="Bachelor")?'selected':''; ?>>Bachelor</option>
                  	<option value="Master" <?php echo @($education_level=="Master")?'selected':''; ?>>Master</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="qualification"> Qualifications/Skills Required </label>
                  <textarea rows='5' class='form-control tiny_mce_field'  name='qualification' id='qualification'><?php echo @$job_post_detail[0]->qualification; ?></textarea>
                  <!-- <input type="text" name='qualification' class="form-control" id="qualification" value="<?php echo @$job_post_detail[0]->qualification; ?>" placeholder=' e.g. minimum of Bachelor in IT related field'> -->
                </div>
                <div class="form-group">
                    <label for="employment_type">Employment Type</label>
                   	 <select id="employment_type" name='employment_type' class="form-control">
                      <option <?php echo @(empty($employment_type))?'selected':''; ?> >--Choose One--</option>
                      <?php @$employment_type=$job_post_detail[0]->employment_type; ?>
                      <option  value='Full Time' <?php echo @($employment_type=="Full Time")?'selected':''; ?>>Full Time</option>
                      <option  value='Part Time'  <?php echo @($employment_type=="Part Time")?'selected':''; ?>>Part Time</option>
                      <option  value='Contract' <?php echo @($employment_type=="Contract")?'selected':''; ?>>Contract</option>
                      <option  value='Freelance' <?php echo @($employment_type=="Freelance")?'selected':''; ?>>Freelance</option>
                  </select>
              	</div>
            	<div class="form-group">
                  <label for="experience_required"> Experience Required </label>
                  <input type="text" name='experience_required' class="form-control" id="experience_required" value="<?php echo @$job_post_detail[0]->experience_required; ?>">
                </div>
                <div class="form-group">
                  <label for="job_location"> Job Location</label>
                  <input type="text" name='job_location' required class="form-control" id="job_location" value="<?php echo @$job_post_detail[0]->job_location; ?>">
                </div>
              
                  
                  <div class="form-row">
                    <div class="form-group col-md-4">
                    	<label for="no_of_vacancies">No. of Vacancies</label>
                    	<input type="number" name="no_of_vacancies" class='form-control' placeholder="e.g. 2" value='<?php echo @$job_post_detail[0]->no_of_vacancies; ?>'>
                    </div>
                    <div class="form-group col-md-8">
                    	<label for="offered_salary">Offered Salary</label>
                    	<input type="text" name="offered_salary" class='form-control' value='<?php echo @$job_post_detail[0]->offered_salary; ?>'>
                    </div>
                	</div>
                  <div class="form-row">
                  <div class="form-group row col-md-6">
                    <label for="is_hot_job" class='col-sm-6 col-md-4 col-lg-3'>Hot Job?</label>
                    <input type='checkbox' name='is_hot_job' class='col-sm-6 col-md-2 col-lg-2' value='yes'>Yes
                  </div>
                  <div class="form-group row col-md-6">
                    <label for="is_instant_job" class='col-md-7'>Instant Job Placement?</label>
                    <input type='checkbox' name='is_instant_job' class='col-md-2' value='yes'>Yes
                    <div class='col-md-3'></div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="job_description">Job Description</label>
                    <textarea name="job_description" id="job_description" rows="7" placeholder="Place Your vacant post details" class="tiny_mce_field form-control"> <?php echo html_entity_decode(@$job_post_detail[0]->job_description); ?></textarea>
                  </div>
                  
                  <div class="form-group">
                    <?php  
                      @$s=strtotime(@$job_post_detail[0]->deadline);
                      @$deadline=date('Y-m-d',$s);
                    ?>
                    <label for="deadline">Deadline</label>
                    <input type="date" name="deadline" class='form-control' value="<?php echo @$deadline; ?>">
                  </div>
                  <div class="form-group">
                    <label for="applying_procedure">Applying Procedure</label>
                    <textarea rows="7" name="applying_procedure" class='tiny_mce_field form-control'> <?php echo html_entity_decode(@$job_post_detail[0]->applying_procedure); ?></textarea>
                  </div>
                  
                  <input type="text" name="job_post_id" value="<?php echo @$id;?>" hidden >
                  <div class='form-group'>
                    <button type="reset" class="btn btn-danger">Clear</button>
                    <button type="submit" class="btn btn-primary" style='margin-left: 15px;' name='submit' value="<?php echo ($act=='Add')?'add':'edit'; ?>"><?php echo ($act=="Add")?'Post':'Update'; ?></button>
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


