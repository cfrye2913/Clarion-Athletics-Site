<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page that adds users to an email csv file-->
<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>News Letter Sign Up</h1>

<?php
    //index of the email within the email csv file
    $EMAIL_INDEX = 2;
    //Grabs fields from text boxes
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $sport = $_POST["sport"];
    $validEmail = true; //will be set to false if the email is invalid
    //open the csv email file
    $emailfile = fopen("../resourceFiles/email.csv", "a+");
    //validate the email address, if valid, add to file,
    //if invalid, display an error message
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        echo "<script type='text/javascript'>alert('This email is not valid. Please try again.');
                    document.location.href = \"../pages/newsLetter.php\"</script>";

        $validEmail = false;
    }

    //get an array of all of the current emails in the csv file
    //if the email entered is already in the array, display an error
    //message to the user
    $currentEmails = array();
    while($row = fgetcsv($emailfile))
    {
       $currentEmails[] = $row[$EMAIL_INDEX];
    }

    if(in_array($email, $currentEmails) && $validEmail === true)
    {
        echo "This email is already signed up to receive our news letter. Please try again";
        $validEmail = false;
    }
    if($validEmail == true) {
        //Writes email,name, and sport to email file.
        $data = array($lastName, $firstName, $email, $sport);
        fputcsv($emailfile, $data);
        //force sport string to lower case to display in message to user
        $sport = strtolower($sport);
        //display message to user
        echo "Welcome, $firstName $lastName! We will try to send you newsletters relevant to $sport.";
    }
?>