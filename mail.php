<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$name = $_REQUEST['fname'];
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

$mail->From = "tushar.udainiyan_cs18@gla.ac.in";
$mail->FromName = "Tushar Udainiyan";
//
$mail->addAddress($email, $name);
$mail->addAddress("tushar.udainiyan_cs18@gla.ac.in", "Tushar");
//
$mail->isHTML(true);
//

$mail->Subject = "New User";
$mail->Body = "Thanks for visiting my profile.";

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent successfully";
}
//$mail = mail("tushar.udainiyan_cs18@gla.ac.in","visit at your profile from".$name,$txt.$email);
//$mail1= mail($email, "Tushar Udainiyan", "Thanks fro visiting my profile");
//if($mail){
//    echo"success";
//}
//else{
//    echo "0";
//}

//database connection

$conn = new mysqli("localhost", "root", "", "peace");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `entries`(`name`, `email`, `message`) VALUES ('$name','$email','$txt' )";

if ($conn->query($sql) === TRUE) {
    echo "1";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();