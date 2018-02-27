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


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Holder.js for placeholder images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
</body>
</html>

