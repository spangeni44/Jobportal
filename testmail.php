<?php
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "jobportal@demo.eastlink.xyz";
    // $to = "suresh.pangeni@eastlink.net.np";
    // $subject = "Checking PHP mail";
    // $message = "PHP mail works just fine";
    // $headers = "From:" . $from;
    // mail($to,$subject,$message, $headers);
    // echo "The email message was sent.";
?>
<?php
use jobportal\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'mail.demo.eastlink.xyz';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'jobportal@demo.eastlink.xyz';
$mail->Password = 'jobportal@121';
$mail->setFrom('jobportal@demo.eastlink.xyz', 'Suresh Pangeni');
$mail->addReplyTo('jobportal@eastlink.xyz', 'Jobportal Nepal');
$mail->addAddress('spangeni44@gmail.com', 'Receiver Name');
$mail->Subject = 'PHPMailer SMTP message';
// $mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->AltBody = 'This is a html message body';
$mail->addAttachment('message.html');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>

?>