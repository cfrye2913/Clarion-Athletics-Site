<?php
    //Checks if the POST or GET actions are set
    //sets action appropriately.
    if(isset($_POST['action']))
    {
        $action = $_POST['action'];
    }
    elseif(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        include('../View/index.php');
        exit();
    }

    //Determines which page to go to based on the action
    switch($action)
    {
        case 'admin':
            include '../View/admin.php';
            break;
        case 'help':
            include '../View/help.php';
            break;
        case 'login':
            include '../View/login';
            break;
        case 'newsletter':
            include '../View/newsLetter.php';
            break;
        case 'training':
            include '../View/training.php';
            break;
        case 'underConstruction':
            include '../View/UnderConstruction.php';
            break;
        case 'videos':
            include '../View/videos.php';
            break;
        default:
            include '../View/home.php';
            break;
    }











?>