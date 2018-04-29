<?php
$title = "Edit Sports- Clarion Athletics Site";
include("./includes/navbar.php");
require_once './Model/mysql.php'?>

<div id = "sports" class = "jumbotron">
        <h3 class = "mt-3">Add a sport</h3>
        <form enctype="multipart/form-data"
              action = "index.php?action=add_sport"
              method = "post"
              class = "row">
            <div class = "form-row mx-auto">
                Sport Name: <input class = "form-control" type = "text" name = "sportName" required />
                <input class = "form-control" type = "submit" value = "Add Sport"/>
            </div>
        </form>
    <table class = "mx-auto table table-hover">
        <thead>
            <tr>
                <td><b>Sport</b></td>
                <td>&nbsp</td>
            </tr>
        </thead>
        <tbody>
    <?php
        $sportList = getSports();
        if(!empty($sportList)){
            foreach ($sportList as $sport){
                echo '<tr>';
                echo '<td>' . $sport->sportsName . '</td>';
                echo '<td><a class = "btn btn-primary" href = "index.php?action=remove_sport&id=' . $sport->sportsNum . '"> Delete</a>';
                echo '</tr>';
            }
        }
    ?>
        </tbody>
    </table>
</div>

<?php
include("./includes/footer.php");
?>
