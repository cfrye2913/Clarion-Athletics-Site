<?php
$title = "Edit Images- Clarion Athletics Site";
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
</div>

<?php
include("./includes/footer.php");
?>
