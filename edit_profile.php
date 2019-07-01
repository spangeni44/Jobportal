<?php require_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/Category.php';
    include_once 'admin/class/JobSeeker.php';
    
    if($_SESSION['role']=='Job Seeker'){
      require_once 'inc/job_seeker_edit.php';
    }else if($_SESSION['role']=='Job Provider'){
      require_once 'inc/job_provider_edit.php';
    }else{
      redirect('index.php','warning', 'Only Employer and Job Seeker Can Edit Profile!!');
    }
?>
<hr>
<?php include_once 'inc/footer.php'; ?>
