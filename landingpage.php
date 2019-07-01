<?php 
include 'admin/config/init.php';
include 'inc/header.php';
?>

 <div class='col-5 text-center'>
	<?php flash(); ?>
</div>
<style>
body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- ---- Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            Bhaumik Patel</h4>
                        <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>email@example.com
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Twitter</a></li>
                                <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<div class="col-sm-4 my-9" style='margin-bottom:5px;'>
    <div class="card">
        <div class='row'>
        <div class='col-md-4'>
            <img class="card-img-left thumbnail thumbnail-responsive" width="48" height="48" src="<?php echo USER_IMAGE_URL.$user_detail[0]->user_image; ?>" alt="Company Logo">
        </div>
        <div class='col-md-8'>
            <h3 class="p_title"><a href='view_job_detail.php?id=<?php echo $row->id; ?>'><?php echo $user_detail[0]->full_name; ?></a></h3>
            <p class=" p_text" ><a href='view_job_detail.php?id=<?php echo $row->id; ?>'><?php echo $row->position; ?></a></p>
            </div>
    </div>
</div>
</div>



<!-- search_jobs page file -->
<?php 
    $job_post=new JobPost();
    $user=new User();
    $data=array(
        'search_title'=>$_GET['search_title'],
        'search_location'=>$_GET['search_location'],
        'search_category'=>$_GET['search_category'],
        'search_job_type'=>$_GET['search_job_type']
    );
    $searched_job_posts=$job_post->getSpecificJobPosts();
    foreach($searched_job_posts as $row){
        $user_id=$row->added_by;
        $user_detail=$user->getUserById($user_id);
        
    ?>
    <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $row->position; ?></a></td>
    <td><a href='view_job_detail.php?id=<?php echo $row->id; ?>'> <?php echo $user_detail[0]->full_name; ?></a></td>
    <td> <?php echo  $row->employment_type; ?></td>
    <td> <?php echo  $row->job_location; ?></td>
    <td> <?php echo getDaysandHoursFromDate($row->deadline).' remaining'; ?></td>
    </tr>
<?php
    }
?>




<?php
include 'inc/footer.php';
?>

