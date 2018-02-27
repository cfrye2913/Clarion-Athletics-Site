<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>News Letter Sign Up</h1>

<?php
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $sport = $_POST["sport"];

    $emailfile = fopen("./email.txt", "a");
    fwrite($emailfile, $email . PHP_EOL);
    
    echo "$firstName";
?>

