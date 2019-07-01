
<?php 
    include_once 'init.php';
    if(isset($_POST) && !empty($_POST)){
        // $sender_name=$_POST['sender_name'];
        $sender_phone=$_POST['sender_phone'];
        $sender_message=$_POST['sender_message'];
        $sender_email=$_POST['sender_email'];
        $sender_name = str_replace("\n.", "\n..", $_POST['sender_name']);
        mail('spangeni44@gmail.com', 'Contact Mail', 'Hello');
        redirect('../../contact_us.php', 'success', 'We successfully received your feedback. Thank you for contacting us.');
        // }else{
        //     redirect('../../contact_us.php', 'error', "Unable to receive your message at the moment!!");
        // }
    }else{
        redirect('../../contact_us.php', 'warning', 'Set the data first!!');
    }
?>