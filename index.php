<?php
    require_once('./persistence/mysql.php');
    //include_once "Mail.php";
    require_once('persistence/mysql.php');
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
        include('./view/home.php');
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
            require("./includes/script_css.php");
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
                echo "Click <a href = './index.php?action=admin'>here</a> to return to the admin page";
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
                    echo "Click <a href = 'view/admin.php'>here</a> to return to the admin page";
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
            include './includes/script_css.php';
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
            include './view/admin.php';
            break;
        case '/api/login':
            $username = $_POST['username'];
            $plainTextPass = $_POST['password'];

            if (!isset($_POST['username']))
            {
                header(' ', true, 400);
                $resp['message'] = "No username provided";
                echo json_encode($resp);
                die();
            }
            if (!isset($_POST['password']))
            {
                header(' ', true, 400);
                $resp['message'] = 'No password provided';
                echo json_encode($resp);
                die();
            }

            $user = getUserByUsername($username);
            if( is_null($user) || $user->user_id == null || !verifyPassword($plainTextPass, $user->salt, $user->hashedPass)) {
                header(' ', true, 400);
                $resp['message'] = 'Incorrect email or password';
                echo json_encode($resp);
                die();
            }

            $_SESSION['userId'] = $user->user_id;
            $resp['success'] = 'Success';
            echo json_encode($resp);
            die();
            break;
        case 'help':
            include './view/help.php';
            break;
        case 'login':
            include './view/login.php';
            break;
        case 'logout':
            $_SESSION = array();
            session_destroy();
            require_once './view/home.php';
            break;
        case 'members':
            include 'view/members.php';
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
                include('./view/member_details.php');
            }
            else{
                $title = 'Success';
                include './includes/script_css.php';
                $title = 'Fail';
                include('./includes/navbar.php');
                echo 'There was a problem getting this member\'s information';
                include('./includes/footer.php');
            }
            break;
        case 'updateMember':
            if(!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['sport']) || !isset($_POST['email']) || !isset($_POST['memberId'])){
                echo '<script>alert("All fields must be entered to update the member.");</script>';
                include './View/members.php';
                die();
            }
            $member = new \Member();
            if(isset($_POST['receiveNewsletters'])){
                $member->receive_newsletter = 1;
            }else{
                $member->receive_newsletter = 0;
            }
            $member->memberId = intval($_POST['memberId']);
            $member->FName = $_POST['firstName'];
            $member->LName = $_POST['lastName'];
            $member->sport = getSportIdByName($_POST['sport']);
            $member->email = $_POST['email'];
            updateMember($member);
            $member_id = $member->memberId;
            include './View/member_details.php';
            break;
        case 'newsletter':
            include './view/newsLetter.php';
            break;
        case 'process_newsletter_signup':
            $member = new \Member();
            $member->FName = $_POST['firstName'];
            $member->LName = $_POST['lastName'];
            $member->email = $_POST['email'];
            $member->sport = $_POST['sport'];
            $member->receive_newsletter = isset($_POST['receive_newsletter']) ? 1: 0;
            insertMember($member);
            include './includes/script_css.php';
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
            include './view/training.php';
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
            include './includes/script_css.php';
            require './includes/navbar.php';
            break;
        case 'underConstruction':
            include './view/UnderConstruction.php';
            break;
        case 'remove_image':
            $imagePath = './Images/CarouselImages/';
            if(isset($_GET['image_name'])) {
                $imageName = $_GET['image_name'];
                unlink($imagePath . $imageName);
                include 'view/admin_images.php';
            }
            else{
                echo 'There was a problem deleting this image.';
            }
            break;
        case 'videos':
            include './view/videos.php';
            break;
        case 'admin_images':
            include 'view/admin_images.php';
            break;

        case 'admin_workout':
            include 'View/admin_workout.php';

        case 'admin_newsletter':
            include 'view/admin_newsletter.php';
            break;
        case 'admin_sports':
            include 'view/admin_sports.php';
            break;
        default:
            include './view/home.php';
            break;
    }


    function createUser($username, $password, $role, $isActive) {
        $user = new \User();
        $user->username = $username;
        $salt = openssl_random_pseudo_bytes(32);
        $user->salt = $salt;
        $hashedPass = _generatePassword($password, $salt);
        $user->hashedPass = $hashedPass;
        $user->role = $role;
        $user->isActive = $isActive;

        return persistUser($user);
    }