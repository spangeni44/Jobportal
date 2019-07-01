<?php
require 'init.php';
include_once '../class/Database.php';
include_once '../class/User.php';
include_once '../class/JobPost.php';
include_once 'checklogin.php';

$job_post =  new JobPost();
$user=new User();
if(isset($_POST, $_POST['submit']) && !empty($_POST)){
	$data2=array(
		// 'company_id'=> $_POST['phone'],
		'job_category'=>$_POST['job_category'],
		'position'=>$_POST['position'],
		'no_of_vacancies'=>$_POST['no_of_vacancies'],
		'job_level'=>$_POST['job_level'],
		'employment_type'=>$_POST['employment_type'],
		'offered_salary'=>$_POST['offered_salary'],
		'deadline'=>$_POST['deadline'],
		'job_location'=>$_POST['job_location'],
		'experience_required'=>$_POST['experience_required'],
		'education_level'=>$_POST['education_level'],
		'is_hot_job'=>$_POST['is_hot_job'],
		'is_instant_job'=>$_POST['is_instant_job'],
		'job_description'=>htmlspecialchars($_POST['job_description']),
		'applying_procedure'=>htmlspecialchars($_POST['applying_procedure']),
		'added_by'=>$_SESSION['user_id'],
		'qualification'=>htmlspecialchars($_POST['qualification'])
	);
	
	if($_POST['submit']=='add'){
		 // debug($data1,true);
		$act ="add";
		$success= $job_post->addJobPost($data2);

	}else if($_POST['submit']=='edit'){
		
		$act = "updat";
		$job_post_id=$_POST['job_post_id'];
		// debug($job_post_id,true);
		$job_post_detail=$job_post->getJobPostById($job_post_id);
		$success = $job_post->updateJobPost($data2, $job_post_id);	
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Process');
		}
		redirect('../job_post_view.php','error', 'Invalid Process');
	}
	// debug($success,true);
	if($success){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Job '.$act.'ed successfully');
		}
		redirect('../job_post_view.php','success','Job Post '.$act.'ed successfully.');
	} else {
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry! There was problem while'.$act.'ing Job Information.');
		}
		redirect('../job_post_view.php','error','Sorry! There was problem while '.$act.'ing Job Post information.');
	}
	// debug($success, true);
} else if(isset($_GET, $_GET['id'], $_GET['act']) && $_GET['act'] == "del"){
	/*Delete action*/
	$id = (int)$_GET['id'];
	if($id <= 0){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Information Provided');
		}
		redirect('../job_post_view.php', 'error','Invalid Job Post id provided.');
	}
	$job_post_detail = $job_post->getJobPostById($id);
	$user_detail=$user->getUserById($id);
	if(!$job_post_detail){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Job Post not found or has been already deleted.');
		}
		redirect('../job_post_view.php', 'error','Job post not found or has been already deleted.');
	}
	$del = $job_seeker->deleteJobPost($id);
	if($del){
		if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'success', 'Job Post Deleted Successfully.');
		}
		redirect('../job_post_view.php', 'success','Job Post Deleted Successfully.');
	} else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Sorry There was problem while deleting job post.');
		}		
		redirect('../job_post_view.php', 'error','Sorry! There was problem while deleting job post.');
	}
}
else {
	if($_SESSION['front_end']=='Yes'){
			redirect('../../job_post_add.php', 'error', 'Set the data first.');
		}
	redirect('../job_post_view.php', 'error','Unauthorized access.');
}
// }