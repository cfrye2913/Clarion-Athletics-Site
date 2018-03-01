<?php
$title = "Admin Page - Clarion Athletics Site";
include("../includes/navbar.php"); ?>

    <div class="company-template">
        <h1>Admin Page</h1>

        <form enctype="multipart/form-data"
              action = "../phpFunctionality/addCarouselImages.php"
              method = "post"
              class = "row pt-5">
            <div class = "col-6 text-right">Select an image to add to the home page:</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Image" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
        </form>
        <p class="text-danger">For best quality, images should be 1719 x 967 pixels</p>
    </div>

<?php
    include("../includes/footer.php");
?>