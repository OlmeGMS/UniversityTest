<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-29
 * Time: 20:24
 */
require_once ('EmailServices.php');
require_once ('mailer/PHPMailerAutoload.php');

define('MAIL_USER','integer.sigte@gmail.com');
define('MAIL_PASSWORD','Colombia2015');

class EmailServiceImp implements EmailServices
{
    public function sendEmail($mailSend, $nameSend, $subject, $messageSend)
    {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 25;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = MAIL_USER;

        //Password to use for SMTP authentication
        $mail->Password = MAIL_PASSWORD;

        //Set who the message is to be sent from
        $mail->setFrom('integer.sigte@gmail.com', 'sigte.edu.co');

        //Set an alternative reply-to address
        $mail->addReplyTo('integer.sigte@gmail.com', 'sigte.edu.co');

        //Set who the message is to be sent to
        $mail->addAddress($mailSend, $nameSend);

        //Set the subject line
        $mail->Subject = $subject;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($messageSend);

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            return false; // "Mailer Error: " . $mail->ErrorInfo;
        } else {
            return true;
        }
    }

    public function sendEmailMassive()
    {
        // TODO: Implement sendEmailMassive() method.
    }

    public function sendEmailAttached()
    {
        // TODO: Implement sendEmailAttached() method.
    }

    public function sendEmailMassiveAttached()
    {
        // TODO: Implement sendEmailMassiveAttached() method.
    }

}
?>