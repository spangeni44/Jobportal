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
if(isset($_POST) && !empty($_POST)){
    if(isset($_POST, $_POST['btn_job_preferences']) && !empty($_POST['btn_job_preferences'])){
        $tmp='job_preferences';
        $job_preferences_data=array(
            'job_level'=> $_POST['job_level'],
            'job_category'=>$_POST['job_category'],
            'employment_type'=>$_POST['employment_type'],
            'specialization_and_skills'=>htmlspecialchars($_POST['specialization_and_skills']),
            'career_objective'=>htmlspecialchars($_POST['career_objective'])
        );
    }
    if(isset($_POST, $_POST['btn_personal_info']) && !empty($_POST['btn_personal_info'])){
        $tmp='personal_info';
        $personal_info_data=array(
            'phone'=>$_POST['phone'],
            'current_address'=>$_POST['current_address'],
            'postal_code'=>$_POST['postal_code'],
            'dob'=>$_POST['dob'],
            'gender'=>$_POST['gender'],
            'marital_status'=>$_POST['marital_status']
        );
    }
    if(isset($_POST, $_POST['btn_education']) && !empty($_POST['btn_education'])){
        $tmp='education';
        $education_data=array(
            'degree1'=>$_POST['degree1'],
            'deucation_program1'=>$_POST['deucation_program1'],
            'education_board1'=>$_POST['education_board1'],
            'name_of_institution1'=>$_POST['name_of_institution1'],
            'currently_running1'=>$_POST['currently_running1'],
            'start_date1'=>$_POST['start_date1'],
            'graduation_date1'=>$_POST['graduation_date1']
        );
    }
    if(isset($_POST, $_POST['btn_training']) && !empty($_POST['btn_training'])){
        $tmp='training';
        $training_data=array(
            'name_of_course1'=>$_POST['name_of_course1'],
            'institution_name1'=>$_POST['institution_name1'],
            'duration1'=>$_POST['duration1'],
            'completion_date1'=>$_POST['completion_date1']
        );
    }
    if(isset($_POST, $_POST['btn_work_experience']) && !empty($_POST['btn_work_experience'])){
        $tmp='work_experience';
        $work_experience_data=array(
            'organization_name1'=>$_POST['organization_name1'],
            'nature_of_organization1'=>$_POST['nature_of_organization1'],
            'job_location1'=>$_POST['job_location1'],
            'job_title1'=>$_POST['job_title1'],
            'job_category1'=>$_POST['job_category1'],
            'job_level1'=>$_POST['job_level1'],
            'currently_working1'=>$_POST['currently_working1'],
            'start_date1'=>$_POST['start_date1'],
            'end_date1'=>$_POST['end_date1'],
            'duties_and_responsibilities1'=>$_POST['duties_and_responsibilities1']
        );
    }
    if(isset($_POST, $_POST['btn_references']) && !empty($_POST['btn_references'])){
        $tmp='references';
        $references_data=array(
            'reference_name1'=>$_POST['reference_name1'],
            'job_title1'=>$_POST['job_title1'],
            'organization_name1'=>$_POST['organization_name1'],
            'email1'=>$_POST['email1'],
            'personal_contact1'=>$_POST['personal_contact1'],
            'office_contact1'=>$_POST['office_contact1']
        );
    }
    if(isset($_POST, $_POST['btn_social_media']) && !empty($_POST['btn_social_media'])){
        $tmp='social_media';
        $social_media_data=array(
            'social_media_name1'=>$_POST['social_media_name1'],
            'link_to_your_profile1'=>$_POST['link_to_your_profile1']
        );
    }
    if(isset($_POST, $_POST['btn_other_information']) && !empty($_POST['btn_other_information'])){
        $tmp='other_information';
        $other_information_data=array(
            'willing_to_travel_outside'=>$_POST['willing_to_travel_outside'],
            'have_two_wheeler_license'=>$_POST['have_two_wheeler_license'],
            'have_own_two_wheeler'=>$_POST['have_own_two_wheeler'],
            'have_four_wheeler_license'=>$_POST['have_four_wheeler_license'],
            'have_own_four_wheeler'=>$_POST['have_own_four_wheeler']
        );
    }
	 // debug($_FILES,true);
	if(isset($_FILES['rg_image']) && $_FILES['rg_image']['error'] == 0){
		$file_name = uploadFile($_FILES['rg_image'], 'user_image');
		// debug($file_name,true);
		if(!$file_name){
			$_SESSION['warning'] = "Image could not be uploaded";
		}
	}
	// $job_seeker_id = (isset($_POST['job_seeker_id']) && !empty($_POST['job_seeker_id'])) ? (int)$_POST['job_seeker_id'] : null;
	if($_POST['btn_job_preferences']=='add'){
		$act ="add";
		$user_id=$user->addUser($data1);
		$data2['user_id']=$user_id;
		if($user_id){
		$success= $job_seeker->addJobSeeker($data2);
        }
    }else if($_POST['btn_job_preferences']=='edit'){
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
    }else{
        if($_SESSION['front_end']=='Yes'){
			redirect('../../', 'error', 'Invalid Process');
		}
		redirect('../job_seeker_view.php','error', 'Invalid Process');
    }
    
    if($_POST['btn_personal_info']=='add'){
        $act ="add";
        $user_id=$user->addUser($data1);
        $data2['user_id']=$user_id;
        if($user_id){
            $success= $job_seeker->addJobSeeker($data2);
        }
    }else if($_POST['btn_personal_info']=='edit'){
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
			redirect('../../edit_resume.php', 'error', 'Set the data first.');
		}
	redirect('../job_seeker_view.php', 'error','Unauthorized access.');
}
// }