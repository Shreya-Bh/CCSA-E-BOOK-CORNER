<?php   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kabyashreeboruah601@gmail.com'; 
    $mail->Password = 'wush gkeo nsel gpbs'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('kabyashreeboruah601@gmail.com'); 

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);

    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];

    $mail->send();

    echo "
    <script>
    alert('Email has been sent successfully');
    document.location.href = 'sendemail.php';
    </script>
    ";
}
