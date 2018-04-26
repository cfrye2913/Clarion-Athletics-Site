<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the user to login or sign up-->
<?php
    $title = "Login - Clarion Athletics Website";
    include("includes/navbar.php"); ?>

<script>
    (function () {
        $(document).ready(function () {
            var form = $("#loginForm");
            form.submit(function () {
                event.preventDefault();

                var email = $("#username").val();
                var pass = $("#password").val();

                $.ajax({
                    type: "POST",
                    url: "../index.php?path=/api/login",
                    dataType: 'json',
                    data: {
                        username: email,
                        password: pass
                    }
                }).done(function (data, status, xhr) {
                    window.location.replace('../index.php?path=/home');
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    var data = jqXHR.responseJSON;
                    if (data !== undefined)
                        alert(data.message);
                })
            })
        })
    })();
</script>

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
                <form id = 'loginForm' class = "form-control col-6 mr-auto ml-auto">
                    <br>
                    <span class = "p-2">
                        Username: <input id = 'username' type = "text" placeholder="Username">
                    </span>
                    <br>
                    <br>
                    <span class = "m-2">
                        Password: <input id = 'password' type = "password" placeholder = "Password">
                    </span>
                    <br>
                    <button class = "btn-primary m-2" type = 'submit'>Login</button>
                </form>
            </div>
            <!-- Signup Tab -->
            <div id = "signup" class = "tab-pane fade" role = "tabpanel" aria-labelledby="signup-tab">
                <!-- Sign Up form -->
                <form id = 'signupForm' class = "form-control col-6 mr-auto ml-auto">
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
