<?php
    $emailPath = "../txtFiles/email.csv";
    $emailFile = fopen($emailPath, "r");
    //Gets the email field from the CSV file
    while(($newsletterInfo = fgetcsv($emailFile)) !== FALSE)
    {
        $tempEmail = $newsletterInfo[2];
        include("automated_email.php");
    }