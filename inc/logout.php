<?php 
include '../admin/config/config.php';
include '../admin/config/functions.php';
include '../admin/config/autoload.php';
//  require_once 'init.php';
include_once '../admin/class/Database.php';
include_once '../admin/class/User.php';
$user_id = $_SESSION['user_id'];
$user = new User();
$data = array(
	'remember_token' => ''
);
$user->updateUser($data, $user_id);

if(isset($_COOKIE['_au']) && !empty($_COOKIE['_au'])){
	setcookie('_au', '', time()-60, "../");
}
session_destroy();
    redirect('../');
?>