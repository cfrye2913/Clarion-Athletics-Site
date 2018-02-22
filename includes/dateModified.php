<?php
//set the default time zone to Eastern
date_default_timezone_set("America/New_York");
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$pfile = $break[count($break) - 1];
//echo $pfile;
echo "This page was last modified on " .date("d F Y \@ g:ia",filemtime($pfile));
?>