<?php 
    require_once 'inc/header.php';
    require_once 'inc/navbar.php';
    // require_once 'inc/checklogin.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/User.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/Category.php';
    if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
        redirect('./', 'warning', 'Please Login First to Post a Job !!');
    }
    else{
?>
<?php
$_SESSION['front_end']="Yes";
$act="Add";
$job_post=new JobPost();
$user=new User();
if(isset($_GET['id']) && $_GET['id']!=null){
        /*Update*/
        $act = "Update";
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect('./', 'error', 'Invalid Job id.');
        }
        $job_post_detail = $job_post->getJobPostById($id);

        if($job_post_detail){
          $user_detail=$user->getUserById($job_post_detail[0]->added_by);
          
        }
        if(!$job_post_detail){
            redirect('./', 'error', 'Job Post not found or has been deleted.');
        }
    }
?>
 <div class="clear">
</div>
      <div class="row">
        <div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3  col-xl-3"></div>
          <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 col-xs-7">
            <div class="tile"  style='background-color:lightblue; padding:15px;'>
              <h3 class="tile-title left"> Job Post <?php echo $act; ?></h3>
              <hr>
              <div class="tile-body">
              <?php 
                    flash();                   
                  ?>
                <form method="post" class='form' action="admin/process/job_post.php" enctype="multipart/form-data">
                <?php 
                  if($_SESSION['role']=='Admin'){
                        ?>
                    <div class='form-group'>
                    <label for="company_name"> Company Name <font color=red>*</font></label>
                      <input type="text" required name='company_name' placeholder="e.g.Eastlink Technology" class="form-control" id="company_name" value='<?php echo @$job_post_detail[0]->position ?>'>
                    </div>
                <?php
                  }
                  ?>
                <div class="form-row">
                  <div class='form-group col-md-6'>
                      <label for="position"> Vacant Position <font color=red>*</font></label>
                      <input type="text" required name='position' placeholder="e.g. IT Officer" class="form-control" id="position" value='<?php echo @$job_post_detail[0]->position ?>'>
                  </div>
                  <div class="form-group col-md-6">
                  <label for="job_level">Job Level </label>
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
                      foreach($job_categories as $job_category){
                      	?>
                      	<option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                      	<?php } ?>
                    </select>
                  </div>
                <div class="form-group">
                	<?php @$education_level=$job_post_detail[0]->education_level; ?>
                  <label for="education_level">Eduction Level </label>
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
                  <label for="job_location"> Job Location <font color=red>*</font></label>
                  <input type="text" name='job_location' required class="form-control" id="job_location" value="<?php echo @$job_post_detail[0]->job_location; ?>">
                </div>
                 
                  <div class="form-row">
                    <div class="form-group col-md-4">
                    	<label for="no_of_vacancies">No. of Vacancies <font color=red>*</font></label>
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
                    <input type='checkbox' name='is_hot_job' class='col-sm-6 col-md-2 col-lg-2' <?php echo (@$job_post_detail[0]->is_hot_job=='yes')?'checked':'' ?> value='yes'>Yes
                  </div>
                  <div class="form-group row col-md-6">
                    <label for="is_instant_job" class='col-sm-6 col-md-5 col-lg-5'>Instant Job Placement?</label>
                    <input type='checkbox' name='is_instant_job' class='col-sm-3 col-md-4 col-lg-4' <?php echo (@$job_post_detail[0]->is_instant_job=='yes')?'checked':'' ?> value='yes'>Yes
                    <div class='col-md-3'></div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="job_description">Job Description</label>
                    <textarea name="job_description" id="job_description" rows="7" placeholder="Place Your vacant post details" class="tiny_mce_field form-control"> <?php echo html_entity_decode(@$job_post_detail[0]->job_description); ?></textarea>
                  </div>
                     <div class="form-group">
                     <?php  @$s=strtotime(@$job_post_detail[0]->deadline);
                          @$deadline=date('Y-m-d',$s);
                         ?>
                    	<label for="deadline">Deadline <font color=red>*</font></label>
                    	<input type="date" name="deadline" required class='form-control' value="<?php echo @$deadline;?>">
                    </div>
                    <div class="form-group">
                    	<label for="applying_procedure">Applying Procedure</label>
                    	<textarea rows="7" name="applying_procedure" class='tiny_mce_field form-control'> <?php echo html_entity_decode(@$job_post_detail[0]->applying_procedure); ?></textarea>
                    </div>
                    <div class='form-group'>
                      <?php if($_SESSION['role']=='Admin'){
                        ?>
                      <label for="source">Source</label>
                      
                      <select id="source" name='source' class="form-control">
                      <option <?php echo @(empty($source))?'selected':''; ?> >--Choose Source--</option>
                      <?php @$source=$job_post_detail[0]->source; ?>
                      <option  value='Newspaper' <?php echo @($source=="Newspaper")?'selected':''; ?>>Newspaper</option>
                      <option  value='Social Media'  <?php echo @($source=="Social Media")?'selected':''; ?>>Social Media</option>
                      <option  value='Company Website' <?php echo @($source=="Company Website")?'selected':''; ?>>Company Website</option>
                      <option  value='Others' <?php echo @($source=="Others")?'selected':''; ?>>Others</option>
                  </select>
                    	<input type="text" name="source" class='form-control' value='<?php echo @$job_post_detail[0]->source; ?>'>
                    </div>
                    <?php
                        }
                    ?>
                 <input type="text" name="job_post_id" value="<?php echo @$id;?>" hidden >
                <div class='form-group'>
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary" style='margin-left: 15px;' name='submit' value="<?php echo ($act=='Add')?'add':'edit'; ?>"><?php echo ($act=="Add")?'Post':'Update'; ?></button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class=col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3></div>
    <?php
        }
    ?>
<?php
  include 'inc/footer.php';
?>
