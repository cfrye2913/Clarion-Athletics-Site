<?php
    require_once ('Model/mysql.php');
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
        include('View/home.php');
        exit();
    }

    //Determines if a button is checked
    function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }


    //Determines which page to go to based on the action
    switch($action)
    {
        case 'admin':
            include 'View/admin.php';
            break;
        case 'help':
            include 'View/help.php';
            break;
        case 'login':
            include 'View/login.php';
            break;
        case 'newsletter':
            include 'View/newsLetter.php';
            break;
        case 'process_newsletter_signup':
            $member = new \Member();
            $member->FName = $_POST['firstName'];
            $member->LName = $_POST['lastName'];
            $member->email = $_POST['email'];
            $member->sport = $_POST['sport'];
            $member->receive_newsletter = isset($_POST['receive_newsletter']) ? 1: 0; //(isChecked($_POST['receive_newsletter'], true) ? 1:0);
            insertMember($member);
            require_once 'View/home.php';
            break;
        case 'training':
            include 'View/training.php';
            break;
        case 'underConstruction':
            include 'View/UnderConstruction.php';
            break;
        case 'videos':
            include 'View/videos.php';
            break;
        default:
            include 'View/home.php';
            break;
    }











?>