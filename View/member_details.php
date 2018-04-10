<?php
$title = "Member Details Page - Clarion Athletics Site";
include("./includes/navbar.php");
$member = getMemberById($member_id);
?>
<h1>Member Details</h1>
<div class = "col-8 mx-auto mb-6 text-left font-size-large">
    <?php
        echo '<b>Member Id: </b> ' . $member->memberId . '<br>';
        echo '<b>First Name: </b> ' . $member->FName . '<br>';
        echo '<b>Last Name: </b> ' . $member->LName . '<br>';
        echo '<b>Email: </b>' . $member->email . '<br>';
        echo '<b>Sport: </b> ' . $member->sport_name . '<br>';
        echo '<b>Date Registered:</b> ' . $member->dateRegistered->format('m-d-Y') . '<br>';
        if($member->receive_newsletter == 0) {
            echo 'This member has chosen not to receive newsletters';
        }
        else{
            echo 'This member has chosen to receive newsletters';
        }
        echo '</div>';
        include("./includes/footer.php");
    ?>

