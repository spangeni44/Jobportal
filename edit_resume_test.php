<?php require_once 'inc/header.php';
    require_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/Category.php';
    include_once 'admin/class/JobSeeker.php';
    include_once 'admin/class/User.php';
?>
<style>
    .padding-0{
        padding-left:0;
        padding-right:0;
    }
    .pills_link{
        margin-left:10px;
        text-align:left !important;
    }
    .remove_text_decoration{
        color:darkblue;
        text-decoration:none !important;
        font-weight:normal !important;
        font-size:13px;
    }
</style>
<?php 
  $act="Add";
  $job_seeker=new JobSeeker();
  $user=new User();
  if(isset($_GET['id']) && $_GET['id']!=null){
      /*Update*/
      $act = "Update";
      $id = (int)$_GET['id'];
      if($id <= 0){
          redirect('../', 'error', 'Invalid Job Seeker id.');
      }
      $job_seeker_detail = $job_seeker->getJobSeekerById($id);

      if($job_seeker_detail){
      $user_detail=$user->getUserById($job_seeker_detail[0]->user_id);
      // debug($user_detail,true);
      }
      if(!$job_seeker_detail){
          redirect('../', 'error', 'Profile not found or has been deleted.');
      }

      // debug($job_seeker_detail);
  }
?>
<div class='container-fluid row'>
    <div class='col-xs-0 col-sm-0 col-md-4 col-lg-4 col-xl-4'></div>
        </div class='col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 padding-0'>
            <div class="container-fluid" >
                <div class='col-sm-12 col-md-12 col-lg-12 padding-0 table-responsive-sm table-responsive-md table-responsive-lg'>
                    <table style='border-bottom:5px; margin-bottom:5px;'>
                        <tr>
                            <td>
                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                    <h4  style='float-left; color:white; border-radius:0 !important; text-decoration:none !important; pointer-events: none !important;' class='btn btn-warning'>Resume </h4>
                                    <hr style='border=4px; padding:0; margin:0; color:blue;'>  
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padding-0 table-responsive-sm table-responsive-md table-responsive-lg' style='overflow-x:hidden; !important;'>
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 padding-0" style='background-color:lightblue;'>
                                <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical" style='padding-0'>
                                    <a class="nav-link active pills_link" id="v-pills-job_preferences-tab" data-toggle="pill" href="#v-pills-job_preferences" role="tab" aria-controls="v-pills-job_preferences" aria-selected="true" >Job Preferences</a>
                                    <hr style="margin:0; padding:0;">
                                    <a class="nav-link pills_link" id="v-pills-personnal_information-tab" data-toggle="pill" href="#v-pills-personnal_information" role="tab" aria-controls="v-pills-personnal_information" aria-selected="false">Personal Information</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-educaton-tab" data-toggle="pill" href="#v-pills-education" role="tab" aria-controls="v-pills-education" aria-selected="false">Education</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-training-tab" data-toggle="pill" href="#v-pills-training" role="tab" aria-controls="v-pills-training" aria-selected="false">Training</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-work_experience-tab" data-toggle="pill" href="#v-pills-work_experience" role="tab" aria-controls="v-pills-work_experience" aria-selected="false">Work Experience</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-references-tab" data-toggle="pill" href="#v-pills-references" role="tab" aria-controls="v-pills-references" aria-selected="false">References</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-social_media-tab" data-toggle="pill" href="#v-pills-social_media" role="tab" aria-controls="v-pills-social_media" aria-selected="false">Social Media</a>
                                    <hr style='margin:0; padding:0;'>
                                    <a class="nav-link pills_link" id="v-pills-other_information-tab" data-toggle="pill" href="#v-pills-other_information" role="tab" aria-controls="v-pills-other_information" aria-selected="false">Other Information</a>
                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5 col-lg-5 col-xl-5" style='background-color:white;'>
                                <div class="tab-content" id="v-pills-tabContent" style='padding-0 overflow:auto !important;'>
                                    <div class="tab-pane fade in active" id="v-pills-job_preferences" role="tabpanel" aria-labelledby="v-pills-job_preferences-tab" style='background-color:white;'>
                                        <?php include_once 'inc/edit_preferences.php'; ?>
                                    </div>
                                    <div class="tab-pane fade show active" id="v-pills-personnal_information" role="tabpanel" aria-labelledby="v-pills-personnal_information-tab" style='overflow:auto !important;'> 
                                        <?php include_once 'inc/personal_info.php'; ?>
                                    </div>
                                    <div class="tab-pane fade show active" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-education-tab" style='overflow:auto !important;'>
                                        <?php include_once 'inc/edit_education.php'; ?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-training" role="tabpanel" aria-labelledby="v-pills-training-tab">
                                        <?php include_once 'inc/training.php'; ?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-work_experience" role="tabpanel" aria-labelledby="v-pills-work_experience-tab">
                                        <?php include_once 'inc/work_experience.php'; ?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-references" role="tabpanel" aria-labelledby="v-pills-references-tab">
                                        <?php include_once 'inc/references.php'; ?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-social_media" role="tabpanel" aria-labelledby="v-pills-social_media-tab">
                                        <?php include_once 'inc/social_media.php'; ?>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-other_information" role="tabpanel" aria-labelledby="v-pills-other_information-tab">
                                        <?php include_once 'inc/other_information.php'; ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'inc/footer.php'; ?>
