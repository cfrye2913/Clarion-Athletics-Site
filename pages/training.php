<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php
    $title = "Training - Clarion University Athletics";
    include('../includes/navbar.php'); ?>

    <div class = "company-template"><!--Container-->


        <div class = "row">

            <!--This div contains the main content of the page including the dropdowns and form-->
            <div class = "col-8 offset-2 jumbotron text-center">
                <h1>Choose your sport from the dropdown</h1>

                <!--Dropdown to select your sport-->
                <button type="button" class="btn-lg btn-color-clarionBlue text-white dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    M Swimming and Diving
                </button>

                <div class = "dropdown-menu">
                    <a class = "dropdown-item">Volleyball</a>
                    <a class = "dropdown-item">W Basketball</a>
                    <a class = "dropdown-item">M Basketball</a>
                    <a class = "dropdown-item">Football</a>
                    <a class = "dropdown-item">W Swimming and Diving</a>
                    <a class = "dropdown-item">M Swimming and Diving</a>
                    <a class = "dropdown-item">Baseball</a>
                </div>


                <h3 class = "mt-lg-5">Choose exercise from the dropdown and enter your score</h3>


                <div class = "row">
                    <!--form to submit personal scores-->
                    <form class = "col-12">
                        <!--Dropdown to select exercise-->
                        <button type="button" class="btn-lg btn-color-clarionBlue text-white dropdown-toggle col-3 mx-auto"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Back Squat
                        </button>

                        <div class = "dropdown-menu col-3">
                            <a class = "dropdown-item">Back Squat</a>
                            <a class = "dropdown-item">Bench Press</a>
                            <a class = "dropdown-item">Power Clean</a>
                        </div>

                        <!--Number input for score-->
                        <input type = "number" class = "text-center col-2 mx-auto mr-0"/>
                        <!--Submit button-->
                        <button type = "submit" class = "btn  col-2 mx-auto ml-0">Enter</button>
                    </form>
                </div>

                <div class = "row mt-5">
                    <div class="col-6 text-center">
                        <h3>Team Averages</h3>
                        <p>
                            Back Squat: 135 lbs<br>
                            Bench Press: 80 lbs<br>
                            Power Clean: 75 lbs<br>
                        </p>
                    </div>

                    <div class = "col-6 text-center">
                        <h3>Team Highs</h3>
                        Back Squat: 210 lbs(Cotton)<br>
                        Bench Press: 95 lbs(Cotton)<br>
                        Power Clean: 100 lbs (Cotton)<br>
                    </div>
                </div>
                <canvas id="lineChart" class = "myChart"></canvas>
            </div>
        </div>

        <?php include("../includes/footer.php")?>
    </div><!-- /.container -->


    <!--Script to generate the line chart-->
    <script>
        //Labels for the x axis
        var months = ["January", "February", "March", "April", "May", "June"];
        //arrays that represent data sets for the y axis
        //TO CHANGE DATA WITHIN THE ARRAY, CHANGE THESE NUMBERS
        var backSquat = [123, 127, 130, 136, 130, 140];
        var benchPress = [75, 78, 84, 80, 82, 86];
        var powerClean = [67, 70, 75, 76, 78, 80];

        //get a reference to the canvas where the chart will be drawn
        var ctx = document.getElementById("lineChart");

        //draw the lines to populate the chart
        var myChart = new Chart(ctx, {
            type: 'line',                           //define the type of chart
            data: {
                labels: months,                     //specify the array that holds the labels
                datasets: [
                    {
                        data:backSquat,             //specify data set
                        label: "Back Squat",        //give a label to the line
                        borderColor: "#ff4433",     //give line a color
                        fill: false                 //if true, line will be filled below,fillColor can be changed
                    },
                    {
                        data: benchPress,
                        label: "Bench Press",
                        borderColor: "#3e95cd",
                        fill: false
                    },
                    {
                        data:powerClean,
                        label: "Power Clean",
                        borderColor: "#33ff44",
                        fill: false
                    }
                ]
            }
        });
    </script>
