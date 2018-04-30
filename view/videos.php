<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This page can be included on any page to incorporate
    a common header. This page should be included on every page that
    the user sees.
    ****This include is required to use bootstrap or custom CSS-->

<html lang="en">
<title>Edit Images</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>
<body>
    <div class="container">
        <div class="company-template">
            <h1>Video Page</h1>
            <form class="align-content-center my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </form>
            <p class="lead">
                <h2>
                    Back Squat
                </h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fgqwt7p_Gts" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

            <br>
            <h2> Bench Press </h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/rT7DgCr-3pg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>

    <?php require("includes/footer.php") ?>
