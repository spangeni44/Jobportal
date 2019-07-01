<?php
require 'init.php';
include_once '../class/Database.php';
include_once '../class/User.php';
include '../class/JobProvider.php';
include_once '../class/Category.php';
require 'checklogin.php';

$job_provider =  new JobProvider();
$user=new User();
$category=new Category();
// if($_FILES['rg_image']['size']>100000){
// 	redirect('../job_provider_view.php','error' 'File size should not be greater than 100kb');
// }else{
// debug($_POST,true);
if(isset($_POST, $_POST['submit']) && !empty($_POST)){
	
	$data2=array(
		'phone'=> $_POST['phone'],
		'company_address'=>htmlspecialchars($_POST['company_address']),
		'postal_code'=>htmlspecialchars($_POST['postal_code']),
		'date_of_establishment'=>$_POST['date_of_establishment'],
		'company_field'=>$_POST['job_category'],
		'company_type'=>$_POST['company_type'],
		'company_description'=>$_POST['company_description']
	);
	
	if(isset($_FILES['rg_image']) && $_FILES['rg_image']['error'] == 0){
		$file_name = uploadFile($_FILES['rg_image'], 'user_image');
		// debug($file_name,true);
		if(!$file_name){
			$_SESSION['warning'] = "Image could not be uploaded";
		}
	}
	// $job_provider_id = (isset($_POST['job_provider_id']) && !empty($_POST['job_provider_id'])) ? (int)$_POST['job_provider_id'] : null;
	if($_POST['submit']=='add'){
		$password=sanitize($_POST['rg_password']);
		$email=$_POST['rg_email'];
		$password=sha1($email.$password);
		$data1 = array(
			'full_name' => sanitize($_POST['company_name']),
			'email'=>$email,
			'password' => $password,
			'role'=>'Job Provider',
			'user_image'=>$file_name,
			'status'=>'Active'
		);
		$act ="add";
		$user_id=$user->addUser($data1);
		$data2['user_id']=$user_id;
		if($user_id){
		$success= $job_provider->addJobProvider($data2);
		}
	}else if($_POST['submit']=='edit'){
		/*Update*/
		$data1=array(
					'full_name'=>sanitize($_POST['company_name']),
					'user_image'=>$file_name	
		);
		// debug($data1,true);
		$act = "updat";
		$job_provider_id=$_POST['job_provider_id'];
		$job_provider_detail=$job_provider->getJobProviderById($job_provider_id);
		$user_id=$job_provider_detail[0]->user_id;
		$updated_user_id=$user->updateUser($data1,$user_id);
		// debug($updated_user_id.'Hello',true);
		if($updated_user_id){
		$success = $job_provider->updateJobProvider($data2, $job_provider_id);	
		 }
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../job_provider_register.php', 'error', 'Invalid Process');
		}
		redirect('../job_provider_view.php','error', 'Invalid Process');
	}
	// debug($success,true);
	if($success){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Profile'.$act.' ed successfully');
		}
		redirect('../job_provider_view.php','success','Job Provider '.$act.'ed successfully.');
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry! There was problem while'.$act.'ing Profile Information.');
		}
		redirect('../job_provider_view.php','error','Sorry! There was problem while '.$act.'ing Job Provider information.');
	}
	// debug($success, true);
} else if(isset($_GET, $_GET['id'], $_GET['act']) && $_GET['act'] == "del"){
	/*Delete action*/
	$id = (int)$_GET['id'];
	if($id <= 0){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Information Provided');
		}
		redirect('../job_provider_view.php', 'error','Invalid Job provider id provided.');
	}
	$job_provider_detail = $job_provider->getJobProviderById($id);
	$user_id=$job_provider_detail[0]->user_id;
	$user_detail=$user->getUserById($user_id);
	if(!$job_provider_detail){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'User detail not found or has been already deleted.');
		}
		redirect('../job_provider_view.php', 'error','Job Provider detail not found or has been already deleted.');
	}
	$user_deleted_id=$user->deleteUser($user_id);
	if($user_deleted_id){
	$del = $job_provider->deleteJobProvider($id);
	}
	if($del){
		/*File delete*/
		if($user_detail[0]->user_image != null && file_exists(USER_IMAGE_PATH.$user_detail[0]->user_image)){
			/*Delete*/
			unlink(USER_IMAGE_PATH.$user_detail[0]->user_image);
		}
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Job provider Profile Deleted Successfully.');
		}
		redirect('../job_provider_view.php', 'success','Job Provider profile deleted successfully.');
	} else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry There was problem while deleting user profile');
		}		
		redirect('../job_provider_view.php', 'error','Sorry! There was problem while deleting job Provider profile.');
	}
}
else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Set the data first.');
		}
	redirect('../job_provider_view.php', 'error','Unauthorized access.');
}
// }