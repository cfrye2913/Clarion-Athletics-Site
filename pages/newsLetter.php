<?php
    $title = "Newsletter Signup - Clarion Athletics Website";
    include('../includes/navbar.php'); ?>

<div class="container mb-5">

    <!--Content-->
    <div class = "clarion-blue text-center company-template">
        <h1>Sign up for our weekly news letter!</h1>
        <div class = "col-6 offset-3 text-left">

            <form action = "../phpFunctionality/processNewsLetterSignUp.php" method = "post">

                <label for="firstName">First Name: </label>
                <input type = "text" class = "form-control" id="firstName" name = "firstName"> <br/>

                <label for="lastName""">Last Name:</label>
                <input type = "text" class = "form-control" id="lastName" name = "lastName"><br/>

                <label for = "email">Email:</label>
                <input type = "email" class = "form-control" id = "email" name = "email"><br/>

                <label for = "sport">Sport:</label>
                <input type = "text" class = "form-control" id = "sport" name = "sport">

                <input type = "submit" value = "Sign Up" class = "btn btn-color-clarionBlue mt-3 text-white"/>
            </form>
        </div>
    </div>


    <?php include("../includes/footer.php"); ?>
