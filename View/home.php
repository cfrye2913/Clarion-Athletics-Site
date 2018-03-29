<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/23/2018
    Purpose: Landing page for the site-->
<?php
    $title = "Home - Clarion Athletics Website";
    require('includes/navbar.php'); ?>

  <div class="container mb-5">

      <!--Include the Carousel using php
        This allows the carousel to be dynamically
        populated using all images from
        ../Images/CarouselImages/-->
      <?php
      include("includes/CarouselInclude.php");
      ?>


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

      <?php require("includes/footer.php")?>

