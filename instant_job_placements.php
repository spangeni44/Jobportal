<?php 
    include_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/User.php';
    include_once 'admin/class/Category.php';
    $job_post=new JobPost();
    $user=new User();
   

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PWD);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, DB_NAME);
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

$perpage = 10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;

$all_job_posts=$job_post->getAllInstantJobs();
$totalres =count($all_job_posts);
 
$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
 
$readSql = "SELECT * FROM `job_posts` where is_instant_job='yes' ORDER BY id DESC LIMIT $start, $perpage ";
$res = mysqli_query($connection, $readSql);
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
        font-size:14px;
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
                <div class="col-sm-2 col-md-2 col-lg-2">
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
                                    <div class='col-sm-12 col-md-12 col-lg-12'> 
                                        <h4 style='color:blue;'>All Instant Job Placements </h4>
                                        <table class='table table-condensed'>
                                            <thead class='table-dark'>
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
                                                        while($r=mysqli_fetch_assoc($res)){ 
                                                        $user_id=$r['added_by'];
                                                        $user_detail=$user->getUserById($user_id);
                                                        $is_hot=($r['is_hot_job']=='yes')?"<img src='assets/images/hot_job_md.png' height='20px'>":""; 
                                                        ?>
                                                        <td><a href='view_job_detail.php?id=<?php echo $r['id']; ?>'> <?php echo $r['position'].' '.$is_hot; ?></a></td>
                                                        <td><a href='view_job_detail.php?id=<?php echo $r['id']; ?>'> <?php echo $user_detail[0]->full_name; ?></a></td>
                                                        <td> <?php echo  $r['employment_type']; ?></td>
                                                        <td> <?php echo  $r['job_location']; ?></td>
                                                        <td> <?php echo getDaysandHoursFromDate($r['deadline']).' remaining'; ?></td>
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
