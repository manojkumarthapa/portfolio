<?php




// require('../vendor/phpmailer_files-main/smtp/PHPMailerAutoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
// $fName = $_POST['fName'];
// $lName = $_POST['lName'];
// $email = $_POST['email'];
// $message = $_POST['message'];
// $fullName = $fName . " " . $lName;


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
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'manojthapaportfolio@gmail.com';                     //SMTP username
    $mail->Password   = 'manojmanoj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('manojthapaportfolio@gmail.com', $fullName);
    $mail->addAddress('manojthapaportfolio@gmail.com');     //Add a recipient
    $mail->addAddress('manojkumarthapa@manojdb.com');              //Name is optional


    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send(){
    //     $status = "success"
    //     $response = "Email is sent!";
    // };
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