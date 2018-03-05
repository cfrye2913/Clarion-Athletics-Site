<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>News Letter Sign Up</h1>

<?php
    //Path for email file
    $emailPath = "../txtFiles/email.csv";
    //Grabs fields from text boxes
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $sport = $_POST["sport"];
    //Opens email file
    $emailFile = fopen($emailPath, "a");
    //Writes email to email file. Each email is created on a new line.
    $fields = array($firstName, $lastName, $email, $sport);
    fputcsv($emailFile, $fields);
    $sport = strtolower($sport);
    echo  "Welcome, $firstName $lastName! We will try to send you news letters relevant to $sport.";
    fclose($emailPath);
?>

