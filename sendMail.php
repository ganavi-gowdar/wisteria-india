<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ .'/vendor/autoload.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ .'/vendor/phpmailer/phpmailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "mail.gpcfindia.org";
$mail->Username   = "stays42@gpcfindia.org";
$mail->Password   = "Oogway@12345";

if($_POST){
if(isset($_POST['name']) && $_POST['name'] != ''){
if(isset($_POST['email']) && $_POST['email'] != '') {
if(isset($_POST['subject']) && $_POST['subject'] != '') {
if(isset($_POST['message']) && $_POST['message'] != '')
 {   
     $mail->IsHTML(true);
    $mail->AddAddress("stays42@gpcfindia.org", "recipient-name");
    $mail->SetFrom('stays42@gpcfindia.org', "Nature Camping Coorg");
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "Customer Contact";
    $content = "<b>Name</b>:<b>".$_POST['name']."</b><br />
<b>Email</b>:<b>".$_POST['email']."</b>
<b>Subject</b>:<b>".$_POST['subject']."</b><br />
<b>Message</b>:<b>".$_POST['message']."</b>";


    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Error while sending Email.";
//        var_dump($mail);
    } else {
        header( "refresh:5;url=contact.html" );
        echo "Email sent successfully";
    }
}
else {
    echo "message is mandatory";
}
}
else {
    echo "subject is mandatory";
}
 } 
 else {
    echo "email is mandatory";
 } 
} 
else {
    echo "name is mandatory";
}
} 
else{
echo "not a valid post request";
}