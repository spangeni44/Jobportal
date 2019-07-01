<?php
 require_once 'init.php';
require_once 'checklogin.php';
include_once '../class/Database.php';
 include_once '../class/User.php';
 include_once '../class/JobSeeker.php';
 include_once '../class/Category.php';
 
// debug('Hello',true);
$job_seeker =  new JobSeeker();
$user=new User();
// if($_FILES['rg_image']['size']>100000){
 	// redirect('../job_seeker_view.php','error' 'File size should not be greater than 100kb');
 	// }
//  debug($_POST,true);
if(isset($_POST, $_POST['submit']) && !empty($_POST)){
	$data2=array(
		'phone'=> $_POST['phone'],
		'permanent_address'=>htmlspecialchars($_POST['permanent_address']),
		'current_address'=>htmlspecialchars($_POST['current_address']),
		'dob'=>$_POST['dob'],
		'postal_code'=>$_POST['postal_code'],
		'job_category'=>$_POST['job_category'],
		'gender'=>$_POST['gender'],
		'marital_status'=>$_POST['marital_status']
	);
	 // debug($_FILES,true);
	if(isset($_FILES['rg_image']) && $_FILES['rg_image']['error'] == 0){
		$file_name = uploadFile($_FILES['rg_image'], 'user_image');
		// debug($file_name,true);
		if(!$file_name){
			$_SESSION['warning'] = "Image could not be uploaded";
		}
	}
	// $job_seeker_id = (isset($_POST['job_seeker_id']) && !empty($_POST['job_seeker_id'])) ? (int)$_POST['job_seeker_id'] : null;
	if($_POST['submit']=='add'){
		$password=sanitize($_POST['rg_password']);
		$email=$_POST['rg_email'];
		$password=sha1($email.$password);
		$data1 = array(
			'full_name' => sanitize($_POST['full_name']),
			'email'=>$email,
			'password' => $password,
			'role'=>'Job Seeker',
			'user_image'=>$file_name
		);
		// debug($data1,true);
		$act ="add";
		$user_id=$user->addUser($data1);
		$data2['user_id']=$user_id;
		if($user_id){
		$success= $job_seeker->addJobSeeker($data2);
		}
	}else if($_POST['submit']=='edit'){
		/*Update*/
		$data1=array(
					'full_name'=>sanitize($_POST['full_name']),
					'user_image'=>$file_name	
		);
		// debug($data1,true);
		$act = "updat";
		$job_seeker_id=$_POST['job_seeker_id'];
		$job_seeker_detail=$job_seeker->getJobSeekerById($job_seeker_id);
		$user_id=$job_seeker_detail[0]->user_id;
		$updated_user_id=$user->updateUser($data1,$user_id);
		if($updated_user_id){
		$success = $job_seeker->updateJobSeeker($data2, $job_seeker_id);	
		}
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Process');
		}
		redirect('../job_seeker_view.php','error', 'Invalid Process');
	}
	if($success){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Profile '.$act.'ed successfully');
		}
		redirect('../job_seeker_view.php','success','Job Seeker '.$act.'ed successfully.');
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry! There was problem while'.$act.'ing Profile Information.');
		}
		redirect('../job_seeker_view.php','error','Sorry! There was problem while '.$act.'ing Job Seeker information.');
	}
	// debug($success, true);
} else if(isset($_GET, $_GET['id'], $_GET['act']) && $_GET['act'] == "del"){
	/*Delete action*/
	$id = (int)$_GET['id'];
	if($id <= 0){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Information Provided');
		}
		redirect('../job_seeker_view.php', 'error','Invalid Job Seeker id provided.');
	}
	$job_seeker_detail = $job_seeker->getJobSeekerById($id);
	$user_detail=$user->getUserById($id);
	if(!$job_seeker_detail){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'User detail not found or has been already deleted.');
		}
		redirect('../job_seeker_view.php', 'error','Job Seeker detail not found or has been already deleted.');
	}
	$del = $job_seeker->deleteJobSeeker($id);
	if($del){
		/*File delete*/
		if($user_detail[0]->user_image != null && file_exists(USER_IMAGE_PATH.$user_detail[0]->user_image)){
			/*Delete*/
			unlink(USER_IMAGE_PATH.$user_detail[0]->user_image);
		}
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Job Seeker Profile Deleted Successfully.');
		}
		redirect('../job_seeker_view.php', 'success','Job Seeker profile deleted successfully.');
	} else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry There was problem while deleting user profile');
		}		
		redirect('../job_seeker_view.php', 'error','Sorry! There was problem while deleting job seeker profile.');
	}
}
else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../job_seeker_register.php', 'error', 'Set the data first.');
		}
	redirect('../job_seeker_view.php', 'error','Unauthorized access.');
}
// }