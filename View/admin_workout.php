<?php
$title = "Edit Workout- Clarion Athletics Site";
include("./includes/navbar.php");
require_once './persistence/mysql.php'?>
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
    <!--            <a href = "index.php?action=send_newsletter" class = "btn-danger">Send Newsletter</a>-->
    <!--<form action="index.php?action=send_newsletter" method="post">
        <input type="submit" value="Send newsletter" class = "btn-danger">
    </form>-->
</div>

<?php
include("./includes/footer.php");
?>