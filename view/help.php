<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: This page shows general information about the site-->

<!DOCTYPE html>
<html lang="en">
<title>Edit Images</title>
<head>
    <?php include("./includes/script_css.php");
    require('./includes/navbar.php');?>
</head>

<body>
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

      <?php require("includes/footer.php")?>
