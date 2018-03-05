<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>News Letter Sign Up</h1>

<?php
    //Grabs fields from text boxes
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $sport = $_POST["sport"];
    $validEmail = true; //will be set to false if the email is invalid
    //open the csv email file
    $emailfile = fopen("../resourceFiles/email.csv", "a");

    //validate the email address, if valid, add to file,
    //if invalid, display an error message
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        echo "<script type='text/javascript'>alert('This email is not valid. Please try again.');
                    document.location.href = \"../pages/newsLetter.php\"</script>";

        $validEmail = false;
    }

    //Writes email,name, and sport to email file.
    $data = array($lastName, $firstName, $email, $sport);
    fputcsv($emailfile, $data);
    //force sport string to lower case to display in message to user
    $sport = strtolower($sport);
    //display message to user
    echo  "Welcome, $firstName $lastName! We will try to send you newsletters relevant to $sport.";
?>