<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-29
 * Time: 20:24
 */

require_once ('mailer/PHPMailerAutoload.php');
require_once __DIR__.'/../model/user/UserDao.class.php';
require_once __DIR__.'/IEmailServices.php';
require_once __DIR__.'/../model/user/User.class.php';

define('MAIL_USER','integer.sigte@gmail.com');
define('MAIL_PASSWORD','Colombia2015');
define('HOST','smtp.gmail.com');

class EmailService implements IEmailServices
{
    /**
     * EmailServiceImp constructor.
     */
    function __construct()
    {
    }

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
        $mail->Host = HOST;
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
        } 
        return true;
    }

    public function sendEmailMassive()
    {
        $mail = new PHPMailer;

        //$body = file_get_contents('contents.html');

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = HOST;
        $mail->SMTPAuth = true;
        $mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
        $mail->Port = 25;
        $mail->Username = MAIL_USER;
        $mail->Password = MAIL_PASSWORD;
        $mail->setFrom('integer.sigte@gmail.com', 'sigte.edu.co');
        $mail->addReplyTo('integer.sigte@gmail.com', 'sigte.edu.co');

        $mail->Subject = "PHPMailer Simple database mailing list test";

        //Same body for all messages, so set this before the sending loop
        //If you generate a different body for each recipient (e.g. you're using a templating system),
        //set it inside the loop
        $mail->msgHTML("Message");
        //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

        //Connect to the database and select the recipients from your mailing list that have not yet been sent to
        //You'll need to alter this to match your database
        $userDao = new UserDao();
        $listUsers = $userDao->getAll();

        foreach ($listUsers as $user){
            //$obj = new User();
            //$obj->getF
            $mail->addAddress($user->getEmail(), $user->getFirstName()." ".$user->getFirstLastName());
            if (!$mail->send()) {
                //echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
                //break; //Abandon sending
            } //else {
                //echo "Message sent to :" . $row['full_name'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
                //Mark it as sent in the DB
            //}
            $mail->clearAddresses();
            $mail->clearAttachments();
            return true;
        }

        /*$mysql = mysqli_connect('localhost', 'aplicacion', '1234');
        mysqli_select_db($mysql, 'mydb');
        $result = mysqli_query($mysql, 'SELECT full_name, email, photo FROM mailinglist WHERE sent = false');

        foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
            $mail->addAddress($row['email'], $row['full_name']);

            if (!$mail->send()) {
                echo "Mailer Error (" . str_replace("@", "&#64;", $row["email"]) . ') ' . $mail->ErrorInfo . '<br />';
                break; //Abandon sending
            } else {
                echo "Message sent to :" . $row['full_name'] . ' (' . str_replace("@", "&#64;", $row['email']) . ')<br />';
                //Mark it as sent in the DB
                mysqli_query(
                    $mysql,
                    "UPDATE mailinglist SET sent = true WHERE email = '" .
                    mysqli_real_escape_string($mysql, $row['email']) . "'"
                );
            }
            // Clear all addresses and attachments for next loop
            $mail->clearAddresses();
            $mail->clearAttachments();
        }*/
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