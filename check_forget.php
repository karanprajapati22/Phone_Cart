<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['sendmail'])){
include 'admin/dbcontroller.php';
$obj=new DBcontroller();

$email=$obj->secure($_POST['email']);

$query="select * from registration where `email` = '$email'";

$result=$obj->fetchresult($query);
// $obj->formate($result);
$name=$result['last_name']." ".$result['first_name'];
$count=$obj->numrows($query);
if($count>0){
        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';

        $mail = new PHPMailer(true);
        session_start();
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'phonecart2024@gmail.com';                     // SMTP username
            $mail->Password   = 'cpchgtxcljqzryai';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('phonecart2024@gmail.com', 'Phonecart');
            $mail->addAddress($email, 'Phonecart');     // Add a recipient
            $_SESSION['info'] = "Check your mail to forget password";
            $_SESSION['otpforget'] = rand(111111, 999999);
            $_SESSION['email'] = $email;
            $otp = $_SESSION['otpforget'];
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = "Password Reset";
            $mail->Body    = " Hi," . $name . "</br> Click here too reset your password http://localhost/phonecart/otp_varification.php<br> OTP is: " . $otp;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            header('Location:otp_varification.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }else{
        header('Location:forgot_pass.php?alert=User not exist');
      
    }
}
    else{
        header('Location:forgot_pass.php?alert=Wrong button pressed');
    }
?>