<?php
$title = "Member Details Page - Clarion Athletics Site";
include("./includes/navbar.php");
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
    <?php
        echo '<b>Member Id: </b> ' . $member->memberId . '<br>';
        echo '<b>First Name: </b> ' . $member->FName . '<br>';
        echo '<b>Last Name: </b> ' . $member->LName . '<br>';
        echo '<b>Email: </b>' . $member->email . '<br>';
        echo '<b>Sport: </b> ' . $member->sport_name . '<br>';
        echo '<b>Date Registered:</b> ' . $member->dateRegistered->format('m-d-Y') . '<br>';
        if($member->receive_newsletter == 0) {
            echo 'This member has chosen not to receive workout notifications';
        }
        else{
            echo 'This member has chosen to receive workout notifications';
        }
    ?>
    <br>
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

