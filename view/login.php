<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the user to login-->
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

        <div class="jumbotron tab-pane active fade show" id="login" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
            <!-- Login Form -->
            <form id = 'loginForm' class = "form col-6 mr-auto ml-auto">
                <br>
                <div class = "form-row">
                    <label for = "un">Username:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'username' type = "text" placeholder="Username">
                </div>
                <div class = "form-row">
                    <label for = "pw">Password:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'password' type = "password" placeholder = "Password">
                </div>
                <button class = "btn btn-primary m-2" type = 'submit'>Login</button>
            </form>
        </div>
    </div>
</div><!-- end of container-->
<?php include("./includes/footer.php") ?>
</html>
