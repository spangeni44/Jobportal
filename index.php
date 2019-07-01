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
    $res=null;
$perpage = 20;
if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;
if(isset($_GET, $_GET['search']) && !empty($_GET['search'])){
    $job_title=html_entity_decode($_GET['search_title']);
    $job_type=html_entity_decode($_GET['search_job_type']);
    $totalres =count($job_post->getJobPostByTitleOrJobType($job_title, $job_type));
    $data=array(
        'position'=>$job_title,
        'employment_type'=>$job_type,
        'start'=>$start,
        'perpage'=>$perpage
        );
    $res=$job_post->getJobPostByTitleOrJobTypeWithLimit($data);
    if(empty($res)){
        redirect('./','warning', 'No Job Post Found with your credential at a moment!');
        flash();
    }
}else{
    $totalres=count($job_post->getAllJobPosts());
    $data=array(
        'start'=>$start,
        'perpage'=>$perpage
        );
    $res =$job_post->getAllJobPostsWithLimit($data);
}
$endpage = ceil($totalres/$perpage);

?>
<style>

    .glass-bg-color {
    overflow: show;
    position: relative;
    display: inline-block;
    /* float: left; */
    /* margin: 20px; */
    /* width: 200px;
    height: 200px; */
    border-radius: 4px;
    /* text-align: center; */
    background-color: rgba(255,255,255,.10);
    color: white;
}


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
      thead td{
          /* font-weight:bold; */
      }
      #search_box_container{
        /* filter:alpha(opacity=80); 
        opacity:0.9;" */
        border-radius:10px;
        background-color:lightblue;
        margin-top:5px; 
        padding:6px;
        box-shadow: 1px 2px 3px 1px silver;
    }
    .search_job_input{
        border-radius:5px;
        padding-right:8px;
        font-size:13px;
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
   .tab-items{
       padding-bottom:5px !important;
   }
   .padding-0{
       padding-left:0;
       padding-right:0;
   }
</style>
<div class="clear">
</div>
<?php $_SESSION['front_index']='Yes';
      $_SESSION['front_end']=='Yes';
?>
<div class="row padding-0 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-right:5px;" id='page_content'>
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" style='padding-left:10px;'>
        <?php include 'inc/left_sidebar.php';?>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 " style="padding-top: 5px;">
        <div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
                    <center><?php  flash(); ?></center>
                    <div id='search_box_container'>
                        <form method='get' action='<?php htmlspecialchars($_SERVER['PHP_SELF']);?>' style=" margin-left:5%; padding:3px; margin-top:20px;">
                            <div class="row">
                                <div class='col-sm-5 col-md-5 col-lg-5'>
                                    <div class="input-wrap">
                                        <input type="text" class='form-control search_job_input' name="search_title" placeholder="Job Title e.g. PHP Developer, Accountant" class="form-control" style='border-radius:10px;'>
                                    </div>
                                </div>
                                <div class='col-sm-4 col-md-4 col-lg-4'>
                                    <div class='input-wrap'>
                                        <select name="search_job_type" class='form-control search_job_input' style='border-radius:10px;'>
                                            <option value=''>--Select Job Type--</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Freelance">Freelance</option>
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
                                    <tr>
                                        <th>Job Title </th>
                                        <th>Company Name</th>
                                        <th>Job Type </th>
                                        <th>Deadline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
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
                    <div class="container-fluid" id='main_contents'>
                        <div class='col-sm-12 col-md-12 col-lg-12 padding-0 table-responsive-sm table-responsive-md table-responsive-lg'>
                                <table style='border-bottom:5px; margin-bottom:5px;'>
                                    <tr>
                                    <td>
                                        <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
                                        <h4  style='float-left; color:white; border-radius:0 !important; text-decoration:none !important; pointer-events: none !important;' class='btn btn-warning'>Jobs With Your Criteria </h4>
                                        <hr style='border=4px; padding:0; margin:0; color:blue;'>  
                                    </div>
                                    </td>
                                    </tr>
                                </table>
                                <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 padding-0' style='overflow-x:hidden; !important;'>
                                    <ul class="nav nav-tabs padding-0">
                                    <li class="active"><a data-toggle="tab" href="#jobs_by_category">Jobs By Category</a></li>
                                    <li><a data-toggle="tab" href="#jobs_by_type">Jobs By Type</a></li>
                                    <li><a data-toggle="tab" href="#jobs_by_location">Jobs By Location</a></li>
                                    <li><a data-toggle="tab" href="#jobs_by_source">Jobs By Source</a></li>
                                    </ul>
                                </div>
                                <div class="container-fluid row col-xs-12 col-sm-12 col-md-12 col-xl-12 tab-content" margin-left:5px;'>
                                    <div id="jobs_by_category" class="row col-xs-12 col-sm-12 col-md-12 col-xl-12 tab-pane fade in active">
                                        <!-- <div class='row'> -->
                                            <?php
                                            $category=new Category();
                                            $all_categories=$category->getAllCategories();
                                            foreach($all_categories as $row){
                                            ?>
                                            <div class='row col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-4 tab-items'>
                                            <a href='jobs_with_credential.php?cat_id=<?php echo $row->id; ?>' class='remove_text_decoration'><?php echo  $row->title.' ('.count($job_post->getTotalJobPostByCategory($row->id)).')'; ?></a>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        <!-- </div> -->
                                    </div>
                                    <div id="jobs_by_type" class="row col-xs-12 col-sm-12 col-md-12 col-xl-12 tab-pane fade">
                                    
                                        <div class='col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 tab-items'>
                                            <a href='jobs_with_credential.php?job_type=Full Time'  class='remove_text_decoration' ><?php echo 'Full Time ('.count($job_post->getTotalJobPostByType('Full Time')).')'; ?></a>
                                        </div>
                                        <div class='col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_type=Part Time' class='remove_text_decoration' ><?php echo 'Part Time ('.count($job_post->getTotalJobPostByType('Part Time')).')'; ?></a>
                                        </div>
                                        <div class='col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_type=Contract' class='remove_text_decoration' ><?php echo 'Contract ('.count($job_post->getTotalJobPostByType('Contract')).')'; ?></a>
                                        </div>
                                        <div class='col-xs-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_type=Freelance' class='remove_text_decoration'><?php echo 'Freelance ('.count($job_post->getTotalJobPostByType('Freelance')).')'; ?></a>
                                        </div>
                                    </div>
                                    <div id="jobs_by_Location" class="row col-xs-12 col-sm-12 col-md-12 col-xl-12 tab-pane fade">
                                        <div class='tab-items'>
                                        <h4 >Needs to manage this section</h4>
                                            <p >
                                            <!-- <a href='jobs_with_credential.php?job_location='> -->
                                            Some content in Jobs By Place.</p> 
                                        </div>
                                    </div>
                                    <div id="jobs_by_source" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tab-pane fade">
                                        
                                        <div class='col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_source=JobPortal Nepal Exclusive' class='remove_text_decoration'><?php echo 'JobPortal Nepal Exclusive ('.count($job_post->getTotalJobPostBySource('JobPortal Nepal Exclusive')).')'; ?></a>
                                        </div>
                                        <div class=' col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_source=Newspaper' class='remove_text_decoration'><?php echo 'Newspapers ('.count($job_post->getTotalJobPostBySource('Newspaper')).')'; ?></a>
                                        </div>
                                        <div class='col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_source=Company Website' class='remove_text_decoration'><?php echo 'Company Website ('.count($job_post->getTotalJobPostBySource('Company Website')).')'; ?></a>
                                        </div>
                                        <div class=' col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_source=Social Media' class='remove_text_decoration'><?php echo 'Social Media ('.count($job_post->getTotalJobPostBySource('Social Media')).')'; ?></a>
                                        </div>
                                        <div class=' col-xs-3 col-sm-3 col-md-4 col-lg-4 col-xl-3 tab-items'>
                                            <a  href='jobs_with_credential.php?job_source=Others' class='remove_text_decoration'><?php echo 'Others ('.count($job_post->getTotalJobPostBySource('Others')).')'; ?></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div> 
                </div>
            </div>
            <!-- row ends -->
        </div>  
    </div>
    <!-- class col-8 ends -->
    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 padding-0" >
        <?php require_once 'inc/right_sidebar.php'; ?>
    </div>
</div>
<?php require 'inc/footer.php'; ?>