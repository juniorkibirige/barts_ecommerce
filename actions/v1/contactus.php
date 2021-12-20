<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $msg = wordwrap($_POST['message'], 70);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    require('phpmailer/phpmailer/src/Exception.php');
    require ('phpmailer/phpmailer/src/PHPMailer.php');
    require ('phpmailer/phpmailer/src/SMTP.php');

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->Username = "giantherbalrems@gmail.com";
    $mail->Password = "wanyana2019";

    $mail->isHTML(false);
    $mail->setFrom('giantherbalrems@gmail.com', $_POST['name']);
    $mail->addAddress('info@giantherbalrems.com', 'Giant Herbal Remedies');
    $mail->addReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = $name.' sent you a message from your website';
    $mail->Body = $msg;

    $response = [];

    if (!$mail->send()) {
        $response['response'] = 'Message could not be sent.';
        $response['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
        $response['status'] = 0;
    } else {
        $response['response'] = 'Message has been sent';
        $response['status'] = 1;
    }

    echo json_encode($response);
} else {
    echo 'Direct Scripting not allowed!';
}
