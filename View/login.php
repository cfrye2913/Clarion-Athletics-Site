<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the user to login or sign up-->
<?php
    $title = "Login - Clarion Athletics Website";
    include("includes/navbar.php"); ?>

<div class="container">

    <div class="company-template">
        <!-- Tabs for login and sign up -->
        <ul class="nav nav-tabs col-6 mr-auto ml-auto" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="home" aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="signup-tab" data-toggle="tab" href="#signup" role="tab" aria-controls="profile" aria-selected="false">Sign Up</a>
            </li>
        </ul>
        <!-- Tab content selectable through pills -->
        <div class = "tab-content">
            <!-- Login Tab -->
            <div class="tab-pane active fade show" id="login" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
                <!-- Login Tab -->
                <form class = "form-control col-6 mr-auto ml-auto">
                    <br>
                    <span class = "p-2">
                        Username: <input type = "text">
                    </span>
                    <br>
                    <br>
                    <span class = "m-2">
                        Password: <input type = "password">
                    </span>
                    <br>
                    <button class = "btn-primary m-2">Login</button>
                </form>
            </div>
            <!-- Signup Tab -->
            <div id = "signup" class = "tab-pane fade" role = "tabpanel" aria-labelledby="signup-tab">
                <!-- Sign Up form -->
                <form class = "form-control col-6 mr-auto ml-auto">
                    <br>
                    <span class = "text-left"> Email: </span>
                    <span class = "text-center">
                        <input type = "text">
                    </span>
                    <br>
                    <br>
                    <span class = "m-2">
                        Password: <input type = "password">
                    </span>
                    <br>
                    <br>
                    <span class = "m-2">
                        Confirm Password: <input type = "password">
                    </span>
                    <br>
                    <button class = "btn-primary m-2">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<?php include("includes/footer.php") ?>
