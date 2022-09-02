<?php
    require_once BASE_DIR. "/classes/DBHandler.php";

    $dbHandler = new DBHandler();

    $users = $dbHandler->GetAllUsers();
?>

<table>
    <tr>
        <th>Username</th>
        <th>First name</th>
        <th>Surname</th>
    </tr>
    <?php
        foreach($users as $user)
        {
            echo "<tr>";
            echo "<td>". $user['username']. "</td>";
            echo "<td>". $user['firstname']. "</td>";
            echo "<td>". $user['surname']. "</td>";
            echo "</tr>";
        }
    ?>
</table>

<?= make_button_link("home", "Back", "primary"); ?>