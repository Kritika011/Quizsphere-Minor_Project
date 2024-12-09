<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
session_start();
function sendOtpEmail($email, $verification_token)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kritikapramanik11@gmail.com';
        $mail->Password = 'pocv mdtm irlv tujv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Content
        $mail->setFrom('kritikapramanik11@gmail.com', 'Quiz Sphere');
        $mail->addAddress($email);


        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Email Verification';
        $mail->Body = 'Your OTP for verification is: <b>' . $verification_token . '</b>. This OTP is valid for 10 minutes.';

        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>