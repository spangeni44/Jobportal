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
    <h3 >Other Information</h3>
  	<hr>
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style='overflow:auto;'>
    <?php flash(); ?>
    <form class="form-horizontal" role="form" method='post' action='admin/process/job_seeker_resume.php' enctype="multipart/form-data">
      <!-- edit form column -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php flash(); ?>
        <div class='form-group row'>
          <p class='form-label'> Please check yes for all matching conditions.</p>
        </div>
        <div class="form-group row">
          <label class="col-md-10 col-lg-10">I am willing to travel outside my current resident</label>
          <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2'>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch1" name='travel_outside' value='yes' checked>
              <label class="custom-control-label" for="customSwitch1">Yes</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class='col-md-10 col-lg-10'>I have two wheeler riding license</label>
          <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2'>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id='customSwitch2' name='two_wheeler_license' value='yes' checked>
              <label class="custom-control-label" for="customSwitch2">Yes</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class='col-md-10 col-lg-10'>I have my own two wheeler</label>
          <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2'>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch3" name='own_two_wheeler' value='yes' checked>
              <label class="custom-control-label" for="customSwitch3">Yes</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class='col-md-10 col-lg-10'>I have four wheeler riding license</label>
          <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2'>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch4" name='four_wheeler_license' value='yes' checked>
              <label class="custom-control-label" for="customSwitch4">Yes</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class='col-md-10 col-lg-10'>I have my own four wheeler</label>
          <div class='col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2'>
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch5" name='own_four_wheeler' value='yes' checked>
              <label class="custom-control-label" for="customSwitch5">Yes</label>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-md-4"></label>
          <div class="col-md-8">
            <button type='submit' name='btn_other_info' value="<?php echo ($act=='Add')?'add':'edit'; ?>" class="btn btn-primary">Save</button>
            <span></span>
            <input type="reset" class="btn btn-danger" value="Cancel">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</div>