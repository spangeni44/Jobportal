<?php
  include 'inc/header.php';
  require_once 'inc/sidebar_menu.php';
//   include 'config/init.php';
  require_once 'inc/checklogin.php';
  include_once 'class/Database.php';
  include_once 'class/JobSeeker.php';
  include_once 'class/User.php';
  unset($_SESSION['front_end']);
  ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Job Portal Nepal </h1>
          <p> Employer</p>
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
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>E-mail</th>
                    <th>Current Address</th>
                    <th>Gender</th>
                    <th>Job Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                  $user=new User();
                  $job_seeker=new JobSeeker();
                  // $job_seeker_all_detail=$job_seeker->getAllJobSeekersDetail();
                  // debug($job_seeker_all_detail,true);
                  $job_seeker_details=$job_seeker->getAllJobSeeker();
                    $i=0;
                    foreach($job_seeker_details as $job_seeker_detail){
                       $user_detail=$user->getUserById($job_seeker_detail->user_id);
                        //debug($user_detail,true);
                       ?>
                    <tr>
                      <td> <?php echo ++$i; ?></td>
                      <td><?php echo $user_detail[0]->full_name; ?></td>
                      <td><?php echo $user_detail[0]->email; ?></td>
                      <td><?php echo $job_seeker_detail->current_address; ?></td>
                      <td><?php echo $job_seeker_detail->gender; ?></td>
                      <td><?php echo $job_seeker_detail->job_category; ?></td>                                        
                                                              
                      <td>
                      <!-- <a href="customer.php?id=&amp;act=show" class="btn-link">
                      Show
                      </a>
                      | -->
                      <a href="job_seeker_add.php?id=<?php echo $job_seeker_detail->id;?>&amp;act=edit" class="btn-link">
                      Edit
                      <!-- &amp;act=edit -->
                      </a>
                      | 
                      <a href="process/job_seeker_add.php?id=<?php echo $job_seeker_detail->id; ?>&amp;act=del" onclick="return confirm('Are You sure you want to delete this record?');">
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