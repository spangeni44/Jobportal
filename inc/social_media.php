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
    <h3 >Social Media Accounts</h3>
  	<hr>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
        <?php flash(); ?>
        <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
        <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php flash(); ?>
        <div class="form-group row">
            <label for='social_media_name1' class="col-lg-4">Social Media Name:<font color='red'>*</font></label>
            <div class="col-lg-8 col-md-8">
            <input class="form-control" name='social_media_name1' type="text" placeholder="e.g. Linkedin, facebook">
            </div>
        </div>
        <div class='form-group row'>
            <label for="social_link1" class='col-lg-4 '>Link To Your Profile:<font color=red>*</font></label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <input type="text" required name='social_link1' class="form-control">
            </div>
        </div>

        <div id='next_social_media' hidden>
            <div class="form-group row">
                <label for='social_media_name2' class="col-lg-4">Social Media Name:<font color='red'>*</font></label>
                <div class="col-lg-8 col-md-8">
                <input class="form-control" name='social_media_name2' type="text" placeholder="e.g. Linkedin, facebook">
                </div>
            </div>
            <div class='form-group row'>
                <label for="social_link2" class='col-lg-4 '>Link To Your Profile:<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" required name='social_link2' class="form-control">
                </div>
            </div>
        </div>

        <div class='form-group'>
          <a name='add_another_experience' href='' class='remove_text_decoration'><i class='fa fa-plus-circle'></i>Add Another Experience</a>
        </div>
        <div class="form-group">
          <label class="col-md-4 "></label>
          <div class="col-md-8">
            <button type='submit' name='btn_social_media' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>