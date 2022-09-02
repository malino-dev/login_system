<?php
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        echo "<br>";
        unset($_SESSION['message']);
    }
?>
<h1>Main Menu</h1>
<form method="post" action="index.php">
    <input type="hidden" name="action" value="mm_register">
    <input type="submit" value="Register">
</form>
<form method="post" action="index.php">
    <input type="hidden" name="action" value="mm_login">
    <input type="submit" value="Login">
</form>