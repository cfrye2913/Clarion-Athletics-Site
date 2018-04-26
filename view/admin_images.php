<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This page can be included on any page to incorporate
    a common header. This page should be included on every page that
    the user sees.
    ****This include is required to use bootstrap or custom CSS-->

<html lang="en">
<title>Admin - Modify Images</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>
<body>
    <h1>Upload an Image</h1>
    <div class="tab-pane active fade show jumbotron" id="images" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
        <h3 class = "mt-3">Carousel Images</h3>
        <!--Form to upload images to be added to the carousel-->
        <form enctype="multipart/form-data"
              action = "index.php?action=add_image"
              method = "post"
              class = "row">
            <div class = "col-6 text-right">Select an image to add to the home page:</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Image" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
        </form>
        <p class="text-danger">For best quality, images should be 1719 x 967 pixels</p>
    </div>
    <h1>Remove an Image</h1>
    <table class="table table-hover col-4 mb-5" id="imagesTable">
        <thead>
            <tr>
                <th scope="col">Image Name</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //Image Path
        $imageDirName = "./Images/CarouselImages/";
        //Get all images from the directory and store them in an array
        $imageArray = scandir($imageDirName);
        //loop through the array and display all of the image names
        for($i = 0; $i < count($imageArray); $i++)
        {
            //filter out the . and .. directories
            if($imageArray[$i] != "." && $imageArray[$i] != "..")
            {
                echo '<tr>';
                echo '<td scope = \"col\">' . $imageArray[$i] . '</td>';
                echo '<td scope = \"col\"> <a class="btn btn-primary btn-lg" href="index.php?action=remove_image&image_name=' . $imageArray[$i] . '">Delete</a>';
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
<?php
include("./includes/footer.php");
?>
