<?php 
	ob_start();
	session_start();
	define('ENVIRONMENT','PRODUCTION');
	if(ENVIRONMENT=='DEVELOPMENT'){
		error_reporting(E_ALL);
		define('SITE_URL', 'http://localhost:81/jobportal');
		define('DB_HOST','localhost');
		define('DB_USER','root');
		define('DB_PWD', '');
		define('DB_NAME', 'jobportalnepal');
	}elseif(ENVIRONMENT=='PRODUCTION'){
		error_reporting(E_ALL);
		define('SITE_URL', 'http://demo.eastlink.xyz/jobportal/');
		define('DB_HOST', 'localhost');
		define('DB_USER','root');
		define('DB_PWD', '');
		define('DB_NAME', 'jobportalnepal');
	}
	define('ADMIN_URL', SITE_URL.'/admin/');
	define('ADMIN_ASSETS', ADMIN_URL.'assets/');
	define('ADMIN_VENDOR_URL', ADMIN_ASSETS.'vendor/');
	define('ADMIN_CSS_URL', ADMIN_ASSETS.'css/');
	define('ADMIN_JS_URL', ADMIN_ASSETS.'js/');
	define('SITE_NAME','Jobportal, An Online Based Nepali Jobportal');
	define('META_KEYWORDS','nepali jobs, jobportal, online jobs, nepal, rojgari, employment, vacancy, loksewa, government job, it jobs');
	define('META_DESCRIPTION','Jobportal is an online based job searching and job posting website. We update latest jobs vacany posts daily.' );
	
	define('CLASS_PATH', $_SERVER["DOCUMENT_ROOT"].'jobportal/admin/class/');
	define('ERROR_PATH', $_SERVER['DOCUMENT_ROOT'].'jobportal/admin/error/');

	define('ALLOWED_IMAGE_EXTENSION', array('jpg','jpeg','png','svg','bmp','gif'));

	define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'].'/jobportal/admin/uploaded_files/');
	define('UPLOAD_URL', ADMIN_URL.'/uploaded_files/');
	define('USER_IMAGE_URL', UPLOAD_URL.'user_image/');
	define('USER_IMAGE_PATH', UPLOAD_PATH.'user_image/');
	define('COMPANY_LOGOS_URL', UPLOAD_URL.'company_logos/');
	define('COMPANY_LOGOS_PATH', UPLOAD_PATH.'company_logos/');
	define('ASSETS_URL',SITE_URL.'/assets/');
	define('ASSETS_IMAGES_URL',ASSETS_URL.'/images/');
	define('SERVER_EMAIL', 'spangeni44@gmail.com');
	ob_flush();
 ?>