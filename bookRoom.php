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
if(isset($_POST['checkin']) && $_POST['checkin'] != '') {
if(isset($_POST['checkout']) && $_POST['checkout'] != '') {
if(isset($_POST['select1']) && $_POST['select1'] != '') {
if(isset($_POST['select2']) && $_POST['select2'] != '') {
if(isset($_POST['select3']) && $_POST['select3'] != '') {
if(isset($_POST['message']) && $_POST['message'] != '') 
{   
     $mail->IsHTML(true);
    $mail->AddAddress("stays42@gpcfindia.org", "recipient-name");
    $mail->SetFrom('stays42@gpcfindia.org', "Nature Camping Coorg");
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "Booking Details";
    $content = "<b>Name</b>:<b>".$_POST['name']."</b><br />
<b>Email</b>:<b>".$_POST['email']."</b><br />
<b>checkin</b>:<b>".$_POST['checkin']."</b><br />
<b>checkout</b>:<b>".$_POST['checkout']."</b><br />
<b>adult</b>:<b>".$_POST['select1']."</b><br />
<b>child</b>:<b>".$_POST['select2']."</b><br />
<b>room</b>:<b>".$_POST['select3']."</b><br />
<b>Message</b>:<b>".$_POST['message']."</b>";


    $mail->MsgHTML($content);
    if(!$mail->Send()) {
        echo "Error while sending Email.";
//        var_dump($mail);
    } else {
        header( "refresh:5;url=booking.html" );
        echo "Email sent successfully";
    }
}
else {
    echo "message is mandatory";
}
}
else{
    echo "select3 is mandatory";
}
}
else{
    echo "select2 is mandatory";
}
}
else{
    echo "select1 is mandatory";
}
}
else {
    echo "checkout is mandatory";
}
}
else {
    echo "checkin is mandatory";
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