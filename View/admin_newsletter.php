<?php
$title = "Edit Images- Clarion Athletics Site";
include("./includes/navbar.php");
require_once './Model/mysql.php'?>
<div>
    <h3 class = "mt-3">Add a news letter</h3>
    <!--Form to upload an html file for the automated email
         and a form to send the email-->
    <form enctype="multipart/form-data"
          action = "index.php?action=upload_newsletter"
          method = "post"
          class = "row">
        <div class = "col-6 text-right">Select a newsletter file (HTML format):</div>
        <div class = "col-6 text-left pl-3"><input name = "userFile" type = "file"/> </div>
        <input type = "submit" value = "Upload Newsletter" class = "btn-primary ml-auto mr-auto mt-3 mb-3"/>
    </form>
    <!--            <a href = "index.php?action=send_newsletter" class = "btn-danger">Send Newsletter</a>-->
    <form action="index.php?action=send_newsletter" method="post">
        <input type="submit" value="Send newsletter" class = "btn-danger">
    </form>
</div>

<?php
include("./includes/footer.php");
?>