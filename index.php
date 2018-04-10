<?php
    require_once ('Model/mysql.php');
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
        include('View/home.php');
        exit();
    }

    //Determines if a button is checked
    function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }


    //Determines which page to go to based on the action
    switch($action)
    {
        case 'admin':
            include 'View/admin.php';
            break;
        case 'help':
            include 'View/help.php';
            break;
        case 'login':
            include 'View/login.php';
            break;
        case 'newsletter':
            include 'View/newsLetter.php';
            break;
        case 'members':
            include 'View/members.php';
            break;
        case 'process_newsletter_signup':
            $member = new \Member();
            $member->FName = $_POST['firstName'];
            $member->LName = $_POST['lastName'];
            $member->email = $_POST['email'];
            $member->sport = $_POST['sport'];
            $member->receive_newsletter = isset($_POST['receive_newsletter']) ? 1: 0; //(isChecked($_POST['receive_newsletter'], true) ? 1:0);
            insertMember($member);
            require_once 'View/home.php';
            break;
        case 'training':
            include 'View/training.php';
            break;
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
                    document.location.href = \"../pages/admin.php\"</script>";
            }
            //check if the file exceeds the maximum upload file size
            //This file size is specified in php.ini
            elseif($_FILES['userFile']['error'] == UPLOAD_ERR_INI_SIZE)
            {
                echo "This file is too large to be uploaded <br>";
                echo "Click <a href = './View/admin.php'>here</a> to return to the admin page";
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
                    echo "Click <a href = './View/admin.php'>here</a> to return to the admin page";
                } elseif (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
                    echo "<p> $message; </p>";
                    $image = new \Image();
                    $image->imagePath = $uploadFile;
                    insertImage($image);
                }
            }
            break;
        case 'add_quote_file':
            //set a title
            $title = "News Letter Sign Up";
            //include the navbar
            require './includes/navbar.php';
            echo '<h1>Upload a New Quotes File</h1>';
            //specify the file path that the text file will be stored at
            $targetfile = './resourceFiles/quotes.txt';
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            //check if a file was submitted
            if($_FILES['userFile']['error'] == UPLOAD_ERR_NO_FILE)
            {
                echo "<script type='text/javascript'>alert('No file was selected. Please try again.');
                    document.location.href = \"./pages/admin.php\"</script>";
            }
            //Check the file type
            elseif(finfo_file($finfo, $_FILES['userFile']['tmp_name']) != "text/plain")
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
            break;
        case 'upload_newsletter':
            //set a title
            $title = "Newsletter Upload";
            //include the navbar
            //specify the file path that the text file will be stored at
            $targetfile = './resourceFiles/newsletter.html';
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            //check if a file was submitted
            if($_FILES['userFile']['error'] == UPLOAD_ERR_NO_FILE)
            {
                echo "<script type='text/javascript'>alert('No file was selected. Please try again.');
                        document.location.href = \"./pages/admin.php\"</script>";
            }
            //Check the file type
            elseif(finfo_file($finfo, $_FILES['userFile']['tmp_name']) != "text/plain")
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
        case 'member_details':
            if(isset($_GET)) {
                $member_id = $_GET['member_id'];
                include('./View/member_details.php');
            }
            else{
                $title = 'Success';
                include('./includes/navbar.php');
                echo 'There was a problem getting this member\'s information';
                include('includes/footer.php');
            }
            break;
        case 'add_sport':
            $sport = new \Sport();
            $allSports = getSports();
            $sportsNames = [];
            foreach ($allSports as $sports)
            {
                array_push($sportsNames, $sports['sport_name']);
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
        case 'underConstruction':
            include 'View/UnderConstruction.php';
            break;
        case 'videos':
            include 'View/videos.php';
            break;
        default:
            include 'View/home.php';
            break;
    }











?>