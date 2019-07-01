<style>
  .padding-0{
    padding-left:0;
    padding-right:0;
  }
 
</style>

<div class="container-fluid padding-0">
    <h3 >References</h3>
  	<hr>
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
    <?php flash(); ?>
    <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
      <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 personal-info">
        <?php flash(); ?>
        <div class="form-group row">
            <label for='reference_name1' class="col-lg-4">Reference's Name<font color='red'>*</font></label>
            <div class="col-lg-8 col-md-8">
            <input class="form-control" name='reference_name1' type="text" >
            </div>
        </div>
        <div class='form-group row'>
            <label for="job_title1" class='col-lg-4 '>Job Title:<font color=red>*</font></label>
            <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                <input type="text" required name='job_title1' class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="organization_name1" class='col-lg-4'>Organization Name <font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8'>
                <input type="text" name='organization_name1' class="form-control" placeholder="e.g. 1 year" >
            </div>
        </div>
        <div class="form-group">
            <label for="email1" class='col-lg-4 '>Email: <font color=red>*</font></label>
            <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                <input type='email' class='form-control'  name='email1'>
            </div>
        </div>
        <div class="form-group">
            <label for="contact1" class='col-lg-4 '>Contact Number:<font color=red>*</font></label>
            <div class='col-sm-4 col-md-4 col-lg-4 col-xs-4'>
                <input type='text' class='form-control'  name='contact1' plceholder='Personal Contact'>
            </div>
            <div class='col-sm-4 col-md-4 col-lg-4 col-xs-4'>
                <input type='text' class='form-control' name='contact_another1' placeholder='Office Contact'>
            </div>
        </div>
        




        <div id='training_second' hidden>
            <div class="form-group row">
                <label for='reference_name1' class="col-lg-4">Reference's Name<font color='red'>*</font></label>
                <div class="col-lg-8 col-md-8">
                <input class="form-control" name='reference_name1' type="text" >
                </div>
            </div>
            <div class='form-group row'>
                <label for="job_title1" class='col-lg-4 '>Job Title:<font color=red>*</font></label>
                <div class='col-xs-8 col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" required name='job_title1' class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="organization_name1" class='col-lg-4'>Organization Name <font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8'>
                    <input type="text" name='organization_name1' class="form-control" placeholder="e.g. 1 year" >
                </div>
            </div>
            <div class="form-group">
                <label for="email1" class='col-lg-4 '>Email: <font color=red>*</font></label>
                <div class='col-sm-8 col-md-8 col-lg-8 col-xs-8'>
                    <input type='email' class='form-control'  name='email1'>
                </div>
            </div>
            <div class="form-group">
                <label for="contact1" class='col-lg-4 '>Contact Number:<font color=red>*</font></label>
                <div class='col-sm-4 col-md-4 col-lg-4 col-xs-4'>
                    <input type='text' class='form-control'  name='contact1' plceholder='Personal Contact'>
                </div>
                <div class='col-sm-4 col-md-4 col-lg-4 col-xs-4'>
                    <input type='text' class='form-control' name='contact_another1' placeholder='Office Contact'>
                </div>
            </div>

        </div> 


        <div class='form-group'>
          <a name='add_another_reference' href='' class='remove_text_decoration'><i class='fa fa-plus-circle'></i>Add Another Reference</a>
        </div>
        <div class="form-group">
          <label class="col-md-4 "></label>
          <div class="col-md-8">
            <button type='submit' name='btn_references' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>