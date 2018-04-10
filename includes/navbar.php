<!DOCTYPE html>
<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This page can be included on any page to incorporate
    a common header. This page should be included on every page that
    the user sees.
    ****This include is required to use bootstrap or custom CSS-->

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">


    <title> <?php echo $title?> </title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Custom styles for this template -->


</head>

<body>

<div class="container">

    <div class="company-template"><nav class="navbar navbar-expand-md navbar-dark bg-clarion-blue fixed-top">
    <a class="navbar-brand" href="#">
        <a href = '../index.php?action=home'>
            <img class = 'img-responsive' src="../Images/Clarion_Golden_Eagles_logo.png" alt = "Clarion Athletics" width = '60px' height = '30px'>
        </a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn" href="../index.php?action=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="btn" href="../index.php?action=training">Training</a>
            </li>
            <li class="nav-item">
                <a class="btn" href="../index.php?action=videos">Videos</a>
            </li>
            <li class="nav-item">
                <a class="btn" href="../index.php?action=help">Help</a>
            </li>
            <li class="nav-item">
                <a class="btn" href="../index.php?action=admin">Admin</a>
            </li>
            <li class="nav-item">
                <a class="btn" href="../index.php?action=members">Members</a>
            </li>
            <li class="nav-item dropdown">
                <a class="btn dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sports</a>
                <!--<div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="./baseball.html">Baseball</a>
                    <a class="dropdown-item" href="./basketball.html">Basketball</a>
                    <a class="dropdown-item" href="./crosscountry.html">Cross Country</a>
                    <a class="dropdown-item" href="./football.html">Football</a>
                    <a class="dropdown-item" href="./golf.html">Golf</a>
                    <a class="dropdown-item" href="./soccer.html">Soccer</a>
                    <a class="dropdown-item" href="./softball.html">Softball</a>
                    <a class="dropdown-item" href="./swimdive.html">Swimming & Diving</a>
                    <a class="dropdown-item" href="./tennis.html">Tennis</a>
                    <a class="dropdown-item" href="./volleyball.html">Volleyball</a>
                    <a class="dropdown-item" href="./wrestling.html">Wrestling</a>
                </div>-->

                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Baseball</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Basketball</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Cross Country</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Football</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Golf</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Soccer</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Softball</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Swimming & Diving</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Tennis</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Volleyball</a>
                    <a class="dropdown-item" href="../View/UnderConstruction.php">Wrestling</a>
                </div>
            </li>
        </ul>
        <a class="d-inline btn" href = '../index.php?action=login'>Login/Sign Up</a>
        <a class="d-inline btn" href = '../index.php?action=newsletter'>News Letter</a>
        <!--<div class = "container my-2 my-lg-0"> Login/Sign up</div> -->
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
    </nav>

