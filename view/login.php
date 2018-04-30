<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the user to login or sign up-->
<!DOOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title> Login </title>
    <?php include('./includes/script_css.php'); ?>
    <script>
            $(document).ready(function () {
                var form = $("#loginForm");
                form.submit(function (event) {
                    event.preventDefault();
                    event.stopPropagation();

                    var username = $("#username").val();
                    var pass = $("#password").val();

                    $.ajax({
                        type: "POST",
                        url: "./index.php?action=/api/login",
                        dataType: 'json',
                        data: {
                            username: username,
                            password: pass
                        }
                    }).done(function (data, status, xhr) {
                        window.location.replace('./index.php?action=home');
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        var data = jqXHR.responseJSON;
                        if (data !== undefined)
                            alert(data.message);
                    })
                })
            });
    </script>
</head>

<?php include('./includes/navbar.php'); ?>

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
            <div class="jumbotron tab-pane active fade show" id="login" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
                <!-- Login Tab -->
                <form id = 'loginForm' class = "form col-6 mr-auto ml-auto">
                    <br>
                    <div class = "form-row">
                        <label for = "un">Username:</label> <input class = "form-control" id = 'un' type = "text" placeholder="Username">
                    </div>

                    <div class = "form-row">
                        <label for = "pw">Password:</label> <input class = "form-control" id = 'pw' type = "password" placeholder = "Password">
                    </div>

                    <button class = "btn btn-primary m-2" type = 'submit'>Login</button>
                </form>
            </div>
            <!-- Signup Tab -->
            <div id = "signup" class = "jumbotron tab-pane fade" role = "tabpanel" aria-labelledby="signup-tab">
                <!-- Sign Up form -->
                <form id = 'signupForm' class = "form col-6 mr-auto ml-auto">
                    <br>
                    <div class = "form-row">
                        <label for = "email"> Email: </label>
                        <input class = "form-control" id = "email" type = "text">
                    </div>
                    <div class = "form-row">
                        <label for = "password">Password:</label> <input id = "password" class = "form-control" type = "password">
                    </div>
                    <div class = "form-row">
                        <label for = "confirm">Confirm Password:</label> <input id = "confirm" class = "form-control" type = "password">
                    </div>
                    <br>
                    <button class = "btn-primary m-2" type = 'submit'>Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- /.container -->

<?php include("includes/footer.php") ?>
