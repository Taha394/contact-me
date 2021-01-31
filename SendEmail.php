<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['username']) && isset($_POST['email'])) {
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();
    // SMTP Setting

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "salahtaha741@gmail.com";
    $mail->Password = "Taha11@@Hala";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // email setting

    $mail->isHTML(true);
    $mail->setFrom($email, $user);
    $mail->addAddress("salahtaha741@gmail.com");
    $mail->message = ("$email ($msg)");
    $mail->cellphone = $cell;

    if ($mail->send()) {
        $status = "success";
        $response = "email is sent!";
    } else {
        $status = "failed";
        $response = "something is wrong: <br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
};
