<?php

require '/home/bluetick/public_html/PHPMailer/src/Exception.php';
require '/home/bluetick/public_html/PHPMailer/src/PHPMailer.php';
require '/home/bluetick/public_html/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name'],$_POST['email'],$_POST['message'])){
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'brackets.developer17@gmail.com'; // SMTP username
        $mail->Password = 'mowjyhrzorioplqg'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('contacts.officialblueticksinnovations@gmail.com', 'blue ticks');
        $mail->addAddress('brackets.developer17@gmail.com', 'bharath'); // Add a recipient
        $mail->addAddress('officialblueticksinnovations@gmail.com', 'sathvik '); // Add a recipient
        $mail->addAddress('bharathac7@gmail.com', 'bharath'); // Add a recipient
        $mail->addAddress('sathvinarayanapps@gmail.com', 'sathvik '); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Someone wants to Contact';
        $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
        echo "<script>alert('Submitted Successfully! Thank you';window.location.href = 'blueticksinnovations.com';)</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}
    
else
{
    echo"notset";
}
?>