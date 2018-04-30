<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the user to modify their password-->
<!DOOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title> Edit Profile </title>
    <?php include('./includes/script_css.php'); ?>
    <script>

        $(document).ready(function () {
            var form = $("#changePass");
            form.submit(function (event) {
                event.preventDefault();
                event.stopPropagation();

                var pass = $("#password");
                var confirm = $('#confirm');
                var data = {
                    pass: pass.val()
                };
                if (pass.val() != confirm.val()) {
                    alert("Passwords do not match, please try again");
                }
                else {
                    submitUpdate(data);
                }

            })
        });
        function submitUpdate(data) {
            $.ajax({
                type: "POST",
                url: "./index.php?action=/api/user/update_pass",
                dataType: 'json',
                data: data
            }).done(function (data, status, xhr) {
                alert(data.message);
                var pass = $("#password");
                var confirm = $('#confirm');
                pass.val("");
                confirm.val('');
            }).fail(function (jqXHR, textStatus, errorThrown) {
                var data = jqXHR.responseJSON;
                if (data !== undefined)
                    alert(data.message);
            });
        }
    </script>
</head>

<?php include('./includes/navbar.php'); ?>

<div class="container">

    <div class="company-template">
        <!-- ChangePassword form -->
        <div class="jumbotron tab-pane active fade show" id="login" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
            <form id = 'changePass' class = "form col-6 mr-auto ml-auto">
                <br>
                <div class = "form-row">
                    <label for = "pw">Password:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'password' type = "password" placeholder = "Password" required>
                </div>
                <div class = "form-row">
                    <label for = "pw">Confirm Password:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'confirm' type = "password" placeholder = "Password" required>
                </div>
                <button class = "btn btn-primary m-2" type = 'submit'>Change Password</button>
            </form>
        </div>
    </div>
</div><!-- /.container -->

<?php include("includes/footer.php") ?>