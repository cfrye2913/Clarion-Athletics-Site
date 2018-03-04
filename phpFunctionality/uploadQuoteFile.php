<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>Upload a New Quotes File</h1>

<?php
    $targetdir = "/files";
    $targetfile = $targetdir . basename($_FILES['userfile']['name']);
    if(file_exists($targetfile))
    {
        move_uploaded_file($_FILES['userFile']['name'], $targetfile);
    }
?>