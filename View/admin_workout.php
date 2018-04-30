<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This paqe allows the admin to modify the workout document-->

<html lang="en">
<title>Admin - Edit Sports</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>
<body>
    <div>
        <h3 class = "mt-3">Add a Workout</h3>
        <!--Form to upload an html file for the automated email
             and a form to send the email-->
        <form enctype="multipart/form-data"
              action = "index.php?action=upload_workout"
              method = "post"
              class = "row">
            <div class = "col-6 text-right">Select a workout file (.pdf format):</div>
            <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
            <input type = "submit" value = "Upload Workout" class = " btn btn-primary ml-auto mr-auto mt-3 mb-3"/>
        </form>
        <a href = "./resourceFiles/workout.pdf" target = "_blank" class = "btn btn-primary">Download Current Workout</a>
    </div>
</body>
<?php
include("./includes/footer.php");
?>