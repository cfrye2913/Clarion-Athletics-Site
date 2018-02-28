<?php
    $title = "Image Uploaded";
    require("../includes/navbar.php");
    //get the file image and store the path that we want to store it at
    $uploadFile = "../Images/CarouselImages/" . $_FILES['userFile']['name'];

    //if the file already exists, we will replace it
    if(file_exists($uploadFile)){
        $message = "A file with this name already exists. This file was replaced.";
    }
    else{
        $message = "Image was uploaded successfully";
    }

    //get image width and height
    //check to make sure image width and height is similar to size
    //used in carousel
    $imageInfo = getimagesize($_FILES['userFile']['tmp_name']);
    $imageWidth = $imageInfo[0];
    $imageHeight = $imageInfo[1];
    $imageType = $imageInfo[2];


    //check that the image is of an appropriate type
    if($imageType != IMAGETYPE_GIF && $imageType != IMAGETYPE_JPEG &&
        $imageType != IMAGETYPE_PNG)
    {
        echo "Only gifs, jpegs, and png files are supported.";
    }
    elseif(move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadFile))
    {
        echo "<p> $message; </p>";
    }
?>