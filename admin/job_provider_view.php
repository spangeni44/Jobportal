<?php
  include 'inc/header.php';
  include 'inc/sidebar_menu.php';
  require_once 'inc/checklogin.php';
  include_once 'class/Database.php';
  include_once 'class/User.php';
  include_once 'class/JobProvider.php';
  include_once 'class/Category.php';
  unset($_SESSION['front_end']);
  unset($_SESSION['front_index']);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
        
          <h1><i class="fa fa-th-list"></i> Job Portal Nepal </h1>
          <p> Employer View</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php flash(); ?>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Company Name</th>
                    <th>E-mail</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Company Field</th>
                    <th>Compny Type</th>
                    <th>Action</th>
                   
                  </tr>
                </thead>
                <tbody>
                 <?php
                  $user=new User();
                  $job_provider=new JobProvider();
                  // $job_provider_all_detail=$job_provider->getAllJobProvidersDetail();
                  // debug($job_provider_all_detail,true);
                  $job_provider_details=$job_provider->getAllJobProvider();
                    $i=0;
                    foreach($job_provider_details as $job_provider_detail){
                       $user_detail=$user->getUserById($job_provider_detail->user_id);
                        $category=new Category;
                        $category_detail=$category->getCategoryByid($job_provider_detail->company_field);
                        
                       ?>
                    <tr>
                      <td> <?php echo ++$i; ?></td>
                      <td><?php echo $user_detail[0]->full_name; ?></td>
                      <td><?php echo $user_detail[0]->email; ?></td>
                      <td><?php echo $job_provider_detail->phone; ?></td>
                      <td><?php echo $job_provider_detail->company_address; ?></td>                                        
                      <td><?php echo $category_detail[0]->title; ?></td>                                        
                      <td><?php echo $job_provider_detail->company_type; ?></td>                 
                                                              
                      <td>
                      <!-- <a href="customer.php?id=&amp;act=show" class="btn-link">
                      Show
                      </a>
                      | -->
                      <a href="employer_add.php?id=<?php echo $job_provider_detail->id;?>&amp;act=edit" class="btn-link">
                      Edit
                      <!-- &amp;act=edit -->
                      </a>
                      | 
                      <a href="process/employer_add.php?id=<?php echo $job_provider_detail->id; ?>&amp;act=del" onclick="return confirm('Are You sure you want to delete this record?');">
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