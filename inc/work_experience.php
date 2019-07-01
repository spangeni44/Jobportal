<style>
  .padding-0{
    padding-left:0;
    padding-right:0;
  }
  .red_font{
    color:red;
  }
</style>

<div class="container-fluid padding-0">
    <h3 >Work Experience</h3>
  	<hr>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
        <?php flash(); ?>
        <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
        <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 personal-info">
        <?php flash(); ?>
        <div class="form-group row">
            <label for='organization_name1' class="col-lg-4">Organization Name:<font color='red'>*</font></label>
            <div class="col-lg-8 col-md-8">
            <input class="form-control" name='organization_name1' type="text" placeholder="e.g. Bachelor">
            </div>
        </div>
        <div class='form-group row'>
            <label for="nature_of_organization1" class='col-lg-4 '>Nature of Organization:<font color=red>*</font></label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <input type="text" required name='nature_of_organization1' class="form-control" placeholder='e.g. Telecommunication, Travel '>
            </div>
        </div>
        <div class="form-group">
            <label for="job_location1" class='col-lg-4'>Job Location:<font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8'>
                <input type="text" name='job_location1' class="form-control" placeholder="e.g. Tribhuvan University" >
            </div>
        </div>
        <div class="form-group">
            <label for="job_title1" class='col-lg-4 '>Job Title:<font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="text" name='job_title1' class="form-control" id="job_title"  value=''>
            </div>
        </div>
        <div class="form-group">
            <?php
                $category=new Category();
                $job_categories=$category->getAllCategories();  
                @$job_cat=$job_post_detail[0]->job_category;
                ?>
            <label for="job_category"  class='col-lg-4'>Job Category<font color=red>*</font></label>
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
                <label for="job_level1" class='col-lg-4'>Job Level<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <?php @$job_level=$job_seeker_detail[0]->job_level; ?>
                    <select name="job_level1" required class='form-control'>
                        <option  <?php echo @(empty($job_level))?'selected':''; ?> > --Choose One -- </option>
                        <option value="Entry" <?php echo @($job_level=="Entry")?'selected':''; ?> >Entry Level</option>
                        <option value="Mid" <?php echo @($job_level=="Mid")?'selected':''; ?>>Mid Level</option>
                        <option value="Senior" <?php echo @($job_level=="Senior")?'selected':''; ?>>Senior Level</option>
                    </select>
                </div>
            </div>
        <div class="form-group">
            <label for="Currently_running1" class='col-lg-4'>Currently Working here?</label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="checkbox" name='Currently_running1' id="currently_working1" value=''>
            </div>
        </div>
        <div class="form-group">
          <?php  
            // @$s=strtotime(@$job_seeker_detail[0]->dob);
            // @$dob=date('Y-m-d',$s);
          ?>
          <label for="start_date1"class='col-lg-4 '>Start Date:<font color=red>*</font></label>
          <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="month" name='start_date1' required class="form-control" id="start_date1">
          </div>
        </div>
        <div class="form-group">
          <label for="end_date1" class='col-lg-4 '>End Date:<font color=red>*</font></label>
          <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
          <input type="month" name='end_date1' required class="form-control" id="end_date1">                     
          </div>
        </div>
        <div class="form-group">
            <label for="duties_and_responsibilities" class='col-lg-4'> Duties and Responsibilities: </label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <textarea rows='5' class='form-control tiny_mce_field'  name='duties_and_responsibilities' id='duties_and_responsibilities'><?php echo @$job_post_detail[0]->qualification; ?></textarea>
                <p>Fill your actual duties and responsibilities, along with your major achievements to highlight yourself among other recruiters. </p>
            </div>
        </div>
        






        <div id='next_work_experience' hidden>
            <div class="form-group row">
                <label for='organization_name2' class="col-lg-4">Organization Name:<font color='red'>*</font></label>
                <div class="col-lg-8 col-md-8">
                <input class="form-control" name='organization_name2' type="text" placeholder="e.g. Bachelor">
                </div>
            </div>
            <div class='form-group row'>
                <label for="nature_of_organization2" class='col-lg-4 '>Nature of Organization:<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" required name='nature_of_organization2' class="form-control" placeholder='e.g. Telecommunication, Travel '>
                </div>
            </div>
            <div class="form-group">
                <label for="job_location2" class='col-lg-4'>Job Location:<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" name='job_location2' class="form-control" placeholder="e.g. Tribhuvan University" >
                </div>
            </div>
            <div class="form-group">
                <label for="job_title2" class='col-lg-4 '>Job Title:<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <input type="text" name='job_title2' class="form-control" id="job_title2"  value=''>
                </div>
            </div>
            <div class="form-group">
                <?php
                    $category=new Category();
                    $job_categories=$category->getAllCategories();  
                    @$job_cat=$job_post_detail[0]->job_category;
                    ?>
                <label for="job_category2"  class='col-lg-4'>Job Category<font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <select id="job_category" required name='job_category2' class="form-control">
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
                    <label for="job_level2" class='col-lg-4'>Job Level<font color=red>*</font></label>
                    <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                        <?php @$job_level=$job_seeker_detail[0]->job_level; ?>
                        <select name="job_level2" required class='form-control'>
                            <option  <?php echo @(empty($job_level))?'selected':''; ?> > --Choose One -- </option>
                            <option value="Entry" <?php echo @($job_level=="Entry")?'selected':''; ?> >Entry Level</option>
                            <option value="Mid" <?php echo @($job_level=="Mid")?'selected':''; ?>>Mid Level</option>
                            <option value="Senior" <?php echo @($job_level=="Senior")?'selected':''; ?>>Senior Level</option>
                        </select>
                    </div>
                </div>
            <div class="form-group">
                <label for="Currently_running2" class='col-lg-4'>Currently Working here?</label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="checkbox" name='Currently_running2' id="currently_working1" value=''>
                </div>
            </div>
            <div class="form-group">
            <?php  
                // @$s=strtotime(@$job_seeker_detail[0]->dob);
                // @$dob=date('Y-m-d',$s);
            ?>
            <label for="start_date2"class='col-lg-4 '>Start Date:<font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="month" name='start_date2' required class="form-control" id="start_date2">
            </div>
            </div>
            <div class="form-group">
            <label for="end_date2" class='col-lg-4 '>End Date:<font color=red>*</font></label>
            <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
            <input type="month" name='end_date2' required class="form-control" id="end_date2">                     
            </div>
            </div>
            <div class="form-group">
                <label for="duties_and_responsibilities2" class='col-lg-4'> Duties and Responsibilities: </label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <textarea rows='5' class='form-control tiny_mce_field'  name='duties_and_responsibilities2' id='duties_and_responsibilities2'><?php echo @$job_post_detail[0]->qualification; ?></textarea>
                    <p>Fill your actual duties and responsibilities, along with your major achievements to highlight yourself among other recruiters. </p>
                </div>
            </div>
        </div>

        <div class='form-group'>
          <a name='add_another_experience' href='' class='remove_text_decoration'><i class='fa fa-plus-circle'></i>Add Another Experience</a>
        </div>
        <div class="form-group">
          <label class="col-md-4 "></label>
          <div class="col-md-8">
            <button type='submit' name='btn_work_experience' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>