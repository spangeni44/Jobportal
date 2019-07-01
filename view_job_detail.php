<?php require_once 'inc/header.php';
  require_once 'inc/navbar.php';
  include 'admin/class/Database.php';
  include 'admin/class/User.php';
  include 'admin/class/JobPost.php';
  include 'admin/class/JobProvider.php';
  include 'admin/class/Category.php';
  $_SESSION['front_end']='Yes';
?>

<style>
    .borderless tr td {
    border: none !important;
    }
    .borderless tr td a:link {
        color:darkblue;
        font-weight:normal !important;
    text-decoration: none !important;
    }
    .borderless tr td a:visited {
    text-decoration: none !important;
    }
    .borderless tr td a:hover {
    text-decoration: underline !important;
    }
    .borderless tr td a:active {
    text-decoration: underline !important;
    }

    .remove_text_decoration{
        color:darkblue;
        text-decoration:none !important;
        font-weight:normal !important;
        font-size:13px;
    }
    .p_title{
        /* font-family:Convergence; */
        padding:0;
        margin:0;
        text-decoration:none !important;
        /* font-family:Garamond; */
        /* font-family:'Courier New'; */
         font-size: 12px; 
    }
      .p_text{
        /* font-style: italic; */
        text-decoration:none !important;
        
        padding:0;
        margin:0;
        /* font-family:Garamond; */
         font-size: 11px; 
      }
</style>

 <style>
     
     .posts label{
        padding-bottom:5px;
        text-decoration:none !important;
        font-weight:normal !important;
        font-size: 14px;
     }
     .job_post_title{
        font-weight:bold;
        font-size: 18px; 
        padding-top:15px;
     }
     #company_info{
        box-shadow: 1px 1px 1px 1px silver;
     }
     #posts{
        background-color: #FFFFF0;
        box-shadow: 1px 1px 1px 1px silver;
     }
     #company_name p{
        /* font-weight:bold; */
        font-size: 22px;
        color:blue;
     }
     .horizontal-row{
        border-width: 2px;
     }
     #page_content{
     background-color:#E6E6FA;
     font-size:13px;
    }
    .padding-0{
        padding-left:0;
        padding-right:0;
    }
 </style>
