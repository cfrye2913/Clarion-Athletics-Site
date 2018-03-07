<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/27/2018
    Purpose: This page allows the admin to edit some features of the
    website without editing the source code of the site-->
<?php
$title = "Admin Page - Clarion Athletics Site";
include("../includes/navbar.php"); ?>


    <div class="company-template">

            <h1>Admin Page</h1>

            <h3 class = "mt-3">Add an image</h3>
            <!--Form to upload images to be added to the carousel-->
            <form enctype="multipart/form-data"
                  action = "../phpFunctionality/addCarouselImages.php"
                  method = "post"
                  class = "row">
                <div class = "col-6 text-right">Select an image to add to the home page:</div>
                <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
                <input type = "submit" value = "Upload Image" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
            </form>
            <p class="text-danger">For best quality, images should be 1719 x 967 pixels</p>

            <h4>Current Images</h4>
            <!--Show all of the image file names that are currently in the directory-->
            <?php
            //Image Path
            $imageDirName = "../Images/CarouselImages/";
            //Get all images from the directory and store them in an array
            $imageArray = scandir($imageDirName);
            //loop through the array and display all of the image names
            for($i = 0; $i < count($imageArray); $i++)
            {
                //filter out the . and .. directories
                if($imageArray[$i] != "." && $imageArray[$i] != "..")
                {
                    echo "$imageArray[$i] <br>";
                }
            }
            ?>


        <h3 class = "mt-3">Add a quote file</h3>
        <!--Form to upload a text file of quotes-->
        <form enctype="multipart/form-data"
              action = "../phpFunctionality/uploadQuoteFile.php"
              method = "post"
              class = "row">
            <div class = "col-6 text-right">Select a new quotes file:</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Text File" class = "btn-primary ml-auto mr-auto mt-3"/>
        </form>

        <h3 class = "mt-3">Add a news letter</h3>
        <!--Form to upload an html file for the automated email
             and a form to send the email-->
        <form enctype="multipart/form-data"
              action = "../phpFunctionality/uploadNewsletter.php"
              method = "post"
              class = "row">
            <div class = "col-6 text-right">Select a newsletter file (HTML format):</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Newsletter" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
        </form>
        <form action="../phpFunctionality/sendNewsletter.php" method="get">
            <input type="submit" value="Send newsletter" class = "btn-danger">
        </form>
    </div>

<?php
    include("../includes/footer.php");
?>