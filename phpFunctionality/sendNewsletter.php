<?php
    $emailPath = "../txtFiles/email.csv";
    $emailFile = fopen($emailPath, "r");

    while($newsletterInfo = fgetcsv($emailFile) !== FALSE)
    {
        $tempEmail = $newsletterInfo[2];
        include("automated_email.php");
    }