<?php

?>
<h1>Hallo <?= $_SESSION['login_username']; ?></h1>
<?= make_button_link("u_showusers", "Show users", "primary"); ?>
<?= make_button_link("u_editprofile", "Edit profile", "primary"); ?>
<?= make_button_link("logout", "Logout", "danger"); ?>