<div class="clear">
</div>
<?php $_SESSION['front_index']='Yes'; ?>
<div class="container-fluid" style="margin-top: 0px;">
	<div id="content-wrapper" style="margin-left: 5px;">
		<div id="page_content">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-2 col-2">
    			         <?php require_once 'inc/left_sidebar.php';?>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8" >
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-12 " style="margin-top: 15px;">
                                    <?php 
                                        flash();
                                        if(isset($_GET, $_GET['id']) && !empty($_GET['id'])){
                                        $job_post=new JobPost();
                                        $user=new User();
                                        $job_provider=new JobProvider();
                                        $category=new Category();
                                        $job_post_detail=$job_post->getJobPostById($_GET['id']);
                                        $user_id=$job_post_detail[0]->added_by;
                                        $user_detail=$user->getUserById($user_id);
                                        $job_provider_detail=$job_provider->getJobProviderByUserId($user_id);

                                        // debug($job_provider_detail,true);
                                    ?>
                                            <div class='container-fluid padding-0' id='company_info'>
                                                <div class='row'>
                                                    <div class='col-xs-5 col-sm-3 col-md-2 col-lg-2 col-xl-2' id='image_div'>
                                                        <img width="100px" height="80px;"  src="<?php echo USER_IMAGE_URL.$user_detail[0]->user_image; ?>" class='thumbnail thumbnail-responsive' alt="company_logo" >
                                                    </div>
                                                    <div class='col-xs-7 col-sm-9 col-md-10 col-lg-10 col-xl-10' id='company_name' style='margin-top:10px;'>
                                                        <p ><?php echo $user_detail[0]->full_name; ?></p>
                                                    </div>
                                                </div>
                                                <div class='container-fluid padding-0' >
                                                    <p> <?php echo $job_provider_detail[0]->company_description; ?></p>
                                                </div>
                                            </div>
                                            <div class="container-fluid posts" id='posts'>
                                                <p class='job_post_title'>Job Detail:</p>
                                                <hr class='horizontal-row'>
                                                <div class='row'>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        <label>Job Position</label>
                                                    </div>
                                                     <div class="col-sm-9 col-md-9 col-lg-9">
                                                         <label>: <?php echo @$job_post_detail[0]->position; ?></label>
                                                     </div>
                                                </div>
                                                <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Job Category:</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                        <?php $category_detail=$category->getCategoryById($job_post_detail[0]->job_category); 
                                                            // debug($category_detail,true);
                                                        ?>
                                                     <label>: <?php echo @$category_detail[0]->title; ?></label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Job Level</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: <?php echo @$job_post_detail[0]->job_level; ?> Level</label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-4 col-md-3 col-lg-3">
                                                    <label>No. of Vacancy/s</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: [ <?php echo @$job_post_detail[0]->no_of_vacancies; ?> ]</label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Employment Type</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: <?php echo @$job_post_detail[0]->employment_type; ?></label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Job Location</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: <?php echo @$job_post_detail[0]->job_location; ?></label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Offered Salary</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: <?php echo @$job_post_detail[0]->offered_salary; ?></label>
                                                 </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Deadline</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <?php 
                                                        $date = strtotime($job_post_detail[0]->deadline);
                                                        $diff=$date-time();//time returns current time in seconds
                                                        $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                                                        $hours=round(($diff-$days*60*60*24)/(60*60));
                                                        ?>
                                                    <label>: <?php echo date('d/M/Y', $date); ?> ( <?php  echo "$days days $hours hours remaining"; ?> )
                                                     </label>
                                                 </div>
                                            </div>
                                            <hr class='horizontal-row'>
                                            <p class='job_post_title'>Job Specification:</p>
                                            <hr class='horizontal-row'>
                                            <?php if(@$job_post_detail[0]->education_level){ ?>
                                                <div class='row'>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        <label>Education Level</label>
                                                     </div>
                                                     <div class="col-sm-9 col-md-9 col-lg-9">
                                                         <label>: <?php echo @$job_post_detail[0]->education_level; ?></label>
                                                     </div>
                                                </div>
                                            <?php } ?>
                                            <?php 
                                                    $experience_required=$job_post_detail[0]->experience_required;
                                                    if(isset($experience_required) && !empty($experience_required)){ 
                                                ?>
                                            <div class='row'>
                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                    <label>Experience Required</label>
                                                 </div>
                                                 <div class="col-sm-9 col-md-9 col-lg-9">
                                                     <label>: <?php echo @$job_post_detail[0]->experience_required; ?></label>
                                                 </div>
                                            </div>
                                            <?php 
                                                } 
                                            ?>
                                            <?php if(@$job_post_detail[0]->qualification){ ?>
                                                <div class='row padding-0'>
                                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                                        <label>Qualifications/Skills </label>
                                                    </div>
                                                    <div class='col-xs-9 col-sm-9 col-md-9 col-xl-9'>
                                                         :<label> <?php echo html_entity_decode(@$job_post_detail[0]->qualification); ?></label>
                                                     </div>
                                                </div>
                                            <?php } ?>
                                            <?php 
                                                    $job_description=$job_post_detail[0]->job_description;
                                                    if(isset($job_description) && !empty($job_description)){ 
                                                ?>
                                                 
                                                 <!-- <hr class='horizontal-row'> -->
                                                <p class='job_post_title'>Job Description:</p>
                                                <!-- <hr class='horizontal-row'> -->

                                                 <!-- <div class='row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                 <hr class='horizontal-row'> 
                                                    <p class='job_post_title'>Job Description:</p>
                                                    </div>
                                                     <hr class='horizontal-row'> -->
                                                    <div class='row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padding-left:5px;'>
                                                     <label><?php echo html_entity_decode(@$job_post_detail[0]->job_description); ?></label>
                                                    </div>
                                                    
                                                <?php 
                                                    }
                                                ?>
                                                 <?php 
                                                    $applying_procedure=$job_post_detail[0]->applying_procedure;
                                                    if(isset($applying_procedure) && !empty($applying_procedure)){ 
                                                ?>
                                                <!-- <hr class='horizontal-row'> -->
                                                <div class='row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                                    <p class='job_post_title'>To Apply:</p>
                                                </div>
                                                <!-- <hr class='horizontal-row'> -->
                                                <div class='row col-xs-12 col-sm-12 col-lg-12 col-xl=12 padding-left:5px;'>
                                                    <label><?php echo html_entity_decode(@$job_post_detail[0]->applying_procedure); ?></label>
                                                </div>
                                                 <?php
                                                    }
                                                    ?>
                                                 <hr class='horizontal-row'>
                                                
                                                <?php 
                                                $job_applier=new User();
                                                
                                                
                                                 ?>
                                                 
                                                 <div class='row container'>
                                                        <a class='btn btn-primary' href=''>Apply Now</a>
                                                 </div>
                                            <?php
                                             
                                            } else{
                                            ?> 
                                           <?php $_SESSION['warning']='Post not found or has been deleted!!'; ?>
                                    
                                             <?php } ?>
                                        </div>
                                    </div>
                            </div>
                        </div>
                
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                    <?php require_once 'inc/right_sidebar.php'; ?>
                </div>
            </div>
            <!-- row ends -->
        </div>
    </div>
</div>
<?php require 'inc/footer.php'; ?>