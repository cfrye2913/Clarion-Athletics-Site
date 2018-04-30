<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Allows admin to send the newsletter-->

<html lang="en">
<title>Admin - Newsletter</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>
<body>
        <div>
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
        <form action="index.php?action=send_newsletter" method="post">
            <input type="submit" value="Send newsletter" class = "btn-danger">
        </form>
    </div>
<?php
include("./includes/footer.php");
?>