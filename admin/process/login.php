<?php
require_once 'init.php';
include_once '../class/Database.php';
include_once '../class/User.php';

if(isset($_POST) && !empty($_POST)){
    $user = new User();
	$user_name = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	//debug($user_name,true);
	if(!$user_name){
		//debug($user_name,true);
		if($_SESSION['front_index']=='Yes'){
			redirect('../../','error','Invalid username format. Username should be email type.');
			unset($_SESSION['front_index']);
		}
		redirect('../','error','Invalid username format. Username should be email type.');
	}
	$password = sha1($user_name.$_POST['password']);
	$user_info = $user->getUserByUserName($user_name);
	if(isset($user_info) && !empty($user_info)){
		if($password == $user_info[0]->password){
			if($user_info[0]->status == 'Active'){
				$_SESSION['user_id'] = $user_info[0]->id;
				$_SESSION['name'] = $user_info[0]->full_name;
				$_SESSION['email'] = $user_info[0]->email;
				$_SESSION['role'] = $user_info[0]->role;
				$_SESSION['user_image'] = $user_info[0]->user_image;
				$_SESSION['status']=$user_info[0]->status;
				// debug($_SESSION,true);
				$token = generateRandomStr(100);
				$_SESSION['token'] = $token;
				if(isset($_POST['remember'])){
					setcookie('_au', $token, (time()+864000), "../");
				}
				$data = array(
					'remember_token' => $token
				); //"remember_token = '".$token."'";
				$user->updateUser($data, $user_info[0]->id);
				if($_SESSION['front_index']=='Yes'){
					redirect('../../');
				}
				redirect('../dashboard.php');
			} else {
				if($_SESSION['front_index']=='Yes'){
				redirect('../../', 'error', 'Your account is not activated yet.');
			}
			redirect('../', 'error', 'Your account is not activated yet.');
			}
		} else {
			if($_SESSION['front_index']=='Yes'){
			redirect('../../', 'error', 'Invalid Password.');
		}
		redirect('../', 'error', 'Invalid Password.');
		}
	} else {
		if($_SESSION['front_index']=='Yes'){
		redirect('../../', 'error', 'User not found.');
	}
	redirect('../', 'error', 'User not found.');
	}
} else {
	if($_SESSION['front_index']=='Yes'){
	redirect('../../', 'error', 'Set the data first!');
}
	redirect('../', 'error', 'Unauthorized access.');

}