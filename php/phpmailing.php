<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$mail = new PHPMailer(true);


try {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $fullName = $fName . " " . $lName;



    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.privateemail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'manojkumarthapa@manojdb.com';                     //SMTP username
    $mail->Password   = 'namecheap';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('manojkumarthapa@manojdb.com', $fullName);
    $mail->addAddress('manojkumarthapa@manojdb.com', 'no-reply@manojdb.com'); 
    $mail->addAddress('manojthapaportfolio@gmail.com', 'no-reply@gmail.com');     //Add a recipient
    $mail->addReplyTo($email, $fullName);
    $mail->addBCC($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sent from ' . $email;
    // $mail->Body    = $message;
    $mail ->Body ="First Name: " . $fName . "<br>" . "Last Name: " . $lName . "<br>" . "Email: " . $email . "<br>" . "Message: " . $message . "<br>";

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}







// $mail->isSMTP();
// $mail->Host = "smtp.gmail.com";
// $mail->SMTPAuth = true;
// $mail->Username = "manojthapaportfolio@gmail.com";
// $mail->Password = 'manojmanoj';
// $mail->Port = 587 ;
// $mail->SMTPSecure = "TLS";
// // $mail->SMTPDebug = 2;

// //email settings
// $mail->isHTML(true);
// $mail->setFrom("manojthapaportfolio@gmail.com", $fullName);
// $mail->addAddress("manojkumarthapa@manojdb.com");
// $mail->addAddress("manojthapaportfolio@gmail.com");

// $mail->Body = $message;

// if($mail->send()){
//     $status = "success";
//     $response = "Email is sent!";
// }
// else
// {
//     $status = "failed";
//     $response = "Something is wrong: <br>" . $mail->ErrorInfo;
// }

// exit(json_encode(array("status" => $status, "response" => $response)));



?>