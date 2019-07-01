<?php
 use \home\thapaeastlink\public_html\jobportal\admin\config\PHPMailer\src\PHPMailer;
 use \home\thapaeastlink\public_html\jobportal\admin\config\PHPMailer\src\Exception;
 
//  jobportal\admin\config\PHPMailer\Exception;
require_once 'init.php';
include_once '../class/Database.php';
include_once '../class/User.php';

require_once '../config/PHPMailer/src/PHPMailer.php';
require_once '../config/PHPMailer/src/SMTP.php';
require_once '../config/PHPMailer/src/Exception.php';

// require_once '../config/PHPMailer/autoload.php';
$mail=new PHPMailer(true);
/* Open the try/catch block. */
try {
    /* Set the mail sender. */
    $mail->setFrom('jobportal@demo.eastlink.xyz', 'Suresh Pangeni');
 
    /* Add a recipient. */
    $mail->addAddress('spangeni44@gmail.com', 'Receiver');
 
    /* Set the subject. */
    $mail->Subject = 'Reset Password';
 
    /* Set the mail message body. */
    $mail->Body = 'You requested for new password.';
 
    /* Finally send the mail. */
    $mail->send();
    redirect('../../');
 }
 catch (Exception $e)
 {
    /* PHPMailer exception. */
    echo $e->errorMessage();
 }
 catch (Exception $e)
 {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
 }
 















// $email='spangeni44@gmail.com';
// $to='spangeni44@gmail.com';
// // $to = $_POST['fg_email'];
// $subject = "New Password For Your Account";
// $headers = "From: $email\n";
// $message = "A .\n

// Email Address: $email";
// $user ="$email";
// $usersubject = "Forgot Password";
// $userheaders = "From: spangeni44@gmail.com\n";
// $token=generateRandomStr(6,100);
// $registered_user=new User();
// $user_detail=$registered_user->getUserByUserName($email);
// if(!$user_detail){
//       redirect('../../','warning','User not found. Please Register first!!');
// }
// $password=sha1($email.$token);
// $data=array(
//             'password'=>$password
// );
// $registered_user->updateUser($data,$user_detail->id);
// // debug($token,true);
// $usermessage = "Your new password is ".$token;
// mail($to,$subject,$message,$headers);
// mail($user,$usersubject,$usermessage,$userheaders);
// redirect('../../', 'success', 'Password Reset Success. Check your e-mail for the new password');
 ?>