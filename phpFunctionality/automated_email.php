<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Send out an automated email when this file is used-->
<?php
;
    //Gets the mail php script
    require_once "Mail.php";
    //Sender
    $from="cubeckerlab@gmail.com";
    //Recipient
    $recipients=$tempEmail;
    //subject
    $subject = "Test";
    //content
    $body = file_get_contents("../resourceFiles/newsletter.html");
    //SMTP server name, port, user password
    $smtpinfo["host"] = "ssl://smtp.gmail.com";
    $smtpinfo["port"] ="465";
    $smtpinfo["auth"] = true;
    $smtpinfo["username"] = "cubeckerlab@gmail.com";
    //Password redacted for VCS purposes
    $smtpinfo["password"] = "";
    //Sets the header of the email to enable HTML to be placed into the message.
    //Also sets recipient(s), sender and subject
    $headers = array(
        'To' => $recipients,
        'From' => $from,
        'Subject' => $subject,
        'MIME-Version' => 1,
        'Content-type' => 'text/html;charset=iso-8859-1'
    );
    $smtp = Mail::factory('smtp', $smtpinfo);
    $mail=$smtp->send($recipients,$headers,$body);
    if(PEAR::isError($mail))
    {
        echo("<p>" . $mail->getMessage() . "</p>");
    }
    else
    {
        echo("<p>Message successfully sent!</p>");
    }
?>