<?php
$title = "Members Page - Clarion Athletics Site";
include("./includes/navbar.php");
require_once './Model/mysql.php'?>
<script src = "js/tableOperations.js"></script>

<h1>Members</h1>

<input class = "form-control" type="text" id="searchBar" onkeyup="search()"
       placeholder="Search for by last name or click a table heading to sort"/>
<table class="table table-hover" id="membersTable">
    <!--If adding a new column to the table, you must add an onclick of sort()
        and pass in the column number starting at 0. This calls the sort function
        in tableOperations.js-->
        <?php
        $member = array();
        $members = getAllMembers();

        if(count($members) <= 0)
            echo "There are currently no members signed up.";
        elseif(count($members) === 1) {
            $member_id = $members[0]->memberId;
            include('member_details.php');
        }
        else {
            echo '<thead>
    <tr>
        <th scope="col" onclick = "sort(0)" class = "clickable">First</th>
        <th scope="col" onclick = "sort(1)" class = "clickable">Last</th>
        <th scope="col" onclick = "sort(2)" class = "clickable">Sport</th>
        <th scope="col" onclick = "sort(3)" class = "clickable">Email</th>
        <th scope="col" onclick = "sort(3)" class = "clickable">Details</th>
    </tr>
    </thead>
    <tbody>';
            foreach ($members as $member) {
                echo '<tr>';
                echo '<td scope = \"col\">' . $member->FName . '</td>';
                echo '<td scope = \"col\">' . $member->LName . '</td>';
                echo '<td scope = \"col\">' . $member->sport_name . '</td>';
                echo '<td scope = \"col\">' . $member->email . '</td>';
                echo '<td scope = \"col\"> <form method = "post" action = "index.php?action=member_details&member_id='.$member->memberId.' "><input class = "form-control" type = "submit" value = "More..."/></form>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        ?>

</table>


<?php
include("./includes/footer.php");
?>
