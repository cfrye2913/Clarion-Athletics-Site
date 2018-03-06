<!--Authors: Christina Cotton, Aaron Cooper, and Chris Frye
    Last Modified: 2/21/2018
    Purpose: This File can be included on any page to display
    the date that that page was last modified.-->
<?php
//set the default time zone to Eastern
date_default_timezone_set("America/New_York");
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$pfile = $break[count($break) - 1];
echo "This page was last modified on " .date("d F Y \@ g:ia",filemtime($pfile));
?>