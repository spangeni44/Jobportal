<?php
  include 'inc/header.php';
  require_once 'inc/sidebar_menu.php';
//   include 'inc/init.php';
  require_once 'inc/checklogin.php';
  include_once 'class/Database.php';
  include_once 'class/User.php';
  include_once 'class/Category.php';
  include_once 'class/JobPost.php';
  unset($_SESSION['front_end']);
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Job Portal Nepal </h1>
          <p> Job Post</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <?php flash(); ?>
                <thead>
                  <tr>
                    <th>S.N.</th>
                    <th>Company Name </th>
                    <th>Vacant Position</th>
                    <th>Education Level</th>
                    <th>Job Level</th>
                    <th>Job Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 
                  $job_post=new JobPost();
                  $user=new User();
                  $category=new Category();
                  $job_post_details=$job_post->getAllJobPosts();

                    $i=0;
                    foreach($job_post_details as $job_post_detail){
                      $category_id=$job_post_detail->job_category;
                      $category_detail=$category->getCategoryById($category_id);
                      $user_info=$user->getUserById($job_post_detail->added_by);
                       ?>
                    <tr>
                      <td> <?php echo ++$i; ?></td>
                      <td><?php echo $user_info[0]->full_name; ?></td>
                      <td><?php echo $job_post_detail->position; ?></td>
                      
                      <td><?php echo $job_post_detail->education_level; ?></td>
                      <td><?php echo $job_post_detail->job_level; ?></td>
                      <td><?php echo $category_detail[0]->title;  ?></td>                
                      <td>
                      <a href="job_post_add.php?id=<?php echo $job_post_detail->id;?>&amp;act=edit" class="btn-link">
                      Edit
                      </a>
                      | 
                      <a href="process/job_post.php?id=<?php echo $job_post_detail->id; ?>&amp;act=del" onclick="return confirm('Are You sure you want to delete this record?');">
                      Delete
                      </a>
                    </td>
                  </tr>
                  <?php
                    } 
                   ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
 <?php
 include 'inc/footer.php';
 ?>