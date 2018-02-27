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

  <div class="container mb-5">

      <!--Carousel Indicators-->

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>

        <!--Carousel Images-->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="../Images/basketball.jpeg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../Images/diving.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../Images/shotput.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../Images/wrestling.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="../Images/swimmin.jpg" alt="Third slide">
          </div>
        </div>

        <!--Carousel Controllers-->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!--Content-->
      <div class = "clarion-blue">
        <div class = "text-center mt-5">
          <h1>Welcome to Clarion Athletics’ Strength Training</h1><br> </div>
        <p class = "font-size-large">
           &nbsp;&nbsp;&nbsp;&nbsp; This site is dedicated to Clarion University’s Athletic Department
        in hope that the site will provide Coach Jesse’s workouts, each team’s
        weight averages, competition scores and times and videos on how to
          do different exercises.</p>
            <p class = "font-size-large">
              &nbsp;&nbsp;&nbsp;&nbsp; Athletes and Coaches can sign into the site and enter individual’s
        scores, speeds and/or weights. Each submission will be entered and
        verified into the database and become public to users.<p>
            <p class = "font-size-large">
        &nbsp;&nbsp;&nbsp;&nbsp; Our goal is to show progress and help push other Clarion teams to
        beat each other’s scores in hope to create friendly competition and
        push each other to reach new heights! Go Golden Eagles!
        (Make sure you show each team’s support by attending their games and competitions).
        </p>
      </div>

      <?php include("../includes/footer.php")?>


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

