<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Sender</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form {
            margin-top: 20px;
        }
        .form label {
            display: block;
            margin-bottom: 5px;
        }
        .form input[type="text"],
        .form input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #ccc;
           
            background-color: #fff;
            color: #333;
            transition: border-color 0.3s ease-in-out;
        }
        .form input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
        }
        .form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Email Sender</h1>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="users">User Emails (comma-separated)</label>
        <input type="text" id="users" name="users" placeholder="Enter emails">
        <input type="submit" value="Send Email">
    </form>
</div>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['users']) && !empty($_POST['users'])) {
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "feedback";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com'; 
            $mail->Password = 'your_password'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; 

            $users = $_POST['users'];
            $admin_email = "kabyashree@gmail.com"; 
            $subject = "Your Subject Here";
            $message = "Your Email Message Here";

            foreach ($users as $user_email) {
                $headers = "From: $admin_email";
                $mail->setFrom('your_email@gmail.com', 'Your Name');
                $mail->addReplyTo('your_email@gmail.com', 'Your Name');
                $mail->addAddress($user_email);
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->send();

                
                $insert_query = "INSERT INTO email_logs (recipient_email, subject, message) VALUES ('$user_email', '$subject', '$message')";
                $conn->query($insert_query);
            }

            echo 'Email(s) sent successfully!';
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }

        $conn->close(); 
    } else {
        echo 'Please select user(s) to send emails.';
    }
}
?>

