<?php 
    include_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/User.php';
    include_once 'admin/class/Category.php';
    $job_post=new JobPost();
    $user=new User();
   
    
$perpage=10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$totalres =count((array)$job_post->getAllHotJobs());
$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
$data=array(
    'start'=>$start,
    'perpage'=>$perpage
);
$res=$job_post->getHotJobs($data);
?>
<style>
    .p_title{
        font-size: 13px;
    }
      .p_text{
        font-style: italic;
        font-size: 10px;
      }
      thead td{
          font-weight:bold;
      }
      #search_box_container{
        background-color:lightblue;
        margin-top:5px; 
        padding:15px;
        box-shadow: 1px 2px 3px 1px silver;
    }
    .search_job_input{
        border-radius:5px;
        padding-right:8px;
        font-size:13px;
    }
    #page_content{
        background-color:#E6E6FA;
        padding-bottom:10px;
    }
    #main_contents{
        margin-top:5px; 
        box-shadow: 1px 2px 3px 1px silver;
        background-color:white;
    }
    
</style>
<div class="clear">
</div>
<?php $_SESSION['front_index']='Yes';
      $_SESSION['front_end']=='Yes';
?>
            <div class="container-fluid row" id='page_content'>
                <div class="col-sm-2 col-md-2 col-lg-2 table-responsive">
    			    <?php include 'inc/left_sidebar.php';?>
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8" style="padding-top: 5px;">
                        <div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <script>
                                    $(document).ready(function () {
                                    $("#flash-msg").delay(300).fadeOut("slow");
                                    });
                                </script>
                                <center><?php  flash(); ?></center>
                            <div class="container-fluid" id='main_contents'>
                                <!-- <div class='container-fluid'> -->
                                    <div class='col-sm-12 col-md-12 col-lg-12 table-responsive'> 
                                        <h4 style='color:blue;'>All Hot Jobs </h4>
                                        <table class='table table-condensed '>
                                            <thead class='table-info'>
                                                <tr>
                                                    <th>Job Title </th>
                                                    <th>Company Name</th>
                                                    <th>Job Type </th>
                                                    <th>Job Location </th>
                                                    <th>Deadline</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                   <?php
                                                       foreach($res as $row){
                                                        $user_id=$row->added_by;
                                                        $user_detail=$user->getUserById($user_id);
                                                        $is_hot=($row->is_hot_job=='yes')?"<img src='assets/images/hot_job_md.png' height='20px'>":""; 
                                                        ?>
                                                        <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $row->position.' '.$is_hot; ?></a></td>
                                                        <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $user_detail[0]->full_name; ?></a></td>
                                                        <td> <?php echo  $row->employment_type; ?></td>
                                                        <td> <?php echo  $row->job_location; ?></td>
                                                        <td> <?php echo getDaysandHoursFromDate($row->deadline).' remaining'; ?></td>
                                                </tr> 
                                                <?php
                                                }
                                                ?>
                                            <tbody>
                                        </table>
                                  </div> 
                            </div>
                        </div>
                        <!-- row ends -->
                    </div>
                    <!-- well ends -->
                    <?php include_once 'inc/pagination.php' ?>
                    </div>
                </div>
                <!-- class col-8 ends -->
                <div class="col-sm-2 col-md-2 col-lg-2 col-2" >
                    <?php require_once 'inc/right_sidebar.php'; ?>
                </div>
            </div>
       
<?php require 'inc/footer.php'; ?>
