<?php
    $firstname = "";
    $surname = "";

    require_once BASE_DIR. "/classes/DBHandler.php";

    $dbHandler = new DBHandler();
    $profileInfo = $dbHandler->GetProfileInfo($_SESSION['login_id']);

    $firstname = $profileInfo['firstname'];
    $surname = $profileInfo['surname'];
?>
<form method="post">
    <span>First name:</span>
    <input type="text" name="firstname" value="<?= $firstname; ?>">
    <br>

    <span>Surname:</span>
    <input type="text" name="surname" value="<?= $surname; ?>">
    <br>

    <input type="hidden" name="action" value="editprofile">
    <input type="submit">
</form>
<?= make_button_link("home", "Back", "primary");