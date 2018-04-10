<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/27/2018
    Purpose: This page allows the admin to edit some features of the
    website without editing the source code of the site-->
<?php
$title = "Admin Page - Clarion Athletics Site";
include("includes/navbar.php");
require_once 'Model/mysql.php'?>


<div class="company-template">
    <h1>Admin Page</h1>

    <!-- Tabs for login and sign up -->
    <ul class="nav nav-tabs col-6 mr-auto ml-auto mt-6 text-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#images" role="tab" aria-controls="home" aria-selected="true">Carousel Images</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="signup-tab" data-toggle="tab" href="#quotes" role="tab" aria-controls="profile" aria-selected="false">Quotes</a>
        </li>
        <li class = "nav-item">
            <a class="nav-link" id="signup-tab" data-toggle="tab" href="#newsletter" role="tab" aria-controls="profile" aria-selected="false">Newsletter</a>
        </li>
        <li class = "nav-item">
            <a class="nav-link" id="signup-tab" data-toggle="tab" href="#sports" role="tab" aria-controls="profile" aria-selected="false">Sports</a>
        </li>
    </ul>
    <!-- Tab content selectable through pills -->
    <div class = "tab-content col-10 mx-auto">
        <!-- Carousel image -->
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
            <h4>Current Images</h4>
            <!--Show all of the image file names that are currently in the directory-->
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
                    echo "$imageArray[$i] <br>";
                }
            }
            ?>
        </div>
        <!-- News Letters -->
        <div id = "quotes" class = "tab-pane fade jumbotron" role = "tabpanel" aria-labelledby="signup-tab">
            <h3 class = "mt-3">Add a quote file</h3>
            <!--Form to upload a text file of quotes-->
            <form enctype="multipart/form-data"
                  action = "index.php?action=add_quote_file"
                  method = "post"
                  class = "row">
                <div class = "col-6 text-right">Select a new quotes file:</div>
                <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
                <input type = "submit" value = "Upload Text File" class = "btn-primary ml-auto mr-auto mt-3"/>
            </form>
        </div>
        <div id = "newsletter" class = "tab-pane fade jumbotron" role = "tabpanel" aria-labelledby="signup-tab">
            <h3 class = "mt-3">Add a news letter</h3>
            <!--Form to upload an html file for the automated email
                 and a form to send the email-->
            <form enctype="multipart/form-data"
                  action = "index.php?action=upload_newsletter"
                  method = "post"
                  class = "row">
                <div class = "col-6 text-right">Select a newsletter file (HTML format):</div>
                <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
                <input type = "submit" value = "Upload Newsletter" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
            </form>
<!--            <a href = "index.php?action=send_newsletter" class = "btn-danger">Send Newsletter</a>-->
            <form action="index.php?action=send_newsletter" method="post">
                <input type="submit" value="Send newsletter" class = "btn-danger">
            </form>
        </div>
        <div id = "sports" class = "tab-pane fade jumbotron" role = "tabpanel" aria-labelledby="signup-tab">
            <h3 class = "mt-3">Add a sport</h3>
            <form enctype="multipart/form-data"
                  action = "index.php?action=add_sport"
                  method = "post"
                  class = "row">
                <div class = "form-row mx-auto">
                    Sport Name: <input class = "form-control" type = "text" name = "sportName" required />
                    <input class = "form-control" type = "submit" value = "Add Sport">
                </div>
            </form>

        </div>
    </div>

</div>

<?php
include("includes/footer.php");
?>