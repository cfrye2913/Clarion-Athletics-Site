<?php
    //get the file image and store the path that we want to store it at
    $uploadFile = "../Images/" . $_FILES['userFile']['name'];

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
    &imageHeight = $imageInfo[1];
?>