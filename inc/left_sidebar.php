<?php 
     $job_post=new JobPost();
     $user=new User();
?>
<style>
    #hot_job_card{
        box-shadow:1px 2px 2px 1px silver;
    }
    .padding-0{
    padding-right:0;
    padding-left:0;
}
</style>
<div class='col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xl-12 table-responsive' style="position:relative; padding-left:0px; background-color:#f8f8ff; margin-top:12px; padding-bottom:5px;" >
    <div  id="hotjobs-box-header" style='text-align:center'>
        <div id='hot-fire'>
        </div>
        <h2 >Hot Jobs</h2>
    </div>
    <table style=' overflow: show; margin-top:5px; padding-0' class='borderless'>
    <?php
        $all_hot_jobs=$job_post->getAllHotJobs();
        foreach($all_hot_jobs as $hot_job){
            $user_detail=$user->getUserByid($hot_job->added_by);    
        ?>
        <tr>
            <td>
            <!-- <div class="card" style="position:relative; padding-left:0px; padding-right:'0.5%'; margin-top:4px;" id=''> -->
                <div class='row padding-0' style="overflow:show;">
                    <div class='col-sm-4 col-md-4 col-lg-4' style='padding-right:0;'>
                        <img class="card-img-left thumbnail thumbnail-responsive" width='48px' style='position:relative;' height='48px' src="<?php echo USER_IMAGE_URL.$user_detail[0]->user_image; ?>" alt="Company Logo">
                    </div>
                    <div class='col-sm-8 col-md-8 col-lg-8 padding-0'>
                        <h3 class="p_title padding-0"><a href='view_job_detail.php?id=<?php echo $hot_job->id; ?>' style='font-weight:normal !important;'><?php echo $user_detail[0]->full_name; ?></a></h3>
                        <p class=" padding-0 p_text" ><a href='view_job_detail.php?id=<?php echo $hot_job->id; ?>'><?php echo $hot_job->position; ?></a></p>
                    </div>
                </div>
                <hr style='margin:0; padding:0;' class='padding-0'>
            <!-- </div> -->
            </td>
           
        </tr>
            <?php 
                }
            ?>
    </table>
</div>
<div class='col-sm-12 col-md-12 col-lg-12 padding-0' style="text-align: right; margin-top:8px;">
    <a href="hot_jobs.php" class="btn-warning" style='padding:7px; border-radius:8px; color:white;' value="More Hot Jobs">See More  <i class="fa fa-arrow-circle-right"></i></a>
</div>
