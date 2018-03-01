<?php
    //File to populate the carousel with all images from the Carousel Image folder
    //get a directory handle to the carousel images
    $dirPath = "../Images/CarouselImages";


    //open and read the directory
    //Check if the directory is empty, if it is, echo a
    //message that the directory is empty
    //else, loop through and store all image names in the imageArray
    $imageDir = opendir($dirPath);
    if(count(scandir($dirPath)) == 2)//if something exists other than ./ and ../
    {
        //initialize the array size to -1, this will trigger the error message
        //if this condition is met
        $arraySize = -1;
    }
    else {
        while (($file = readdir($imageDir)) != false) {
            if ($file != "." && $file != "..") {
                $imageArray[] = $file;
            }
        }

        //close the directory
        closedir($imageDir);
        //print_r($imageArray);
        //get the size of the array for later looping
        $arraySize = count($imageArray);
    }

    //if the directory is empty, display an error message
    if($arraySize <= 0)
    {
        echo "There are no images to show at this time.";
    }
    else {//else, generate the carousel

        //generate the html for the carousel
        //PHP_EOL is concatenated on the end of each line to make the html more readable when viewing
        //the page source
        //The code below depends on bootstrap 4.0
        echo "<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">".PHP_EOL;
        echo "<ol class=\"carousel-indicators\">" . PHP_EOL;
        echo "<li data-target = \"#carouselExampleIndicators\" data-slide-to=\"0\" class = \"active\"></li>" . PHP_EOL;
        //loop through the array and generate controllers for each image
        for ($i = 1; $i < $arraySize; $i++) {
            echo "<li data-target = \"#carouselExampleIndicators\" data-slide-to=\"$i\"></li>" . PHP_EOL;
        }
        echo "</ol>" . PHP_EOL;

        echo "<div class=\"carousel-inner\">".PHP_EOL;

        echo "<div class=\"carousel-item active\">".PHP_EOL;
        echo "<img class=\"d-block w-100\" src=\"$dirPath/$imageArray[0]\" alt=\"Slide 0\">".PHP_EOL;
        echo "</div>".PHP_EOL;

        //loop through the array and add each picture to the carousel
        for ($i = 1; $i < $arraySize; $i++) {
            echo "<div class=\"carousel-item\">".PHP_EOL;
            echo "<img class=\"d-block w-100\" src=\"$dirPath/$imageArray[$i]\" alt=\"Slide $i\">".PHP_EOL;
            echo "</div>".PHP_EOL;
        }
        echo PHP_EOL."</div>".PHP_EOL;
    }
?>
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
