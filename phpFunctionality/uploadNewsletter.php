<?php
//set a title
$title = "Newsletter Upload";
//include the navbar
require '../includes/navbar.php';
?>

    <h1>Upload a Newsletter</h1>

<?php
    //specify the file path that the text file will be stored at
    $targetfile = '../resourceFiles/newsletter.html';
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    //check if a file was submitted
    if($_FILES['userFile']['error'] == UPLOAD_ERR_NO_FILE)
    {
        echo "<script type='text/javascript'>alert('No file was selected. Please try again.');
                        document.location.href = \"../pages/admin.php\"</script>";
    }
    //Check the file type
    elseif(finfo_file($finfo, $_FILES['userFile']['tmp_name']) != "text/plain")
    {
        $message = 'Incorrect file type';
    }
    elseif(file_exists($targetfile))//check if the file already exists
    {
        $message = 'A file with this name already existed. It was replaced.';
        move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
    }
    else {//move the file
        $message = 'File uploaded successfully';
        move_uploaded_file($_FILES['userFile']['tmp_name'], $targetfile);
    }

    finfo_close($finfo);
    echo $message;
?>