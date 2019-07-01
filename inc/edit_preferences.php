<style>
    .padding-0{
    padding-left:0;
    padding-right:0;
  }
</style>

<div class='container-fluid padding-0'>
    <h3>Edit Preferences</h3>
  	<hr>
    <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php flash(); ?>
        <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php'>
            <div class="form-group">
                <label for="job_level" class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>Job Level<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <?php @$job_level=$job_seeker_detail[0]->job_level; ?>
                    <select name="job_level" required class='form-control'>
                        <option  <?php echo @(empty($job_level))?'selected':''; ?> > --Choose One-- </option>
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
                <label for="job_category"  class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>Job Category<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <select id="job_category" required name='job_category' class="form-control">
                        <option <?php echo @(empty($job_cat))?'selected':''; ?> >--Choose One Category--</option>
                        <?php
                            foreach($job_categories as $job_category){
                        ?>
                        <option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="employment_type" class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>Employment Type<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <select id="employment_type" required name='employment_type' class="form-control">
                        <option <?php echo @(empty($employment_type))?'selected':''; ?> >--Choose One--</option>
                        <?php @$employment_type=$job_post_detail[0]->employment_type; ?>
                        <option  value='Any' <?php echo @($employment_type=="Any")?'selected':''; ?>>Any</option>                            
                        <option  value='Full Time' <?php echo @($employment_type=="Full Time")?'selected':''; ?>>Full Time</option>
                        <option  value='Part Time'  <?php echo @($employment_type=="Part Time")?'selected':''; ?>>Part Time</option>
                        <option  value='Contract' <?php echo @($employment_type=="Contract")?'selected':''; ?>>Contract</option>
                        <option  value='Freelance' <?php echo @($employment_type=="Freelance")?'selected':''; ?>>Freelance</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="specialization_and_skills" class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>Specializations and Skills<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <input type="text" name='specialization_and_skills' class="form-control" placeholder="Your main courses and abilities e.g. Accounts, Computing, Website Development" value='<?php echo @$job_seeker_detail[0]->current_address ?>'>
                </div>
            </div>
            <div class="form-group">
                <label for="career_objective" class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>Career Objective</label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <textarea name='career_objective' rows='5' class="form-control" placeholder="Career Objective Summary"'></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4"></label>
                <div class="col-md-8">
                    <button type='submit' name='btn_preferences' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
                    <span></span>
                    <input type="reset" class="btn btn-danger" value="Cancel">
                </div>
            </div>
        </form>
    </div>
</div>
