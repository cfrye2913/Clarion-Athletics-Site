<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This page allows the administrator to add a sport-->

<html lang="en">
<title>Edit Images</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>
<body>
    <div id = "sports" class = "jumbotron">
            <h3 class = "mt-3">Add a sport</h3>
            <form enctype="multipart/form-data"
                  action = "index.php?action=add_sport"
                  method = "post"
                  class = "row">
                <div class = "form-row mx-auto">
                    Sport Name: <input class = "form-control" type = "text" name = "sportName" required />
                    <input class = "form-control" type = "submit" value = "Add Sport"/>
                </div>
            </form>
    </div>
<?php
include("./includes/footer.php");
?>
