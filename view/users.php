<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Page to allow the admin to add new users and roles-->
<!DOOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title> Admin - Add a User </title>
    <?php include('./includes/script_css.php'); ?>
    <script>
        $(document).ready(function () {
            var form = $("#addUserForm");
            form.submit(function (event) {
                event.preventDefault();
                event.stopPropagation();

                var username = $("#username");
                var pass = $("#password");
                var role = $('#role');

                $.ajax({
                    type: "POST",
                    url: "./index.php?action=admin_add_user",
                    dataType: 'json',
                    data: {
                        username: username.val(),
                        password: pass.val(),
                        role: role.val()
                    }
                }).done(function (data, status, xhr) {
                    alert(data.message);
                    window.location.reload(true)
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
        <!-- Login Tab -->
        <div class="jumbotron tab-pane active fade show" id="login" role="tabpanel" aria-labelledby="login-tab" aria-expanded="true">
            <!-- Login Tab -->
            <form id = 'addUserForm' class = "form col-6 mr-auto ml-auto">
                <br>
                <div class = "form-row">
                    <label for = "un">Username:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'username' type = "text" placeholder="Username" required>
                </div>
                <div class = "form-row">
                    <label for = "pw">Password:<span class = "text-danger">*</span></label> <input class = "form-control" id = 'password' type = "password" placeholder = "Password" required>
                </div>
                <div class = "form-row">
                    <label for = "role">Role:<span class = "text-danger">*</span></label>
                    <select class = "form-control" id = 'role' type = "dropdown" placeholder = "Select a role">
                        <option value="admin">Admin </option>
                        <option value = "user"> User </option>
                    </select>
                </div>
                    <button class = "btn btn-primary m-2" type = 'submit'>Add User</button>
            </form>
            <table class="table table-hover" id="adminTable">
                <tbody>
                    <h3>Administrators</h3>
                        <thead>
                            <th>Username</th>
                            <th>Permission</th>
                            <th>Delete</th>
                        </thead>
                    <?php $admins = getAdmins();
                        foreach ($admins as $admin) {
                            echo '<tr>';
                            echo '<td>' . $admin->username . '</td>';
                            echo '<td>' . $admin->role . '</td>';
                            echo '<td scope = \"col\"> <a class="btn btn-primary btn-lg" href="index.php?action=admin_delete_user&user_id=' . $admin->user_id . '"> Delete</a> </td>';
                            echo '</tr>';
                        } ?>
                </tbody>
            </table>
            <table class="table table-hover" id="usersTable">
                <tbody>
                <h3>Users</h3>
                <thead>
                <th>Username</th>
                <th>Permission</th>
                <th>Delete</th>
                </thead>
                <?php $users = getUsers();
                foreach ($users as $user) {
                    echo '<tr>';
                    echo '<td>' . $user->username . '</td>';
                    echo '<td>' . $user->role . '</td>';
                    echo '<td scope = \"col\"> <a class="btn btn-primary btn-lg" href="index.php?action=admin_delete_user&user_id=' . $user->user_id . '">Delete</a> </td>';
                    echo '</tr>';
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /.container -->

<?php include("includes/footer.php") ?>