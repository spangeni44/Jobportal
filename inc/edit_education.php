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
    <h3 >Education</h3>
  	<hr>
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
    <?php flash(); ?>
    <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
      <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 personal-info">
        <?php flash(); ?>
        <div class="form-group row">
            <label for='degree1' class="col-lg-4">Degree<font color='red'>*</font></label>
            <div class="col-lg-8 col-md-8">
            <input class="form-control" name='degree1' type="text" placeholder="e.g. Bachelor">
            </div>
        </div>
        <div class='form-group row'>
            <label for="eduction_program1" class='col-lg-4 '>Education Program<font color=red>*</font></label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <input type="text" required name='education_program1' class="form-control" placeholder='e.g. BBA'>
            </div>
        </div>
        <div class="form-group">
            <label for="education_board1" class='col-lg-4'>Education Board<font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8'>
                <input type="text" name='education_board1' class="form-control" placeholder="e.g. Tribhuvan University" >
            </div>
        </div>
        <div class="form-group">
            <label for="name_of_institute1" class='col-lg-4 '>Name of Institute<font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="text" name='name_of_institute1' class="form-control" id="name_of_institute1"  value=''>
            </div>
        </div>
        <div class="form-group">
            <label for="Currently_running1" class='col-lg-4'>Currently Running?</label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="checkbox" name='Currently_running1' id="currently_running1" value=''>
            </div>
        </div>
        <div class="form-group">
          <?php  
            // @$s=strtotime(@$job_seeker_detail[0]->dob);
            // @$dob=date('Y-m-d',$s);
          ?>
          <label for="start_date1"class='col-lg-4 '>Start Date</label>
          <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="month" name='start_date1' required class="form-control" id="start_date1">
          </div>
        </div>
        <div class="form-group">
          <label for="graduation_date1" class='col-lg-4 '>Graduation Date</label>
          <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
          <input type="month" name='graduation_date1' required class="form-control" id="graduation_date1">                     
          </div>
        </div>
        <!-- <div class="form-group">
          <label for="marks_secured" class='col-lg-4 '>Percentage/CGPA:</label>
          <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
          <input type="text" name='marks_secured' required class="form-control" id="marks_secured">                  
          </div>
        </div> -->
        






        <div id='education_second' hidden>
          <div class="form-group row">
              <label for='degree1' class="col-lg-4">Degree<font color='red'>*</font></label>
              <div class="col-lg-8 col-md-8">
              <input class="form-control" name='degree1' type="text" placeholder="e.g. Bachelor">
              </div>
          </div>
          <div class='form-group row'>
              <label for="eduction_program1" class='col-lg-4 '>Education Program:<font color=red>*</font></label>
              <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                  <input type="text" required name='education_program1' class="form-control" placeholder='e.g. BBA'>
              </div>
          </div>
          <div class="form-group">
              <label for="education_board1" class='col-lg-4'>Education Board <font color=red>*</font></label>
              <div class='col-sm-8 col-md-8 col-lg-8'>
                  <input type="text" name='education_board1' class="form-control" placeholder="e.g. Tribhuvan University" >
              </div>
          </div>
          <div class="form-group">
              <label for="name_of_institute1" class='col-lg-4 '>Name of Institute: <font color=red>*</font></label>
              <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                  <input type="text" name='name_of_institute1' class="form-control" id="name_of_institute1"  value=''>
              </div>
          </div>
          <div class="form-group">
              <label for="Currently_running1" class='col-lg-4'>Currently Running?</label>
              <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="checkbox" name='Currently_running1' id="currently_running1" value=''>
              </div>
          </div>
          <div class="form-group">
            <?php  
              // @$s=strtotime(@$job_seeker_detail[0]->dob);
              // @$dob=date('Y-m-d',$s);
            ?>
            <label for="start_date2"class='col-lg-4 '>Start Date</label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type="month" name='start_date2' required class="form-control" id="start_date2">
            </div>
          </div>
          <div class="form-group">
            <label for="graduation_date2" class='col-lg-4 '>Graduation Date:</label>
            <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
              <input type="month" name='graduation_date2' required class="form-control" id="graduation_date2">                     
            </div>
          </div>
        </div>
          <!-- <div class="form-group">
            <label for="marks_secured" class='col-lg-4 '>Percentage/CGPA:</label>
            <div style="font-weight: normal; font-size: 15px;" class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
            <input type="text" name='marks_secured' required class="form-control" id="marks_secured">                  
            </div>
            </div>
          </div> -->




        <div class='form-group'>
          <a name='add_another_education' href='' class='remove_text_decoration'><i class='fa fa-plus-circle'></i>Add Another Education</a>
        </div>
        <div class="form-group">
          <label class="col-md-4 "></label>
          <div class="col-md-8">
            <button type='submit' name='btn_education' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary"><?php echo ($act=="Add")?'Save':'Update'; ?></button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>