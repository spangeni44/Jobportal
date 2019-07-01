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
    <h3 >Training</h3>
  	<hr>
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
    <?php flash(); ?>
    <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
      <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 personal-info">
        <?php flash(); ?>
        <div class="form-group row">
            <label for='name_of_course1' class="col-lg-4">Name of Course<font color='red'>*</font></label>
            <div class="col-lg-8 col-md-8">
            <input class="form-control" name='name_of_course1' type="text" placeholder="e.g. PHP with Laravel, Tally ERP 9">
            </div>
        </div>
        <div class='form-group row'>
            <label for="institution_name1" class='col-lg-4 '>Institution Name:<font color=red>*</font></label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <input type="text" required name='institution_name1' class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="duration1" class='col-lg-4'>Duration <font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8'>
                <input type="text" name='duration1' class="form-control" placeholder="e.g. 1 year" >
            </div>
        </div>
        <div class="form-group">
            <label for="completion_date1" class='col-lg-4 '>Completion Date: <font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type='month' class='form-control'  name='completion_date1'>
            </div>
        </div>
        
        <!-- <div class="form-group">
            <label for="Currently_running1" class='col-lg-4'>Currently Running?</label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="checkbox" name='Currently_running1' id="currently_running1" value=''>
            </div>
        </div> -->
        






        <div id='training_second' hidden>
            <div class="form-group row">
                <label for='name_of_course' class="col-lg-4">Name of Course<font color='red'>*</font></label>
                <div class="col-lg-8 col-md-8">
                <input class="form-control" name='name_of_course' type="text" placeholder="e.g. Bachelor">
                </div>
            </div>
            <div class='form-group row'>
                <label for="institution_name1" class='col-lg-4 '>Institution Name:<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" required name='institution_name1' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="duration1" class='col-lg-4'>Duration <font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" name='duration1' class="form-control" placeholder="e.g. 1 year" >
                </div>
            </div>
            <div class="form-group">
                <label for="completion_date2" class='col-lg-4 '>Completion Date: <font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <input type='month' class='form-control'  name='completion_date2'>
                </div>
            </div>

        </div> 





        <div class='form-group'>
          <a name='add_another_training' href='' class='remove_text_decoration'><i class='fa fa-plus-circle'></i>Add Another Training</a>
        </div>
        <div class="form-group">
          <label class="col-md-4 "></label>
          <div class="col-md-8">
            <button type='submit' name='btn_training' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>