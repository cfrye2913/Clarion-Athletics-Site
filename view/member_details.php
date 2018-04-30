<?php
    $title = "Member Details Page - Clarion Athletics Site";
    include("./includes/script_css.php");
    require('./includes/navbar.php');
    $member = getMemberById($member_id);
?>
<script>
    $(document).ready(function(){
        var confirmDialog = $("#confirmation");
        confirmDialog.hide();
        $("#cancel").click(function(){
            confirmDialog.hide();
        });
        var btnConfirm = $("#confirm");
        btnConfirm.click(function(){
            var target = "./index.php?action=removeMember&id=" + btnConfirm.data("id");
            window.location.replace(target);
        });
        $("#remove").click(function(){
            confirmDialog.show();
        })

    });

</script>
<h1>Member Details</h1>
<div class = "col-8 mx-auto mb-6 text-left font-size-large">
    <form class = "form-group" method = "post" action = "index.php">
        <input type = "hidden" name = "action" value = "updateMember" />
        <input type = "hidden" name = "memberId" value = "<?= $member->memberId?>" />
        <div class = "form-row">
            Member Id: <?= $member->memberId?>
        </div>
        <div class = "form-row form-inline">
            <label>Sign-up Date: <?= $member->dateRegistered->format("m-d-Y")?></label>
        </div>
        <div class = "form-row form-inline">
            <label>First Name: </label>
            <input class = "form-control ml-2" name = "firstName" type = "text" maxlength="50" required value = "<?= $member->FName?>"/>
        </div>
        <div class = "form-row form-inline">
            <label>Last Name: </label>
            <input class = "form-control ml-2" name = "lastName" type = "text" maxlength="50" required value = "<?= $member->LName?>"/>
        </div>
        <div class = "form-row form-inline">
            <label>Sport: </label>
            <select class = "form-control" id = "sport" name = "sport" required>
                <?php
                $parsedResults = getSports();
                foreach($parsedResults as $row):
                    ?>
                    <option <?php if($member->sport_name === $row->sportsName){
                        echo 'selected = "selected"';
                    }?>>
                        <?=$row->sportsName; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class = "form-row form-inline">
            <label>Email: </label>
            <input class = "form-control ml-2" name = "email" type = "text" maxlength="255" required value = "<?= $member->email?>"/>
        </div>
        <div class = "form-row form-inline">
            <label>Member should receive newsletters: </label>
            <?php
                if($member->receive_newsletter){
                    echo '<input type = "checkbox" name = "receiveNewsletters" class = "form-check-input checkbox-large ml-4" checked />';
                }else{
                    echo '<input type = "checkbox" name = "receiveNewsletters" class = "form-check-input checkbox-large ml-4" />';
                }
            ?>
        </div>
        <br>
        <input type = "submit" id = "save" class = "btn btn-primary" value = "Save Info"/>
    </form>
    <button id="remove" class = "btn btn-primary">Delete Member</button>
    <div class="modal" tabindex="-1" role="dialog" id="confirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you wish to delete this member?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id = "confirm" data-id = "<?=$member->memberId?>" class="btn btn-primary">Delete</button>
                    <button type="button" id = "cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("./includes/footer.php");
?>

