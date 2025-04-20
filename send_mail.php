<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Add this check for POST method
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp-mail.outlook.com';              //Outlook SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emialignyou1@outlook.com';             //Your Outlook email
        $mail->Password   = 'vrnheqjgfjsmpevp';                      //Your Outlook password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;                                  //Outlook SMTP port

        $mail->setFrom('emialignyou1@outlook.com', 'Emi');              
        $mail->addAddress('bluestacksfrosted@gmail.com', 'Bluestacks');  // Changed to your preferred display name

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'I Love You';
        $mail->Body    = 'My Love. I love you so much. You are the best thing that has ever happened to me ❤';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    http_response_code(405);
    echo "Method not allowed";
}
