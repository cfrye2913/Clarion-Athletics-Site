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
<?php include('../includes/navbar.html'); ?>
    <div class="container">
        <div class="company-template">
            <h1>Video Page</h1>
            <form class="align-content-center my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </form>
            <p class="lead">
                <h2>
                    Back Squat
                </h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fgqwt7p_Gts" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

            <br>
            <h2> Bench Press </h2>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/rT7DgCr-3pg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <?php $myfile = fopen("../quotes.txt", "r") or die("Unable to open file!");
        // Output one line until end-of-file
        while(!feof($myfile)) {

            echo '<div class = "text-center bg-danger">'. fgets($myfile) . '</div>';
        }
        fclose($myfile);
        ?>
    </div><!-- /.container -->

    <?php include("../includes/footer.php") ?>
    <br>

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