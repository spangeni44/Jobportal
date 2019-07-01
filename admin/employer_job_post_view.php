<?php 
    include_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/User.php';
    include_once 'admin/class/Category.php';
    $job_post=new JobPost();
    $user=new User();
   


$perpage = 10;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$all_job_posts=$job_post->getAllJobPosts();
$totalres =count($all_job_posts);
 
$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
 
$readSql = "SELECT * FROM `job_posts` where added_by='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT $start, $perpage ";
$res = mysqli_query($connection, $readSql);
?>
<style>
    .p_title{
        font-size: 15px;
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
                                <div id='search_box_container' >
                                    <form method='get' action='<?php htmlspecialchars($_SERVER['PHP_SELF']);?>' style=" margin-left:5%; padding:3px; margin-top:'1%';">
                                        <div class="row">
                                            <div class='col-sm-5 col-md-5 col-lg-5'>
                                                <div class="input-wrap">
                                                    <input type="text" class='form-control search_job_input' name="search_title" placeholder="Job Title e.g. PHP Developer, Accountant" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            <div class='col-sm-4 col-md-4 col-lg-4'>
                                                <?php $category=new Category();
                                                $category_details=$category->getAllCategories(); ?>
                                                <div class="input-wrap">
                                                    <select class=' form-control search_job_input' name='search_category'>
                                                        <option value=''> --Select One Category--</option>
                                                        <?php 
                                                            foreach($category_details as $category_detail){
                                                        ?>
                                                        <option value="<?php echo $category_detail->id; ?>"><?php echo $category_detail->title; ?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                    <div class='form-icon'><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-md-2 col-lg-2 contact-btn">
                                                <button class='btn-success' style='padding:11px; margin-top:3px; border-radius:10px; text-transform: uppercase;' type="submit" name="search" value='search'> <i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                             </div> 
                                        </div>
                                    </form>
                                </div>

                            <div class="container-fluid" id='main_contents'>
                                <!-- <div class='container-fluid'> -->
                                    <div class='col-sm-12 col-md-12 col-lg-12'> 
                                        <h4 style='color:blue;'> Most Recent Jobs </h4>
                                        <table class='table table-condensed table-responsive'>
                                            <thead class='table-dark'>
                                                <tr>
                                                    <th>Job Title </th>
                                                    <th>Company Name</th>
                                                    <th>Job Type </th>
                                                    <th>Job Location </th>
                                                    <th>Deadline</th>
                                                    <th>Action</th>
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
                                                        <td>
                                                            <a href="job_post.php?id=<?php echo $r['id']; ?>&amp;act=edit"><i class='fa fa-pencil'></i> Edit</a>
                                                            <a href="admin/process/job_post.php?id=<?php echo $r['id']; ?>&amp;act=del"  onclick="return confirm('Are You sure you want to delete this record?');"><i class='fa fa-trash'></i> Delete</a>
                                                        </td>
                                                    </tr> 
                                                         <?php
                                                            }
                                                        ?>
                                        </table>
                                  </div> 
                            </div>
                        </div>
                        <!-- row ends -->
                    </div>
                    <!-- well ends -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                        <?php if($curpage != $startpage){ ?>
                            <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">First</span>
                            </a>
                            </li>
                            <?php } ?>
                            <?php if($curpage >= 2){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                            <?php } ?>
                            <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                            <?php if($curpage != $endpage){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                            <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Last</span>
                            </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    </div>
                </div>
                <!-- class col-8 ends -->
                <div class="col-sm-2 col-md-2 col-lg-2 col-2" >
                    <?php require_once 'inc/right_sidebar.php'; ?>
                </div>
            </div>
       
<?php require 'inc/footer.php'; ?>
