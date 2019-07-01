<?php 
require_once 'inc/header.php';
require_once 'inc/navbar.php';
include_once 'admin/class/Database.php';
include_once 'admin/class/Category.php';	
include_once 'admin/class/JobProvider.php';
include_once 'admin/class/User.php';
include_once 'admin/class/JobSeeker.php';
include_once 'admin/class/JobPost.php';
$_SESSION['front_end']='Yes';
$act="Add";
$user=new User();
$job_provider=new JobProvider();

if(isset($_GET['id']) && $_GET['id']!=null){
        /*Update*/
        $act = "Update";
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect('/', 'error', 'Invalid Job Provider id.');
        }
        $job_provider_detail = $job_provider->getJobProviderById($id);

        if($job_provider_detail){
          $user_detail=$user->getUserById($job_provider_detail[0]->user_id);
        }
        if(!$job_provider_detail){
            redirect('job_provider_view.php', 'error', 'Profile not found or has been deleted.');
        }
    }
?>
<div class="tile">
    <h3 class="tile-title text-center"> Job Provider <?php echo $act; ?></h3>
    <!-- <div class="tile-body"> -->
    <div class='col-xs-0 col-sm-0 col-md-3 col-lg-3 col-xl-3'>
    </div> 
        <div class='container col-xs-12 col-sm-12 col-md-7 col-lg-7' style='background-color:white; font-weight: bold; padding:10px; margin-top: 10px;'>
            <form class='form' method='post' action='admin/process/job_provider_add.php'>
                <?php flash(); ?>
                <div class="form-group">
                    <label for="company_name">Company Name <font color=red>*</font></label>
                    <input type="text" name='company_name' required class="form-control" id="company_name" placeholder="e.g. Eastlink Technology">
                </div>
                <div class="form-group row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="rg_email">Company Official Email <font color=red>*</font></label>
                        <input type="email" name='rg_email' required class="form-control" id="rg_email" placeholder="e.g. user@example.com">
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="rg_password">Password <font color=red>*</font></label>
                        <input type="password" required name='rg_password' class="form-control" id="rg_password" placeholder="Password">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <label for="retype_password">Retype Password <font color=red>*</font></label>
                        <input type="password" required name='retype_password' class="form-control" id="retype_password" placeholder="Re-Type Password">
                    </div>
                    <div class='form-group col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                        <label for="phone">Phone</label>
                        <input type="number" required name='phone' class="form-control" id="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_address">Company Address <font color=red>*</font></label>
                    <input type="text" name='company_address' class="form-control" id="company_address" placeholder="City,Street,Floor">
                </div>
                <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" name='postal_code' class="form-control" id="postal_code">
                </div>
                <div class="form-group">
                    <label for="phone">Date of Establishment</label>
                    <input type="date" name='date_of_establishment' class="form-control" id="date_of_establishment">
                </div>
                <div class="form-group">
                    <?php $category=new Category();
                    $category_details=$category->getAllCategories();
                    ?>
                    <label for="job_category">Company Field <font color=red>*</font></label>
                    <select id="job_category" name='job_category' class="form-control">
                        <option disabled selected value='0'>--Choose One Fields--</option>
                        <?php foreach($category_details as $category_detail){
                        ?>
                        <option value='<?php echo $category_detail->id;  ?>'><?php echo $category_detail->title; ?> </option>
                        <?php 
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="company_type">Company Type <font color=red>*</font></label>
                <select name="company_type" class='form-control'>
                    <option value="Private">Private</option>
                    <option value="Government">Government</option>
                    <option value="NGO">NGO</option>
                    <option value="INGO">INGO</option>
                </select>
                </div>
                <div class="form-group">
                                <label for="compnay_description">Company Description <font color='red'>*</font></label>
                                <textarea rows=7 name="company_description" class="tiny_mce_field form-control" id="compnay_description" placeholder="short description about company" ><?php echo @$job_provider_detail[0]->company_description; ?></textarea> 
                            </div>
                <div class="form-group">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label for="">Company Logo</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                        <input type="file" class="custom-file-input" accept="image/*" name='rg_image' id="rg_image">
                        <p class='' style="font-size:12px;">Note: Image size should not be greater than 100 Kb.</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class='form-group'>
                <input type="text" name="job_provider_id" value="<?php echo @$id;?>" hidden >
                <button type="reset" class="btn btn-danger">Clear</button>
                <button type="submit" class="btn btn-primary" name='submit' value="<?php echo ($act=='Add')?'add':'edit'; ?>" style='margin-left: 15px;'><?php echo ($act=="Add")?'Register':'Update'; ?></button>
                </div>
            </form>
        </div>
    <!-- </div> -->
</div>
 <?php require_once 'inc/footer.php'; ?> 