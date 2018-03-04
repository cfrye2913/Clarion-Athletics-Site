<?php
    //set a title
    $title = "News Letter Sign Up";
    //include the navbar
    require '../includes/navbar.php';
?>

<h1>Upload a New Quotes File</h1>

<?php
    $targetdir = "../files/";
    $targetfile = $targetdir . $_FILES['userFile']['name'];
    if (@mime_content_type($_FILES['userFile']['type']) != "text/html")
    {
        $message = 'Incorrect file type.';
    }
    elseif(file_exists($targetfile))
    {
        $message = 'A file with this name already existed. It was replaced.';
        move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
    }
    else {
        $message = 'File uploaded successfully';
        move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
    }
    echo $message;
?>