<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Simple form to allow the user to sign up for a newsletter-->
<?php
    $title = "Newsletter Signup - Clarion Athletics Website";
    include('includes/navbar.php');
    ?>

<div class="container mb-5">
    <!--Content-->
    <div class = "clarion-blue text-center company-template">
        <h1>Sign up for our weekly news letter!</h1>
        <div class = "col-6 offset-3 text-left">

            <form action = "index.php?action=process_newsletter_signup" method = "post">

                <label for="firstName">First Name: </label>
                <input type = "text" class = "form-control" id="firstName" name = "firstName" required> <br/>

                <label for="lastName">Last Name:</label>
                <input type = "text" class = "form-control" id="lastName" name = "lastName" required><br/>

                <label for = "email">Email:</label>
                <input type = "email" class = "form-control" id = "email" name = "email" required><br/>

                <label for = "sport">Sport:</label>
                <select class = "form-control" id = "sport" name = "sport" required>
                    <?php
                        $parsedResults = getSports();
                        foreach($parsedResults as $row):
                    ?>
                        <option> <?=$row['sport_name']; ?> </option>
                    <?php endforeach; ?>
                    
                <label class="btn btn-outline-secondary btn-sm">
                    <input name="receive_newsletter" = "receive_newsletters" type="checkbox" autocomplete="off"> Receive Newsletters
                </label>
                <input type = "submit" value = "Sign Up" class = "btn btn-color-clarionBlue mt-3 text-white"/>
            </form>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
