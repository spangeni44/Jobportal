<style>
    a.dr_link, a.dr_link:hover {
        color: #fff !important;
        font-size: 13px !important;
        text-decoration: none !important;
    }
    .job-listing .list-header {
        border-bottom: none;
    }
    .job-listing .list-header.dr_list_header div {
        background: #0261a6;
    }
    table.dr_list_table td {
        /*background: #0261a633;*/
    }
    .dr-item-hover {
        display: block;
        width: 100%;
        height: 108px;
        overflow-y: scroll;
    }
    .padding-0{
    padding-right:0;
    padding-left:0;
}
</style> 
<?php 
    $job_post=new JobPost();
    $instant_job_details=$job_post->getAllInstantJobs();
   
?>
<div class='col-sm-12 col-md-12 col-lg-12' style='padding:5px 0 0 5px; background:white; margin-top:10px; margin-bottom:5px'>
    <div class="dr_list_header" style=" background: #dd61d9;">
        <div style="width: 100%;">
            <label  style="font-weight:bold; color:white; font-family:'Times New Roman';  font-size:14px;" > INSTANT JOB PLACEMENTS </label>
        </div>
    </div>
    <div style="overflow: auto;" class='col-sm-12 col-md-12 col-lg-12 table-responsive'>
        <table style="width: 100%;" class="table table-condensed table-stripped table-sm borderless">
            <thead>
                <tr>
                    <th class="pl-15">Job Title</th>
                    <th nowrap>Deadline</th>
                </tr>
            </thead>
            <tbody id="directRecruitmentList" class='table-border'>
                <tr>
                    <?php 
                        foreach($instant_job_details as $instant_job_detail){
                    ?>
                    <td>
                        <a class=" job-item text-center" style='text-decoration:none !important; font-size:12px;' id=""
                            href="view_job_detail.php?id=<?php echo $instant_job_detail->id; ?>">
                           <?php echo $instant_job_detail->position; ?></a>
                    </td>
                    <td>
                        <span class="job-item text-center" style='font-size:13px;'><?php echo getDaysAndHoursFromDate($instant_job_detail->deadline); ?></span>
                    </td>
                </tr>
                <?php 
                    }
                 ?>
            </tbody>
        </table>
    </div>
</div>		
<div style=" text-align: right;">
    <a href="instant_job_placements.php"  class="btn-warning" style='padding:6px; border-radius:5px;color:white;'>See More <i class="fa fa-arrow-circle-right"></i></a>
</div>