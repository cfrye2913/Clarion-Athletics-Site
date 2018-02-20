<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title>Clarion University Athletics</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>

<body>

    <?php include("../includes/navbar.html"); ?>

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