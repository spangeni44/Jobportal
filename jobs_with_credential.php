<?php 
    include_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobPost.php';
    include_once 'admin/class/User.php';
    include_once 'admin/class/Category.php';
    $job_post=new JobPost();
    $user=new User();
   $totalres=null;
   $res=array();
   $perpage=15;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
    if(isset($_GET) && !empty($_GET)){
        if(isset($_GET['cat_id']) && !empty($_GET['cat_id'])){
            $cat_id=$_GET['cat_id'];
            $totalres=count($job_post->getTotalJobPostByCategory($cat_id));
            $data=array(
                'category_id'=>$cat_id,
                'start'=>$start,
                'perpage'=>$perpage
            );
            $res=$job_post->getTotalJobPostByCategoryWithLimit($data);
        }else if(isset($_GET['job_type']) && !empty($_GET['job_type'])){
            $job_type=$_GET['job_type'];
            // debug($job_type,true);
            $totalres=count($job_post->getTotalJobPostByType($job_type));
            $data=array(
                'job_type'=>$job_type,
                'start'=>$start,
                'perpage'=>$perpage
            );
            $res=$job_post->getTotalJobPostByTypeWithLimit($data);
        // }else if(isset($_GET['job_location'])&& !empty($_GET['job_location'])){
        //     $location=$_GET['location'];
        //     $totalres=count($job_post->getTotalJobPostByLocation($location));
        //     $data=array(
        //         'location'=>$location,
        //         'start'=>$start,
        //         'perpage'=>$perpage
        //     );
        //     $res=$job_post->getTotalJobPostByLocationWithLimit($data);
        }else if(isset($_GET['job_source']) && !empty($_GET['job_source'])){
            $job_source=$_GET['job_source'];
            $totalres=count($job_post->getTotalJobPostBySource($job_source));
            $data=array(
                'job_source'=>$job_source,
                'start'=>$start,
                'perpage'=>$perpage
            );
            $res=$job_post->getTotalJobPostBySourceWithLimit($data);
        }
    }    
    //     }else{
    //         redirect('./','warning', 'No Data Found With This Credential!!');
    //     }
    //  }else{
    //     redirect('./', 'warning', 'No Data Found with your Credential!!');
    // }

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
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
           
    #page_content{
        /* background-color:#E6E6FA; */
        padding-left:20px;
        padding-right:0 !important;
        margin-right:0px !important;
        width:100%;
        font-size:12px;
       
    }
    #main_contents{
        border-radius:10px;
        margin-top:5px; 
        box-shadow: 1px 2px 3px 1px silver;
        background-color:white;
        font-size:13px;
    }
    
</style>
<div class="clear">
</div>
<?php $_SESSION['front_index']='Yes';
      $_SESSION['front_end']=='Yes';
?>
           <div class="row col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-right:5px;" id='page_content'>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" style='padding-left:10px;'>
        <?php include 'inc/left_sidebar.php';?>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 " style="padding-top: 5px;">
        <div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                    <center><?php  flash(); ?></center>
                    <div class="container-fluid padding-0" id='main_contents'>
                        <div class='col-sm-12 col-md-12 col-lg-12 padding-0 table-responsive-sm table-responsive-md table-responsive-lg'> 
                        
                            <table style='margin-bottom:5px;'>
                                    <tr>
                                    <td>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                            <h4  style='float-left; color:white; border-radius:0 !important; text-decoration:none !important; pointer-events: none !important;' class='btn btn-warning'>Most Recently Posted Jobs </h4>  
                                        </div>
                                    </td>
                                    </tr>
                                </table>

                            <table  width='100%' class='table borderless table-condensed table-stripped'  style="padding: 5px !important;">
                                <thead class='table-info'>
                                    <tr >
                                        <th>Job Title </th>
                                        <th>Company Name</th>
                                        <th>Job Type </th>
                                        <th>Deadline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                            if(!$res){
                                                redirect('./', 'warning', 'No Data Found With Your Credential!!');
                                            }
                                            foreach($res as $row){
                                                $user_id=$row->added_by;
                                                $user_detail=$user->getUserById($user_id);
                                                $is_hot=($row->is_hot_job=='yes')? "<img src='assets/images/hot_job_md.png' height='20px'>":"";
                                                ?>
                                                <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>' style='font-weight:normal !important; '> <?php echo $row->position.' '.$is_hot; ?></a></td>
                                                <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>' style='font-weight:normal !important; '> <?php echo $user_detail[0]->full_name; ?></a></td>
                                                <td> <?php echo  $row->employment_type; ?></td>
                                                <td> <?php echo getDaysandHoursFromDate($row->deadline).' remaining'; ?></td>
                                    </tr>
                                            <?php
                                                }
                                        ?>
                                </tbody>
                            </table>
                        </div> 
                        <div class='float-right' style='padding:0; margin:0;'> <?php include_once 'inc/pagination.php'; ?> </div>
                    </div>
                </div>
                <!-- row ends -->
            </div>
            <!-- well ends -->
        </div>
    </div>
    <!-- class col-8 ends -->
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 padding-0" >
        <?php require_once 'inc/right_sidebar.php'; ?>
    </div>
</div>
<?php require 'inc/footer.php'; ?>
