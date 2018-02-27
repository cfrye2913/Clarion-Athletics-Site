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
      <div class = "jumbotron">
          <h1>About</h1>
          <p class="lead">This website was designed as a project for the course CIS 370. <br> The creators of this website are:
            <br> Aaron Cooper
            <br> Christina Cotton
            <br> Christopher Frye
          </p>
          <br>
          <h4>For issues, compliments, suggestions or questions, email us by clicking <a href="mailto:c.n.cotton@eagle.clarion.edu">here</a>.
          </h4>
          <br>
          <h2> Here are some useful links:
          </h2>
          <p>
              <a href = "http://clarion.edu/myclarion-tools.html">MyClarion Tools</a> <br>
              <a href = "http://www.clariongoldeneagles.com/">Clarion Athletics Official Site</a> <br>
              <a href = "http://www.shopgoldeneagles.com/">Athletic Team Shop</a> <br>
          </p>
          <br>
          <h5>
          Special thanks to Jesse Kelley, Bree Kelley, Jennifer Herron, Jon Strub and Jody Strausser.
          </h5>

          <h5>Ideas for our website were inspired by the following pages: </h5><br>
          <p>
              <a href = "http://www.clarion.edu">Clarion Home Page</a> <br>
              <a href = "http://www.clariongoldeneagles.com">Clarion Athletics Official Site</a> <br>
              <a href = "https://http://www.rockathletics.com/">Slippery Rock Athletics</a> <br>
          </p>
          <div class = "footer"></div>
      </div>

      <div id="map" class = "map"></div>
      <script>
          function initMap() {
              var uluru = {lat: 41.20776083868054, lng: -79.38060723956448};
              var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 17,
                  center: uluru
              });
              var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
              });
          }
      </script>
      <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7j3O6YLRgClNnSOuSHDcZjxzdsKLAfU8&callback=initMap">
      </script>


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
<script> getFooter(); </script>
</body>
</html>
