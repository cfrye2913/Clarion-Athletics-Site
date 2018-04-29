<?php
<<<<<<< HEAD
    require_once ('./Model/mysql.php');
    //require_once "Mail.php";
    require_once ('Model/mysql.php');
    $config = require_once 'config.php';
    //require_once "Mail.php";
=======
>>>>>>> 6c43b7a19e4669e810b630109b1bf01b093fd378
    //Checks if the POST or GET actions are set
    //sets action appropriately.
    if(isset($_POST['action']))
    {
        $action = $_POST['action'];
    }
    elseif(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        exit();
    }
    //Starts a session using cookies
    session_start();

    //Checks login permissions
    function isLoggedIn() {
        return isset($_SESSION['userId']);
    }
    //Checks admin permissions if false, deny
    function isAdmin() {
        if (!isLoggedIn()) {
            return false;
        }
        $user = getUserById($_SESSION['userId']);
        if (is_null($user)) {
            return false;
        }
        return $user->role === 'admin';
    }



    //Determines which page to go to based on the action
    switch($action)
    {
        case 'add_image':
            $title = "Image Uploaded";
            require("./includes/navbar.php");
            //get the file image and store the path that we want to store it at
            $uploadFile = "./Images/CarouselImages/" . $_FILES['userFile']['name'];
            //check that a file was uploaded
            //if the file already exists, we will replace it
            if(file_exists($uploadFile)){
                $message = "A file with this name already exists. This file was replaced.";
            }
            else{
                $message = "Image was uploaded successfully";
            }

            //check that a file was uploaded
            if($_FILES['userFile']['error'] == UPLOAD_ERR_NO_FILE) {
                echo "<script type='text/javascript'>alert('No file was selected. Please try again.');
                    document.location.href = \"../pages/admin_workout.php\"</script>";
            }
            //check if the file exceeds the maximum upload file size
            //This file size is specified in php.ini
            elseif($_FILES['userFile']['error'] == UPLOAD_ERR_INI_SIZE)
            {
                echo "This file is too large to be uploaded <br>";
<<<<<<< HEAD
                echo "Click <a href = './View/admin_images.php'>here</a> to return to the admin page";
=======
>>>>>>> 6c43b7a19e4669e810b630109b1bf01b093fd378
            }
            else {

                //get image width and height
                //check to make sure image width and height is similar to size
                //used in carousel
                $imageInfo = getimagesize($_FILES['userFile']['tmp_name']);
                $imageWidth = $imageInfo[0];
                $imageHeight = $imageInfo[1];
                $imageType = $imageInfo[2];


                //check that the image is of an appropriate type
                if ($imageType != IMAGETYPE_GIF && $imageType != IMAGETYPE_JPEG &&
                    $imageType != IMAGETYPE_PNG) {
                    echo "Only gifs, jpegs, and png files are supported. <br>";
<<<<<<< HEAD
                    echo "Click <a href = './View/admin_images.php'>here</a> to return to the admin page";
=======
                    echo "Click <a href = 'view/admin.php'>here</a> to return to the admin page";
>>>>>>> 6c43b7a19e4669e810b630109b1bf01b093fd378
                } elseif (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
                    echo "<p> $message; </p>";
                    $image = new \Image();
                    $image->imagePath = $uploadFile;
                    insertImage($image);
                }
            }
            break;
        case 'add_sport':
            $sport = new \Sport();
            $allSports = getSports();
            $sportsNames = array();
            foreach ($allSports as $sport)
            {
                array_push($sportsNames, $sport->sportsName);
            }
            if(isset($_POST['sportName'])) {
                $sport->sportsName = $_POST['sportName'];
                if(in_array($sport->sportsName, $sportsNames)) {
                    $message = "Sport already exists in the database";
                }
                else {
                    insertSport($sport);
                    $message = "Sport added successfully";
                }
            }
            else{
                $message = 'No sport was entered. Please enter a sport and try again';
            }
            $title = 'Success';
            include('./includes/navbar.php');
            echo $message;
            include('./includes/footer.php');
            break;
        case 'remove_sport':
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
            }else{
                $title = 'Fail';
                include('./includes/navbar.php');
                echo 'There was a problem getting this sport\'s information';
                include('./includes/footer.php');
                die();
            }
            $success = removeSport($id);
            if($success){
                include './View/admin_sports.php';
            }else{
                $title = 'Fail';
                include('./includes/navbar.php');
                echo 'Failed to remove sport from database';
                include('./includes/footer.php');
                die();
            }
            die();
            break;
        case 'admin':
            break;
        case 'help':
            break;
        case 'login':
            break;
        case 'members':
            break;
        case 'removeMember':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }else{
                die();
            }
            $success = removeMember($id);
            if(!$success){
                echo '<script>alert("Failed to remove member.")</script>';
            }
            include './View/members.php';
            break;
        case 'member_details':
            if(isset($_GET)) {
                $member_id = $_GET['member_id'];
            }
            else{
                $title = 'Fail';
                include('./includes/navbar.php');
                echo 'There was a problem getting this member\'s information';
                include('./includes/footer.php');
            }
            break;
        case 'newsletter':
            break;
        case 'process_newsletter_signup':
            $member = new \Member();
            $member->FName = $_POST['firstName'];
            $member->LName = $_POST['lastName'];
            $member->email = $_POST['email'];
            $member->sport = $_POST['sport'];
            $member->receive_newsletter = isset($_POST['receive_newsletter']) ? 1: 0;
            insertMember($member);
            include ("./includes/navbar.php");
            echo("Signup successful");
            include("./includes/footer.php");
            break;
        case 'send_newsletter':
            $emails = getNewsletterMembersEmails();
            $from  = "cubeckerlab@gmail.com";
            $recipients = $emails;
            $subject = "Test";

            $body = file_get_contents("./resourceFiles/newsletter.html");

            //SMTP server information
            $smtpinfo["host"] = "ssl://smtp.gmail.com";
            $smtpinfo["port"] ="465";
            $smtpinfo["auth"] = true;
            $smtpinfo["username"] = "cubeckerlab@gmail.com";
            //Password redacted for VCS purposes
            $smtpinfo["password"] = "";

            $headers = array(
                'To' => $recipients,
                'From' => $from,
                'Subject' => $subject,
                'MIME-Version' => 1,
                'Content-type' => 'text/html;charset=iso-8859-1'
            );
            $smtp = Mail::factory('smtp', $smtpinfo);
            $mail = $smtp->send($recipients, $headers, $body);
            if(PEAR::isError($mail))
            {
                echo("<p>" . $mail->getMessage() . "</p>");
            }
            else
            {
                echo("<p>Message successfully sent!</p>");
            }
            break;
        case 'training':
            break;
        case 'upload_workout':
            //set a title
            $title = "Workout Upload";
            //include the navbar
            //specify the file path that the text file will be stored at
            $targetfile = './resourceFiles/workout.pdf';
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            //check if a file was submitted
            if($_FILES['userFile']['error'] == UPLOAD_ERR_NO_FILE)
            {
                echo "<script type='text/javascript'>alert('No file was selected. Please try again.');</script>";
                include "./View/admin_workout.php";
                die();
            }
            //Check the file type
            elseif(finfo_file($finfo, $_FILES['userFile']['tmp_name']) != "application/pdf")
            {
                $message = 'Incorrect file type';
            }
            elseif(file_exists($targetfile))//check if the file already exists
            {
                $message = 'A file with this name already existed. It was replaced.';
                move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
            }
            else {//move the file
                $message = 'File uploaded successfully';
                move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
            }

            finfo_close($finfo);
            echo $message;
            require './includes/navbar.php';
            break;
        case 'underConstruction':
            break;
        case 'remove_image':
            $imagePath = './Images/CarouselImages/';
            if(isset($_GET['image_name'])) {
                $imageName = $_GET['image_name'];
                unlink($imagePath . $imageName);
            }
            else{
                echo 'There was a problem deleting this image.';
            }
            break;
        case 'videos':
            break;
        case 'admin_images':
            break;
<<<<<<< HEAD
        case 'admin_workout':
            include 'View/admin_workout.php';
=======
>>>>>>> 6c43b7a19e4669e810b630109b1bf01b093fd378
            break;
        case 'admin_sports':
            break;
        default:
            break;
    }