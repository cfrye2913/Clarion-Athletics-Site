<?php
    //Gets the mail script
    require_once "Mail.php";
    //Sender
    $from="cubeckerlab@gmail.com";
    //Recipient
    $to=$tempEmail;
    //subject
    $subject = "Test";
    //content
    $body = "Hello. \nThis is a new line.";

    //SMTP server name, port, user password
    $smtpinfo["host"] = "ssl://smtp.gmail.com";
    $smtpinfo["port"] ="465";
    $smtpinfo["auth"] = true;
    $smtpinfo["username"] = "cubeckerlab@gmail.com";
    //Password redacted for VCS purposes
    $smtpinfo["password"] = "";
    $headers = array('From'=>$from, 'To'=>$to, 'Subject'=>$subject);
    $smtp = Mail::factory('smtp', $smtpinfo);
    $mail=$smtp->send($to,$headers,$body);
    if(PEAR::isError($mail))
    {
        echo("<p>" . $mail->getMessage() . "</p>");
    }
    else
    {
        echo("<p>Message successfully sent!</p>");
    }
?>