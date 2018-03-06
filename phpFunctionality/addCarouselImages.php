<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This file handles image uploads from the admin page-->
<?php
    $title = "Image Uploaded";
    require("../includes/navbar.php");
    //get the file image and store the path that we want to store it at
    $uploadFile = "../Images/CarouselImages/" . $_FILES['userFile']['name'];
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
            echo "Click <a href = '../pages/admin.php'>here</a> to return to the admin page";
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
                echo "Click <a href = '../pages/admin.php'>here</a> to return to the admin page";
            } elseif (move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile)) {
                echo "<p> $message; </p>";
            }
        }
?>