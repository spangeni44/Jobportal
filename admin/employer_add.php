<?php
include 'inc/header.php';
require_once 'inc/sidebar_menu.php';
require_once 'inc/checklogin.php';
include_once 'class/Database.php';
include_once 'class/JobProvider.php';
include_once 'class/Category.php';
include_once 'class/User.php';


unset($_SESSION['front_end']);
$act="Add";
$user=new User();
$job_provider=new JobProvider();

if(isset($_GET['id']) && $_GET['id']!=null){
        /*Update*/
        $act = "Update";
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect('job_provider_view.php', 'error', 'Invalid Job Provider id.');
        }
        $job_provider_detail = $job_provider->getJobProviderById($id);

        if($job_provider_detail){
          $user_detail=$user->getUserById($job_provider_detail[0]->user_id);
          // debug($user_detail,true);
        }
        if(!$job_provider_detail){
            redirect('job_provider_view.php', 'error', 'Profile not found or has been deleted.');
        }
    }
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Job Portal Nepal</h1>
          <p>Employer</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="tile">
              <h3 class="tile-title"> Employer <?php echo $act; ?></h3>
              <div class="tile-body">
                <form method="post" action="process/job_provider_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="company_name">Company Name <font color=red>*</font></label>
                        <input type="text" name='company_name' required class="form-control" id="company_name" placeholder="e.g. Eastlink Technology" value='<?php echo @$user_detail[0]->full_name; ?>'>
                      </div>
                        <div class="form-group">
                          <label for="rg_email">Company Official Email <font color=red>*</font></label>
                              <!-- <div class="input-group mb-1 mr-sm-1">
                              <div class="input-group-prepend">
                                <div class="input-group-text">@</div> 
                            </div> -->
                            <input type="email" name='rg_email' required class="form-control" id="rg_email" placeholder="e.g. user@example.com" value='<?php echo @$user_detail[0]->email; ?>'>
                          </div>
                          <?php if($act=="Add"){ ?>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="rg_password">Password <font color=red>*</font></label>
                          <input type="password" required name='rg_password' class="form-control" id="rg_password" placeholder="Password">
                        </div>

                        <div class='form-group col-md-6'>
                          <label for="rg_password">Retype Password <font color=red>*</font></label>
                          <input type="password" required name='retype_password' class="form-control" id="retype_password" placeholder="Re-Type Password">
                        </div>
                       </div>
                        <?php } ?>
                        <div class='form-row'>
                        <div class='form-group col-md-5'>
                            <label for="phone">Phone</label>
                            <input type="tel" name='phone' class="form-control" id="phone" value='<?php echo @$job_provider_detail[0]->phone; ?>'>
                        </div>
                      <div class="form-group col-md-7">
                        <label for="company_address">Company Address <font color=red>*</font></label>
                        <input type="text" name='company_address' class="form-control" id="company_address" placeholder="City,Street,Floor" value='<?php echo @$job_provider_detail[0]->company_address; ?>'>
                      </div>
                    </div>
                    <div class="form-group">
                          <label for="postal_code">Postal Code</label>
                          <input type="text" name='postal_code' class="form-control" id="postal_code" value='<?php echo @$job_provider_detail[0]->postal_code; ?>'>
                    </div>
                    
                    <div class="form-group">
                    <?php  @$s=strtotime(@$job_provider_detail[0]->date_of_establishment);
                        @$date_of_establishment=date('Y-m-d',$s);
                        ?>
                    <label for="phone">Date of Establishment</label>
                    <input type="date" name='date_of_establishment' class="form-control" id="date_of_establishment" max="<?php echo date('Y-m-d'); ?>"  value='<?php echo @$date_of_establishment; ?>'>
                    </div>
                    <div class="form-group">
                	<?php
                		$category=new Category();
                        @$job_categories=$category->getAllCategories();
                        @$job_cat=$job_provider_detail[0]->company_field;
                  		?>
                    <label for="job_category">Company Field</label>
                     <select id="job_category" name='job_category' class="form-control">
                      <option <?php echo @(empty($job_cat))?'selected':''; ?> >--Choose One Field--</option>
                     <?php
                      foreach($job_categories as $job_category){
                      	?>
                      	<option  value='<?php echo $job_category->id; ?>' <?php echo @($job_cat==$job_category->id)?'selected':''; ?>><?php echo @$job_category->title; ?></option>
                      	<?php } ?>
                    </select>
                  </div>
                        <div class="form-group">
                        <?php @$company_type=$job_provider_detail[0]->compny_type; ?>
                          <label for="company_type">Company Type <font color=red>*</font></label>
                          <select name="company_type" class='form-control'>
                            <option <?php echo ($company_type)?'':'selected'; ?>>--Type of Company--</option>
                            <option value="Private" <?php echo ($company_type=='Private')?'selected':''; ?>>Private</option>
                            <option value="Government" <?php echo ($company_type=='Government')?'selected':'';?>>Government</option>
                            <option value="NGO" <?php echo ($company_type=='NGO')?'selected':'';?>>NGO</option>
                            <option value="INGO" <?php echo ($company_type=='INGO')?'selected':'';?>>INGO</option>
                          </select>
                        </div>
                        
                         <div class="form-group">
                        <label for="compnay_description">Company Description <font color='red'>*</font></label>
                        <textarea rows=7 name="company_description" class="tiny_mce_field form-control" id="compnay_description" placeholder="short description about company" ><?php echo @$job_provider_detail[0]->company_description; ?></textarea> 
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <label for="">Company Logo</label>
                            </div>
                              <div class='row'>
                              <div class="custom-file col-md-6">
                              <label class="custom-file-label" for="customFile">Choose Image</label>
                              <input type="file" class="custom-file-input" accept="image/*" name='rg_image' id="rg_image">
                               <p class='notice' style="font-size:12px;">Note: Image size should not be greater than 100 Kb.</p>
                              </div>

                              <div class='col-md-6'>
                                 <?php if($act=='Update'){ ?>
                                <img src="<?php echo USER_IMAGE_URL.$user_detail[0]->user_image; ?> " alt="company logo" class='thumbnail thumbnail-responsive' width='60px' height='60px'>
                                <a href="admin/process/unlink_file.php?fname='<?php echo @$user_detail[0]->user_image;?>'" title=""> <i class='fa fa-trash'></i></a>
                              </div>
                              </div>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      <div class='form-group'>
                        <input type="text" name="job_provider_id" value="<?php echo @$id;?>" hidden >
                        <button type="reset" class="btn btn-danger">Clear</button>
                        <button type="submit" class="btn btn-primary" name='submit' value="<?php echo ($act=='Add')?'add':'edit'; ?>" style='margin-left: 15px;'><?php echo ($act=="Add")?'Register':'Update';?></button>
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