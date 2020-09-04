<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$txt = $_REQUEST['message'];



$postData = $uploadedFile = $statusMsg = '';
$msgClass = 'errordiv';


// Load Composer's autoloader
require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging.
//$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "";
$mail->Password = "";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "SMTP";
//Set TCP port to connect to
$mail->Port = 25;

$mail->From = "noreply@omsaibuildingmaterials.ncrcab.in";
$mail->FromName = "Goabrige";
//
$mail->addAddress($email, $name);
$mail->addAddress("tushar.udainiyan_cs18@gla.ac.in", "Tushar");
//
$mail->isHTML(true);
//

$mail->Subject = "New User";
$mail->Body = "
Name:$name<br>
Message:$txt<br>
Email:$email<br>";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent successfully";
}

