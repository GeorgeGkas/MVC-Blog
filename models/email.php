<?php

function checkEmailAddress($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate E-mail Address
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email){
        return false;
    }
    return true;
}

function send_email($email, $subject, $message) {
    date_default_timezone_set('Etc/UTC');
    require_once 'classes/PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->isHTML(true);


    $mail->Username = "your_email@gmail.com";
    $mail->Password = "your_application_password";
    $mail->setFrom($email, "My Blog Auto Mailer");

    $mail->addAddress("your_email@gmail.com");

    //Set the subject line
    $mail->Subject = "Blog Email - ";
    $mail->Subject .= $subject;

    $mail->Body = '<p>The user : '.$email.' has send you a new email.</p><p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>';
    $mail->Body .= $message;

    //send the message, check for errors
    if ($mail->send()) {
        return true;
    }
    else {
        return false;
    }
}
?>
