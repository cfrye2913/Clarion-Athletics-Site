<?php
$title = "Admin Page - Clarion Athletics Site";
include("../includes/navbar.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title>Clarion University Athletics</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>

<body>

<?php
    $title = "Admin - Clarion Athletics";
    include("../includes/navbar.php"); ?>

<div class="container">
>>>>>>> Quote_File_Upload

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
        <br>
        <form enctype="multipart/form-data"
              action = "../phpFunctionality/uploadQuoteFile.php"
              method = "post"
              class = "row pt-5">
            <div class = "col-6 text-right">Select a new quotes file:</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Text File" class = "btn-primary ml-auto mr-auto mt-3"/>
        </form>
>>>>>>> Quote_File_Upload
    </div>

<?php
    include("../includes/footer.php");
?>